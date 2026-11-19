<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use CodeIgniter\Files\File;


class FranchiseController extends BaseController
{
    function __construct ()
    {
        $this->stateModel = new \App\Models\StateModel();
        $this->franchiseModel = new \App\Models\FranchiseModel();
        $this->CitieModel = new \App\Models\CitieModel();

    }
    public function sanitize($stringToSanitize = false) 
    { 
        if (!empty($stringToSanitize)) {
           return addslashes(htmlspecialchars($stringToSanitize)); 
        } else {
            return "";
        }
    }
    public function index()  {
        $data['data'] = $this->franchiseModel->Where('status','1')->findAll();
        $data['title']="Franchise";
        return view('admin/franchise/franchise', $data);
    }
    public function franchisePanding()  {
        $data['data'] = $this->franchiseModel->Where('status','0')->findAll();
        $data['title']="Franchise";
        return view('admin/franchise/franchise', $data);
    }
    public function franchiseReject()  {
        $data['data'] = $this->franchiseModel->Where('status','-1')->findAll();
        $data['title']="Franchise";
        return view('admin/franchise/franchise', $data);
    }
    public function AddFranchise($id=null)
    { 
        if(!empty($id)){
            $data['franchise'] = $this->franchiseModel->Where('id',$id)->first();
            
            
            $data['districName']=$this->CitieModel->Where('id',$data['franchise']['district_id'])->first()['city_name'];
            
            if($data['franchise']['center_code']==""){
                $center_code = $this->franchiseModel->selectMax('center_code')->first();
                $modifiedString = substr($center_code['center_code'], 0, 5);
                $stringReplace = preg_replace("/[a-zA-Z-]+/", "", $center_code['center_code']);
                $data['center_code']= $modifiedString.$stringReplace+1;
            }
        }else{
            $center_code = $this->franchiseModel->selectMax('center_code')->first();
            $modifiedString = substr($center_code['center_code'], 0, 5);
            $stringReplace = preg_replace("/[a-zA-Z-]+/", "", $center_code['center_code']);
            $data['center_code']= $modifiedString.$stringReplace+1;
        }


        $data['states'] = $this->stateModel->findAll();
        $data['title']="Add Franchise";
        return view('admin/franchise/add-franchise', $data);
    }
    public function saveFranchise()
    {

        $email = $this->request->getPost("email");

        if (!empty($email)) {
            //check email exist or not

            $id = $this->request->getPost('id');
            $photo = $this->request->getFile('photo');
            $photo_status = 0;
            if ($photo->isValid() && ! $photo->hasMoved()){
                $photo_status = $this->Upload->upload_single($photo);
                if ($photo_status == 1) {
                        return redirect()->back()->with("error","File size should be less than 1 MB");
                    }
                if ($photo_status == 2) {
                        return redirect()->back()->with("error","Invalid file type, only JPG, JPEG, PNG and WEBP are allowed");   
                }
                $data["photo"]  = $photo_status;
            }

            $pan_photo = $this->request->getFile('pan_photo');
            $pan_status = 0;
            if ($pan_photo->isValid() && ! $pan_photo->hasMoved()){
                $pan_status = $this->Upload->upload_single($pan_photo);
                if ($pan_status == 1) {
                        return redirect()->back()->with("error","File size should be less than 1 MB");
                    }
                if ($pan_status == 2) {
                        return redirect()->back()->with("error","Invalid file type, only JPG, JPEG, PNG and WEBP are allowed");   
                }
                $data["pan_photo"]  = $pan_status;
            }

            $ins_photo = $this->request->getFile('ins_photo');
            $ins_status = 0;
            if ($ins_photo->isValid() && ! $ins_photo->hasMoved()){
                $ins_status = $this->Upload->upload_single($ins_photo);
                if ($ins_status == 1) {
                        return redirect()->back()->with("error","File size should be less than 1 MB");
                    }
                if ($ins_status == 2) {
                        return redirect()->back()->with("error","Invalid file type, only JPG, JPEG, PNG and WEBP are allowed");   
                }
                $data["ins_photo"]  = $ins_status;
            }

            $center_code = $this->request->getVar('center_code');
            
            $data['center_code']= $center_code;
            $data['state_id']= $this->request->getVar('state_id');
            $data['district_id']= $this->request->getVar('district_id');
            $data['pin_code']= $this->request->getVar('pin_code');
            $data['institute_name']= $this->request->getVar('institute_name');
            $data['ins_address']= $this->request->getVar('ins_address');
            $data['establishment']= $this->request->getVar('establishment');
            $data['ins_status']= $this->request->getVar('ins_status');
            $data['ins_num']= $this->request->getVar('ins_num');
            $data['h_name']= $this->request->getVar('h_name');
            $data['h_addres']= $this->request->getVar('h_addres');
            $data['email']= $this->request->getVar('email');
            $data['h_number']= $this->request->getVar('h_number');
            //$data['hl_number']= $this->request->getVar('hl_number');
            $data['dob']= $this->request->getVar('dob');
            $data['gender']= $this->request->getVar('gender');
            $data['marital_status']= $this->request->getVar('marital_status');
            $data['h_qual']= $this->request->getVar('h_qual');
            $data['h_exp']= $this->request->getVar('h_exp');
            $data['pan_no']= $this->request->getVar('pan_no');
            $data['aadhar_no']= $this->request->getVar('aadhar_no');
            $data['gst_no']= $this->request->getVar('gst_no');
            $data['reg_date']= $this->request->getVar('reg_date');
            $data['status']= $this->request->getVar('status');
            $data['branch_level']= 1;
            //$data['created_by'] = session()->get('user_id');

            
            if(empty($id)){
                if ($this->franchiseModel->is_duplicate_email($email)) {
                    return redirect()->back()->with("warning", "Email $email already exists!");
                }
                $rules = [
                    'center_code' => 'required|is_unique[franchises.center_code]',
                ];
    
                if (!$this->validate($rules)) {
                    return redirect()->back()->withInput()->with("error", "Center code should be unique");
                }

                $result = $this->franchiseModel->insert($data);

                // Insert admin user for franchisee
                $approval = $this->request->getPost("status");

                $pass = $this->sanitize($this->request->getPost("h_number"));
                $password = password_hash($pass, PASSWORD_DEFAULT);

                if ($approval == 1 || !empty($center_code)) {
                    $cred = [
                        "branch_id" => $result,
                        "center_code" => $center_code,
                        "password" => $password,
                        "user_name" => $this->sanitize($this->request->getPost("h_name")),
                        "email" => $this->sanitize($this->request->getPost("email")),
                        "role" => 2,
                    ];

                    if ($this->AdminModel->is_unique_username($center_code)) {
                        $this->AdminModel->insert($cred);
                    }
                }

                
            }else{
                $result = $this->franchiseModel->update($id, $data);
            }

            if ($result) {
                return redirect()->back()->with("success", "Branch Save Successfully");
            } else {
                return redirect()->back()->with("error", "Something went wrong");
            } 
        }else{
            return redirect()->back()->with("error", "Plz provide emailid");
        }      
    }
    public function UpdateFranchise(){
        
        $email = $this->request->getPost("email");

        if (!empty($email)) {
            //check email exist or not

            $id = $this->request->getPost('id');
            $photo = $this->request->getFile('photo');
            $photo_status = 0;
            if ($photo->isValid() && ! $photo->hasMoved()){
                $photo_status = $this->Upload->upload_single($photo);
                if ($photo_status == 1) {
                        return redirect()->back()->with("error","File size should be less than 1 MB");
                    }
                if ($photo_status == 2) {
                        return redirect()->back()->with("error","Invalid file type, only JPG, JPEG, PNG and WEBP are allowed");   
                }
                $data["photo"]  = $photo_status;
            }

            $pan_photo = $this->request->getFile('pan_photo');
            $pan_status = 0;
            if ($pan_photo->isValid() && ! $pan_photo->hasMoved()){
                $pan_status = $this->Upload->upload_single($pan_photo);
                if ($pan_status == 1) {
                        return redirect()->back()->with("error","File size should be less than 1 MB");
                    }
                if ($pan_status == 2) {
                        return redirect()->back()->with("error","Invalid file type, only JPG, JPEG, PNG and WEBP are allowed");   
                }
                $data["pan_photo"]  = $pan_status;
            }

            $ins_photo = $this->request->getFile('ins_photo');
            $ins_status = 0;
            if ($ins_photo->isValid() && ! $ins_photo->hasMoved()){
                $ins_status = $this->Upload->upload_single($ins_photo);
                if ($ins_status == 1) {
                        return redirect()->back()->with("error","File size should be less than 1 MB");
                    }
                if ($ins_status == 2) {
                        return redirect()->back()->with("error","Invalid file type, only JPG, JPEG, PNG and WEBP are allowed");   
                }
                $data["ins_photo"]  = $ins_status;
            }

            $center_code = $this->request->getVar('center_code');
            
            $data['center_code']= $center_code;
            $data['state_id']= $this->request->getVar('state_id');
            $data['district_id']= $this->request->getVar('district_id');
            $data['pin_code']= $this->request->getVar('pin_code');
            $data['institute_name']= $this->request->getVar('institute_name');
            $data['ins_address']= $this->request->getVar('ins_address');
            $data['establishment']= $this->request->getVar('establishment');
            $data['ins_status']= $this->request->getVar('ins_status');
            $data['ins_num']= $this->request->getVar('ins_num');
            $data['h_name']= $this->request->getVar('h_name');
            $data['h_addres']= $this->request->getVar('h_addres');
            $data['email']= $this->request->getVar('email');
            $data['h_number']= $this->request->getVar('h_number');
            //$data['hl_number']= $this->request->getVar('hl_number');
            $data['dob']= $this->request->getVar('dob');
            $data['gender']= $this->request->getVar('gender');
            $data['marital_status']= $this->request->getVar('marital_status');
            $data['h_qual']= $this->request->getVar('h_qual');
            $data['h_exp']= $this->request->getVar('h_exp');
            $data['pan_no']= $this->request->getVar('pan_no');
            $data['aadhar_no']= $this->request->getVar('aadhar_no');
            $data['gst_no']= $this->request->getVar('gst_no');
            $data['reg_date']= $this->request->getVar('reg_date');
            $data['status']= $this->request->getVar('status');
            $data['branch_level']= 1;
            //$data['created_by'] = session()->get('user_id');

            $franchise= $this->franchiseModel->Where('id',$id)->first();
            if($franchise['center_code']==NULL){
                $rules = [
                    'center_code' => 'required|is_unique[franchises.center_code]',
                ];
    
                if (!$this->validate($rules)) {
                    return redirect()->back()->withInput()->with("error", "Center code should be unique");
                }

                // Insert admin user for franchisee
                $approval = $this->request->getPost("status");
                $pass = $this->sanitize($this->request->getPost("h_number"));
                $password = password_hash($pass, PASSWORD_DEFAULT);

                if ($approval == 1 || !empty($center_code)) {
                    $cred = [
                        "branch_id" => $franchise['id'],
                        "center_code" => $center_code,
                        "password" => $password,
                        "user_name" => $this->sanitize($this->request->getPost("h_name")),
                        "email" => $this->sanitize($this->request->getPost("email")),
                        "role" => 2,
                    ];

                    if ($this->AdminModel->is_unique_username($center_code)) {
                        $this->AdminModel->insert($cred);
                    }
                }

            }
            $result = $this->franchiseModel->update($id,$data);
                

            if ($result) {
                return redirect()->back()->with("success", "Branch Update Successfully");
            } else {
                return redirect()->back()->with("error", "Something went wrong");
            } 
        }else{
            return redirect()->back()->with("error", "Plz provide emailid");
        }    
    }

    public function franchiseDelete()
    {
        $id = $this->request->getVar('id');
        
        $this->franchiseModel->where('id', $id)->delete();
        return json_encode( array( 
            "status" => 1,
            "token" => csrf_hash()
        ));   
    }
    public function downloadFranchise($id){
        
        $data['franchise'] = $this->franchiseModel->Where('id',$id)->first();
        $data['districName']=$this->CitieModel->Where('id',$data['franchise']['district_id'])->first()['city_name'];
        $data['states'] = $this->stateModel->Where('id',$data['franchise']['state_id'])->first()['state_name'];
        $data['title']="Add Franchise";
        return view('print/download_center_form.php', $data);
    }

}