<?= $this->extend('admin/app/app') ?>
<?= $this->section('content') ?>
<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Sessions</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Session-List</a></li>
            </ol>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header ">
                        <h4 class="card-title">Seasion</h4>
                        <?php if (is_admin()['admin']['role'] == 1) { ?>
                            <div>
                                <a href="javascript:void(0);" class="btn btn-primary me-3 btn-sm add-data" data-bs-toggle="modal" data-bs-target="#basicModal"><i class="fas fa-plus me-2"></i>Add New Session</a>

                            </div>
                        <?php } ?>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display table header-border table-hover verticle-middle" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Session</th>
                                        <th>Create Date</th>
                                        <?php if (is_admin()['admin']['role'] == 1) { ?>
                                            <th>Status</th>
                                        <?php } ?>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $key => $row) : ?>
                                        <tr id="<?= $row['id'] ?>" data-key="<?= $key ?>">

                                            <td><?= $row['session'] ?></td>
                                            <td><?= date('d-m-Y', strtotime($row['created_at'])) ?></td>
                                            <?php if (is_admin()['admin']['role'] == 1) { ?>
                                                <td>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input status" type="checkbox" id="<?php echo "data" . $row['id']; ?>" <?php if ($row['status'] == 1) {
                                                                                                                                                            echo "checked";
                                                                                                                                                        } ?>>
                                                    </div>
                                                </td>
                                            <?php } ?>
                                            <td>
                                                <div class="d-flex">
                                                    <?php if (is_admin()['admin']['role'] == 1) { ?>
                                                        <a href="javascript:void(0);" class="btn btn-primary shadow btn-xs sharp me-1 edit-data"><i class="fas fa-pencil-alt"></i></a>
                                                        <a href="javascript:void(0);" class="btn btn-danger shadow btn-xs sharp confirm-delete"><i class="fa fa-trash"></i></a>
                                                    <?php } ?>
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

<div class="modal fade" id="basicModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?= form_open(url_to('sessionSave')) ?>
            <div class="modal-header">
                <h5 class="modal-title">Session</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">
                <div class="basic-form">
                    <div class="row align-items-center">
                        <div class="col-12 my-1">
                            <label class="me-sm-2">Session</label>
                            <input type="text" class="form-control" name="session" placeholder="Session">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<div class="modal fade" id="editbasicModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?= form_open(url_to('sessionSave')) ?>
            <div class="modal-header">
                <h5 class="modal-title">Session</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">
                <div class="basic-form">
                    <div class="row align-items-center">
                        <div class="col-12 my-1">
                            <label class="me-sm-2">Session</label>
                            <input type="hidden" name="id">
                            <input type="text" class="form-control" name="session" placeholder="Session">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>
<?= form_open() ?><?= form_close() ?>
<?= $this->section('js') ?>

<script>
    var statusChange = "<?= site_url(route_to('sessionstatus')); ?>";
    var deleteData = "<?= site_url(route_to('sessionDelete')); ?>";
    var showdata = "<?= site_url('Dashboard/Data/') ?>";

    <?= $this->include('admin/pages/ajex') ?>

    var data = <?php echo json_encode($data); ?>;
    $('.edit-data').on('click', function() {
        var key = $(this).parents("tr").data("key");
        var rowData = data[key];
        var $modal = $('#editbasicModal');
        $modal.find('[name="session"]').val(rowData.session);
        $modal.find('[name="id"]').val(rowData.id);

        $modal.modal('show');
    });
</script>
<?= $this->endSection() ?>
<?= $this->endSection() ?>