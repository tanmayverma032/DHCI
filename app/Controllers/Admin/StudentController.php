<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\RegistrationModel;
use CodeIgniter\Files\File;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;



class StudentController extends BaseController
{
    protected $SessionModel;
    protected $stateModel;
    protected $RegistrationModel;
    protected $franchiseModel;
    protected $CitieModel;
    protected $CourseModel;
    protected $BatchModel;
    protected $Certificate;

    function __construct()
    {
        $this->stateModel = new \App\Models\StateModel();
        $this->RegistrationModel = new \App\Models\RegistrationModel();
        $this->franchiseModel = new \App\Models\FranchiseModel();
        $this->CitieModel = new \App\Models\CitieModel();
        $this->CourseModel = new \App\Models\CourseModel();
        $this->SessionModel = new \App\Models\SessionModel();
        $this->BatchModel = new \App\Models\BatchModel();
        $this->Certificate = new \App\Models\Certificate();
        $sessionModel = new \App\Models\SessionModel();
    }
    public function sanitize($stringToSanitize = false)
    {
        if (!empty($stringToSanitize)) {
            return addslashes(htmlspecialchars($stringToSanitize));
        } else {
            return "";
        }
    }
    // public function index()
    // {
    //     if (is_admin()['admin']['role'] == 1) {
    //         $data['data'] = $this->RegistrationModel->Where('status', '1')->orderBy('id', 'desc')->findAll();
    //     } else {
    //         $data['data'] = $this->RegistrationModel->Where('center_id', is_admin()['admin']['branch_id'])->Where('status', '1')->orderBy('id', 'desc')->findAll();
    //     }

    //     $data['title'] = "Student";
    //     return view('admin/student/student', $data);
    // }
    
    
        public function index()
        {
            $sessionId = $this->request->getGet('session_id');
            $builder = $this->RegistrationModel->where('status', '1');

            // If not super admin, filter by center_id
            if (is_admin()['admin']['role'] != 1) {
                $builder->where('center_id', is_admin()['admin']['branch_id']);
            }

            // Apply session filter
            if (!empty($sessionId)) {
                $builder->where('session_id', $sessionId);
            }

            // Fetch student data
            $data['data'] = $builder->orderBy('id', 'desc')->findAll();

            // Fetch session options for dropdown
            $data['session'] = $this->SessionModel->where('status', 1)->orderBy('id', 'ASC')->findAll();

            // Set title and load view
            $data['title'] = "Student";
            return view('admin/student/student', $data);
        }


    public function studentPanding()
    {
        if (is_admin()['admin']['role'] == 1) {
            $data['data'] = $this->RegistrationModel->Where('status', '0')->orderBy('id', 'desc')->findAll();
        } else {
            $data['data'] = $this->RegistrationModel->Where('center_id', is_admin()['admin']['branch_id'])->Where('status', '0')->orderBy('id', 'desc')->findAll();
        }

        $data['session'] = $this->SessionModel->where('status', 1)->orderBy('id', 'ASC')->findAll();
        $data['title'] = "Student";
        return view('admin/student/student', $data);
    }
    public function studentReject()
    {
        if (is_admin()['admin']['role'] == 1) {
            $data['data'] = $this->RegistrationModel->Where('status', '-1')->Where('status', '0')->orderBy('id', 'desc')->findAll();
        } else {
            $data['data'] = $this->RegistrationModel->Where('center_id', is_admin()['admin']['branch_id'])->Where('status', '-1')->orderBy('id', 'desc')->findAll();
        }
        
        $data['session'] = $this->SessionModel->where('status', 1)->orderBy('id', 'ASC')->findAll();
        $data['title'] = "Student";
        return view('admin/student/student', $data);
    }

    // public function addStudent()
    // {

    //     $center_id = is_admin()['admin']['branch_id'];
      
    //     $center_code = is_admin()['center_code']; // CEOI-101
    //     $registration = $this->RegistrationModel->where('center_id', $center_id)->selectMax('rag_no')->first();
        
    //     if ($registration['rag_no'] == NULL) {
    //         $data['rag_no'] = $center_code . "0001"; 
    //     } else {
    //         $stringReplace = preg_replace("/[^0-9]/", "", $registration['rag_no']);
    //         $numericPart = (int)$stringReplace; 
    //         $newNumericPart = $numericPart + 1;
    //         $formattedNumericPart = str_pad($newNumericPart, 3, '0', STR_PAD_LEFT);
    //         $data['rag_no'] = 'DNPI-' . $formattedNumericPart;
    //     }
        

    //     $data['course'] =  $this->CourseModel->findAll();
    //     $data['centers'] = $this->franchiseModel->findAll();
    //     $data['state'] = $this->stateModel->findAll();
    //     $data['session'] = $this->SessionModel->where('status', 1)->orderBy('id', 'DASC')->findAll();
    //     $data['title'] = "Add Student";
    //     return view('admin/student/add_student', $data);
    // }
    
    
     public function addStudent()
    {
        $center_id = is_admin()['admin']['branch_id'];
        $center_code = str_replace(' ', '', is_admin()['center_code']);
    
        // Get all existing rag_no starting with this center code
        $allRags = $this->RegistrationModel
            ->select('rag_no')
            ->like('rag_no', $center_code, 'after')
            ->findAll();
    
        $maxNumber = 0;
    
        foreach ($allRags as $entry) {
            $rag = $entry['rag_no'];
            $suffix = (int)substr($rag, strlen($center_code));
            if ($suffix > $maxNumber) {
                $maxNumber = $suffix;
            }
        }
    
        $newNumber = $maxNumber + 1;
        $formattedSuffix = str_pad($newNumber, 4, '0', STR_PAD_LEFT);
        $generatedRagNo = $center_code . $formattedSuffix;
    
        $data['rag_no'] = $generatedRagNo;

    
        // Remaining data for form (if not exiting)
        $data['course'] = $this->CourseModel->findAll();
        $data['centers'] = $this->franchiseModel->findAll();
        $data['state'] = $this->stateModel->findAll();
        $data['session'] = $this->SessionModel
            ->where('status', 1)
            ->orderBy('id', 'ASC')
            ->findAll();
        $data['title'] = "Add Student";
    
        return view('admin/student/add_student', $data);
    }

   
   
    
    
    // public function upload_csv()
    // {
    //     $file = $this->request->getFile('csv_file');
    
    //     if (!$file->isValid()) {
    //         return redirect()->back()->with("error", "Invalid file uploaded.");
    //     }
    
    //     if ($file->getClientExtension() !== 'csv') {
    //         return redirect()->back()->with("error", "Only CSV files are allowed.");
    //     }
    
    //     $csvFile = fopen($file->getTempName(), 'r');
    //     $header = fgetcsv($csvFile); // Skip header row (name, dob, status)
    
    //     $registrationModel = new \App\Models\RegistrationModel();
    //     $added = 0;
    
    //     while (($row = fgetcsv($csvFile)) !== false) {
    //         // Ensure at least 3 values (name, dob, status)
    //         $name = trim($row[0] ?? '');
    //         $dob = trim($row[1] ?? '');
    //         $status = trim($row[2] ?? '');
    
    //         if (empty($name) || empty($dob) || empty($status)) {
    //             continue; // Skip rows with missing required data
    //         }
    
    //         $password = password_hash('123456', PASSWORD_DEFAULT); // Default password
    
    //         $data = [
    //             'rag_no'        => null,
    //             'center_id'     => null,
    //             'course_id'     => null,
    //             'session_id'    => null,
    //             'batch_id'      => null,
    //             'name'          => $name,
    //             'father_name'   => null,
    //             'mother_name'   => null,
    //             'dob'           => $dob,
    //             'email'         => null,
    //             'number'        => null,
    //             'gender'        => null,
    //             'category'      => null,
    //             'idcard_type'   => null,
    //             'id_card_no'    => null,
    //             'state_id'      => null,
    //             'district_id'   => null,
    //             'pincode'       => null,
    //             'address'       => null,
    //             'reg_date'      => null,
    //             'status'        => $status,
    //             'photo'         => 0,
    //             'password'      => $password,
    //         ];
    
    //         try {
    //             $registrationModel->save($data);
    //             $added++;
    //         } catch (\Exception $e) {
    //             // Log error if needed: log_message('error', $e->getMessage());
    //             continue;
    //         }
    //     }
    
    //     fclose($csvFile);
    
    //     return redirect()->to(base_url()."/admin/students")->with("success", "$added student(s) added successfully from CSV!");
    // }


    private function nullIfEmpty($value)
    {
        return ($value === '' || $value === null) ? null : $value;
    }
    
    public function upload_csv()
    {
        $file = $this->request->getFile('csv_file');
    
        if (!$file->isValid()) {
            return redirect()->back()->with("error", "Invalid file uploaded.");
        }
    
        if ($file->getClientExtension() !== 'csv') {
            return redirect()->back()->with("error", "Only CSV files are allowed.");
        }
    
        $csv = fopen($file->getTempName(), 'r');
        $header = fgetcsv($csv); // skip header
    
        $model = new \App\Models\RegistrationModel();
        $added = 0;
        $errors = [];
    
        while (($row = fgetcsv($csv)) !== false) {
    
            // Skip empty rows
            if (empty(array_filter($row))) continue;
    
            // Debug
            log_message('error', 'CSV Row: '.json_encode($row));
    
            // $data = [
            //     'rag_no'           => $row[0] ?? null,
            //     'center_id'        => $row[1] ?? null,
            //     'course_id'        => $row[2] ?? null,
            //     'session_id'       => $row[3] ?? null,
            //     'batch_id'         => null,
            //     'name'             => $row[5] ?? null,
            //     'father_name'      => $row[6] ?? null,
            //     'mother_name'      => $row[7] ?? null,
            //     'dob'              => date('Y-m-d', strtotime($row[8] ?? null)),
            //     'email'            => $row[9] ?? null,
            //     'number'           => $row[10] ?? null,
            //     'gender'           => $row[11] ?? null,
            //     'category'         => $row[12] ?? null,
            //     'idcard_type'      => $row[13] ?? null,
            //     'id_card_no'       => $row[14] ?? null,
            //     'state_id'         => $row[15] ?? null,
            //     'district_id'      => $row[16] ?? null,
            //     'pincode'          => $row[17] ?? null,
            //     'address'          => $row[18] ?? null,
            //     'reg_date'         => date('Y-m-d', strtotime($row[19] ?? null)),
            //     'status'           => $row[20] ?? 1,
            //     'payment_status'   => 0,
            //     'certificate_status' => 0,
            //     'photo'            => 0,
            //     'password'         => password_hash('123456', PASSWORD_DEFAULT),
            // ];
            
            $data = [
                    'rag_no'           => $this->nullIfEmpty($row[0] ?? null),
                    'center_id'        => $this->nullIfEmpty($row[1] ?? null),
                    'course_id'        => $this->nullIfEmpty($row[2] ?? null),
                    'session_id'       => $this->nullIfEmpty($row[3] ?? null),
                    'batch_id'         => null,
                    'name'             => $this->nullIfEmpty($row[5] ?? null),
                    'father_name'      => $this->nullIfEmpty($row[6] ?? null),
                    'mother_name'      => $this->nullIfEmpty($row[7] ?? null),
                    'dob'              => $this->nullIfEmpty($row[8] ? date('Y-m-d', strtotime($row[8])) : null),
                    'email'            => $this->nullIfEmpty($row[9] ?? null),
                    'number'           => $this->nullIfEmpty($row[10] ?? null),
                    'gender'           => $this->nullIfEmpty($row[11] ?? null),
                    'category'         => $this->nullIfEmpty($row[12] ?? null),
                    'idcard_type'      => $this->nullIfEmpty($row[13] ?? null),
                    'id_card_no'       => $this->nullIfEmpty($row[14] ?? null),
                    'state_id'         => $this->nullIfEmpty($row[15] ?? null),
                    'district_id'      => $this->nullIfEmpty($row[16] ?? null),
                    'pincode'          => $this->nullIfEmpty($row[17] ?? null),
                    'address'          => $this->nullIfEmpty($row[18] ?? null),
                    'reg_date'         => $this->nullIfEmpty($row[19] ? date('Y-m-d', strtotime($row[19])) : null),
                    'status'           => $row[20] ?? 1,
                    'payment_status'   => 0,
                    'certificate_status' => 0,
                    'photo'            => 0,
                    'password'         => password_hash('123456', PASSWORD_DEFAULT),
                ];
    
    
            if (!$model->insert($data)) {
                $errors[] = $model->errors();
                continue;
            }
    
            $added++;
        }
    
        fclose($csv);
    
        return redirect()
            ->to('/admin/students')
            ->with('success', "$added students inserted!")
            ->with('errors', $errors);
    }


    


    public function downloadExcel()
    {
        ob_clean(); // prevent JSON/HTML output

        $students = $this->RegistrationModel->orderBy('id', 'DESC')->findAll();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Header Row
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Name');
        $sheet->setCellValue('C1', 'Reg No');
        $sheet->setCellValue('D1', 'Email');
        $sheet->setCellValue('E1', 'Phone');
        $sheet->setCellValue('F1', 'Institute');
        $sheet->setCellValue('G1', 'Session');
        $sheet->setCellValue('H1', 'Course');
        $sheet->setCellValue('I1', 'Reg Date');
        $sheet->setCellValue('J1', 'Status');
        $sheet->setCellValue('K1', 'Payment');

        $rowNumber = 2;

        foreach ($students as $row) {
            $session = $this->SessionModel->find($row['session_id']);
            $course  = $this->CourseModel->find($row['course_id']);
            $center  = franchise($row['center_id']);

            $sheet->setCellValue("A{$rowNumber}", $row['id']);
            $sheet->setCellValue("B{$rowNumber}", $row['name']);
            $sheet->setCellValue("C{$rowNumber}", $row['rag_no']);
            $sheet->setCellValue("D{$rowNumber}", $row['email']);
            $sheet->setCellValue("E{$rowNumber}", $row['number']);
            $sheet->setCellValue("F{$rowNumber}", $center['institute_name'] ?? '');
            $sheet->setCellValue("G{$rowNumber}", $session['session'] ?? '');
            $sheet->setCellValue("H{$rowNumber}", $course['course_name'] ?? '');
            $sheet->setCellValue("I{$rowNumber}", $row['reg_date']);
            $sheet->setCellValue("J{$rowNumber}", $row['status'] == 1 ? "Active" : "Inactive");
            $sheet->setCellValue("K{$rowNumber}", $row['payment_status'] == 1 ? "Paid" : "Unpaid");

            $rowNumber++;
        }

        $filename = "students_" . date('Y-m-d_H-i-s') . ".xlsx";

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'. $filename .'"');
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save("php://output");
        exit();
    }




    public function saveStudent()
    {
        $image = $this->request->getFile("photo");
        $image_status = 0;
        if (!empty($image->getName())) {
            $upload = new \App\Controllers\ImageUpload();
            $image_status = $upload->upload_single_400_500($image);
            if ($image_status == 1) {
                return redirect()->to(base_url()."admin/students")->with("error", lang("File size should be less than 1 MB"));
            }
            if ($image_status == 2) {
                return redirect()->to(base_url()."admin/students")->with("error", lang("Invalid file type, only JPG, JPEG, PNG and WEBP are allowed"));
            }
        }
       $pass = $this->request->getPost("number") ? $this->request->getPost("number"):'123456';
        $password = password_hash($pass, PASSWORD_DEFAULT);


        $datas = [
            "rag_no" => $this->request->getPost('rag_no'),
            "center_id" => $this->request->getPost('center_id'),
            "course_id" => $this->request->getPost('course_id'),
            "session_id" => $this->request->getPost('session_id'),
            "batch_id"     => $this->request->getPost('batch_id') ?: null,
            "name" => $this->request->getPost('name'),
            "father_name" => $this->request->getPost('father_name'),
            "mother_name" => $this->request->getPost('mother_name'),
            "dob" => $this->request->getPost('dob'),
            "email" => $this->request->getPost('email'),
            "number" => $this->request->getPost('number'),
            // "religion"=>$this->request->getPost('religion'),
            "gender" => $this->request->getPost('gender'),
            "category" => $this->request->getPost('category'),
            // "qualification"=>$this->request->getPost('qualification'),
           "idcard_type"  => $this->request->getPost('idcard_type') ?: null,
            "id_card_no"   => $this->request->getPost('id_card_no') ?: null,
            "state_id"     => $this->request->getPost('state_id') ?: null,
            "district_id"  => $this->request->getPost('district_id') ?: null,
           "pincode"      => $this->request->getPost('pincode') ?: null,
            "address" => $this->request->getPost('address'),
            "reg_date" => $this->request->getPost('reg_date'),
            "status" => $this->request->getPost('status'),
            "photo" => $image_status,
            "password" => $password,
        ];
        
        // var_dump($datas);
        // exit;

        try {
            $this->RegistrationModel->save($datas);
            return redirect()->to(base_url()."admin/students")->with("success", 'Form Submited Successfully!!');
        } catch (\Exception $th) {
            return redirect()->to(base_url()."admin/students")->with("error", $th->getMessage());
        }
    }
    
    // old code
    
    // public function studentDelete()
    // {
    //     $id = $this->request->getVar('id');
     
    //     $this->RegistrationModel->where('id', $id)->delete();
    //     return json_encode(array(
    //         "status" => 1,
    //         "token" => csrf_hash()
    //     ));
    // }
    
   public function studentDelete()
    {
        $id = $this->request->getVar('id');
    
        $this->RegistrationModel->where('id', $id)->delete();
    
        return $this->response->setJSON([
            "status" => 1,
            "token"  => csrf_hash()
        ]);
    }

    
    
    public function editStudent($id = null)
    {
        $data['student'] = $this->RegistrationModel->where('id', $id)->first();
        $data['district'] = $this->CitieModel->where('id', $data['student']['district_id'])->first();



        $center_id = is_admin()['admin']['branch_id'];
        $center_code = is_admin()['center_code'];
        $registration = $this->RegistrationModel->where('center_id', $center_id)->selectMax('rag_no')->first();
        
        
        if ($data['student']['rag_no'] != '') {
            $data['rag_no'] = $data['student']['rag_no'];
        } else {
            if ($registration['rag_no'] == NULL) {
                $data['rag_no'] = $center_code . "0001"; 
            }else{
                $stringReplace = preg_replace("/[^0-9]/", "", $registration['rag_no']);
                $numericPart = (int)$stringReplace; 
                $newNumericPart = $numericPart + 1;
                $formattedNumericPart = str_pad($newNumericPart, 3, '0', STR_PAD_LEFT);
                $data['rag_no'] = 'CEOI-' . $formattedNumericPart;
            }
        }
        
       
        
        $data['course'] =  $this->CourseModel->findAll();
        $data['centers'] = $this->franchiseModel->findAll();
        $data['state'] = $this->stateModel->findAll();
        $data['title'] = "Add Student";
        $data['session'] = $this->SessionModel->where('status', 1)->orderBy('id', 'DASC')->findAll();
        $data['bsatch'] = $this->BatchModel->where('id', $data['student']['batch_id'])->first();

        return view('admin/student/add_student', $data);
    }

        public function updateStudent()
        {
            $image = $this->request->getFile("photo");
            $image_status = null;
        
            if (!empty($image) && $image->isValid() && !$image->hasMoved()) {
                $upload = new \App\Controllers\ImageUpload();
                $image_status = $upload->upload_single_400_500($image);
        
                if ($image_status == 1) {
                    return redirect()->to(base_url()."admin/students")->with("error", lang("File size should be less than 1 MB"));
                }
                if ($image_status == 2) {
                    return redirect()->to(base_url()."admin/students")->with("error", lang("Invalid file type, only JPG, JPEG, PNG and WEBP are allowed"));
                }
            }
        
            $number = $this->request->getPost("number");
            $password = $number ? password_hash($number, PASSWORD_DEFAULT) : null;
        
            $id = $this->request->getPost('id');
        
            $data = [
                "rag_no"       => $this->request->getPost('rag_no'),
                "center_id"    => $this->request->getPost('center_id'),
                "course_id"    => $this->request->getPost('course_id'),
                "session_id"   => $this->request->getPost('session_id'),
                "batch_id"     => $this->request->getPost('batch_id'),
                "name"         => $this->request->getPost('name'),
                "father_name"  => $this->request->getPost('father_name'),
                "mother_name"  => $this->request->getPost('mother_name'),
                "dob"          => $this->request->getPost('dob'),
                "email"        => $this->request->getPost('email'),
                "number"       => $number,
                "gender"       => $this->request->getPost('gender'),
                "category"     => $this->request->getPost('category'),
                "idcard_type"  => $this->request->getPost('idcard_type') ?: null,
                "id_card_no"   => $this->request->getPost('id_card_no') ?: null,
                "state_id"     => $this->request->getPost('state_id') ?: null,
                "district_id"  => $this->request->getPost('district_id') ?: null,
                "pincode"      => $this->request->getPost('pincode') ?: null,
                "address"      => $this->request->getPost('address'),
                "reg_date"     => $this->request->getPost('reg_date'),
                "status"       => $this->request->getPost('status')
            ];
        
            if (!is_null($image_status)) {
                $data["photo"] = $image_status;
            }
        
            if (!empty($password)) {
                $data["password"] = $password;
            }
        
            try {
                $this->RegistrationModel->update($id, $data);
                return redirect()->to(base_url()."admin/students")->with("success", lang("Student updated successfully!"));
            } catch (\Exception $e) {
                return redirect()->to(base_url()."admin/students")->with("error", $e->getMessage());
            }
        }



        public function downloadStudent($id = null)
        {
            // Check ID
            if (!$id) {
                return redirect()->back()->with('error', 'Invalid Student ID');
            }
        
            // Get student
            $student = $this->RegistrationModel->where('id', $id)->first();
        
            if (!$student) {
                return redirect()->back()->with('error', 'Student not found');
            }
        
            // Related Data
            $district = $this->CitieModel->where('id', $student['district_id'])->first();
            $course   = $this->CourseModel->where('id', $student['course_id'])->first();
            $center   = $this->franchiseModel->where('id', $student['center_id'])->first();
            $state    = $this->stateModel->where('id', $student['state_id'])->first();
        
              // session Fetch
                $sessionModel = new \App\Models\SessionModel();
                $session = $sessionModel->where('id', $student['session_id'])->first();
    
            // Pass Safe Data
            $data = [
                'student'  => $student,
                'district' => $district ?? [],
                'course'   => $course['name'] ?? '',
                'center'   => $center['institute_name'] ?? '',
                'state'    => $state['state_name'] ?? '',
                'city'     => $district['city_name'] ?? '',
                 'session_name'  => $session['session'] ?? '',
                'title'    => 'Download Student'
            ];
        
            return view('print/download_student', $data);
        }


    public function getBatch()
    {
        $session_id = $this->request->getVar('session_id');
        $data['batches'] = $this->BatchModel->where('session_id', $session_id)->findAll();
        return json_encode($data);
    }


    // public function idCardDownload($id = null)
    // {
    //     $data['student'] = $this->RegistrationModel->where('id', $id)->first();
    //     $data['district'] = $this->CitieModel->where('id', $data['student']['district_id'])->first();
    //     $data['course'] =  $this->CourseModel->where('id', $data['student']['course_id'])->first();

    //     $data['center'] = $this->franchiseModel->where('id', $data['student']['center_id'])->first()['institute_name'];
    //     $data['state'] = $this->stateModel->where('id', $data['student']['state_id'])->first()['state_name'];

    //     $data['city'] = $this->CitieModel->where('id', $data['student']['district_id'])->first()['city_name'];
    //     $data['title'] = "Add Student";
    //     return view('print/download_idcard', $data);
    // }

   
    public function idCardDownload($id = null)
    {
        $data['student'] = $this->RegistrationModel->where('id', $id)->first();
        
        if (!$data['student']) {
            return redirect()->back()->with('error', 'Student not found!');
        }
    
        $data['district'] = $this->CitieModel->where('id', $data['student']['district_id'])->first();
        $data['course'] = $this->CourseModel->where('id', $data['student']['course_id'])->first();
    
        $center = $this->franchiseModel->where('id', $data['student']['center_id'])->first();
        $data['center'] = $center ? $center['institute_name'] : 'N/A'; // Avoid error
    
        $state = $this->stateModel->where('id', $data['student']['state_id'])->first();
        $data['state'] = $state ? $state['state_name'] : 'N/A';
    
        $city = $this->CitieModel->where('id', $data['student']['district_id'])->first();
        $data['city'] = $city ? $city['city_name'] : 'N/A';
    
        $data['title'] = "Add Student";
    
        return view('print/download_idcard', $data);
    }


    public function payment_status()
    {
        $id = $this->request->getVar('id');
        $query = $this->RegistrationModel->find($id);
        $status = $query['payment_status'];
        if ($status == "0") {
            $this->RegistrationModel->where('id', $id)->set(['payment_status' => 1])->update();
        } else {
            $this->RegistrationModel->where('id', $id)->set(['payment_status' => 0])->update();
        }
        return json_encode(array(
            "status" => 1,
            "token" => csrf_hash()
        ));
    }

    public function certificate_status()
    {
        $id = $this->request->getVar('id');
        $query = $this->RegistrationModel->find($id);
        $status = $query['certificate_status'];
        if ($status == "0") {
            $this->RegistrationModel->where('id', $id)->set(['certificate_status' => 1])->update();
        } else {
            $this->RegistrationModel->where('id', $id)->set(['certificate_status' => 0])->update();
        }
        return json_encode(array(
            "status" => 1,
            "token" => csrf_hash()
        ));
    }

    public function certificateUpload()
    {
        if (is_admin()['admin']['role'] != 1) {
            return redirect()->back()->with("error", lang("Not Authorized"));
        }
        $data['data'] = $this->RegistrationModel->Where('status', '1')->Where('certificate_status', '1')->orderBy('id', 'desc')->findAll();
        $data['title'] = "Certificate Upload";

        return view('admin/student/upload-certificate', $data);
    }

    public function certificateUploadStore()
    {

        $file = $this->request->getFile('file');
        $id = $this->request->getPost('certificate_id');
        $data['student_id'] = $this->request->getPost('student_id');
        $data['upload_user_id'] = is_admin()['admin']['id'];



        $image_status = 0;

        try {
            if ($file->isValid() && !$file->hasMoved()) {
                $image_status = $this->Upload->upload_single($file);
                if ($image_status == 1) {
                    return redirect()->back()->with("error", "File size should be less than 1 MB");
                }
                if ($image_status == 2) {
                    return redirect()->back()->with("error", "Invalid file type, only JPG, JPEG, PNG and WEBP are allowed");
                }

                $data["file"] = $image_status;
            }

            if (empty($id)) {
                $result = $this->Certificate->insert($data);
            } else {
                $result = $this->Certificate->update($id, $data);
            }

            if ($result) {
                return redirect()->back()->with("success", "Upload Successfully !");
            }
        } catch (\Exception $th) {
            return redirect()->back()->with("error", $th->getMessage());
        }
    }

    public function certificateDelete($id = null)
    {
    
        try {
            $this->Certificate->where('id', $id)->delete();
            return redirect()->back()->with("success", "Upload Successfully !");
        } catch (\Exception $th) {
            return redirect()->back()->with("error", $th->getMessage());
        }
    }
}
