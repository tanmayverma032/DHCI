<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Admission Successful' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-success text-white text-center">
                        <h3>Admission Successful!</h3>
                    </div>
                    <div class="card-body text-center">
                        <div class="mb-4">
                            <i class="fas fa-check-circle text-success" style="font-size: 64px;"></i>
                        </div>
                        <h4>Student admission has been completed successfully.</h4>
                        
                        <?php if (isset($student_data) && !empty($student_data)): ?>
                            <div class="mt-4 text-start">
                                <h5>Student Details:</h5>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <th>Student ID</th>
                                                <td><?= $student_data['student_id'] ?? 'N/A' ?></td>
                                            </tr>
                                            <tr>
                                                <th>Unique ID</th>
                                                <td><?= $student_data['unique_id'] ?? 'N/A' ?></td>
                                            </tr>
                                            <tr>
                                                <th>University ID</th>
                                                <td><?= $student_data['university_id'] ?? 'N/A' ?></td>
                                            </tr>
                                            <tr>
                                                <th>Course ID</th>
                                                <td><?= $student_data['course_id'] ?? 'N/A' ?></td>
                                            </tr>
                                            <tr>
                                                <th>Sub Course ID</th>
                                                <td><?= $student_data['sub_course_id'] ?? 'N/A' ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php endif; ?>
                        
                        <div class="mt-4">
                            <a href="<?= base_url('admission') ?>" class="btn btn-primary">Add Another Student</a>
                            <button onclick="window.print()" class="btn btn-secondary">Print Details</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>