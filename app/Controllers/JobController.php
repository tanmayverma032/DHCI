<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class JobController extends Controller
{
    // public function submit()
    // {
    //     helper(['form']);

    //     // Get form data
    //     $name    = $this->request->getPost('name');
    //     $contact = $this->request->getPost('contact');
    //     $email   = $this->request->getPost('email');
    //     $resume  = $this->request->getFile('resume');

    //     // Validate resume
    //     if (!$resume || !$resume->isValid()) {
    //         return redirect()->back()->with('error', 'Resume upload failed');
    //     }

    //     // Create upload folder if not exist
    //     if (!is_dir(FCPATH . 'uploads/resume')) {
    //         mkdir(FCPATH . 'uploads/resume', 0777, true);
    //     }

    //     // Upload resume
    //     $newName = $resume->getRandomName();
    //     $resume->move(FCPATH . 'uploads/resume', $newName);

    //     // Email Service
    //     $mail = \Config\Services::email();

    //     $mail->setTo('delhihealthcare1992@gmail.com');   // Jis Gmail par mail chahiye
    //     $mail->setSubject('New Job Application');

    //     $message = "
    //         <h3>New Job Application Received</h3>
    //         <p><b>Name:</b> {$name}</p>
    //         <p><b>Contact:</b> {$contact}</p>
    //         <p><b>Email:</b> {$email}</p>
    //     ";

    //     $mail->setMessage($message);
    //     $mail->attach(FCPATH . 'uploads/resume/' . $newName);

    //     if ($mail->send()) {
    //         return redirect()->back()->with('success', 'Application Submitted Successfully!');
    //     } else {
    //         return redirect()->back()->with('error', 'Email sending failed!');
    //     }
    // }
    

public function submit()
{
    
    helper(['form']);

    // Honeypot Anti-Spam Check
    if ($this->request->getPost('honeypot')) {
        return redirect()->back();
    }

    // Validation Rules
    $validation = \Config\Services::validation();

    $rules = [
        'name'               => 'required|min_length[3]',
        'email'              => 'required|valid_email',
        'mobile'             => 'required|numeric|exact_length[10]',
        'district'           => 'required',
        'work_status'        => 'required',
        'preferred_location' => 'required',
        'resume'             => 'uploaded[resume]|ext_in[resume,pdf]'
    ];

    if (!$this->validate($rules)) {
        return redirect()->back()->with('error', $validation->listErrors());
    }

    // Get Form Data
    $name              = $this->request->getPost('name');
    $email             = $this->request->getPost('email');
    $mobile            = $this->request->getPost('mobile');
    $district          = $this->request->getPost('district');
    $work_status       = $this->request->getPost('work_status');
    $preferredLocation = $this->request->getPost('preferred_location');
    $resume            = $this->request->getFile('resume');

    // Upload Folder
    $uploadPath = FCPATH . 'uploads/resume';
    if (!is_dir($uploadPath)) {
        mkdir($uploadPath, 0777, true);
    }

    // Move Resume
    $newName = $resume->getRandomName();
    $resume->move($uploadPath, $newName);

    // Email Service
    $emailService = \Config\Services::email();

    $emailService->setTo('delhihealthcare1992@gmail.com');
    $emailService->setFrom($email, $name);
    $emailService->setSubject('New Job Application - ' . $name);

    $message = "
        <h2>New Job Application Received</h2>
        <p><strong>Full Name:</strong> {$name}</p>
        <p><strong>Email:</strong> {$email}</p>
        <p><strong>Mobile:</strong> {$mobile}</p>
        <p><strong>District:</strong> {$district}</p>
        <p><strong>Work Status:</strong> {$work_status}</p>
        <p><strong>Preferred Job Location:</strong> {$preferredLocation}</p>
    ";

    $emailService->setMessage($message);
    $emailService->attach($uploadPath . '/' . $newName);

    // Send Email
    if ($emailService->send()) {

        // Optional: Delete file after sending
        unlink($uploadPath . '/' . $newName);

        return redirect()->back()->with('success', 'Application Submitted Successfully!');
    } else {
        return redirect()->back()->with('error', $emailService->printDebugger(['headers']));
    }
}


}
