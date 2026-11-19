<?= $this->extend('admin/app/app') ?>
<?= $this->section('content') ?>

<div class="content-body">
    <div class="container-fluid">

        <!-- Breadcrumb -->
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    <a href="javascript:void(0)">Testimonials</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="javascript:void(0)">Add Testimonial</a>
                </li>
            </ol>
        </div>

        <!-- Form -->
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <h4 class="card-title">Add Testimonial</h4>
                        <div>
                            <a href="<?= site_url(route_to('view_testimonial')) ?>" 
                               class="btn btn-primary me-3 btn-sm">
                               <i class="fas fa-eye me-2"></i>See All Testimonials
                            </a>
                        </div>
                    </div>

                    <?= form_open_multipart(site_url(route_to('testimonialAction')), [
                        "class" => "form-valide-with-icon needs-validation",
                        "novalidate" => ""
                    ]) ?>

                    <div class="card-body">
                        <div class="row">

                            <!-- Name -->
                            <div class="col-xl-6 col-md-6 mb-4">
                                <label class="form-label font-w600">
                                    Student Name <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="name" class="form-control solid"
                                    placeholder="Enter Name" required>
                            </div>

                            <!-- Role -->
                            <div class="col-xl-6 col-md-6 mb-4">
                                <label class="form-label font-w600">
                                    Role <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="role" class="form-control solid"
                                    placeholder="Student / Intern / etc" required>
                            </div>

                            <!-- Image -->
                            <div class="col-xl-12 mb-4">
                                <label class="form-label font-w600">
                                    Image <span class="text-danger">*</span>
                                </label>
                                <input class="form-control dropify" name="image" type="file">
                            </div>

                            <!-- Message -->
                            <div class="col-xl-12 mb-4">
                                <label class="form-label font-w600">
                                    Testimonial Message <span class="text-danger">*</span>
                                </label>
                                <textarea name="message" rows="5" class="form-control solid"
                                    placeholder="Enter testimonial message..." required></textarea>
                            </div>

                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="card-footer text-end">
                        <input type="reset" class="btn btn-danger light me-3" value="Reset">
                        <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                    </div>

                    <?= form_close() ?>

                </div>
            </div>
        </div>

    </div>
</div>

<?= $this->endSection() ?>