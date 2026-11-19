<?= $this->extend('admin/app/app') ?>
<?= $this->section('content') ?>

<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Testimonials</li>
            </ol>
        </div>

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">All Testimonials</h4>

                <!-- FIXED: safe URL -->
                <a href="<?= base_url('admin/testimonial/add') ?>" class="btn btn-primary btn-sm">
                    + Add Testimonial
                </a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Message</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php $i = 1; ?>
                            <?php if (!empty($testimonials)) : ?>
                                <?php foreach ($testimonials as $t) : ?>
                                    <tr>
                                        <td><?= $i++ ?></td>

                                        <td>
                                            <img src="<?= base_url('uploads/testimonials/' . $t->image) ?>" width="60">
                                        </td>

                                        <td><?= esc($t->name) ?></td>
                                        <td><?= esc($t->role) ?></td>

                                        <td>
                                            <?= esc(substr($t->message, 0, 80)) ?>...
                                        </td>

                                        <td>
                                            <!-- FIXED URLs -->
                                            <a href="<?= base_url('admin/testimonial/edit/' . $t->id) ?>"
                                               class="btn btn-warning btn-sm">
                                                Edit
                                            </a>

                                            <a href="<?= base_url('admin/testimonial/delete/' . $t->id) ?>"
                                               class="btn btn-danger btn-sm"
                                               onclick="return confirm('Delete this testimonial?')">
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="6" class="text-center">No testimonials found</td>
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