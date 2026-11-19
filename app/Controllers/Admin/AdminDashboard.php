<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Setting;

class AdminDashboard extends BaseController
{
    protected $CourseModel;
    protected $franchiseModel;
    protected $stateModel;
    protected $adminModel;
    protected $BlogsModel;
    protected $RegistrationModel;
    protected $CitieModel;
    protected $BatchModel;
    protected $Certificate;
    protected $galleryModel;
    protected $EnquiryModel;
    protected $Setting;

    public function __construct()
    {
        $this->Setting           = new Setting;
        $this->CourseModel       = new \App\Models\CourseModel();
        $this->franchiseModel    = new \App\Models\FranchiseModel();
        $this->BlogsModel        = new \App\Models\BlogsModel();
        $this->RegistrationModel = new \App\Models\RegistrationModel();
        $this->BatchModel        = new \App\Models\BatchModel();
        $this->Certificate       = new \App\Models\Certificate();
        $this->galleryModel      = new \App\Models\GalleryModel();
        $this->EnquiryModel      = new \App\Models\EnquiryModel();
    }

    public function index()
    {
        $data['title'] = "Dashboard";

        // Dashboard Counters
        $data['totalCourses']      = $this->CourseModel->countAll();
        $data['totalFranchises']   = $this->franchiseModel->countAll();
        $data['totalBlogs']        = $this->BlogsModel->countAll();
        $data['totalStudents']     = $this->RegistrationModel->countAll();
        $data['totalBatches']      = $this->BatchModel->countAll();
        $data['totalCertificates'] = $this->Certificate->countAll();
        $data['totalGallery']      = $this->galleryModel->countAll();
        $data['totalEnquiry']      = $this->EnquiryModel->countAll();

        // var_dump($data['totalStudents']); die;


        return view('admin/index', $data);
    }

    public function webSeting()
    {
        $title   = 'Setting';
        $setting = $this->Setting->first(1);
        return view('admin/websetting', compact('title', 'setting'));
    }

    public function updateSetting()
    {
        $site_logo = $this->request->getFile('site_logo');
        $site_fav  = $this->request->getFile('site_fav');

        $data = [];

        // Process Site Logo Upload
        if ($site_logo) {
            if ($site_logo->isValid() && ! $site_logo->hasMoved()) {
                $newNamesite_logo = $site_logo->getRandomName();
                $site_logo->move('public/uploads', $newNamesite_logo);
                $data['site_logo'] = 'uploads/' . $newNamesite_logo;
            }
        }

        // Process Site Favicon Upload
        if ($site_fav) {
            if ($site_fav->isValid() && ! $site_fav->hasMoved()) {
                $newNamesite_fav = $site_fav->getRandomName();
                $site_fav->move('public/uploads', $newNamesite_fav);
                $data['site_fav'] = 'uploads/' . $newNamesite_fav;
            }
        }

        // Update other settings
        $data['site_name']   = $this->request->getVar('site_name');
        $data['site_title']  = $this->request->getVar('site_title');
        $data['description'] = $this->request->getVar('description');

        try {
            // Assuming $this->Setting->update() is a valid method for updating settings
            $this->Setting->update(1, $data);
            return redirect()->back()->with("success", "Update Successfully!!");
        } catch (\Exception $th) {
            // Handle errors gracefully, show an error message, or log the exception
            return $th->getMessage();
        }
    }
    public function updateSetting2()
    {

        $data = [
            'number'   => $this->request->getVar('number'),
            'email'    => $this->request->getVar('email'),
            'address'  => $this->request->getVar('address'),
            'map_link' => $this->request->getVar('map_link'),
        ];

        try {
            $this->Setting->update(1, $data);
            return redirect()->back()->with("success", "Update Successfully!!");
        } catch (\Exception $th) {
            return $th->getMessage();
        }
    }

    public function PassChange()
    {
        $datas = $this->request->getPost();

        if ($datas['new_password'] === $datas['cnew_password']) {
            $user = $this->AdminModel->find(session('admin_id'));

            if ($user) {
                $data['password'] = password_hash($datas['new_password'], PASSWORD_DEFAULT);

                $this->AdminModel->update(session('admin_id'), $data);
                return redirect()->back()->with("success", "Password changed successfully!");
            } else {
                return redirect()->back()->with("error", "User not found!");
            }
        }

        return redirect()->back()->with("error", "Passwords do not match!");
    }

    public function UserPassChange()
    {
        $id   = $this->request->getGet('id');
        $user = $this->AdminModel->find($id);

        $form = '<form action="' . url_to('user_password_post') . '" method="post">
                    ' . csrf_field() . '
                    <div class="modal-body">
                        <div class="form-group">
                            <input name="user_id" type="hidden" value="' . $id . '">
                            <label class="form-label font-w600">New Password</label>
                            <input name="new_password" type="password" id="new_password" class="form-control solid" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label font-w600">Confirm Password</label>
                            <input name="cnew_password" type="password" id="cnew_password" class="form-control solid" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>';

        return $form;
    }

    public function UserPassChangePost()
    {
        $datas = $this->request->getPost();

        if ($datas['new_password'] === $datas['cnew_password']) {
            $user = $this->AdminModel->find($datas['user_id']);

            if ($user) {
                $data['password'] = password_hash($datas['new_password'], PASSWORD_DEFAULT);

                $this->AdminModel->update($datas['user_id'], $data);
                return redirect()->back()->with("success", "Password changed successfully!");
            } else {
                return redirect()->back()->with("error", "User not found!");
            }
        }

        return redirect()->back()->with("error", "Passwords do not match!");
    }

}
