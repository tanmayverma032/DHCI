<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use CodeIgniter\Files\File;


class StudyMaterialControllers extends BaseController
{

    public function __construct (){
        $this->StudyMaterialModel = new \App\Models\StudyMaterialModel();
        $this->ProgramModel = new \App\Models\ProgramModel();
        $this->CourseModel = new \App\Models\CourseModel();
    }
    public function sanitize($stringToSanitize = false) 
    { 
        if (!empty($stringToSanitize)) {
           return addslashes(htmlspecialchars($stringToSanitize)); 
        } else {
            return "";
        }
    }
 
        public function index() { 
            $data['data']=$this->StudyMaterialModel->find_all();
            // var_dump($data['data']);
            // exit;

            $data['title']="All Study Material ";
            return view('admin/studymaterial/index',$data);
        }

            public function AddStudyMaterial($id = null) 
            { 
                $data = [];
                  if (!empty($id)) {
                    $data['editdata'] = $this->StudyMaterialModel->where('id', $id)->first();
                  

                    if (empty($data['editdata'])) {
                        return redirect()->back()->with("error", "Study Material Not Found!");
                    }
                }
            
                $data['programs'] = $this->ProgramModel->where('status', '1')->findAll();
                $data['courses'] = $this->CourseModel->where('status', '1')->findAll();
                $data['title'] = isset($id) ? "Edit Study Material" : "Add Study Material";
            
                return view('admin/studymaterial/add-studymaterial', $data);
            }


        public function saveStudyMaterial() {
            $id = $this->request->getPost('id'); 
            $files = $this->request->getFileMultiple('filepdf');
        
            $program_id = $this->sanitize($this->request->getPost("program_id"));
            $course_id  = $this->sanitize($this->request->getPost("course_id"));
            $status     = $this->sanitize($this->request->getPost("status"));
            // $semester   = $this->sanitize($this->request->getPost("semester"));
        
            $codes = $this->request->getPost('code'); 
            $names = $this->request->getPost('name');
            $semester = $this->request->getPost('semester'); 
            $oldFiles = $this->request->getPost("old_filepdf");
        
            foreach ($codes as $key => $code) {
                $filePdf = null;
        
                // ✅ Handle file upload
                if (isset($files[$key]) && $files[$key]->isValid() && !$files[$key]->hasMoved()) {
                    $filePdf = $files[$key]->getRandomName();
                    $files[$key]->move('uploads/studymaterials/', $filePdf);
                } elseif (!empty($id) && isset($oldFiles[$key])) {
                    $filePdf = $oldFiles[$key];
                }
        
                $data = [
                    "program_id" => $program_id,
                    "course_id"  => $course_id,
                    "code"       => $this->sanitize($code),
                    "name"       => $this->sanitize($names[$key]),
                    "filepdf"    => $filePdf,
                    "status"     => $status,
                    "semester"     => $semester,
                ];
        
                if (!empty($id)) {
                    $this->StudyMaterialModel->update($id, $data);
                } else {
                    $this->StudyMaterialModel->insert($data);
                }
            }
        
            return redirect()->to(route_to('AllStudyMaterial'))->with("success", "Study Material Saved Successfully");
        }
        
        


    // public function StudyMaterialDelete()
    // {
    //     $id = $this->request->getVar('id');
    //     $this->StudyMaterialModel->where('id', $id)->delete();
    //     return json_encode( array( 
    //         "status" => 1,
    //         "token" => csrf_hash()
    //     ));   
    // }

    public function StudyMaterialDelete()
    {
        $id = $this->request->getPost('id');

        if($id)
        {
            $this->StudyMaterialModel->delete($id);

            return redirect()->back()->with('success','Deleted successfully');
        }

        return redirect()->back()->with('error','Delete failed');
    }




    public function StudyMaterialStatus(){
        $id = $this->request->getVar('id');
        $query = $this->StudyMaterialModel->find($id);
        $status = $query['status']; 
        if ($status=="0") {
        $this->StudyMaterialModel->where('id', $id)->set(['status' => 1])->update();
        }else{
            $this->StudyMaterialModel->where('id', $id)->set(['status' => 0])->update();
        }    
        return json_encode( array( 
            "status" => 1,
            "token" => csrf_hash()
        ));
    }
    

    public function getCoursesByProgram()
    {
        $program_id = $this->request->getVar('program_id');
    
        if ($program_id) {
            $courses = $this->CourseModel
                ->select('id, name, semester')
                ->where('programid', $program_id)
                ->findAll();
    
            return $this->response->setJSON($courses);
        }
    
        return $this->response->setJSON([]);
    }
    
 
}
