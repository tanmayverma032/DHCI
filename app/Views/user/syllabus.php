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

        .accordion-header {
            background-color: #ffc107;
            color: #000;
            font-weight: bold;
            padding: 12px;
            border-radius: 5px;
            cursor: pointer;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
        }

        .table-custom {
            background-color: #fff3cd;
            border-radius: 5px;
            overflow: hidden;
        }

        .table-custom th,
        .table-custom td {
            padding: 12px;
            text-align: left;
            border: 1px solid #dee2e6;
        }

        .accordion-header {
            background-color: #C82333 !important;
            color: white !important;
            font-weight: bold;
            border-radius: 5px;
            padding: 12px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .accordion-header i {
            transition: transform 0.3s ease-in-out;
        }

        .collapsed .accordion-header i {
            transform: rotate(180deg);
        }
    </style>





    <div class="container mt-5 mb-5 p-2" style="background-color: #eaeaea;">
        <div class="row">
            <div class="col-md-12">
                <div class="wrapper border p-2 d-flex justify-content-between align-items-center bg-white">
                    <h4 class="m-0">Welcome of <?= $data['name'] ?></h4>
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
                                <a class="nav-link d-flex align-items-center gap-2" href="#">
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
                        <div class="col-md-12">
                            <table class="table table-borderless table-custom">
                                <tbody>
                                    <tr>
                                        <td><strong>Student ID :</strong> <?= $data['id'] ?></td>
                                        <td><strong> Session :</strong> <?= $data['session_id'] ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong> Student Name :</strong> <?= $data['name'] ?> </td>
                                        <td><strong> Father Name :</strong> <?= $data['father_name'] ?> </td>
                                    </tr>
                                       <tr>
                                        <td><strong> Programs :</strong> 1st Year</td>
                                        <td><strong> Gender :</strong> <?= $data['gender'] ?> </td>
                                    </tr>
                                    <tr>
                                        <td><strong>DOB :</strong> <?= $data['dob'] ?> </td>
                                        
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>



                <!-- <div class="accordion" id="semesterAccordion">
                    <?php if (!empty($semesterData)) : ?>
                        <?php foreach ($semesterData as $semester => $subjects) : ?>
                            <div class="card mt-2">
                            <div class="card-header accordion-header p-3" data-toggle="collapse" data-target="#semester<?= $semester ?>">
                                    <?= $semester ?> Semester
                            </div>

                                <div id="semester<?= $semester ?>" class="collapse <?= $semester == 1 ? 'show' : '' ?>" data-parent="#semesterAccordion">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-custom">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Sub. Code</th>
                                                        <th>Subject Name</th>
                                                        <th>Study Material</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($subjects as $subject) : ?>
                                                        <tr>
                                                            <td><?= $subject['code'] ?></td>
                                                            <td><?= $subject['name'] ?></td>
                                                            <td>
                                                                <?php if (!empty($subject['filepdf'])) : ?>
                                                                    <a href="<?= site_url('uploads/studymaterials/' . $subject['filepdf']) ?>" target="_blank" class="btn btn-sm btn-primary">PDF</a>
                                                                <?php else : ?>
                                                                    <span class="text-muted">No File</span>
                                                                <?php endif; ?>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <p>No study materials available.</p>
                    <?php endif; ?>
                </div> -->




                <div class="accordion" id="semesterAccordion">
                    <?php if (!empty($semesterData)) : ?>
                        <?php foreach ($semesterData as $semester => $subjects) : ?>
                            <div class="card mt-3 border-0 rounded-3 shadow-sm">
                                <div class="accordion-header d-flex justify-content-between"
                                    data-toggle="collapse" data-target="#semester<?= $semester ?>">
                                    <span><?= $semester ?> Semester</span>
                                    <i class="fas fa-chevron-down"></i>
                                </div>

                                <div id="semester<?= $semester ?>" class="collapse <?= $semester == 1 ? 'show' : '' ?>" data-parent="#semesterAccordion">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Sub. Code</th>
                                                        <th>Subject Name</th>
                                                        <th>Study Material</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($subjects as $subject) : ?>
                                                        <tr>
                                                            <td><?= $subject['code'] ?></td>
                                                            <td><?= $subject['name'] ?></td>
                                                            <td>
                                                                <?php if (!empty($subject['filepdf'])) : ?>
                                                                    <a href="<?= site_url('uploads/studymaterials/' . $subject['filepdf']) ?>"
                                                                        target="_blank" class="btn btn-sm btn-outline-danger">
                                                                        <i class="fas fa-file-pdf"></i> View PDF
                                                                    </a>
                                                                <?php else : ?>
                                                                    <span class="text-muted">No File</span>
                                                                <?php endif; ?>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <p class="text-center text-muted mt-3">No study materials available.</p>
                    <?php endif; ?>
                </div>


            </div>
        </div>
    </div>

    <!-- START FOOTER -->
    <?= $this->include("web/inc/footer.php"); ?>
    <!-- END FOOTER -->