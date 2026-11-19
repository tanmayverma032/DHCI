<?php

namespace App\Controllers;
use App\Models\NewsModel;
use App\Models\EventsModel;

class HomeControllers extends BaseController
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


    function __construct()
    {
        $this->CourseModel = new \App\Models\CourseModel();
        $this->franchiseModel = new \App\Models\FranchiseModel();
        $this->stateModel = new \App\Models\StateModel();
        $this->adminModel = new \App\Models\AdminModel();
        $this->BlogsModel = new \App\Models\BlogsModel();
        $this->RegistrationModel = new \App\Models\RegistrationModel();
        $this->CitieModel = new \App\Models\CitieModel();
        $this->BatchModel = new \App\Models\BatchModel();
        $this->Certificate = new \App\Models\Certificate();
        $this->galleryModel = new \App\Models\GalleryModel();
    }




    public function sanitize($stringToSanitize = false)
    {
        if (!empty($stringToSanitize)) {
            return addslashes(htmlspecialchars($stringToSanitize));
        } else {
            return "";
        }
    }

    public function index()
    {
        $courses = $this->CourseModel->find_all();
        $blogs = $this->BlogsModel->findAll();
        $gallery = $this->galleryModel->findAll();

        $newsModel = new \App\Models\NewsModel();
        $news = $newsModel
            ->orderBy('id', 'DESC')
            ->limit(10)
            ->findAll();
        $pagetitle = "Home";

        $eventsModel = new \App\Models\EventsModel();
        $events = $eventsModel
            ->orderBy('start_date', 'ASC')
            ->findAll();
        return view('web/index', compact('pagetitle', 'blogs', 'courses', 'news', 'gallery','events'));
    }

    public function allEvents()
    {
        $eventsModel = new EventsModel();
    
        $data['events'] = $eventsModel
                            ->orderBy('start_date', 'ASC')
                            ->findAll();
    
        $data['pagetitle'] = "All Events";
    
        return view('web/all_events', $data);
    }
    
    public function events()
    {
        $model = new \App\Models\EventModel();
        $data['events'] = $model->where('status',1)->orderBy('id','DESC')->findAll();
        
        return view('frontend/events', $data);
    }
   public function allNews()
    {
        $newsModel = new NewsModel();

        $news = $newsModel
            ->where('status', 1)
            ->orderBy('publish_date', 'DESC')
            ->findAll();

        $pagetitle = "All News";

        return view('web/all_news', compact('pagetitle', 'news'));
    }
    public function apply_jobs()
    {
        return view('web/apply_jobs', ['pagetitle' => 'Apply Jobs']);
    }

    public function about()
    {
        $aboutContent = $this->db->table('about')->select('content')->limit(1)->get()->getRowArray();

        return view('web/about-us', ['pagetitle' => 'About Us', 'aboutContent' => $aboutContent]);
    }
    public function chairman_message()
    {
        return view('web/message', ['pagetitle' => 'Chairman Message']);
    }
    public function privacy_policy()
    {
        return view('web/privacy_policy', ['pagetitle' => 'Privacy Policy']);
    }
    public function terms_conditions()
    {
        return view('web/terms_conditions', ['pagetitle' => 'Terms & Conditions']);
    }
    public function refund_policy()
    {
        return view('web/refund_policy', ['pagetitle' => 'Refund Policy']);
    }
    public function disclaimer()
    {
        return view('web/disclaimer', ['pagetitle' => 'Disclaimer Policy']);
    }
    public function cookies_policy()
    {
        return view('web/cookies_policy', ['pagetitle' => 'Cookies Policy']);
    }
    public function final_legal_note()
    {
        return view('web/final_legal_note', ['pagetitle' => 'Final Legal Note']);
    }
    public function admission()
    {
        return view('web/downlaod-admission-form', ['pagetitle' => 'Downlaod Admission Form']);
    }
    public function downlaod_Prospective()
    {
        return view('web/downlaod-prospectus', ['pagetitle' => 'Downlaod Prospectus']);
    }
    public function our_facilities()
    {
        return view('web/our_facilities', ['pagetitle' => 'Our Facilities']);
    }
    public function our_mission()
    {
        return view('web/our_mission', ['pagetitle' => 'Our Mission']);
    }
    public function registration_verification()
    {
        return view('web/registration_verification', ['pagetitle' => 'Registration Verification']);
    }

    public function gallery()
    {
        $data['pagetitle'] = 'Gallery';
        $data['gallery'] = $this->galleryModel->findAll();

        return view('web/gallery', $data);
    }
    public function germany()
    {
        $data['pagetitle'] = 'Germany';
        $data['germany'] = $this->galleryModel->findAll();

        return view('web/germany', $data);
    }
    public function Partner()
    {
        $data['pagetitle'] = 'Partner';
        $data['partner'] = $this->galleryModel->findAll();

        return view('web/partner', $data);
    }





    public function videogallery()
    {
        return view('web/videogallery', ['pagetitle' => 'Video Gallery']);
    }

    public function download_documents()
    {
        return view('web/download_documents', ['pagetitle' => 'Download Documents']);
    }
    public function contact()
    {
        return view('web/contact', ['pagetitle' => 'Contact']);
    }

    public function Blogs()
    {
        $blogs = $this->BlogsModel->paginate(3);
        $pager = $this->BlogsModel->pager;
        return view('web/blogs', ['pagetitle' => 'Blogs', 'blogs' => $blogs, 'pager' => $pager]);
    }

    public function blogsDetails($slug)
    {
        $blog = $this->BlogsModel->where('slug', $slug)->first();
        // Retrieve recent blogs
        $recentBlogs = $this->BlogsModel->orderBy('created_at', 'desc')->limit(5)->findAll();
        return view('web/blogs-details', ['pagetitle' => 'Blogs Details', 'blog' => $blog, 'recentBlogs' => $recentBlogs]);
    }

    public function course_details()
    {
        return view('web/Courses/courses-details', ['pagetitle' => 'Courses-Details']);
    }
    public function course_category()
    {
        return view('web/Courses/course-category', ['pagetitle' => 'Courses-Category']);
    }


    public function idcardDownload()
    {
        return view('web/idcard-download', ['pagetitle' => 'Id card Download']);
    }
    public function idcardDownloadPost()
    {
        $rag_no = $this->request->getPost('reg_no');
        $dob = $this->request->getPost('dob');
        $student = $this->RegistrationModel->where('rag_no', $rag_no)->where('dob', $dob)->first();
        if ($student) {
            return $this->idCard($student['id']);
        }
        return redirect()->back()->with("error", 'Student NOT Found!!');
    }

    public function idcardDownloadUser($id)
    {

        $student = $this->RegistrationModel->where('id', $id)->first();
        if ($student) {
            return $this->idCard($student['id']);
        }
        return redirect('user_dashboard')->back()->with("error", 'Student Registration Number not Found!!');
    }

    function idCard($id = null)
    {
        $data['student'] = $this->RegistrationModel->where('id', $id)->first();

        if (!$data['student']) {
            return redirect()->back()->with('error', 'Student not found!');
        }

        // Course
        $course = $this->CourseModel->where('id', $data['student']['course_id'])->first();
        $data['course'] = $course ?? [];

        // Center
        $center = $this->franchiseModel->where('id', $data['student']['center_id'])->first();
        $data['center'] = $center['institute_name'] ?? '';

        // State
        $state = $this->stateModel->where('id', $data['student']['state_id'])->first();
        $data['state'] = $state['state_name'] ?? '';

        // City
        $city = $this->CitieModel->where('id', $data['student']['district_id'])->first();
        $data['city'] = $city['city_name'] ?? '';

        $data['title'] = "Add Student";

        return view('print/download_idcard', $data);
    }


     public function downloadCertificate()
    {
        $rag_no = $this->request->getPost('reg_no');
        $dob = $this->request->getPost('dob');
        $student = $this->RegistrationModel->where('rag_no', $rag_no)
                                           ->where('dob', $dob)
                                           ->first();
    
        if ($student) {
            if ($student['certificate_status'] == '1') {
                $certi = $this->Certificate->where('student_id', $student['id'])->first();
                return view('web/download_certificate', [
                    'pagetitle' => 'Download Certificate',
                    'certificate' => $certi
                ]);
            } else {
                return redirect()->back()->with("error", 'Certificate Not Issue :)');
            }
        } else {
            return redirect()->back()->with("error", 'Student not found!!');
        }
    }
    
    public function e_course()
    {
        return view('web/e_course');
    }
    
    } // <-- class HomeControllers ends here