<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;

class Testimonial extends Controller
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    // =========================
    // VIEW ALL TESTIMONIALS
    // =========================
    public function view_testimonial()
    {
        $data['testimonials'] = $this->db->table('testimonials')
            ->orderBy('id', 'DESC')
            ->get()
            ->getResult();

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
        $data = [
            'name'    => $this->request->getPost('name'),
            'role'    => $this->request->getPost('role'),
            'message' => $this->request->getPost('message'),
        ];

        // Image Upload
        $file = $this->request->getFile('image');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('uploads/testimonials/', $newName);
            $data['image'] = $newName;
        }

        $this->db->table('testimonials')->insert($data);

        return redirect()->to(site_url('admin/testimonial/view'));
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

        return view('admin/testimonial/edit_testimonial', $data);
    }

    // =========================
    // UPDATE DATA
    // =========================
    public function update_testimonial($id)
    {
        $data = [
            'name'    => $this->request->getPost('name'),
            'role'    => $this->request->getPost('role'),
            'message' => $this->request->getPost('message'),
        ];

        $file = $this->request->getFile('image');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('uploads/testimonials/', $newName);
            $data['image'] = $newName;
        }

        $this->db->table('testimonials')
            ->where('id', $id)
            ->update($data);

        return redirect()->to(site_url('admin/testimonial/view'));
    }

    // =========================
    // DELETE DATA
    // =========================
    public function delete_testimonial($id)
    {
        $this->db->table('testimonials')
            ->where('id', $id)
            ->delete();

        return redirect()->to(site_url('admin/testimonial/view'));
    }
}