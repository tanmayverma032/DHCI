<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="Codewins Technologies" name="author">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Welcome to DHCI India">
    <meta name="keywords" content="Welcome to DHCI India">

    <meta name="google-site-verification" content="G7vVTZoRYoLoYlzqADRFpH0NXyi3qoCSdKRyIvgcZic">

    <!-- SITE TITLE -->
    <title><?= ($pagetitle ?? site_setting('site_title')) ?></title>
    <!-- Favicon Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= site_url('public/') . site_setting('site_fav') ?>">
    
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-NP6LWDMX');</script>
    <!-- End Google Tag Manager -->
    
    <!-- Animation CSS -->
    <link rel="stylesheet" href="<?= base_url('public') ?>/assets/css/animate.css">
    <!-- Latest Bootstrap min CSS -->
    <link rel="stylesheet" href="<?= base_url('public') ?>/assets/bootstrap/css/bootstrap.min.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="<?= base_url('public') ?>/assets/css/ionicons.min.css">
    <link rel="stylesheet" href="<?= base_url('public') ?>/assets/css/themify-icons.css">
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="<?= base_url('public') ?>/assets/css/all.min.css">
    <!--- owl carousel CSS-->
    <link rel="stylesheet" href="<?= base_url('public') ?>/assets/owlcarousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url('public') ?>/assets/owlcarousel/css/owl.theme.css">
    <link rel="stylesheet" href="<?= base_url('public') ?>/assets/owlcarousel/css/owl.theme.default.min.css">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="<?= base_url('public') ?>/assets/css/magnific-popup.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="<?= base_url('public') ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url('public') ?>/assets/css/responsive.css">
    <link rel="stylesheet" id="layoutstyle" href="<?= base_url('public') ?>/assets/color/theme.css">'
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- <link href="<?= base_url() ?>/public/admin/vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">-->
    <script>
        var sc_project = 11981757;
        var sc_invisible = 1;
        var sc_security = "35d2687e";
        var sc_https = 1;
    </script>
    <!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '844764798094546');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=844764798094546&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->
    <script src="<?= base_url('public') ?>/assets/js/counter.js" async=""></script>
    <style>
        .dropdown-menu ul li:hover {
            padding-left: 10px;
        }
    
   .spinner {
    width: 50px;
    height: 50px;
    border: 5px solid #f3f3f3;
    border-top: 5px solid #36D8B8;
    border-radius: 50%;
    animation: spin 0.5s linear infinite; /* Faster rotation */
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
@media (min-width: 1200px) {
    .container {
        max-width: 1297px;
    }
}

    

    </style>

 <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        
       
    </style>

</head>

<body>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NP6LWDMX"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

    <div class="alertbox">
        <div class="bg_danger" role="alert">
            <div class="container">
                <div class="row">
                   <div class="col-md-9">
                            <?php if (!session()->has('user_id')) { ?>
                                
                                <div class="dropdown">
                                    <a class="text-white dropdown-toggle"
                                       href="#"
                                       id="dropdownMenuLink"
                                       role="button"
                                       data-toggle="dropdown"
                                       aria-haspopup="true"
                                       aria-expanded="false">
                                        Login Link
                                    </a>
                        
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" id="loginsection">
                                        
                                        <a class="dropdown-item" href="<?= base_url('admin') ?>">
                                            Admin Login
                                        </a>
                        
                                        <a class="dropdown-item"
                                           href="javascript:void(0);"
                                           data-toggle="modal"
                                           data-target="#Login">
                                            Student Login
                                        </a>
                        
                                    </div>
                                </div>
                        
                            <?php } ?>
                        </div>
                            <!-- Required JS -->
                            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                            
                            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
                            
                            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                    <div class="col-md-3 d-flex justify-content-end align-items-center">

                            <ul class="top-social-icons mb-0 mr-3">
                                <li>
                                    <a href="https://www.facebook.com/profile.php?id=61575841832951" target="_blank">
                                        <i class="ion-social-facebook"></i>
                                    </a>
                                </li>
                        
                                <li>
                                    <a href="https://www.instagram.com/dhci.delhihealthcareinstitute/" target="_blank">
                                        <i class="ion-social-instagram-outline"></i>
                                    </a>
                                </li>
                        
                                <li>
                                    <a href="https://www.youtube.com/channel/UCJWDFZ4kfJB4UujhLT_wBHA" target="_blank">
                                        <i class="ion-social-youtube-outline"></i>
                                    </a>
                                </li>
                        
                                <li>
                                    <a href="https://www.linkedin.com/company/delhi-healthcare-institute" target="_blank">
                                        <i class="ion-social-linkedin"></i>
                                    </a>
                                </li>
                            </ul>
                        
                            <span><?= date('d-M-Y') ?></span>
                            <span class="mx-2">|</span>
                            <span id="clock12"></span>
                        
                        </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade lr_popup" id="Login" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content border-0">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <div class="row no-gutters">
                        <div class="col-lg-5">
                            <div class="h-100 background_bg radius_ltlb_5" data-img-src="<?= base_url('public') ?>/assets/images/login_img.jpg"></div>
                        </div>
                        <div class="col-lg-7">
                            <div class="padding_eight_all">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="login-tab1" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">Login</a>
                                    </li>

                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active p-5" id="login" role="tabpanel">
                                        <div class="heading_s1 mb-3">
                                            <h4>Login</h4>
                                        </div>
                                        <form action="<?= url_to('user_login') ?>" class="login" method="post">

                                            <?= csrf_field() ?>
                                            <div class="form-group">
                                                <input type="text" required="" class="form-control" name="enrollment" placeholder="Enrollment Number">
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" required="" type="password" name="password" placeholder="Password">
                                            </div>
                                            <div class="login_footer form-group">
                                                <a href="#">Lost your password?</a>
                                                <div class="chek-form mb-3">
                                                    <div class="custome-checkbox">
                                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox3" value="">
                                                        <label class="form-check-label" for="exampleCheckbox3">Remember
                                                            me</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-default btn-block" name="login">Log
                                                    in</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<style>
    
    
</style>

    <!-- START HEADER -->
    <header class="header_wrap dark_skin">
        <div class="top-header light_skin top-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <ul class="contact_detail list_none text-center text-md-left">
                            <li><a href="tel:<?= site_setting('number') ?>"><i class="ti-mobile"></i>+91 <?= site_setting('number') ?></a></li>
                            <li><a href="mailto:<?= site_setting('email') ?>"><i class="ti-email"></i><?= site_setting('email') ?></a></li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex flex-wrap align-items-center justify-content-md-end justify-content-center mt-2 mt-md-0">
                           
                            <ul class="list_none header_list border_list ml-1">
                                
                                <li><a href="javascript:void(0);" class="btn btn-default btn-sm" data-toggle="modal" data-target="#studyOnlineModal"> Study Online </a></li>
                                <li><a href="javascript:void(0);" class="btn btn-default btn-sm" data-toggle="modal" data-target="#onlinePayment">Make Payment</a></li>
                                <li><a href="javascript:void(0);" class="btn  btn-sm" data-toggle="modal" data-target="#studyOnlineModal1" style="background-color:#0389c6;"> Enquiry Now  </a></li>
                               <li>
                              <a href="<?= route_to('apply_jobs'); ?>" class="btn   btn-sm" style="background-color:#0389c6;">
                                     Apply For Jobs
                            </a>
                            </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
       <!--pop-up model-->
        
        <div class="modal fade" id="studyOnlineModal1" tabindex="-1" role="dialog" aria-labelledby="studyOnlineModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content" style="background-color:#519e9b; padding:20px;">
              <div class="modal-header">
                <h5 class="modal-title text-white" id="studyOnlineModalLabel">Enquiry Form</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close" style="opacity:1;">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <div class="modal-body">
                <form method="post" action="<?= base_url('enquiry/submit') ?>" id="enquiryForm" class="pt-md-2 form_transparent">
                  <?= csrf_field() ?>
                  <div class="row">
                    <div class="form-group col-sm-12">
                      <input required placeholder="Enter Name *" class="form-control" name="/name" type="text">
                    </div>
                    <div class="form-group col-sm-12">
                      <input required placeholder="Enter Email *" class="form-control" name="/email" type="email">
                    </div>
                    <div class="form-group col-sm-12">
                      <input required placeholder="Enter Phone No *" class="form-control" name="/phone" type="tel">
                    </div>
                    <div class="form-group col-sm-12">
                      <select class="form-control" name="/course" required>
                        <option value="">Select Course</option>
                        <option value="Nursing Courses">Nursing Courses</option>
                        <option value="B-Voc">B-Voc</option>
                        <option value="M-Voc">M-Voc</option>
                         <option value="OT">OT</option>
                          <option value="Brit">BRIT</option>
                           <option value="x-ray">X-RAY</option>
                            <option value="Dmlt">DMLT</option>
                             <option value="Bmlt">BMLT</option>
                              <option value="Dialysis Technology">Dialysis Technology</option>
                         <option value="GNM">GNM</option>
                      </select>
                    </div>
                    <div class="form-group col-sm-12">
                      <textarea required placeholder="Message *" class="form-control" name="/message" rows="4"></textarea>
                    </div>
                    <div class="col-md-12">
                      <button type="submit" title="Submit Your Message!" class="btn btn-block">Register Now</button>
                    </div>
                  </div>
                </form>
        
                <div id="alert-msg" class="mt-3"></div>
        
                <!-- Flash Messages -->
                <?php if (session()->getFlashdata('errors')) : ?>
                  <div class="alert alert-danger mt-3">
                    <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                      <p><?= esc($error) ?></p>
                    <?php endforeach; ?>
                  </div>
                <?php endif; ?>
        
                <?php if (session()->getFlashdata('success')) : ?>
                  <div class="alert alert-success mt-3">
                    <?= session()->getFlashdata('success') ?>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>


        <div class="modal fade lr_popup" id="onlinePayment" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content border-0">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <div class="row no-gutters">
                            <div class="col-lg-5 p-3 text-center">
                                <img src="<?= site_url('public/assets/newqrcode.png') ?>" alt="QRcode" class="w-75">
                                <!-- <div class="h-100 background_bg radius_ltlb_5" data-img-src="https://media.istockphoto.com/id/1347277582/vector/qr-code-sample-for-smartphone-scanning-on-white-background.jpg?s=612x612&w=0&k=20&c=6e6Xqb1Wne79bJsWpyyNuWfkrUgNhXR4_UYj3i_poc0="></div> -->
                                <p class="text-center">To Pay, Scan QR Code</p>
                            </div>
                            <div class="col-lg-7">
                                <div class="padding_eight_all">

                                    <div class="tab-content">
                                        <div class="tab-pane fade show active p-2" id="login" role="tabpanel">
                                            <div class="heading_s1 mb-3">
                                                <h4>Account Details</h4>
                                            </div>
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td>Bank Name :</td>
                                                        <td>ICICI BANK </td>
                                                    </tr>
                                                    <tr>
                                                        <td>ACCOUNT HOLDER : </td>
                                                        <td>M/S. DHCI</td>
                                                    </tr>
                                                    <tr>
                                                        <td>IFSC Code :</td>
                                                        <td>ICIC0000288</td>
                                                    </tr>
                                                    <tr>
                                                        <td>ACC NO :</td>
                                                        <td> 028805006942 </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid px-5">
           <nav class="navbar navbar-expand-lg justify-content-between">
                <a class="navbar-brand" href="<?= base_url() ?>">
                    <img class="logo_light" src="<?= site_url('public/') . site_setting('site_logo') ?>" alt="logo" width="80px">
                    <img class="logo_dark" src="<?= site_url('public/') . site_setting('site_logo') ?>" alt="logo" width="80px">
                    <img class="logo_default" src="<?= site_url('public/') . site_setting('site_logo') ?>" alt="logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="ion-android-menu"></span> </button>
                <div class="collapse navbar-collapse align-items-center justify-content-between" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="dropdown">
                            <a class="nav-link active" href="<?= base_url() ?>">Home</a>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle nav-link" href="javascript:void(0);" data-toggle="dropdown">About us</a>
                            <div class="dropdown-menu">
                                <ul>
                                    <li><a class="dropdown-item nav-link nav_item" href="<?= base_url('about_us') ?>">
                                            About Us</a></li>
                                    <li><a class="dropdown-item nav-link nav_item" href="<?= base_url('message') ?>">Chairman's Message</a></li>
                                    <li><a class="dropdown-item nav-link nav_item" href="<?= base_url('our_facilities') ?>">Our Facilities</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle nav-link" href="javascript:void(0);" data-toggle="dropdown">Our Courses</a>
                            <div class="dropdown-menu">
                                <ul>
                                    <?php
                                   $query = db_connect()->query('SELECT * FROM `programs` WHERE status = 1')->getResult();

                                    foreach ($query as $row) {
                                        echo  "<li><a class='dropdown-item nav-link nav_item' href='" . site_url('courses/' . $row->slug) . "'>--
                                            " . $row->title . "</a></li>";
                                    }
                                    ?>

                                </ul>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle nav-link" href="javascript:void(0);" data-toggle="dropdown">Student Zone</a>
                            <div class="dropdown-menu">
                                <ul>
                                    <li><a class="dropdown-item nav-link nav_item" href="<?= base_url('student_ragistration') ?>">Online Registration</a></li>
                                    <li><a class="dropdown-item nav-link nav_item" href="javascript:void(0);" data-toggle="modal" data-target="#Login">Student Login</a></li>
                                      <li><a class="dropdown-item nav-link nav_item" href="<?= url_to('download_certificate') ?>">Download Certificate</a></li> 
                                    <!-- <li><a class="dropdown-item nav-link nav_item" href="<?= url_to('idcard_download') ?>">-- Download ID Card</a></li> -->
                                    <!-- <li><a class="dropdown-item nav-link nav_item" href="<?= base_url('registration_verification') ?>">-- Student Verfication</a>
                                    </li>
                                    <li><a class="dropdown-item nav-link nav_item" href="<?= base_url('registration_verification') ?>">-- Marksheet
                                            Verfication</a></li>
                                    <li><a class="dropdown-item nav-link nav_item" href="<?= base_url('registration_verification') ?>">-- Certificate/Dimlopma
                                            Verfication</a></li> -->

                                </ul>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle nav-link" href="javascript:void(0);" data-toggle="dropdown">Franchise</a>
                            <div class="dropdown-menu">
                                <ul>
                                    <li><a class="dropdown-item nav-link nav_item" href="<?= base_url('franchise') ?>">Franchise Apply</a></li>
                                     <!-- <li><a class="dropdown-item nav-link nav_item" href="<?= base_url('study_centres') ?>">-- Study Center</a></li> -->
                                </ul>
                                <ul>
                                    <li><a class="dropdown-item nav-link nav_item" href="<?= base_url('partner') ?>">Our Partners </a></li>
                                     <!-- <li><a class="dropdown-item nav-link nav_item" href="<?= base_url('study_centres') ?>">-- Study Center</a></li> -->
                                </ul>
                            </div>
                        </li>
                        
                        <li class="dropdown">
                            <a class="dropdown-toggle nav-link" href="javascript:void(0);" data-toggle="dropdown">Language Training</a>
                            <div class="dropdown-menu">
                                <ul>
                                    <li><a class="dropdown-item nav-link nav_item" href="<?= base_url('germany') ?>">Germany Language</a></li>
                                    <!--<li><a class="dropdown-item nav-link nav_item" href="<?= base_url('downlaod-prospective') ?>"> -- Download Prospectus </a></li>-->
                                  
                                </ul>
                            </div>
                        </li>

                        <li class="dropdown">
                            <a class="dropdown-toggle nav-link" href="javascript:void(0);" data-toggle="dropdown">Gallery</a>
                            <div class="dropdown-menu">
                                <ul>
                                    <li><a class="dropdown-item nav-link nav_item" href="<?= base_url('gallery') ?>">
                                            Our Photos</a></li>
                                    <li><a class="dropdown-item nav-link nav_item" href="<?= base_url('videogallery') ?>"> Our Videos</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle nav-link" href="javascript:void(0);" data-toggle="dropdown">Download</a>
                            <div class="dropdown-menu">
                                <ul>
                                    <li><a class="dropdown-item nav-link nav_item" href="<?= base_url('downlaod-admission-form') ?>">Download Admission Form</a></li>
                                    <li><a class="dropdown-item nav-link nav_item" href="<?= base_url('downlaod-prospective') ?>">Download Prospectus </a></li>
                                  
                                </ul>
                            </div>
                        </li>
                       <li><a class="nav-link" href="<?= base_url('e_course') ?>">E-Courses</a></li>
                        <!-- <li><a class="nav-link" href="">Blogs</a></li> -->
                        <li><a class="nav-link" href="<?= base_url('contact') ?>">Contact us</a></li>
                        <?php if (session()->has('user_id')) { ?>
                            <li><a class="nav-link btn btn-default btn-sm p-2 mt-3" href="<?= base_url('user') ?>">Dashboard</a></li>
                        <?php } ?>
                    </ul>
                </div>
            </nav>
        </div>


    </header>
    <!-- END HEADER -->
    
    <style>
        /* ===== TOP BAR ===== */
        
/* TOP BAR SOCIAL ICONS */

.top-social-icons{
    display:flex;
    align-items:center;
    gap:10px;
    list-style:none;
    padding:0;
    margin:0;
}

.top-social-icons li a{
    width:34px;
    height:34px;
    display:flex;
    align-items:center;
    justify-content:center;

    background:#fff;
    border-radius:50%;

    font-size:18px;

    transition:.3s ease;

    box-shadow:0 3px 10px rgba(0,0,0,.08);
}

.top-social-icons li a:hover{
    transform:translateY(-3px);
}

/* Original Brand Colors */

.top-social-icons .ion-social-facebook{
    color:#1877F2;
}

.top-social-icons .ion-social-instagram-outline{
    color:#E4405F;
}

.top-social-icons .ion-social-youtube-outline{
    color:#FF0000;
}

.top-social-icons .ion-social-linkedin{
    color:#0A66C2;
}

/* Mobile */

@media(max-width:768px){
    .top-social-icons{
        display:none;
    }
}        

.alertbox .bg_danger{
    background:#f8f9fb;
    padding:12px 0;
    border-bottom:1px solid #e9edf5;
}

.alertbox .dropdown a,
.alertbox .text-white{
    color:#1b1b1b !important;
    font-size:15px;
    font-weight:500;
}

#clock12{
    color:#0a58ca;
    font-weight:600;
}

/* ===== CONTACT BAR ===== */

.top-header{
    background:linear-gradient(90deg,#012d67,#003f88,#012d67);
    padding:9px 0;
}

.contact_detail li a{
    color:#fff !important;
    font-size:16px;
    font-weight:500;
}

.contact_detail li{
    margin-right:30px;
}

.contact_detail li i{
    margin-right:8px;
}

/* ===== BUTTONS ===== */

.header_list .btn{
    border:none;
    color:#fff !important;
    font-size:15px;
    font-weight:600;
    padding:8px 11px;
    border-radius:5px;
    transition:.3s;
    margin-left:10px;
}

.header_list .btn-default{
    background:linear-gradient(90deg,#28c7b7,#16a4c5);
}

.header_list .btn:hover{
    transform:translateY(-2px);
    box-shadow:0 8px 25px rgba(0,0,0,.15);
}

.header_list li:nth-child(3) .btn,
.header_list li:nth-child(4) .btn{
    background:linear-gradient(90deg,#0077ff,#0052d4) !important;
}

/* ===== SOCIAL ICON ===== */

.social_icons li a{
    width:42px;
    height:42px;
    border:1px solid rgba(255,255,255,.25);
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    color:#fff !important;
    transition:.3s;
}

.social_icons li a:hover{
    background:#fff;
    color:#0052d4 !important;
}

/* ===== MAIN NAVBAR ===== */

.navbar{
    background:#fff;
    padding:0px 0;
}

.navbar-brand img{
    max-height:90px;
    margin-right:90px;

}

.navbar-nav{
    align-items:center;
    gap:10px;
}

.navbar-nav .nav-link{
    color:#0b1830 !important;
    font-size:17px;
    font-weight:600;
    padding:14px 18px !important;
}

/* HOME BUTTON */

.navbar-nav .active{
    background:linear-gradient(90deg,#0a73ff,#0053d6);
    color:#fff !important;
    border-radius:40px;
    padding:14px 30px !important;
    box-shadow:0 10px 25px rgba(0,95,255,.25);
}

/* PROFESSIONAL DROPDOWN */

.dropdown-menu{
    background:#ffffff !important;
    border:none;
    border-radius:14px;
    padding:12px;
    min-width:280px;

    box-shadow:
    0 15px 40px rgba(0,0,0,.12);

    margin-top:10px;
}

.dropdown-menu ul{
    list-style:none;
    padding:0;
    margin:0;
}

.dropdown-item{
    color:#1e293b !important;
    font-size:15px;
    font-weight:500;
    padding:12px 18px !important;
    border-radius:10px;
    transition:all .3s ease;
}

/* Hover Effect */

.dropdown-item:hover{
    background:#f1f5ff !important;
    color:#0d6efd !important;
    padding-left:25px !important;
    transform:translateX(3px);
}

/* Active Item */

.dropdown-item.active,
.dropdown-item:active{
    background:#0d6efd !important;
    color:#fff !important;
}

/* Top Arrow */

.dropdown-menu::before{
    content:'';
    position:absolute;
    top:-7px;
    left:30px;

    width:14px;
    height:14px;

    background:#fff;

    transform:rotate(45deg);
}
    </style>
    

    <!-- <div class="container-flud bg-light text-dark">
        <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();" scrollamount="3">
            An ISO 9001 : 2015 Certified India's Largest Computer Educational Organization Established Under Ministry of Corporate Affairs, Govt. of India, Corporate Identity No.
        </marquee>
    </div> -->

    <!-- Modal -->
    <div class="modal fade" id="studyOnlineModal" tabindex="-1" role="dialog" aria-labelledby="studyOnlineModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="studyOnlineModalLabel">Study Online</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <!-- Zoom Section -->
                    <div class="d-flex align-items-center mb-3">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/7/7b/Zoom_Communications_Logo.svg" alt="Zoom Icon" width="120px" class="mr-2">
                        <a href="https://zoom.us/your-meeting-link" target="_blank" class="btn btn-default btn-sm text-center">Join Zoom Meeting</a>
                    </div>

                    <!-- YouTube Section -->
                    <div class="d-flex align-items-center">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/b/b8/YouTube_Logo_2017.svg" alt="YouTube Icon" width="120px" class="mr-2">
                        <a href="https://www.youtube.com/channel/UCJWDFZ4kfJB4UujhLT_wBHA" target="_blank" class="btn btn-default btn-sm text-center">Watch on YouTube</a>
                    </div>
                </div>

            </div>
        </div>
    </div>