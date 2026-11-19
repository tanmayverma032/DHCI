<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\Files\File;

class LiveclassController extends BaseController
{
    protected $BatchModel;
    protected $SessionModel;
    protected $Liveclass;

    function __construct()
    {
        $this->BatchModel = new \App\Models\BatchModel();
        $this->SessionModel = new \App\Models\SessionModel();
        $this->Liveclass = new \App\Models\Liveclass();
    }
    public function index()
    {
        $class = $this->Liveclass->findAll();
        $title = "Live Class";
        return view('admin/classes/live_class', compact('class', 'title'));
    }

    public function getClass()
    {
        $class = $this->Liveclass->getAlldata();

        // Assuming $class is an array containing meeting information
        $tableContent = '<table id="example3" class="display table header-border table-hover verticle-middle" style="min-width: 845px">
        <thead>
            <tr>
                <th>Branch</th>
                <th>Session</th>
                <th>Batch</th>
                <th>Meeting Date/Time</th>
                <th>Meeting</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>';

        foreach ($class as $row) {
            // Convert meeting date and time to Unix timestamps
            $meeting_timestamp = strtotime($row['metting_date'] . ' ' . $row['metting_time']);
            $meeting_end_timestamp = $meeting_timestamp + ($row['duration'] * 60);
            $current_time = time(); // Current timestamp

            // Determine meeting status
            if ($current_time >= $meeting_timestamp && $current_time <= $meeting_end_timestamp) {
                // Meeting is currently ongoing
                $meeting_status = '<a target="_blank"  href="' . $row['metting_link'] . '" class="btn btn-sm btn-primary">Join</a>';
            } elseif ($current_time < $meeting_timestamp) {
                // Meeting has not started yet
                $meeting_status = '<span class="btn btn-sm btn-warning">Pending</span>';
            } else {
                // Meeting has ended
                $meeting_status = '<span class="btn btn-sm btn-danger">Closed</span>';
            }

            // Determine action buttons
            $action_buttons = '';
            if (is_admin()['admin']['role'] == 1) {
                $action_buttons = '<a href="' . url_to('edit_class') . '?metting_id=' . $row['id'] . '" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                  <a href="' . url_to('delete_class') . '?metting_id=' . $row['id'] . '" class="btn btn-danger shadow btn-xs sharp confirm-delete" data-delete-url="' . url_to('delete_class') . '?metting_id=' . $row['id'] . '"><i class="fa fa-trash"></i></a>';
            }
           
            // Add the row to the table content
            $tableContent .= '<tr id="' . $row['id'] . '">
                <td>' . $row['institute_name'] . '</td>
                <td>' . $row['session'] . '</td>
                <td>' . $row['batch_name'] . '</td>
                <td>' . date('d-m-Y h:i A', $meeting_timestamp) . '</td>
                <td>' . $meeting_status . '</td>
                <td>
                    <div class="d-flex">' . $action_buttons . '</div>
                </td>
            </tr>';
        }

        // Close the table content
        $tableContent .= '</tbody></table>';

        // Return the complete table HTML
        echo $tableContent;
    }

    public function editClass()
    {
        $id = $this->request->getVar('metting_id');
        $classdata = $this->Liveclass->find($id);
        $title = "Edit Live Class";
        $session = $this->SessionModel->where('status', 1)->orderBy('id', 'DASC')->findAll();
        $bsatch = $this->BatchModel->where('id', $classdata['batch_id'])->first();
        return view('admin/classes/add-live-class', compact('classdata', 'title', 'session', 'bsatch'));
    }

    public function addClass()
    {
        $title = "Live class Create";
        $session = $this->SessionModel->where('status', 1)->orderBy('id', 'DASC')->findAll();
        return view('admin/classes/add-live-class', compact('title', 'session'));
    }
    public function saveLiveclass()
    {
        if (!empty($this->request->getVar('id'))) {
            $data['id'] = $this->request->getVar('id');
        }
        $data['metting_name'] = $this->request->getVar('metting_name');
        $data['session_id'] = $this->request->getVar('session_id');
        $data['batch_id'] = $this->request->getVar('batch_id');
        $data['metting_date'] = $this->request->getVar('metting_date');
        $data['metting_time'] = $this->request->getVar('metting_time');
        $data['duration'] = $this->request->getVar('duration');
        $data['metting_link'] = $this->request->getVar('metting_link');
        $data['discription'] = $this->request->getVar('discription');
        $data['branch_id'] = is_admin()['admin']['branch_id'];

        try {
            $result = $this->Liveclass->save($data);
            if (!empty($result)) {
                return redirect()->to('admin/live-class-create')->with("success", "Class added");
            }
        } catch (\Exception $th) {
            return redirect()->back()->with("error", $th->getMessage());
        }
    }

    public function liveClassDelete()
    {
        $id = $this->request->getVar('metting_id');

        $this->Liveclass->where('id', $id)->delete();
        return redirect()->back()->with("success", 'Delete Successfully');
    }
}
