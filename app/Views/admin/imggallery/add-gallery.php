<?php echo $this->extend('admin/app/app') ?>
<?php echo $this->section('content') ?>
<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo site_url('admin/gallery') ?>">Gallery</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)"><?php echo isset($editdata) ? "Edit Item" : "Add New Item" ?></a></li>
            </ol>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0"><?php echo isset($editdata) ? "Edit Gallery Item" : "Add Gallery Item" ?></h4>
                        <div>
                            <a href="<?php echo site_url('admin/gallery') ?>" class="btn btn-primary btn-sm">
                                <i class="fas fa-eye me-2"></i>See All Gallery
                            </a>
                        </div>
                    </div>

                    <?php echo form_open_multipart(site_url('admin/gallery/store'), ["class" => "needs-validation", "id" => "GalleryAdd"]) ?>
                    <div class="card-body">
                        <?php if (session()->getFlashdata('error')): ?>
                            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                        <?php endif; ?>

                        <input type="hidden" name="id" value="<?php echo isset($editdata) ? $editdata['id'] : "" ?>">

                        <div class="row">
                            <!-- Title / Name -->
                            <div class="col-xl-6 col-md-6 mb-3">
                                <label class="form-label font-w600">Title / Caption <span class="text-danger">*</span></label>
                                <input type="text" name="title" id="title" value="<?php echo isset($editdata) ? esc($editdata['title']) : "" ?>" class="form-control" placeholder="Enter title or caption" required>
                            </div>

                            <!-- Alt Text -->
                            <div class="col-xl-6 col-md-6 mb-3">
                                <label class="form-label font-w600">Alt Text <span class="text-danger">*</span></label>
                                <input type="text" name="alt" id="alt" value="<?php echo isset($editdata) ? esc($editdata['alt']) : "" ?>" class="form-control" placeholder="Enter alternative text" required>
                            </div>

                            <!-- Media Type Selector -->
                            <?php 
                                $isEdit = !empty($editdata);
                                $currentType = $isEdit ? ($editdata['type'] ?? 'image') : 'image';
                                if ($isEdit && empty($editdata['type']) && (!empty($editdata['video_url']) || (isset($editdata['image']) && preg_match('/\.(mp4|webm|mov)$/i', $editdata['image'])))) {
                                    $currentType = 'video';
                                }
                            ?>
                            <div class="col-12 mb-4">
                                <label class="form-label font-w600 d-block">Media Type <span class="text-danger">*</span></label>
                                <div class="btn-group" role="group">
                                    <input type="radio" class="btn-check" name="type" id="type_image" value="image" autocomplete="off" <?php echo ($currentType === 'image') ? 'checked' : '' ?>>
                                    <label class="btn btn-outline-primary" for="type_image"><i class="fas fa-image me-1"></i> Photo / Image</label>

                                    <input type="radio" class="btn-check" name="type" id="type_video" value="video" autocomplete="off" <?php echo ($currentType === 'video') ? 'checked' : '' ?>>
                                    <label class="btn btn-outline-primary" for="type_video"><i class="fas fa-video me-1"></i> Video (YouTube / Upload)</label>
                                </div>
                            </div>

                            <!-- Image Upload Box -->
                            <div class="col-xl-12 mb-4" id="image_upload_section" style="<?php echo ($currentType === 'video') ? 'display:none;' : '' ?>">
                                <label class="form-label font-w600">Image File: <span class="text-danger">*</span></label>
                                <input class="form-control" name="image" type="file" accept="image/*" <?php echo ($isEdit || $currentType === 'video') ? "" : "required" ?>>
                                <small class="text-muted d-block mt-1">Accepted formats: JPG, JPEG, PNG, WEBP, GIF</small>
                                <?php if ($isEdit && !empty($editdata['image']) && !preg_match('/\.(mp4|webm|mov)$/i', $editdata['image'])): ?>
                                    <div class="mt-2">
                                        <p class="mb-1 text-muted">Current Image:</p>
                                        <img src="<?php echo base_url('uploads/gallery/' . $editdata['image']) ?>" alt="Current preview" style="max-height: 120px; border-radius: 6px; border: 1px solid #ddd;">
                                    </div>
                                <?php endif; ?>
                            </div>

                            <!-- Video Section -->
                            <div class="col-12" id="video_upload_section" style="<?php echo ($currentType === 'video') ? '' : 'display:none;' ?>">
                                <div class="card bg-light p-3 mb-4">
                                    <h6 class="text-primary font-w600 mb-3"><i class="fas fa-play-circle me-1"></i> Video Details</h6>
                                    
                                    <!-- YouTube / External URL -->
                                    <div class="mb-3">
                                        <label class="form-label font-w600">YouTube or Online Video URL</label>
                                        <input type="url" name="video_url" id="video_url" value="<?php echo isset($editdata['video_url']) ? esc($editdata['video_url']) : "" ?>" class="form-control" placeholder="https://www.youtube.com/watch?v=... or https://youtu.be/...">
                                        <small class="text-muted">Enter full YouTube video link (e.g., https://www.youtube.com/watch?v=xxxxx)</small>
                                    </div>

                                    <div class="text-center font-w600 text-muted my-2">-- OR Upload Video File --</div>

                                    <!-- Video File Upload -->
                                    <div class="mb-3">
                                        <label class="form-label font-w600">Upload Video File (.mp4, .webm, .mov)</label>
                                        <input class="form-control" name="media_file" type="file" accept="video/mp4,video/webm,video/quicktime">
                                        <?php if ($isEdit && !empty($editdata['image']) && preg_match('/\.(mp4|webm|mov)$/i', $editdata['image'])): ?>
                                            <div class="mt-2">
                                                <p class="mb-1 text-muted">Current Video File: <strong><?= esc($editdata['image']) ?></strong></p>
                                                <video src="<?= base_url('uploads/gallery/' . $editdata['image']) ?>" controls style="max-height: 140px; border-radius: 6px;"></video>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="col-12 mb-4">
                                <label class="form-label font-w600 me-3">Status:</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="status1" value="1" <?php echo (!isset($editdata) || (isset($editdata['status']) && $editdata['status'] == 1)) ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="status1">Active</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="status0" value="0" <?php echo (isset($editdata['status']) && $editdata['status'] == 0) ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="status0">Inactive</label>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="card-footer text-end">
                        <a href="<?php echo site_url('admin/gallery') ?>" class="btn btn-secondary me-2">Cancel</a>
                        <input type="submit" class="btn btn-primary" value="<?php echo isset($editdata) ? "Update Item" : "Save Item" ?>">
                    </div>

                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo $this->section('js') ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    var typeImage = document.getElementById('type_image');
    var typeVideo = document.getElementById('type_video');
    var imageSection = document.getElementById('image_upload_section');
    var videoSection = document.getElementById('video_upload_section');
    var imageInput = imageSection ? imageSection.querySelector('input[type="file"]') : null;

    function toggleMediaType() {
        if (typeVideo && typeVideo.checked) {
            imageSection.style.display = 'none';
            videoSection.style.display = 'block';
            if (imageInput) imageInput.removeAttribute('required');
        } else {
            imageSection.style.display = 'block';
            videoSection.style.display = 'none';
            <?php if (!isset($editdata)): ?>
            if (imageInput) imageInput.setAttribute('required', 'required');
            <?php endif; ?>
        }
    }

    if (typeImage) typeImage.addEventListener('change', toggleMediaType);
    if (typeVideo) typeVideo.addEventListener('change', toggleMediaType);
    toggleMediaType();
});
</script>

<?php if (session()->getFlashdata('msg')): ?>
<script>
Swal.fire({
    toast: true,
    position: 'top-end',
    icon: 'success',
    title: '<?= esc(session()->getFlashdata('msg')) ?>',
    showConfirmButton: false,
    timer: 2500,
    timerProgressBar: true
});
</script>
<?php endif; ?>

<?php echo $this->endSection() ?>
<?php echo $this->endSection() ?>
