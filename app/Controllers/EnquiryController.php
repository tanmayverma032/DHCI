<?php
namespace App\Controllers;

use App\Models\EnquiryModel;

class EnquiryController extends BaseController
{
    /**
     * Website enquiry form submit (popup + counseling form).
     * AJAX request par JSON return karta hai, normal submit par redirect.
     */
    public function submit()
    {
        $isAjax = $this->request->isAJAX();

        // Phone clean karo: spaces, dashes, +91 / 91 / leading 0 hatao
        $phone = preg_replace('/\D/', '', (string) $this->request->getPost('phone'));
        if (strlen($phone) === 12 && strpos($phone, '91') === 0) {
            $phone = substr($phone, 2);
        } elseif (strlen($phone) === 11 && $phone[0] === '0') {
            $phone = substr($phone, 1);
        }

        $data = [
            'name'    => trim((string) $this->request->getPost('name')),
            'email'   => trim((string) $this->request->getPost('email')),
            'phone'   => $phone,
            'course'  => trim((string) $this->request->getPost('course')),
            'message' => trim((string) $this->request->getPost('message')),
        ];

        $validation = \Config\Services::validation();

        $validation->setRules([
            'name'    => ['label' => 'Name',    'rules' => 'required|min_length[3]|max_length[100]'],
            'email'   => ['label' => 'Email',   'rules' => 'required|valid_email|max_length[150]'],
            'phone'   => ['label' => 'Phone',   'rules' => 'required|numeric|exact_length[10]'],
            'course'  => ['label' => 'Course',  'rules' => 'required|max_length[100]'],
            'message' => ['label' => 'Message', 'rules' => 'required|min_length[5]|max_length[550]'],
        ], [
            'phone' => [
                'numeric'      => 'Please enter a valid 10-digit phone number.',
                'exact_length' => 'Please enter a valid 10-digit phone number.',
            ],
        ]);

        // Cleaned data validate karo (raw request nahi)
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
                    'message'   => 'Could not save your enquiry. Please try again.',
                    'csrf_hash' => csrf_hash(),
                ]);
            }

            return redirect()->back()->withInput()->with('errors', ['Database save failed!']);
        }

        // Thank-you page ke liye naam
        session()->setFlashdata('success_name', $data['name']);

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
        $enquiryModel      = new EnquiryModel();
        $data['enquiries'] = $enquiryModel->orderBy('created_at', 'DESC')->findAll();
        return view('admin/enquiries', $data);
    }

    public function downloadEnquiries()
    {
        $enquiryModel = new EnquiryModel();

        $start = $this->request->getGet('start');
        $end   = $this->request->getGet('end');

        if ($start && $end) {
            $start = $start . ' 00:00:00';
            $end   = $end . ' 23:59:59';

            $enquiries = $enquiryModel
                ->where('created_at >=', $start)
                ->where('created_at <=', $end)
                ->orderBy('created_at', 'DESC')
                ->findAll();
        } else {
            $enquiries = $enquiryModel->orderBy('created_at', 'DESC')->findAll();
        }

        $filename = 'enquiries_' . date('YmdHis') . '.csv';

        header('Content-Type: text/csv; charset=UTF-8');
        header('Content-Disposition: attachment; filename="' . $filename . '"');

        $output = fopen('php://output', 'w');

        // Excel me Hindi/special characters sahi dikhne ke liye BOM
        fwrite($output, "\xEF\xBB\xBF");

        fputcsv($output, ['Name', 'Email', 'Phone', 'Course', 'Message', 'Submitted On']);

        foreach ($enquiries as $enquiry) {
            fputcsv($output, [
                $enquiry['name'],
                $enquiry['email'],
                $enquiry['phone'],
                $enquiry['course'],
                $enquiry['message'],
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