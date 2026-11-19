<?php echo $this->extend('admin/app/app') ?>
<?php echo $this->section('content') ?>
<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Gallery</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Gallery</a></li>
            </ol>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Gallery</h4>
                        <div>
                           <a href="<?php echo site_url('admin/gallery/create') ?>" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus me-2"></i>Add New Gallery
                            </a>
                                                    </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display table table-bordered table-hover verticle-middle">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Alt Text</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($gallery as $row): ?>
                                    <tr id="<?php echo $row['id'] ?>">
                                        <td><?php echo $row['id'] ?></td>
                                          <td>
                                            <?php if (! empty($row['image'])): ?>
                                                <img src="<?php echo base_url('uploads/gallery/' . $row['image']) ?>" alt="<?php echo $row['alt'] ?>" style="width:80px; height:auto;">
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo $row['title'] ?></td>

                                        <td><?php echo $row['alt'] ?></td>
                                        <td>
                                            <div class="d-flex">
                                               <a href="<?php echo site_url('admin/gallery/edit/' . $row['id']) ?>" class="btn btn-primary btn-sm me-1">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a href="<?php echo site_url('admin/gallery/delete/' . $row['id'])?>"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this image?')">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                                                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
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
