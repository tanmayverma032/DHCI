<?= $this->extend('admin/app/app') ?>
<?= $this->section('content') ?>

<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Testimonials</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">All Testimonials</a></li>
            </ol>
        </div>

        <?php if (session()->getFlashdata('msg')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('msg') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('error') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">All Testimonials</h4>
                <a href="<?= site_url('admin/testimonial/add') ?>" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus me-1"></i> Add Testimonial
                </a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover verticle-middle">
                        <thead>
                            <tr>
                                <th style="width: 50px;">#</th>
                                <th style="width: 80px;">Photo</th>
                                <th>Name</th>
                                <th>Role / Course</th>
                                <th>Message</th>
                                <th style="width: 140px;">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $i = 1; ?>
                            <?php if (!empty($testimonials)) : ?>
                                <?php foreach ($testimonials as $t) : ?>
                                    <tr>
                                        <td><?= $i++ ?></td>

                                        <td>
                                            <?php if (!empty($t->image) && file_exists(FCPATH . 'uploads/testimonials/' . $t->image)): ?>
                                                <img src="<?= base_url('uploads/testimonials/' . $t->image) ?>" alt="<?= esc($t->name) ?>" width="55" height="55" class="rounded-circle object-cover">
                                            <?php else: ?>
                                                <div class="bg-light rounded-circle d-flex align-items-center justify-content-center" style="width:55px;height:55px;">
                                                    <i class="fas fa-user text-muted"></i>
                                                </div>
                                            <?php endif; ?>
                                        </td>

                                        <td><strong><?= esc($t->name) ?></strong></td>
                                        <td><span class="badge badge-info light"><?= esc($t->role) ?></span></td>

                                        <td>
                                            <?= esc(mb_strimwidth($t->message, 0, 90, '...')) ?>
                                        </td>

                                        <td>
                                            <a href="<?= site_url('admin/testimonial/edit/' . $t->id) ?>"
                                               class="btn btn-primary btn-sm me-1" title="Edit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>

                                            <a href="<?= site_url('admin/testimonial/delete/' . $t->id) ?>"
                                               class="btn btn-danger btn-sm"
                                               onclick="return confirm('Are you sure you want to delete this testimonial?')"
                                               title="Delete">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="6" class="text-center py-4 text-muted">
                                        <i class="fas fa-comment-slash fa-2x mb-2 d-block"></i>
                                        No testimonials added yet. Click "+ Add Testimonial" to create one.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
</div>

<?= $this->endSection() ?>
