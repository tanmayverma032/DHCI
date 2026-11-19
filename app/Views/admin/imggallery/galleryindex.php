<?php echo $this->extend('admin/app/app') ?>
<?php echo $this->section('content') ?>
<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Gallery</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">All Gallery Items</a></li>
            </ol>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0">Gallery Management</h4>
                        <div>
                            <a href="<?php echo site_url('admin/gallery/create') ?>" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus me-2"></i>Add New Item
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display table table-bordered table-hover vertical-middle">
                                <thead>
                                    <tr>
                                        <th style="width: 50px;">ID</th>
                                        <th style="width: 120px;">Preview</th>
                                        <th>Title</th>
                                        <th style="width: 100px;">Type</th>
                                        <th>Alt Text</th>
                                        <th style="width: 90px;">Status</th>
                                        <th style="width: 110px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($gallery)): ?>
                                        <?php foreach ($gallery as $row): ?>
                                            <?php
                                                $isVid = (!empty($row['type']) && $row['type'] === 'video') || !empty($row['video_url']) || (!empty($row['image']) && preg_match('/\.(mp4|webm|mov)$/i', $row['image']));
                                                $ytThumb = '';
                                                if (!empty($row['video_url']) && preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/ ]{11})/', $row['video_url'], $matches)) {
                                                    $ytThumb = 'https://img.youtube.com/vi/' . $matches[1] . '/hqdefault.jpg';
                                                }
                                            ?>
                                            <tr id="row-<?php echo $row['id'] ?>">
                                                <td><?php echo $row['id'] ?></td>
                                                <td>
                                                    <?php if ($isVid): ?>
                                                        <?php if (!empty($ytThumb)): ?>
                                                            <div style="position:relative; width:90px; height:60px; overflow:hidden; border-radius:4px;">
                                                                <img src="<?php echo $ytThumb ?>" alt="YouTube thumbnail" style="width:100%; height:100%; object-fit:cover;">
                                                                <span style="position:absolute; top:50%; left:50%; transform:translate(-50%,-50%); color:#ff0000; font-size:20px;"><i class="fas fa-play-circle"></i></span>
                                                            </div>
                                                        <?php elseif (!empty($row['image']) && preg_match('/\.(mp4|webm|mov)$/i', $row['image'])): ?>
                                                            <div class="bg-dark text-white text-center py-2 rounded" style="width:90px;">
                                                                <i class="fas fa-video fa-2x text-warning"></i>
                                                            </div>
                                                        <?php else: ?>
                                                            <span class="badge badge-info"><i class="fas fa-play me-1"></i> Video</span>
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        <?php if (!empty($row['image'])): ?>
                                                            <img src="<?php echo base_url('uploads/gallery/' . $row['image']) ?>" alt="<?php echo esc($row['alt']) ?>" style="width:90px; height:60px; object-fit:cover; border-radius:4px;">
                                                        <?php else: ?>
                                                            <span class="text-muted">No Image</span>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <strong><?php echo esc($row['title']) ?></strong>
                                                    <?php if (!empty($row['video_url'])): ?>
                                                        <br><small><a href="<?php echo esc($row['video_url']) ?>" target="_blank" class="text-primary"><i class="fas fa-external-link-alt me-1"></i>Watch Video</a></small>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if ($isVid): ?>
                                                        <span class="badge bg-danger text-white"><i class="fas fa-video me-1"></i> Video</span>
                                                    <?php else: ?>
                                                        <span class="badge bg-success text-white"><i class="fas fa-image me-1"></i> Photo</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo esc($row['alt']) ?></td>
                                                <td>
                                                    <?php if (!isset($row['status']) || $row['status'] == 1): ?>
                                                        <span class="badge bg-success text-white">Active</span>
                                                    <?php else: ?>
                                                        <span class="badge bg-secondary text-white">Inactive</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="<?php echo site_url('admin/gallery/edit/' . $row['id']) ?>" class="btn btn-primary btn-sm me-1" title="Edit">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                        <a href="<?php echo site_url('admin/gallery/delete/' . $row['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this gallery item?')" title="Delete">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="7" class="text-center py-4 text-muted">
                                                No gallery items found. <a href="<?php echo site_url('admin/gallery/create') ?>">Click here to add one.</a>
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
    </div>
</div>

<?php echo $this->section('js') ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
