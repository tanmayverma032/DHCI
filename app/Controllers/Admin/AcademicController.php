<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\Files\File;
use Exception;

class AcademicController extends BaseController
{
    protected $BatchModel;
    protected $SessionModel;

    function __construct()
    {
        $this->SessionModel = new \App\Models\SessionModel();
        $this->BatchModel = new \App\Models\BatchModel();
    }
    public function index()
    {
        $data['title'] = "Session";
        $data['data'] = $this->SessionModel->orderBy('session', 'ASC')->findAll();
        return view('admin/academic/session', $data);
    }

    public function SaveSession()
    {
        if (!empty($this->request->getVar('id'))) {
            $data['id'] = $this->request->getVar('id');
        }
        $data['session'] = $this->request->getVar('session');
        $result = $this->SessionModel->save($data);
        if ($result) {
            return redirect()->back()->with("success", "Sesion added");
        }
        return redirect()->back()->with("error", "Somthing Wrong");
    }
    public function sessionDelete()
    {
        $id = $this->request->getVar('id');

        $this->SessionModel->where('id', $id)->delete();
        return json_encode(array(
            "status" => 1,
            "token" => csrf_hash()
        ));
    }
    public function sessionStatus()
    {
        $id = $this->request->getVar('id');
        $query = $this->SessionModel->find($id);
        $status = $query['status'];
        if ($status == "0") {
            $this->SessionModel->where('id', $id)->set(['status' => 1])->update();
        } else {
            $this->SessionModel->where('id', $id)->set(['status' => 0])->update();
        }
        return json_encode(array(
            "status" => 1,
            "token" => csrf_hash()
        ));
    }

    public function batch()
    {
        $title = "Batch";
        $batch = $this->BatchModel->getallBatch();
        return view('admin/academic/batch', compact('title', 'batch'));
    }
    public function Addbatch(){
        $title = "Batch Add";
        $session = $this->SessionModel->where('status',1)->orderBy('id', 'DASC')->findAll();
        return view('admin/academic/add_batch', compact('title', 'session'));
    }
    public function savebatch(){
        if (!empty($this->request->getVar('batch_id'))) {
            $data['id'] = $this->request->getVar('batch_id');
        }
        $data['session_id'] = $this->request->getVar('session_id');
        $data['batch_name'] = $this->request->getVar('batch_name');
        $data['batch_code'] = $this->request->getVar('batch_code');
        $data['branch_id'] = is_admin()['admin']['branch_id'];
        try {
            $result = $this->BatchModel->save($data);
            if (!empty($result)) {
                return redirect()->back()->with("success", "Batch added");
            }
        } catch (\Exception $th) {
           return redirect()->back()->with("error", $th->getMessage());
        }
        
    }
    public function  editBatch(){
        $id  = $this->request->getGet('batch-id');
        $title = "Edit-Batch";
        $session = $this->SessionModel->where('status',1)->orderBy('id', 'DASC')->findAll();
        $editdata = $this->BatchModel->find($id);
        return view('admin/academic/add_batch', compact('title', 'session','editdata'));
    }

    public function BatchDelete()
    {
        $id = $this->request->getVar('id');

        $this->BatchModel->where('id', $id)->delete();
        return json_encode(array(
            "status" => 1,
            "token" => csrf_hash()
        ));
    }
    public function BatchStatus()
    {
        $id = $this->request->getVar('id');
        $query = $this->BatchModel->find($id);
        $status = $query['status'];
        if ($status == "0") {
            $this->BatchModel->where('id', $id)->set(['status' => 1])->update();
        } else {
            $this->BatchModel->where('id', $id)->set(['status' => 0])->update();
        }
        return json_encode(array(
            "status" => 1,
            "token" => csrf_hash()
        ));
    }
}
