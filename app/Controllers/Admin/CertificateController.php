<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use CodeIgniter\Files\File;


class CertificateController extends BaseController
{
    public function index()  {
        $data['title']="Student";
        return view('admin/certificate/certificate', $data);
    }
}