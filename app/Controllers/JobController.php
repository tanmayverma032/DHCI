<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class JobController extends Controller
{
    /**
     * Ensure job_applications table exists in database to store records permanently
     */
    protected function ensureTableExists($db)
    {
        try {
            if (!$db->tableExists('job_applications')) {
                $forge = \Config\Database::forge();
                $fields = [
                    'id' => [
                        'type'           => 'INT',
                        'constraint'     => 11,
                        'unsigned'       => true,
                        'auto_increment' => true,
                    ],
                    'name' => [
                        'type'       => 'VARCHAR',
                        'constraint' => 150,
                    ],
                    'email' => [
                        'type'       => 'VARCHAR',
                        'constraint' => 150,
                    ],
                    'mobile' => [
                        'type'       => 'VARCHAR',
                        'constraint' => 20,
                    ],
                    'district' => [
                        'type'       => 'VARCHAR',
                        'constraint' => 100,
                        'null'       => true,
                    ],
                    'work_status' => [
                        'type'       => 'VARCHAR',
                        'constraint' => 50,
                        'null'       => true,
                    ],
                    'preferred_location' => [
                        'type'       => 'VARCHAR',
                        'constraint' => 150,
                        'null'       => true,
                    ],
                    'resume' => [
                        'type'       => 'VARCHAR',
                        'constraint' => 255,
                        'null'       => true,
                    ],
                    'created_at' => [
                        'type' => 'DATETIME',
                        'null' => true,
                    ],
                ];
                $forge->addField($fields);
                $forge->addKey('id', true);
                $forge->createTable('job_applications', true);
            }
        } catch (\Throwable $e) {
            log_message('error', 'Job applications table check error: ' . $e->getMessage());
        }
    }

    public function submit()
    {
        helper(['form']);

        // Anti-Spam Honeypot Check
        if ($this->request->getPost('honeypot')) {
            return redirect()->back();
        }

        // Clean mobile number (remove non-digits, country code if present)
        $rawMobile = (string) $this->request->getPost('mobile');
        $mobile = preg_replace('/\D/', '', $rawMobile);
        if (strlen($mobile) === 12 && strpos($mobile, '91') === 0) {
            $mobile = substr($mobile, 2);
        } elseif (strlen($mobile) === 11 && $mobile[0] === '0') {
            $mobile = substr($mobile, 1);
        }

        // Validation Rules
        $validation = \Config\Services::validation();
        $rules = [
            'name'               => 'required|min_length[3]|max_length[100]',
            'email'              => 'required|valid_email|max_length[150]',
            'district'           => 'required|max_length[100]',
            'work_status'        => 'required|max_length[50]',
            'preferred_location' => 'required|max_length[150]',
            'resume'             => 'uploaded[resume]|max_size[resume,10240]|ext_in[resume,pdf]'
        ];

        if (!$this->validate($rules) || strlen($mobile) !== 10) {
            $errors = $validation->getErrors();
            if (strlen($mobile) !== 10) {
                $errors['mobile'] = 'Please enter a valid 10-digit mobile number.';
            }
            return redirect()->back()->withInput()->with('error', implode('<br>', $errors));
        }

        // Form Inputs (sanitized)
        $name              = htmlspecialchars(trim((string) $this->request->getPost('name')));
        $email             = htmlspecialchars(trim((string) $this->request->getPost('email')));
        $district          = htmlspecialchars(trim((string) $this->request->getPost('district')));
        $workStatus        = htmlspecialchars(trim((string) $this->request->getPost('work_status')));
        $preferredLocation = htmlspecialchars(trim((string) $this->request->getPost('preferred_location')));
        $resume            = $this->request->getFile('resume');

        // Prepare upload directory
        $uploadPath = FCPATH . 'uploads/resume';
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        $newName = '';
        if ($resume && $resume->isValid() && !$resume->hasMoved()) {
            $newName = $resume->getRandomName();
            $resume->move($uploadPath, $newName);
        } else {
            return redirect()->back()->withInput()->with('error', 'Resume upload failed. Please upload a valid PDF file.');
        }

        // Save application to database
        $db = \Config\Database::connect();
        $this->ensureTableExists($db);

        try {
            $db->table('job_applications')->insert([
                'name'               => $name,
                'email'              => $email,
                'mobile'             => $mobile,
                'district'           => $district,
                'work_status'        => $workStatus,
                'preferred_location' => $preferredLocation,
                'resume'             => $newName,
                'created_at'         => date('Y-m-d H:i:s'),
            ]);
        } catch (\Throwable $e) {
            log_message('error', 'Failed to store job application in DB: ' . $e->getMessage());
        }

        // Send Email Notification to Admin
        try {
            $emailService = \Config\Services::email();
            $emailConfig  = config('Email');

            $fromEmail = !empty($emailConfig->SMTPUser) ? $emailConfig->SMTPUser : 'delhihealthcare1992@gmail.com';
            $emailService->setFrom($fromEmail, 'DHCI Job Portal');
            $emailService->setReplyTo($email, $name);
            $emailService->setTo('delhihealthcare1992@gmail.com');
            $emailService->setSubject('New Job Application - ' . $name);

            $message = "
                <div style='font-family: Arial, sans-serif; line-height: 1.6; color: #333;'>
                    <h2 style='color: #0389c6;'>New Job Application Received</h2>
                    <table style='width: 100%; border-collapse: collapse;'>
                        <tr><td style='padding: 8px; border-bottom: 1px solid #ddd;'><strong>Full Name:</strong></td><td style='padding: 8px; border-bottom: 1px solid #ddd;'>{$name}</td></tr>
                        <tr><td style='padding: 8px; border-bottom: 1px solid #ddd;'><strong>Email:</strong></td><td style='padding: 8px; border-bottom: 1px solid #ddd;'>{$email}</td></tr>
                        <tr><td style='padding: 8px; border-bottom: 1px solid #ddd;'><strong>Mobile:</strong></td><td style='padding: 8px; border-bottom: 1px solid #ddd;'>{$mobile}</td></tr>
                        <tr><td style='padding: 8px; border-bottom: 1px solid #ddd;'><strong>District:</strong></td><td style='padding: 8px; border-bottom: 1px solid #ddd;'>{$district}</td></tr>
                        <tr><td style='padding: 8px; border-bottom: 1px solid #ddd;'><strong>Work Status:</strong></td><td style='padding: 8px; border-bottom: 1px solid #ddd;'>{$workStatus}</td></tr>
                        <tr><td style='padding: 8px; border-bottom: 1px solid #ddd;'><strong>Preferred Location:</strong></td><td style='padding: 8px; border-bottom: 1px solid #ddd;'>{$preferredLocation}</td></tr>
                    </table>
                    <p style='margin-top: 15px;'>The resume has been attached to this email and saved in the portal records.</p>
                </div>
            ";

            $emailService->setMessage($message);
            if (!empty($newName) && file_exists($uploadPath . '/' . $newName)) {
                $emailService->attach($uploadPath . '/' . $newName);
            }

            $emailService->send();
        } catch (\Throwable $e) {
            log_message('error', 'Job application email notification error: ' . $e->getMessage());
        }

        return redirect()->back()->with('success', 'Your application has been submitted successfully! Our HR team will contact you shortly.');
    }
}
