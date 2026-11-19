<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Admission extends Controller
{
    protected $session;
    protected $validation;
    
    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->session = session();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $data = [
            'title' => 'Student Admission Form',
            'session' => $this->session->getFlashdata('message'),
        ];
        return view('admission_form', $data);
    }

    public function submit()
    {
        // Set validation rules
        $rules = [
            'admission_session' => 'required',
            'admission_type' => 'required',
            'course' => 'required',
            'sub_course' => 'required',
            'semester' => 'required|numeric',
            'full_name' => 'required|min_length[3]|max_length[100]',
            'father_name' => 'required|min_length[3]|max_length[100]',
            'mother_name' => 'required|min_length[3]|max_length[100]',
            'dob' => 'required|valid_date',
            'gender' => 'required|in_list[Male,Female,Other]',
            'category' => 'required',
            'aadhar' => 'required|exact_length[12]|numeric',
            'nationality' => 'required',
            'email' => 'valid_email|max_length[100]',
            'alternate_email' => 'valid_email|max_length[100]',
            'mobile' => 'exact_length[10]|numeric',
            'alternate_mobile' => 'exact_length[10]|numeric',
            'city' => 'max_length[50]',
            'district' => 'max_length[50]',
            'state' => 'max_length[50]',
            'photo' => 'uploaded[photo]|is_image[photo]|max_size[photo,2048]|ext_in[photo,jpg,jpeg,png]',
            'aadhar_image' => 'uploaded[aadhar_image]|is_image[aadhar_image]|max_size[aadhar_image,2048]|ext_in[aadhar_image,jpg,jpeg,png]',
            'student_signature' => 'uploaded[student_signature]|is_image[student_signature]|max_size[student_signature,1024]|ext_in[student_signature,jpg,jpeg,png]',
            'other_certificate' => 'permit_empty|is_image[other_certificate]|max_size[other_certificate,2048]|ext_in[other_certificate,jpg,jpeg,png,pdf]',
        ];

        if (!$this->validate($rules)) {
            $this->session->setFlashdata('errors', $this->validator->getErrors());
            $this->session->setFlashdata('old_input', $this->request->getPost());
            return redirect()->to('/admission')->withInput();
        }

        try {
            // Process file uploads
            $files = $this->processFiles();
            if (!$files) {
                $this->session->setFlashdata('errors', ['File upload failed. Please try again.']);
                return redirect()->to('/admission')->withInput();
            }

            // Prepare form data for API
            $formData = [
                'admission_session' => $this->request->getPost('admission_session'),
                'admission_type' => $this->request->getPost('admission_type'),
                'course' => $this->request->getPost('course'),
                'sub_course' => $this->request->getPost('sub_course'),
                'semester' => $this->request->getPost('semester'),
                'full_name' => $this->request->getPost('full_name'),
                'father_name' => $this->request->getPost('father_name'),
                'mother_name' => $this->request->getPost('mother_name'),
                'dob' => $this->request->getPost('dob'),
                'gender' => $this->request->getPost('gender'),
                'category' => $this->request->getPost('category'),
                'aadhar' => $this->request->getPost('aadhar'),
                'nationality' => $this->request->getPost('nationality'),
                'email' => $this->request->getPost('email'),
                'alternate_email' => $this->request->getPost('alternate_email'),
                'mobile' => $this->request->getPost('mobile'),
                'alternate_mobile' => $this->request->getPost('alternate_mobile'),
                'city' => $this->request->getPost('city'),
                'district' => $this->request->getPost('district'),
                'state' => $this->request->getPost('state'),
                'photo' => $files['photo'],
                'aadhar_image' => $files['aadhar_image'],
                'student_signature' => $files['student_signature'],
                'other_certificate' => isset($files['other_certificate']) ? $files['other_certificate'] : null,
            ];

            // Call API
            $result = $this->callAdmissionAPI($formData);
            
            if ($result['success']) {
                $this->session->setFlashdata('success', $result['message']);
                $this->session->setFlashdata('student_data', $result['data']);
                return redirect()->to('/admission/success');
            } else {
                $this->session->setFlashdata('error', $result['message']);
                return redirect()->to('/admission')->withInput();
            }
            
        } catch (\Exception $e) {
            $this->session->setFlashdata('error', 'An error occurred: ' . $e->getMessage());
            return redirect()->to('/admission')->withInput();
        }
    }

    private function processFiles()
    {
        $files = [];
        $uploadPath = WRITEPATH . 'uploads/';
        
        // Create upload directory if not exists
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        $fileFields = ['photo', 'aadhar_image', 'student_signature', 'other_certificate'];
        
        foreach ($fileFields as $field) {
            $file = $this->request->getFile($field);
            
            if ($file && $file->isValid() && !$file->hasMoved()) {
                // Generate unique filename
                $newName = $file->getRandomName();
                $filePath = $uploadPath . $newName;
                
                if ($file->move($uploadPath, $newName)) {
                    $files[$field] = new \CURLFile($filePath, $file->getMimeType(), $file->getName());
                } else {
                    return false;
                }
            } elseif ($field == 'other_certificate') {
                // Other certificate is optional
                $files[$field] = null;
            } else {
                return false;
            }
        }

        return $files;
    }

    private function callAdmissionAPI($formData)
    {
        $apiUrl = 'https://partners.collegepathshala.com/api/admission/create-student.php';
        $apiKey = getenv('ADMISSION_API_KEY') ?: 'YOUR_API_KEY';

        $ch = curl_init();
        
        // Prepare multipart form data
        $postData = [];
        foreach ($formData as $key => $value) {
            if ($value !== null && $value !== '') {
                $postData[$key] = $value;
            }
        }

        // Set cURL options
        curl_setopt_array($ch, [
            CURLOPT_URL => $apiUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $postData,
            CURLOPT_HTTPHEADER => [
                'X-API-KEY: ' . $apiKey,
                'Content-Type: multipart/form-data',
            ],
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_FOLLOWLOCATION => true,
        ]);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);
        curl_close($ch);

        if ($error) {
            return [
                'success' => false,
                'message' => 'CURL Error: ' . $error
            ];
        }

        // Parse response
        $responseData = json_decode($response, true);
        
        if (!$responseData) {
            return [
                'success' => false,
                'message' => 'Invalid response from API'
            ];
        }

        // Check for error based on HTTP code
        if ($httpCode !== 200) {
            $errorMessage = $responseData['message'] ?? 'Unknown error occurred';
            
            $errorCodes = [
                401 => 'Invalid API Key. Please check your credentials.',
                405 => 'Only POST method is allowed.',
                422 => 'Validation error: ' . $errorMessage,
                500 => 'Internal server error. Please try again later.',
            ];
            
            return [
                'success' => false,
                'message' => $errorCodes[$httpCode] ?? $errorMessage
            ];
        }

        return [
            'success' => $responseData['success'] ?? false,
            'message' => $responseData['message'] ?? 'Unknown response',
            'data' => $responseData['data'] ?? null
        ];
    }

    public function success()
    {
        $data = [
            'title' => 'Admission Successful',
            'student_data' => $this->session->getFlashdata('student_data'),
        ];
        return view('admission_success', $data);
    }
}