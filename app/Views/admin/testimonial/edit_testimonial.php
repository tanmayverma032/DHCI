<?= $this->extend('admin/app/app') ?>
<?= $this->section('content') ?>

<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="<?= site_url('admin/testimonial') ?>">Testimonials</a>
                </li>
                <li class="breadcrumb-item active">
                    <a href="javascript:void(0)">Edit Testimonial</a>
                </li>
            </ol>
        </div>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('error') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Testimonial</h4>
                <div>
                    <a href="<?= site_url('admin/testimonial') ?>" class="btn btn-primary me-3 btn-sm">
                        <i class="fas fa-eye me-2"></i>See All Testimonials
                    </a>
                </div>
            </div>

            <?= form_open_multipart(site_url('admin/testimonial/update/' . $testimonial->id)) ?>

            <div class="card-body">
                <div class="row">

                    <div class="col-xl-6 col-md-6 mb-4">
                        <label class="form-label font-w600">Student Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" value="<?= esc($testimonial->name) ?>" class="form-control solid" required>
                    </div>

                    <div class="col-xl-6 col-md-6 mb-4">
                        <label class="form-label font-w600">Role / Course <span class="text-danger">*</span></label>
                        <input type="text" name="role" value="<?= esc($testimonial->role) ?>" class="form-control solid" required>
                    </div>

                    <div class="col-xl-12 mb-4">
                        <label class="form-label font-w600">Current Photo</label><br>
                        <?php if (!empty($testimonial->image) && file_exists(FCPATH . 'uploads/testimonials/' . $testimonial->image)): ?>
                            <img src="<?= base_url('uploads/testimonials/' . $testimonial->image) ?>" alt="<?= esc($testimonial->name) ?>" width="100" class="img-thumbnail rounded mb-2">
                        <?php else: ?>
                            <p class="text-muted">No photo uploaded</p>
                        <?php endif; ?>
                    </div>

                    <div class="col-xl-12 mb-4">
                        <label class="form-label font-w600">Change Photo (JPG, PNG, WebP)</label>
                        <input type="file" name="image" class="form-control" accept="image/*">
                    </div>

                    <div class="col-xl-12 mb-4">
                        <label class="form-label font-w600">Testimonial Message <span class="text-danger">*</span></label>
                        <textarea name="message" rows="5" class="form-control solid" required><?= esc($testimonial->message) ?></textarea>
                    </div>

                </div>
            </div>

            <div class="card-footer text-end">
                <a href="<?= site_url('admin/testimonial') ?>" class="btn btn-danger light me-3">Cancel</a>
                <button type="submit" class="btn btn-primary">Update Testimonial</button>
            </div>

            <?= form_close() ?>

        </div>

    </div>
</div>

<?= $this->endSection() ?>
