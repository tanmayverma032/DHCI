<?php echo $this->extend('admin/app/app') ?>
<?php echo $this->section('content') ?>
<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Gallery</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Gallery-Add</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header ">
                        <h4 class="card-title">Gallery Add</h4>
                        <div>
                            <a href="<?php echo site_url(route_to('AllCourse')) ?>" class="btn btn-primary me-3 btn-sm"><i
                                    class="fas fa-eye me-2"></i>See All Gallery</a>

                        </div>
                    </div>
                    <?php echo form_open_multipart(site_url(route_to('galleryStore')), ["class" => "form-valide-with-icon needs-validation", "id" => "GalleryAdd", "novalidate" => ""]) ?>
                    <div class="card-body">
                        `<div class="row">
                            <div class="col-xl-6  col-md-6 mb-4">
                                <label class="form-label font-w600">Name<span
                                        class="text-danger scale5 ms-2">*</span></label>
                                <input type="hidden" name="id" value="<?php echo isset($editdata) ? $editdata['id'] : "" ?>">

                                <input type="text" name="title" id="title" value="<?php echo isset($editdata) ? $editdata['title'] : "" ?>" class="form-control solid" placeholder="Name" aria-label="name"
                                    required>
                            </div>
                             <div class="col-xl-6  col-md-6 mb-4">
                                <label class="form-label font-w600">Alt<span
                                        class="text-danger scale5 ms-2">*</span></label>
                                <input type="hidden" name="id" value="<?php echo isset($editdata) ? $editdata['id'] : "" ?>">

                                <input type="text" name="alt" id="alt" value="<?php echo isset($editdata) ? $editdata['alt'] : "" ?>" class="form-control solid" placeholder="Alt" aria-label="alt"
                                    required>
                            </div>
                            <div class="col-xl-12 mb-4">
                                <label class="form-label font-w600">Image:<span
                                        class="text-danger scale5 ms-2">*</span></label>
                                <input class="form-control dropify input-file-events" name="image" type="file" data-default-file="<?php echo isset($editdata) ? site_url('public/') . $editdata['image'] : "" ?>"<?php echo isset($editdata) ? "" : "required" ?>>
                            </div>
                        </div>
                        <div>
                            <span>Status:<label class="radio-inline mx-3"><input type="radio" value="1" name="status"
                                        class="form-check-input"                                                                                                                                                                                                                    <?php if (! empty($editdata)) {
                                                                                                                                                                                                                            if ($editdata['status'] == 1) {
                                                                                                                                                                                                                                echo "checked";
                                                                                                                                                                                                                        }
                                                                                                                                                                                                                    }?>> Active</label></span>
                            <span><label class="radio-inline me-3"><input type="radio" value="0" name="status"
                                        class="form-check-input"                                                                                                                                                                                                                    <?php if (! empty($editdata)) {
                                                                                                                                                                                                                            if ($editdata['status'] == 0) {
                                                                                                                                                                                                                                echo "checked";
                                                                                                                                                                                                                        }
                                                                                                                                                                                                                    }?>> In Active</label></span>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <div>
                            <input type="reset" class="btn btn-danger light me-3" value="Reset"></a>
                            <input type="submit" class="btn btn-primary" value="<?php echo isset($editdata) ? "Update" : "Submit" ?>">
                        </div>
                    </div>`
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $this->section('js') ?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if (session()->getFlashdata('msg')): ?>
<script>
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 2500,
    timerProgressBar: true,
});

Toast.fire({
    icon: 'success',
    title: '<?= session()->getFlashdata('msg') ?>'
});
</script>
<?php endif; ?>


<?php echo $this->endSection() ?>
<?php echo $this->endSection() ?>