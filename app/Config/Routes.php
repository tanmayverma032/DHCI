<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'HomeControllers::index', ['as' => 'index']);
$routes->get('about_us', 'HomeControllers::about', ['as' => 'about_us']);
$routes->get('apply_jobs', 'HomeControllers::apply_jobs', ['as' => 'apply_jobs']);
$routes->get('downlaod-admission-form', 'HomeControllers::admission', ['as' => 'admission']);
$routes->get('downlaod-prospective', 'HomeControllers::downlaod_Prospective', ['as' => 'downlaod-prospective']);
$routes->get('message', 'HomeControllers::chairman_message', ['as' => 'message']);
$routes->get('our_facilities', 'HomeControllers::our_facilities', ['as' => 'our_facilities']);
$routes->get('our_mission', 'HomeControllers::our_mission', ['as' => 'our_mission']);
$routes->get('registration_verification', 'HomeControllers::registration_verification', ['as' => 'registration_verification']);
$routes->get('gallery', 'HomeControllers::gallery', ['as' => 'gallery']);
$routes->get('privacy_policy', 'HomeControllers::privacy_policy', ['as' => 'privacy_policy']);
$routes->get('terms_conditions', 'HomeControllers::terms_conditions', ['as' => 'terms_conditions']);
$routes->get('refund_policy', 'HomeControllers::refund_policy', ['as' => 'refund_policy']);
$routes->get('disclaimer', 'HomeControllers::disclaimer', ['as' => 'disclaimer']);
$routes->get('cookies_policy', 'HomeControllers::cookies_policy', ['as' => 'cookies_policy']);
$routes->get('final_legal_note', 'HomeControllers::final_legal_note', ['as' => 'final_legal_note']);
$routes->get('videogallery', 'HomeControllers::videogallery', ['as' => 'videogallery']);
$routes->get('download_documents', 'HomeControllers::download_documents', ['as' => 'download_documents']);
$routes->get('download-certificate', 'HomeControllers::download_certificate', ['as' => 'download_certificate']);
$routes->post('certificate-download', 'HomeControllers::downloadCertificate', ['as' => 'certificate_store']);

$routes->group("admin", ["filter" => "admin"], function ($routes) {

    $routes->get('testimonial', 'Admin\Testimonial::view_testimonial', ['as' => 'testimonial_list']);

    $routes->get('testimonial/add', 'Admin\Testimonial::add_testimonial', ['as' => 'testimonial_add']);

    $routes->post('testimonial/store', 'Admin\Testimonial::testimonialAction', ['as' => 'testimonial_store']);

    $routes->get('testimonial/edit/(:num)', 'Admin\Testimonial::edit_testimonial/$1', ['as' => 'testimonial_edit']);

    $routes->post('testimonial/update/(:num)', 'Admin\Testimonial::update_testimonial/$1', ['as' => 'testimonial_update']);

    $routes->get('testimonial/delete/(:num)', 'Admin\Testimonial::delete_testimonial/$1', ['as' => 'testimonial_delete']);
});
//end Testimonials

$routes->get('/', 'HomeController::index');          // Home page
$routes->get('all-news', 'HomeControllers::allNews'); // All News page
$routes->get('/', 'HomeControllers::index');
$routes->get('all-events', 'HomeControllers::allEvents');


$routes->get('id-card-download', 'HomeControllers::idcardDownload', ['as' => 'idcard_download']);
$routes->post('id-card-download', 'HomeControllers::idcardDownloadPost', ['as' => 'idcard_download_post']);
$routes->get('id-card/(:num)', 'HomeControllers::idcardDownloadUser/$1', ['as' => 'idcard_user']);
$routes->get('contact', 'HomeControllers::contact', ['as' => 'contact']);
$routes->get('partner', 'HomeControllers::partner', ['as' => 'partner']);
$routes->get('germany', 'HomeControllers::germany', ['as' => 'germany']);
$routes->get('blogs', 'HomeControllers::Blogs', ['as' => 'blogs']);
$routes->get('blog/(:any)', 'HomeControllers::blogsDetails/$1', ['as' => 'blog']);
// $routes->get('courses-details', 'HomeControllers::course_details',['as'=>'course_details']);
$routes->get('course-category', 'HomeControllers::course_category', ['as' => 'course_category']);

$routes->post('job-submit', 'JobController::submit');

$routes->get('e_course', 'HomeControllers::e_course');

$routes->get('apply-franchise', 'FranchiseController::ApplyFranchise', ['as' => 'apply_franchise']);
$routes->post('apply-franchise-action', 'FranchiseController::apply_franchise_action', ['as' => 'apply_franchise_action']);
$routes->get('study-centres', 'FranchiseController::study_centres', ['as' => 'study_centres']);
//************  Controller route to forntend ****************//
$routes->get('courses/(:any)', 'CourseController::index/$1', ['as' => 'courses']);
$routes->get('course_details/(:any)', 'CourseController::CourseDetails/$1', ['as' => 'course_details']);
$routes->get('apply_franchise', 'FranchiseController::ApplyFranchise', ['as' => 'apply_franchise']);
$routes->get('franchise', 'ApplyFranchiseController::ApplyFranchise', ['as' => 'franchise']);
$routes->get('student_ragistration', 'StudentController::index', ['as' => 'student_ragistration']);
$routes->post('student_save', 'StudentController::saveStudent', ["as" => "student_save"]);
$routes->post('BranchSave', 'FranchiseController::apply_franchise_action', ["as" => "branch_save"]);
$routes->get('study_centres', 'FranchiseController::study_centres', ["as" => "study_centres"]);
$routes->get('getDistrictname', 'StudentController::getDistrictname', ["as" => "districtname"]);
// Route to view the franchise page (Fixes the 404 error)
$routes->get('franchise-apply', 'BranchController::index', ['as' => 'franchise_page']);

// Route to handle form data submission
$routes->post('branch/save', 'BranchController::save', ['as' => 'branch_save']);

// Route to handle district dropdown AJAX requests
$routes->get('branch/districts', 'BranchController::getDistrictName', ['as' => 'districtname']);
// ****************** enquiry form ****************** //




$routes->get('thank-you', function () {
    return view('web/thankyou');
});

$routes->get('admin/enquiries', 'EnquiryController::showEnquiries', ['as' => 'showEnquiries']);
$routes->get('admin/enquiries/download', 'EnquiryController::downloadEnquiries');

$routes->post('admin/enquiries/delete/(:num)', 'EnquiryController::delete/$1');
$routes->post('admin/enquiries/bulk-delete', 'EnquiryController::bulkDelete');

// ****************** Admin Route ****************** //
$routes->get('admin/login', 'Admin\AdminAuth::login');
$routes->get('admin/logout', 'Admin\AdminAuth::logout', ["as" => "logout"]);
$routes->post('admin/login-action', 'Admin\AdminAuth::login_action', ["as" => "login"]);

//*********** Protected Routes starts *************//

$routes->group("admin", ["filter" => "admin"], function ($routes) {
    $routes->get('/', 'Admin\AdminDashboard::index', ["as" => "dashboard"]);
    $routes->post('change-password', 'Admin\AdminDashboard::PassChange', ['as' => 'change_password']);
    $routes->get('user-change-password', 'Admin\AdminDashboard::UserPassChange', ['as' => 'user_passwordChange']);
    $routes->post('user-change-password', 'Admin\AdminDashboard::UserPassChangePost', ['as' => 'user_password_post']);


    $routes->get('course', 'Admin\CourseController::index', ["as" => "AllCourse"]);
    $routes->get('add-Course', 'Admin\CourseController::AddCourse', ["as" => "AddCourse"]);
    $routes->post('save-Course', 'Admin\CourseController::saveCourse', ["as" => "saveCourse"]);
    $routes->get('edit-Course/(:num)', 'Admin\CourseController::AddCourse/$1', ["as" => "editCourse"]);
    $routes->post('Course/Status', 'Admin\CourseController::CourseStatus', ["as" => "CourseStatus"]);
    $routes->post('Course/Delete', 'Admin\CourseController::CourseDelete', ["as" => "CourseDelete"]);


    $routes->get('studymaterial', 'Admin\StudyMaterialControllers::index', ["as" => "AllStudyMaterial"]);
    $routes->get('add-studymaterial', 'Admin\StudyMaterialControllers::AddStudyMaterial', ["as" => "AddStudyMaterial"]);
    $routes->post('save-studymaterial', 'Admin\StudyMaterialControllers::saveStudyMaterial', ["as" => "saveStudyMaterial"]);
    $routes->get('edit-studymaterial/(:num)', 'Admin\StudyMaterialControllers::AddStudyMaterial/$1', ["as" => "editStudyMaterial"]);
    $routes->post('studymaterial/Status', 'Admin\StudyMaterialControllers::StudyMaterialStatus', ["as" => "StudyMaterialStatus"]);
    // $routes->post('studymaterial/Delete', 'Admin\StudyMaterialControllers::StudyMaterialDelete', ["as" => "StudyMaterialDelete"]);

    $routes->post(
        'studymaterial/delete',
        'Admin\StudyMaterialControllers::StudyMaterialDelete',
        ['as' => 'StudyMaterialDelete']
    );


    
    $routes->get('coursesbyprogram', 'Admin\StudyMaterialControllers::getCoursesByProgram', ["as" => "coursesbyProgram"]);
    
    $routes->get('news', 'Admin\NewsController::index', ["as" => "add_news"]);
    $routes->get('news/create', 'Admin\NewsController::create');
    $routes->post('news/store', 'Admin\NewsController::store');
    $routes->get('news/edit/(:num)', 'Admin\NewsController::index/$1');
    $routes->post('news/update/(:num)', 'Admin\NewsController::update/$1');
    $routes->get('news/delete/(:num)', 'Admin\NewsController::delete/$1');
    
    $routes->get('admin/event', 'Admin\Event::index');
    $routes->post('admin/event/store', 'Admin\Event::store');
    $routes->get('admin/event/delete/(:num)', 'Admin\Event::delete/$1');

    $routes->get('events', 'Home::events');   // frontend page

    


    $routes->get('Program', 'Admin\CourseController::Program', ["as" => "AddProgram"]);
    $routes->post('saveProgram', 'Admin\CourseController::saveProgram', ["as" => "saveProgram"]);
    $routes->get('edit-Program/(:num)', 'Admin\CourseController::Program/$1', ["as" => "editProgram"]);
    $routes->post('Program/Status', 'Admin\CourseController::programStatus', ["as" => "programStatus"]);
    $routes->post('Program/Delete', 'Admin\CourseController::programDelete', ["as" => "programDelete"]);
    
        
    $routes->get('gallery', 'Admin\GalleryController::index', ['as' => 'galleryList']);
    $routes->get('gallery/create', 'Admin\GalleryController::create', ['as' => 'galleryCreate']);
    $routes->post('gallery/store', 'Admin\GalleryController::store', ['as' => 'galleryStore']);
    $routes->get('gallery/edit/(:num)', 'Admin\GalleryController::edit/$1', ['as' => 'galleryEdit']);
    $routes->post('gallery/update/(:num)', 'Admin\GalleryController::update/$1', ['as' => 'galleryUpdate']);
    $routes->get('gallery/delete/(:num)', 'Admin\GalleryController::delete/$1');



    $routes->get('franchise', 'Admin\FranchiseController::index', ["as" => "franchise"]);
    $routes->get('Add-Franchise', 'Admin\FranchiseController::AddFranchise', ["as" => "AddFranchise"]);
    $routes->get('edit-Franchise/(:num)', 'Admin\FranchiseController::AddFranchise/$1', ["as" => "editFranchise"]);
    $routes->post('save-Franchise', 'Admin\FranchiseController::saveFranchise', ["as" => "saveFranchise"]);
    $routes->post('update-Franchise', 'Admin\FranchiseController::UpdateFranchise', ["as" => "updateFranchise"]);
    $routes->get('franchise-panding', 'Admin\FranchiseController::franchisePanding', ["as" => "franchise_panding"]);
    $routes->get('franchise-reject', 'Admin\FranchiseController::franchiseReject', ["as" => "franchise_reject"]);
    $routes->post('franchise/Delete', 'Admin\FranchiseController::franchiseDelete', ["as" => "franchiseDelete"]);

    $routes->get('students', 'Admin\StudentController::index', ["as" => "students"]);

    $routes->post('upload-csv', 'Admin\StudentController::upload_csv');

    $routes->get('download-excel', 'Admin\StudentController::downloadExcel');






    $routes->get('getBatch', 'Admin\StudentController::getBatch', ["as" => "getBatch"]);
    $routes->get('panding-students', 'Admin\StudentController::studentPanding', ["as" => "students_panding"]);
    $routes->get('reject-students', 'Admin\StudentController::studentReject', ["as" => "students_reject"]);
    $routes->get('add-students', 'Admin\StudentController::addStudent', ["as" => "addStudent"]);
    $routes->post('save-student', 'Admin\StudentController::saveStudent', ["as" => "saveStudent"]);
    $routes->post('student/Delete', 'Admin\StudentController::studentDelete', ["as" => "studentDelete"]);
    $routes->get('edit-Student/(:num)', 'Admin\StudentController::editStudent/$1', ["as" => "editStudent"]);
    $routes->post('update-Student', 'Admin\StudentController::updateStudent', ["as" => "updateStudent"]);
    $routes->get('id-card/(:num)', 'Admin\StudentController::idCardDownload/$1', ["as" => "idCard"]);

    $routes->post('student/payment_status', 'Admin\StudentController::payment_status', ["as" => "payment_status"]);
    $routes->post('student/certificate_status', 'Admin\StudentController::certificate_status', ["as" => "certificate_status"]);
    $routes->get('certificate-upload', 'Admin\StudentController::certificateUpload', ["as" => "student_certificate"]);

    $routes->post('certificate-upload', 'Admin\StudentController::certificateUploadStore', ["as" => "admin_certificate_store"]);
    $routes->get('certificate-delete/(:num)', 'Admin\StudentController::certificateDelete/$1', ["as" => "certificate_delete"]);


    $routes->get('session', 'Admin\AcademicController::index', ["as" => "session"]);
    $routes->post('session', 'Admin\AcademicController::SaveSession', ["as" => "sessionSave"]);
    $routes->post('session-delete', 'Admin\AcademicController::sessionDelete', ["as" => "sessionDelete"]);
    $routes->get('session-student/(:num)', 'Admin\AcademicController::editsession/$1', ["as" => "editsession"]);
    $routes->post('session-status', 'Admin\AcademicController::sessionStatus', ["as" => "sessionstatus"]);


    $routes->get('batch', 'Admin\AcademicController::batch', ["as" => "batch"]);
    $routes->post('batch', 'Admin\AcademicController::savebatch', ["as" => "save_batch"]);
    $routes->get('add-batch', 'Admin\AcademicController::Addbatch', ["as" => "add_batch"]);
    $routes->get('edit-batch', 'Admin\AcademicController::editBatch', ["as" => "editBatch"]);
    $routes->post('batch-delete', 'Admin\AcademicController::BatchDelete', ["as" => "batchDelete"]);
    $routes->post('batch-status', 'Admin\AcademicController::BatchStatus', ["as" => "batchStatus"]);

    $routes->get('user-list', 'Admin\AdminAuth::Userlist', ["as" => "Userlist"]);


    $routes->get('live-class', 'Admin\LiveclassController::index', ["as" => "live_class"]);
    $routes->get('get-class', 'Admin\LiveclassController::getClass', ["as" => "get_class"]);
    $routes->get('edit-class', 'Admin\LiveclassController::editClass', ["as" => "edit_class"]);
    $routes->get('delete-class', 'Admin\LiveclassController::liveClassDelete', ["as" => "delete_class"]);
    $routes->get('live-class-create', 'Admin\LiveclassController::addClass', ["as" => "live_class_create"]);
    $routes->post('live-class-create', 'Admin\LiveclassController::saveLiveclass', ["as" => "save_live_class"]);

    $routes->get('web-setting', 'Admin\AdminDashboard::webSeting', ["as" => "web_setting"]);
    $routes->post('web-setting1', 'Admin\AdminDashboard::updateSetting', ["as" => "web_setting1"]);
    $routes->post('web-setting2', 'Admin\AdminDashboard::updateSetting2', ["as" => "web_setting2"]);

    $routes->get('add-blog', 'Admin\BlogsController::index', ["as" => "add_blog"]);
    $routes->post('add-blog-action', 'Admin\BlogsController::blogAction', ["as" => "blogAction"]);
    $routes->get('view-blog', 'Admin\BlogsController::viewBlog', ["as" => "view_blog"]);
    $routes->get('edit-blog/(:num)', 'Admin\BlogsController::editBlog/$1', ["as" => "edit_blog"]);
    $routes->post('update-blog', 'Admin\BlogsController::updateBlog', ["as" => "update_Blog"]);
    $routes->get('blog-delete/(:num)', 'Admin\BlogsController::blogDelete/$1', ['as' => 'blog_Delete']);


    $routes->get('add-about', 'Admin\AboutController::index', ["as" => "add_about"]);
    $routes->post('add-about-action', 'Admin\AboutController::aboutAction', ["as" => "aboutAction"]);
    $routes->get('view-about', 'Admin\AboutController::viewAbout', ["as" => "view_about"]);
    $routes->get('edit-about/(:num)', 'Admin\AboutController::editAbout/$1', ["as" => "edit_about"]);
    $routes->post('update-about', 'Admin\AboutController::updateAbout', ["as" => "update_About"]);
    $routes->post('pages/Delete', 'Admin\AboutController::aboutDelete', ["as" => "aboutDelete"]);
});
$routes->get('download-Student/(:num)', 'Admin\StudentController::downloadStudent/$1', ["as" => "downloadStudent"]);
$routes->get('download-Franchise/(:num)', 'Admin\FranchiseController::downloadFranchise/$1', ["as" => "downloadFranchise"]);


// User Routes

$routes->get('user/logout', 'Admin\UserauthController::logout', ["as" => "user_logout"]);
$routes->post('user/login-action', 'Admin\UserauthController::login_action', ["as" => "user_login"]);
$routes->group("user", ["filter" => "isUser"], function ($routes) {
    $routes->get('/', 'Admin\UserController::index', ["as" => "user_dashboard"]);
    $routes->post('passchangeadmin', 'Admin\UserController::PassChange');
    $routes->get('student-details', 'Admin\UserController::studentDetails', ["as" => "student_details"]);
    $routes->get('syllabus', 'Admin\UserController::Syllabus', ["as" => "syllabus"]);
});

$routes->post('enquiry/submit', 'EnquiryController::submit');

$routes->get('admission', 'Admission::index');
$routes->post('admission-save', 'Admission::save');

// E- Student Registration
$routes->post('/student-save', 'Admission::student_save', ['as' => 'student_save']);


$route['chatbot'] = 'chatbot/index';
$route['chatbot/send_message'] = 'chatbot/send_message';


