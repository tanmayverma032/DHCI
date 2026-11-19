<!-- START HEADER -->
<?= $this->include("web/inc/header.php"); ?>
<!-- END HEADER -->


<style>
    .card-custom {
        border: 1px solid #ddd;
        padding: 20px;
        background-color: #fff;
    }

    .header {
        background-color: #f7d774;
        padding: 10px;
        text-align: center;
        font-weight: bold;
        font-size: 20px;
    }

    .table-custom td {
        padding: 8px;
        border-bottom: 1px dashed #ccc;
    }

    .photo {
        width: 120px;
        height: 140px;
        border: 1px solid #ddd;
        object-fit: cover;
    }
</style>




<div class="container mt-5 mb-5 p-2" style="background-color: #eaeaea;">
    <div class="row">
        <div class="col-md-12">
            <div class="wrapper border p-2 d-flex justify-content-between align-items-center bg-white">
                <h4 class="m-0">Student Details - <?= $data['name'] ?></h4>
                <a href="<?= url_to("user_logout") ?>" class="btn btn-danger">Logout</a>
            </div>
        </div>

        <div class="col-md-3 mt-4">
            <div class="wrapper border bg-light text-start p-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link btn-info " aria-current="page" href="#"> Related Links </a>
                    </li>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2 active" href="<?= url_to('student_details') ?>">
                                <i class="fas fa-user-graduate fa-lg text-primary mx-2"></i>
                                <span>Student Details</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="<?= url_to('idcard_user', $data['id']) ?>" target="_blank">
                                <i class="fas fa-id-card fa-lg text-danger mx-2"></i>
                                <span>Identity Card</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="<?= url_to('syllabus') ?>">
                                <i class="fas fa-book fa-lg text-success mx-2"></i>
                                <span>Syllabus</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="<?= url_to('download_certificate') ?>">
                                <i class="fas fa-poll fa-lg text-warning mx-2"></i>
                                <span>Result</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="<?= url_to('user_dashboard') ?>">
                                <i class="fas fa-tachometer-alt fa-lg text-info mx-2"></i>
                                <span>Go to Dashboard</span>
                            </a>
                        </li>
                    </ul>

                </ul>
            </div>
        </div>

        <div class="col-md-9 mt-4">
            <div class="card card-custom">
                <!-- Header -->
                <div class="header text-dark"><?= esc($course_name); ?></div>

                <!-- Student Details -->
                <div class="row mt-3">
                    <div class="col-md-9">
                        <table class="table table-borderless table-custom">
                            <tbody>
                                <tr>
                                    <td><strong>Form No. :</strong> <?= $data['id'] ?></td>
                                    <td><strong>Registration No. :</strong> <?= $data['rag_no'] ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Admission Year :</strong> 1st Year</td>
                                   <td><strong>Session :</strong> <?= esc($session_name) ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Name (Mr./Ms.) :</strong> <?= $data['name'] ?> </td>
                                    <td><strong>Father's Name (Mr.) :</strong> <?= $data['father_name'] ?> </td>
                                </tr>
                                <tr>
                                    <td><strong>Date of Birth :</strong> <?= $data['dob'] ?> </td>
                                    <td><strong>Gender :</strong> <?= $data['gender'] ?> </td>
                                </tr>
                                <tr>
                                    <td><strong>Category :</strong> <?= $data['category'] ?> </td>
                                    <td><strong>Nationality :</strong> Indian</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Profile Image -->
                    <div class="col-md-3 text-center">
                        <div class="d-flex justify-content-center">
                            <img src="<?= site_url('public/' . $data['photo']) ?>"
                                alt="Profile Picture"
                                class="rounded-circle img-fluid"
                                style="width: 150px; height: 150px; object-fit: cover;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- START FOOTER -->
<?= $this->include("web/inc/footer.php"); ?>
<!-- END FOOTER -->