<?= $this->extend('admin/app/app') ?>
<?= $this->section('content') ?>


<style>
    .dropify-message p {
        font-size: 24px;
        color: #433333;
    }
</style>
<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Students</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Student-List</a></li>
            </ol>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header ">
                        <h4 class="card-title">Profile Student</h4>
                        <div>
                            <a href="<?= url_to('addStudent') ?>" class="btn btn-primary me-3 btn-sm"><i class="fas fa-plus me-2"></i>Add Student</a>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">

                            <table id="example3" class="display table header-border table-hover verticle-middle" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Institute Name</th>
                                        <th>Email/Number</th>
                                        <th>Reg. Date</th>
                                        <th>Status</th>
                                        <th>Certificate</th>
                                        <th>Payment</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($data as $row) : ?>
                                        <tr id="<?= $row['id'] ?>">
                                            <td>
                                                <a href="javascript:void(0);"><?= $row['name'] ?></a><br>
                                                <a href="javascript:void(0);"><strong>@<?= $row['rag_no'] ?? "Not Genrate" ?></strong></a>

                                            </td>
                                            <?php 
                                            $franchise = franchise($row['center_id'] ?? null);
                                            
                                            $instituteName = 'N/A';
                                            
                                            if (is_array($franchise) && isset($franchise['institute_name']) && !empty($franchise['institute_name'])) {
                                                $instituteName = $franchise['institute_name'];
                                            }
                                            ?>
                                            
                                            <td><?= esc($instituteName); ?></td>
                                            <td><?= $row['email'] ?><br><?= $row['number'] ?></td>
                                            <td><?= date('d-m-Y', strtotime($row['reg_date'])) ?></td>
                                            <td>
                                                <?php if ($row['status'] == 1) { ?>
                                                    <span class="badge badge-success badge-lg light">Active</span>
                                                <?php } else if ($row['status'] == 0) { ?>
                                                    <span class="badge badge-danger badge-lg light">InActive</span>
                                                <?php } else if ($row['status'] == -1) { ?>
                                                    <span class="badge badge-warning badge-lg light">Reject</span>
                                                <?php } ?>
                                            </td>

                                            <td>

                                                <?php if ($cert = certificatefind($row['id'])) { ?>
                                                    <a href="<?= site_url('public/' . $cert['file']) ?>" target="_blank">
                                                        <span class="badge badge-success badge-lg light">Uploaded</span>
                                                    </a>
                                                <?php } else { ?>
                                                    <span class="badge badge-warning badge-lg light">Not Uploaded</span>
                                                <?php }  ?>
                                            </td>
                                            <td>
                                                <?php if ($row['payment_status'] == 1) { ?>
                                                    <span class="badge badge-success badge-lg light">Paid</span>
                                                <?php } else { ?>
                                                    <span class="badge badge-warning badge-lg light">Unpaid</span>
                                                <?php } ?>
                                            </td>


                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Action
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <?php if ($cert = certificatefind($row['id'])) { ?>
                                                            <li>
                                                                <a href="<?= site_url('public/' . $cert['file']) ?>" class="dropdown-item" target="_blank">
                                                                    <i class="fa fa-eye"></i> View
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" data-certificateId="<?=$cert['id']?>" class="dropdown-item certificate_reupload">
                                                                    <i class="fa fa-edit"></i> Re-Upload
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="<?=url_to('certificate_delete',$cert['id'])?>" class="dropdown-item"  onclick="return confirm('Are you sure you want to delete the data?');" >
                                                                    <i class="fa fa-trash"></i> Delete
                                                                </a>
                                                            </li>
                                                        <?php } else { ?>
                                                                        <li>
                                                                            <a href="#"
                                                                            class="dropdown-item certificate_upload">

                                                                                <i class="fa fa-upload"></i> Upload

                                                                            </a>
                                                                        </li>
                                                        <?php } ?>


                                                    </ul>
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
 
<!-- Modal -->
<div class="modal fade" id="certificateModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Upload Certificate</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= url_to('admin_certificate_store') ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Upload Student Certificate</label>
                        <input type="hidden" name="student_id" id="student_id">
                        <input type="hidden" name="certificate_id" id="certificateId">
                        <input type="file" name="file" class="dropify" accept="image/jpeg,image/png,application/pdf" data-max-file-size="3M" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>




<?= form_open() ?><?= form_close() ?>
<?= $this->section('js') ?>

<script>

// console.log("page js loaded 2");


// upload modal open
$(document).on("click",".certificate_upload",function(e){

    e.preventDefault();

    var id = $(this).closest("tr").attr("id");

    console.log("student id =",id);

    $('#student_id').val(id);

    $('#certificateId').val('');

    $('#certificateModel').modal('show');

});


// reupload modal open
$(document).on("click",".certificate_reupload",function(e){

    e.preventDefault();

    var id = $(this).closest("tr").attr("id");

    var certificateId = $(this).data("certificateid");

    $('#student_id').val(id);

    $('#certificateId').val(certificateId);

    $('#certificateModel').modal('show');

});

</script>

<?= $this->endSection() ?>
<?= $this->endSection() ?>