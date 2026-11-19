<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;

class Testimonial extends Controller
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->ensureTableExists();
    }

    /**
     * Ensure the testimonials table exists to avoid database errors
     */
    protected function ensureTableExists()
    {
        try {
            if (!$this->db->tableExists('testimonials')) {
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
                    'role' => [
                        'type'       => 'VARCHAR',
                        'constraint' => 150,
                        'null'       => true,
                    ],
                    'image' => [
                        'type'       => 'VARCHAR',
                        'constraint' => 255,
                        'null'       => true,
                    ],
                    'message' => [
                        'type' => 'TEXT',
                    ],
                    'status' => [
                        'type'       => 'TINYINT',
                        'constraint' => 1,
                        'default'    => 1,
                    ],
                    'created_at' => [
                        'type' => 'DATETIME',
                        'null' => true,
                    ],
                    'updated_at' => [
                        'type' => 'DATETIME',
                        'null' => true,
                    ],
                ];
                $forge->addField($fields);
                $forge->addKey('id', true);
                $forge->createTable('testimonials', true);
            }
        } catch (\Throwable $e) {
            log_message('error', 'Testimonials table check error: ' . $e->getMessage());
        }
    }

    // =========================
    // VIEW ALL TESTIMONIALS
    // =========================
    public function view_testimonial()
    {
        try {
            $data['testimonials'] = $this->db->table('testimonials')
                ->orderBy('id', 'DESC')
                ->get()
                ->getResult();
        } catch (\Throwable $e) {
            $data['testimonials'] = [];
            log_message('error', 'Testimonials fetch error: ' . $e->getMessage());
        }

        return view('admin/testimonial/view_testimonial', $data);
    }

    // =========================
    // ADD PAGE
    // =========================
    public function add_testimonial()
    {
        return view('admin/testimonial/add_testimonial');
    }

    // =========================
    // SAVE DATA
    // =========================
    public function testimonialAction()
    {
        $name    = trim((string) $this->request->getPost('name'));
        $role    = trim((string) $this->request->getPost('role'));
        $message = trim((string) $this->request->getPost('message'));

        if (empty($name) || empty($message)) {
            return redirect()->back()->withInput()->with('error', 'Name and Message are required.');
        }

        $data = [
            'name'       => htmlspecialchars(addslashes($name)),
            'role'       => htmlspecialchars(addslashes($role)),
            'message'    => htmlspecialchars(addslashes($message)),
            'status'     => 1,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        // Ensure upload directory exists
        $uploadDir = FCPATH . 'uploads/testimonials/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        // Image Upload
        $file = $this->request->getFile('image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $ext = strtolower($file->getExtension());
            if (in_array($ext, ['jpg', 'jpeg', 'png', 'webp', 'gif'])) {
                $newName = $file->getRandomName();
                $file->move($uploadDir, $newName);
                $data['image'] = $newName;
            }
        }

        try {
            $this->db->table('testimonials')->insert($data);
            return redirect()->to(site_url('admin/testimonial'))->with('msg', 'Testimonial added successfully!');
        } catch (\Throwable $e) {
            log_message('error', 'Testimonial insert error: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Failed to save testimonial.');
        }
    }

    // =========================
    // EDIT PAGE
    // =========================
    public function edit_testimonial($id)
    {
        $data['testimonial'] = $this->db->table('testimonials')
            ->where('id', $id)
            ->get()
            ->getRow();

        if (empty($data['testimonial'])) {
            return redirect()->to(site_url('admin/testimonial'))->with('error', 'Testimonial not found.');
        }

        return view('admin/testimonial/edit_testimonial', $data);
    }

    // =========================
    // UPDATE DATA
    // =========================
    public function update_testimonial($id)
    {
        $existing = $this->db->table('testimonials')
            ->where('id', $id)
            ->get()
            ->getRow();

        if (empty($existing)) {
            return redirect()->to(site_url('admin/testimonial'))->with('error', 'Testimonial not found.');
        }

        $name    = trim((string) $this->request->getPost('name'));
        $role    = trim((string) $this->request->getPost('role'));
        $message = trim((string) $this->request->getPost('message'));

        $data = [
            'name'       => htmlspecialchars(addslashes($name)),
            'role'       => htmlspecialchars(addslashes($role)),
            'message'    => htmlspecialchars(addslashes($message)),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $uploadDir = FCPATH . 'uploads/testimonials/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $file = $this->request->getFile('image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $ext = strtolower($file->getExtension());
            if (in_array($ext, ['jpg', 'jpeg', 'png', 'webp', 'gif'])) {
                $newName = $file->getRandomName();
                $file->move($uploadDir, $newName);
                $data['image'] = $newName;

                // Delete old image
                if (!empty($existing->image) && file_exists($uploadDir . $existing->image)) {
                    unlink($uploadDir . $existing->image);
                }
            }
        }

        try {
            $this->db->table('testimonials')
                ->where('id', $id)
                ->update($data);

            return redirect()->to(site_url('admin/testimonial'))->with('msg', 'Testimonial updated successfully!');
        } catch (\Throwable $e) {
            log_message('error', 'Testimonial update error: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Failed to update testimonial.');
        }
    }

    // =========================
    // DELETE DATA
    // =========================
    public function delete_testimonial($id)
    {
        $existing = $this->db->table('testimonials')
            ->where('id', $id)
            ->get()
            ->getRow();

        if ($existing) {
            $uploadDir = FCPATH . 'uploads/testimonials/';
            if (!empty($existing->image) && file_exists($uploadDir . $existing->image)) {
                unlink($uploadDir . $existing->image);
            }

            $this->db->table('testimonials')
                ->where('id', $id)
                ->delete();

            return redirect()->to(site_url('admin/testimonial'))->with('msg', 'Testimonial deleted successfully!');
        }

        return redirect()->to(site_url('admin/testimonial'))->with('error', 'Testimonial not found.');
    }
}
