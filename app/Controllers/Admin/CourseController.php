<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use CodeIgniter\Files\File;


class CourseController extends BaseController
{

    public function __construct (){
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
        $data['data']=$this->CourseModel->find_all();
        $data['title']="All Course ";
        return view('admin/course/course',$data);
    }
    public function AddCourse($id=null) { 
        if(!empty($id)){
            $data['editdata']=$this->CourseModel->where('id',$id)->first();
            if(empty($data['editdata'])){
                return redirect()->back()->with("error", "Course Not Found!");
            }
        }
        $data['program']=$this->ProgramModel->where('status','1')->findAll();
        $data['title']="Add Course ";
        return view('admin/course/add-course',$data);
    }

    public function saveCourse() {
        $file = $this->request->getFile('thumbnail');
        $id = $this->request->getPost('id');
        $image_status = 0;
        if ($file->isValid() && ! $file->hasMoved()){
            $image_status = $this->Upload->upload_single($file);
            if ($image_status == 1) {
                    return redirect()->back()->with("error","File size should be less than 1 MB");
                }
            if ($image_status == 2) {
                    return redirect()->back()->with("error","Invalid file type, only JPG, JPEG, PNG and WEBP are allowed");   
            }
            $data["thumbnail"]  = $image_status;
        }
        $data["name"]                  = $this->sanitize($this->request->getPost("cname")); 
        $data["slug"]                  = $this->sanitize($this->request->getPost("slug")); 
        $data["modules"]               = $this->sanitize($this->request->getPost("module")); 
        $data["course_fees"]           = $this->sanitize($this->request->getPost("fee"));
        $data["course_eligibility"]    = $this->sanitize($this->request->getPost("course_eligibility"));
        $data["programid"]             = $this->sanitize($this->request->getPost("c_category"));
        $data["date"]                  = $this->request->getPost("date");
        $data["duration"]              = $this->sanitize($this->request->getPost("cduration"));
        $data["semester"]              = $this->sanitize($this->request->getPost("semester"));
        $data["description"]           = $this->request->getPost("description");
        $data["status"]                = $this->sanitize($this->request->getPost("status")); 
        
        if(empty($id)){
            $result = $this->CourseModel->insert($data);
        }else{
            $result = $this->CourseModel->update($id, $data);
        }
        if ($result) {
            return redirect()->to(route_to('AllCourse'))->with("success", "Program Save Successfully");
        } else {
            return redirect()->back()->with("error", "Something went wrong");
        }
    }
    public function CourseDelete()
    {
        $id = $this->request->getVar('id');
        $this->CourseModel->where('id', $id)->delete();
        return json_encode( array( 
            "status" => 1,
            "token" => csrf_hash()
        ));   
    }
    
    public function CourseStatus(){
        $id = $this->request->getVar('id');
        $query = $this->CourseModel->find($id);
        $status = $query['status'];
        if ($status=="0") {
        $this->CourseModel->where('id', $id)->set(['status' => 1])->update();
        }else{
            $this->CourseModel->where('id', $id)->set(['status' => 0])->update();
        }    
        return json_encode( array( 
            "status" => 1,
            "token" => csrf_hash()
        ));
    }
    


    public function Program($id=null) { 
        if(!empty($id)){
            $data['editdata']=$this->ProgramModel->where('id',$id)->first();
            if(empty($data['editdata'])){
                return redirect()->back()->with("error", "Program Not Found!");
            }
        }
        $data['data']=$this->ProgramModel->findAll();
        $data['title']="Programs";
        return view('admin/course/course-program',$data);
    }
    public function saveProgram(){
        
        $file = $this->request->getFile('thumbnail');
        $id = $this->request->getPost('id');
        $image_status = 0;
        if ($file->isValid() && ! $file->hasMoved()){
            $image_status = $this->Upload->upload_single($file);
            if ($image_status == 1) {
                    return redirect()->back()->with("error","File size should be less than 1 MB");
                }
            if ($image_status == 2) {
                    return redirect()->back()->with("error","Invalid file type, only JPG, JPEG, PNG and WEBP are allowed");   
            }

            $data["thumbnail"] = $image_status; 
        }
        $data["title"] = $this->sanitize($this->request->getPost("pname"));
        $data["slug"] = $this->sanitize($this->request->getPost("pslug")); 
        $data["status"] = $this->sanitize($this->request->getPost("status"));
        
        if(empty($id)){
            $result = $this->ProgramModel->insert($data);
        }else{
            $result = $this->ProgramModel->update($id, $data);
        }
       
        if ($result) {
            return redirect()->back()->with("success", "Program Save Successfully");
        } else {
            return redirect()->back()->with("error", "Something went wrong");
        }
            
    }
    public function programDelete()
    {
        $id = $this->request->getVar('id');
        $this->ProgramModel->where('id', $id)->delete();
        return json_encode( array( 
            "status" => 1,
            "token" => csrf_hash()
        ));   
    }
    public function programStatus(){
        $id = $this->request->getVar('id');
        $query = $this->ProgramModel->find($id);
        $status = $query['status'];
        if ($status=="0") {
        $this->ProgramModel->where('id', $id)->set(['status' => 1])->update();
        }else{
            $this->ProgramModel->where('id', $id)->set(['status' => 0])->update();
        }    
        return json_encode( array( 
            "status" => 1,
            "token" => csrf_hash()
        ));
    }
	
 
}
