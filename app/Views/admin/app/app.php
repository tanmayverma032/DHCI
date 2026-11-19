<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="CodeWins Technologies">
    <meta name="csrf-token" content="<?= csrf_hash() ?>">

    <!-- Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- PAGE TITLE HERE -->
    <title> <?= $title ?? "" . " - " . site_setting('site_title') ?> </title>
    <!-- Favicon icon -->
    <link rel="shortcut icon" type="image/png" href="<?= site_url('public/') . site_setting('site_fav') ?>">
    <link href="<?= site_url('public/admin/') ?>vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">

    <!-- Style css -->
    <link href="<?= site_url('public/admin/') ?>css/style.css" rel="stylesheet">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?= site_url('public/admin/') ?>vendor/toastr/css/toastr.min.css">
    <!-- Datatable -->
    <link href="<?= site_url('public/admin/') ?>vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="<?= site_url('public/admin/') ?>vendor/bootstrap-datepicker-master/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="<?= site_url('public/admin/') ?>vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" />

    <?= $this->renderSection('css') ?>


</head>

<body>

    <!--******************* Preloader start********************-->
    <div id="preloader">
        <div class="lds-ripple">
            <div></div>
            <div></div>
        </div>
    </div>
    <!--******************* Preloader end ********************-->

    <!--********************************** Main wrapper start ***********************************-->
    <div id="main-wrapper">

        <!--**********************************  Nav header start  *******************************-->
        <?= $this->include('admin/partial/nav') ?>
        <!--********************************** Nav header end ***********************************-->

        <!--********************************** Header start *************************************-->
        <?= $this->include('admin/partial/header') ?>
        <!--***************************  Header end ti-comment-alt ******************************-->

        <!--********************************** Sidebar start ************************************-->
        <?= $this->include('admin/partial/sidebar') ?>
        <!--********************************** Sidebar end **************************************-->

        <!--********************************** Content body start *******************************-->
        <?= $this->renderSection('content') ?>
        <!--**********************************  Content body end ********************************-->



        <!--********************************** Footer start *************************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © <?= site_setting('site_name') ?> &amp; Developed by <a href="https://hoverbusinessservices.com/" target="_blank">Hover Business Services LLP</a> <?= date('Y') ?>
                </p>
            </div>
        </div>
        <!--********************************** Footer end **************************************-->

    </div>
    <!--**********************************  Main wrapper end ***********************************-->



    <!--*************************************** Scripts ****************************************-->

    
    <!-- Required vendors -->
    <script src="<?= site_url('public/admin/') ?>vendor/global/global.min.js"></script>
    <script src="<?= site_url('public/admin/') ?>vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <!-- Apex Chart -->
    <script src="<?= site_url('public/admin/') ?>vendor/apexchart/apexchart.js"></script>
    <script src="<?= site_url('public/admin/') ?>vendor/chartjs/chart.bundle.min.js"></script>
    <!-- Chart piety plugin files -->
    <script src="<?= site_url('public/admin/') ?>vendor/peity/jquery.peity.min.js"></script>

    <!-- Dashboard  -->
    <script src="<?= site_url('public/admin/') ?>js/dashboard/statistics-page.js"></script>
    <script src="<?= site_url('public/admin/') ?>js/custom.min.js"></script>
    <script src="<?= site_url('public/admin/') ?>js/dlabnav-init.js"></script>
    <script src="<?= site_url('public/admin/') ?>js/demo.js"></script>
    <script src="<?= site_url('public/admin/') ?>js/styleSwitcher.js"></script>
    <script src="<?= site_url('public/admin/') ?>vendor/toastr/js/toastr.min.js"></script>
    <!-- Datatable -->
    <script src="<?= site_url('public/admin/') ?>vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?= site_url('public/admin/') ?>js/plugins-init/datatables.init.js"></script>
    <script src="<?= site_url('public/admin/') ?>vendor/bootstrap-datepicker-master/js/bootstrap-datepicker.min.js"></script>
    <script src="<?= site_url('public/admin/') ?>vendor/ckeditor/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?= $this->include('admin/pages/toaste-message') ?>

    <script src="<?= site_url('public/admin/') ?>js/coustom.js"></script>

    
    <?= $this->renderSection('js') ?>
    
    <!--*************************************** End Scripts ****************************************-->

</body>

</html>