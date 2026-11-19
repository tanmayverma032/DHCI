<?= $this->extend('admin/app/app') ?>
<?= $this->section('content') ?>

<div class="content-body">
    <div class="container-fluid">

        <div class="card">
            <div class="card-header">
                <h4>Edit Testimonial</h4>
            </div>

            <?= form_open_multipart(site_url(route_to('update_testimonial', $testimonial->id))) ?>

            <div class="card-body">

                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name" value="<?= $testimonial->name ?>" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Role</label>
                    <input type="text" name="role" value="<?= $testimonial->role ?>" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Current Image</label><br>
                    <img src="<?= base_url('uploads/testimonials/'.$testimonial->image) ?>" width="80">
                </div>

                <div class="mb-3">
                    <label>Change Image</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Message</label>
                    <textarea name="message" class="form-control"><?= $testimonial->message ?></textarea>
                </div>

            </div>

            <div class="card-footer text-end">
                <button class="btn btn-primary">Update</button>
            </div>

            <?= form_close() ?>

        </div>

    </div>
</div>

<?= $this->endSection() ?>