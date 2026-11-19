<!-- START HEADER -->
<?= $this->include("web/inc/header.php"); ?>
<!-- END HEADER -->

<!-- START SECTION FEATURE -->

<div class="container mt-5 mb-5 p-2" style="background-color: #eaeaea;">
    <div class="row">
        <!-- Sidebar Section -->
        <div class="col-md-12">
            <div class="wrapper border p-2 d-flex justify-content-between align-items-center bg-white">
                <h4 class="m-0">Welcome <?= $data['name'] ?></h4>
                <a href="<?= url_to("user_logout") ?>" class="btn btn-danger">Logout</a>
            </div>
        </div>

        <!-- Other Details start -->
        <div class="col-md-8 mt-4">
            <div class="wrapper">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="card p-3 text-center">
                            <a href="<?= url_to('student_details') ?>">
                                <i class="fas fa-graduation-cap fa-3x text-danger"></i>
                                <h5 class="mt-2">Student Details </h5>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="card p-3 text-center">
                            <a href="<?= url_to('idcard_user', $data['id']) ?>" target="_blank">
                                <i class="fas fa-id-card-alt fa-3x text-danger"></i>
                                <h5 class="mt-2">Identity Card</h5>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="card p-3 text-center">
                            <a href="<?= url_to('syllabus') ?>">
                                <i class="fas fa-chalkboard-teacher fa-3x text-success"></i>
                                <h5 class="mt-2">Syllabus</h5>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="card p-3 text-center">
                            <a href="<?= url_to('download_certificate') ?>">
                                <i class="fas fa-certificate fa-3x text-warning"></i>
                                <h5 class="mt-2">Result</h5>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-4">
            <div class="wrapper border bg-light">
                <h4 class="text-center bg-danger text-white p-2">Account Overview</h4>
                <div class="d-flex justify-content-center">
                    <img src="<?= site_url('public/' . $data['photo']) ?>"
                        alt="Profile Picture"
                        class="rounded-circle img-fluid"
                        style="width: 150px; height: 150px; object-fit: cover;">
                </div>
                <h4 class="text-center mt-3"> <?= esc($data['name']); ?></h4>
                <p class="text-center"> <?= esc($course_name); ?></p>
            </div>
        </div>
        <!-- Other Details End -->
    </div>
</div>

<!-- END SECTION FEATURE -->



<!-- START FOOTER -->
<?= $this->include("web/inc/footer.php"); ?>
<!-- END FOOTER -->