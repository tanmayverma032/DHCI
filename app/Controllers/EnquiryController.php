<?php
namespace App\Controllers;

use App\Models\EnquiryModel;

class EnquiryController extends BaseController
{
    /**
     * Ensure the course_enquiries table exists in the database.
     */
    protected function ensureTableExists(): void
    {
        try {
            $db = \Config\Database::connect();
            if (! $db->tableExists('course_enquiries')) {
                $forge = \Config\Database::forge();
                $forge->addField([
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
                    'phone' => [
                        'type'       => 'VARCHAR',
                        'constraint' => 30,
                    ],
                    'course' => [
                        'type'       => 'VARCHAR',
                        'constraint' => 150,
                    ],
                    'message' => [
                        'type' => 'TEXT',
                        'null' => true,
                    ],
                    'created_at' => [
                        'type' => 'DATETIME',
                        'null' => true,
                    ],
                    'updated_at' => [
                        'type' => 'DATETIME',
                        'null' => true,
                    ],
                ]);
                $forge->addKey('id', true);
                $forge->createTable('course_enquiries', true);
            }
        } catch (\Throwable $e) {
            log_message('error', 'Enquiry table schema error: ' . $e->getMessage());
        }
    }

    /**
     * Website enquiry form submit (popup + counseling form + header modal).
     * Returns JSON for AJAX, or redirects on normal submit.
     */
    public function submit()
    {
        $isAjax = $this->request->isAJAX();

        // Support both clean input names and any legacy/malformed leading slash names
        $rawPhone   = $this->request->getPost('phone')   ?? $this->request->getPost('/phone');
        $rawName    = $this->request->getPost('name')    ?? $this->request->getPost('/name');
        $rawEmail   = $this->request->getPost('email')   ?? $this->request->getPost('/email');
        $rawCourse  = $this->request->getPost('course')  ?? $this->request->getPost('/course');
        $rawMessage = $this->request->getPost('message') ?? $this->request->getPost('/message');

        // Phone clean: remove non-digits, trim leading 91 or 0
        $phone = preg_replace('/\D/', '', (string) $rawPhone);
        if (strlen($phone) === 12 && strpos($phone, '91') === 0) {
            $phone = substr($phone, 2);
        } elseif (strlen($phone) === 11 && $phone[0] === '0') {
            $phone = substr($phone, 1);
        }

        $data = [
            'name'       => trim((string) $rawName),
            'email'      => trim((string) $rawEmail),
            'phone'      => $phone,
            'course'     => trim((string) $rawCourse),
            'message'    => trim((string) $rawMessage),
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $validation = \Config\Services::validation();

        $validation->setRules([
            'name'    => ['label' => 'Name',    'rules' => 'required|min_length[2]|max_length[100]'],
            'email'   => ['label' => 'Email',   'rules' => 'required|valid_email|max_length[150]'],
            'phone'   => ['label' => 'Phone',   'rules' => 'required|numeric|exact_length[10]'],
            'course'  => ['label' => 'Course',  'rules' => 'required|max_length[100]'],
            'message' => ['label' => 'Message', 'rules' => 'required|min_length[3]|max_length[1000]'],
        ], [
            'phone' => [
                'numeric'      => 'Please enter a valid 10-digit phone number.',
                'exact_length' => 'Please enter a valid 10-digit phone number.',
            ],
        ]);

        if (! $validation->run($data)) {
            $errors = $validation->getErrors();

            if ($isAjax) {
                return $this->response->setStatusCode(422)->setJSON([
                    'success'   => false,
                    'message'   => 'Please correct the errors below.',
                    'errors'    => $errors,
                    'csrf_hash' => csrf_hash(),
                ]);
            }

            return redirect()->back()->withInput()->with('errors', $errors);
        }

        // Ensure table exists before insert
        $this->ensureTableExists();

        try {
            $model = new EnquiryModel();
            $saved = $model->insert($data);
        } catch (\Throwable $e) {
            log_message('error', 'Enquiry save error: ' . $e->getMessage());
            $saved = false;
        }

        if (! $saved) {
            if (isset($model)) {
                log_message('error', 'Enquiry insert failed: ' . json_encode($model->errors()));
            }

            if ($isAjax) {
                return $this->response->setStatusCode(500)->setJSON([
                    'success'   => false,
                    'message'   => 'Could not save your enquiry right now. Please try again.',
                    'csrf_hash' => csrf_hash(),
                ]);
            }

            return redirect()->back()->withInput()->with('errors', ['Unable to save enquiry. Please try again.']);
        }

        // Send email alert to Admin
        try {
            $emailService = \Config\Services::email();
            $emailConfig  = config('Email');

            $adminEmail = env('EMAIL_TO', 'delhihealthcare1992@gmail.com');
            $fromEmail  = !empty($emailConfig->SMTPUser) ? $emailConfig->SMTPUser : 'delhihealthcare1992@gmail.com';

            $emailService->setFrom($fromEmail, 'DHCI Enquiry Notification');
            $emailService->setReplyTo($data['email'], $data['name']);
            $emailService->setTo($adminEmail);
            $emailService->setSubject("New Admission Enquiry: " . $data['name'] . " (" . $data['course'] . ")");

            $emailBody = "
                <div style='font-family: Arial, sans-serif; line-height: 1.6; color: #333;'>
                    <h2 style='color: #0389c6;'>New Admission Enquiry Received</h2>
                    <table style='width: 100%; border-collapse: collapse; margin-top: 15px;'>
                        <tr><td style='padding: 8px; border-bottom: 1px solid #eee; width: 140px;'><strong>Name:</strong></td><td style='padding: 8px; border-bottom: 1px solid #eee;'>" . esc($data['name']) . "</td></tr>
                        <tr><td style='padding: 8px; border-bottom: 1px solid #eee;'><strong>Email:</strong></td><td style='padding: 8px; border-bottom: 1px solid #eee;'><a href='mailto:" . esc($data['email']) . "'>" . esc($data['email']) . "</a></td></tr>
                        <tr><td style='padding: 8px; border-bottom: 1px solid #eee;'><strong>Phone:</strong></td><td style='padding: 8px; border-bottom: 1px solid #eee;'><a href='tel:" . esc($data['phone']) . "'>" . esc($data['phone']) . "</a></td></tr>
                        <tr><td style='padding: 8px; border-bottom: 1px solid #eee;'><strong>Course:</strong></td><td style='padding: 8px; border-bottom: 1px solid #eee;'>" . esc($data['course']) . "</td></tr>
                        <tr><td style='padding: 8px; border-bottom: 1px solid #eee;'><strong>Message:</strong></td><td style='padding: 8px; border-bottom: 1px solid #eee;'>" . nl2br(esc($data['message'])) . "</td></tr>
                        <tr><td style='padding: 8px; border-bottom: 1px solid #eee;'><strong>Submitted On:</strong></td><td style='padding: 8px; border-bottom: 1px solid #eee;'>" . date('d-M-Y h:i A') . "</td></tr>
                        <tr><td style='padding: 8px; border-bottom: 1px solid #eee;'><strong>IP Address:</strong></td><td style='padding: 8px; border-bottom: 1px solid #eee;'>" . esc($this->request->getIPAddress()) . "</td></tr>
                    </table>
                </div>
            ";

            $emailService->setMessage($emailBody);
            $emailService->setMailType('html');
            $emailService->send();
        } catch (\Throwable $e) {
            log_message('error', 'Enquiry email dispatch failed: ' . $e->getMessage());
        }

        // Flash message for thank-you page
        session()->setFlashdata('success_name', $data['name']);
        session()->setFlashdata('success', 'Thank you! Your enquiry has been submitted. Our admission team will contact you shortly.');

        if ($isAjax) {
            return $this->response->setJSON([
                'success'   => true,
                'message'   => 'Thank you! Our counselor will contact you shortly.',
                'redirect'  => base_url('thank-you'),
                'csrf_hash' => csrf_hash(),
            ]);
        }

        return redirect()->to(base_url('thank-you'));
    }

    public function showEnquiries()
    {
        $this->ensureTableExists();
        $enquiryModel      = new EnquiryModel();
        $data['enquiries'] = $enquiryModel->orderBy('id', 'DESC')->findAll();
        return view('admin/enquiries', $data);
    }

    public function downloadEnquiries()
    {
        $this->ensureTableExists();
        $enquiryModel = new EnquiryModel();

        $start = $this->request->getGet('start');
        $end   = $this->request->getGet('end');

        if ($start && $end) {
            $start = $start . ' 00:00:00';
            $end   = $end . ' 23:59:59';

            $enquiries = $enquiryModel
                ->where('created_at >=', $start)
                ->where('created_at <=', $end)
                ->orderBy('id', 'DESC')
                ->findAll();
        } else {
            $enquiries = $enquiryModel->orderBy('id', 'DESC')->findAll();
        }

        $filename = 'enquiries_' . date('YmdHis') . '.csv';

        header('Content-Type: text/csv; charset=UTF-8');
        header('Content-Disposition: attachment; filename="' . $filename . '"');

        $output = fopen('php://output', 'w');

        // Excel UTF-8 BOM
        fwrite($output, "\xEF\xBB\xBF");

        fputcsv($output, ['Name', 'Email', 'Phone', 'Course', 'Message', 'Submitted On']);

        foreach ($enquiries as $enquiry) {
            fputcsv($output, [
                $enquiry['name'] ?? '',
                $enquiry['email'] ?? '',
                $enquiry['phone'] ?? '',
                $enquiry['course'] ?? '',
                $enquiry['message'] ?? '',
                ! empty($enquiry['created_at']) ? date('d-m-Y H:i', strtotime($enquiry['created_at'])) : '',
            ]);
        }

        fclose($output);
        exit;
    }

    // Single Delete
    public function delete($id)
    {
        $model = new EnquiryModel();

        if ($model->delete($id)) {
            return $this->response->setJSON([
                'status'    => 'success',
                'csrf_hash' => csrf_hash(),
            ]);
        }

        return $this->response->setJSON([
            'status'    => 'error',
            'message'   => 'Delete failed',
            'csrf_hash' => csrf_hash(),
        ]);
    }

    // Bulk Delete
    public function bulkDelete()
    {
        $ids = $this->request->getPost('ids');

        if (! $ids || ! is_array($ids)) {
            return $this->response->setJSON([
                'status'    => 'error',
                'message'   => 'Invalid IDs',
                'csrf_hash' => csrf_hash(),
            ]);
        }

        $model = new EnquiryModel();
        $model->whereIn('id', $ids)->delete();

        return $this->response->setJSON([
            'status'    => 'success',
            'csrf_hash' => csrf_hash(),
        ]);
    }
}
