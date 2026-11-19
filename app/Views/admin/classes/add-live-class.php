<?= $this->extend('admin/app/app') ?>
<?= $this->section('css') ?>

<link href="<?= site_url('public/admin/') ?>vendor/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?= site_url('public/admin/') ?>vendor/select2/css/select2.min.css">
<link href="<?= site_url('public/admin/') ?>vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
<style>
    .form-group {
        margin-top: 20px;
        padding-left: 10px;
    }

    .form-group label {
        font-size: 14px;
        font-weight: 500;
    }

    .select2-container--default .select2-selection--single {
        height: 42px;
        padding: 5px 10px;
        border: 1px solid #aaaaaa5e !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        padding: 18px;
    }

    .dropify-wrapper .dropify-message span.file-icon {
        font-size: 26px !important;
        color: #f93a0bd1 !important;
    }
</style>
<?= $this->section('content') ?>
<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Live Class</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Class-Add</a></li>
            </ol>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header ">
                        <h4 class="card-title"><?= $title ?></h4>
                        <div>
                            <a href="<?= url_to('live_class') ?>" class="btn btn-primary me-3 btn-sm"><i class="fas fa-eye me-2"></i>See All live-Class</a>

                        </div>
                    </div>
                    <?= form_open(url_to('save_live_class'), ["class" => "form-valide-with-icon needs-validation", "id" => "courseAdd", "novalidate" => ""]) ?>
                    <div class="card-body">
                        `<div class="row">
                            <div class="col-xl-12  col-md-12 mb-4">
                                <?php if(isset($classdata)){?>
                                    <input type="hidden" name="id" value="<?=$classdata['id']??""?>">
                                <?php } ?>
                                <label class="form-label font-w600">Class Metting Name</label>
                                <input type="text" value="<?=$classdata['metting_name']??""?>" name="metting_name" id="batch_code" class="form-control solid" placeholder="Metting Name">
                            </div>

                            <div class="col-xl-6  col-md-6 mb-4">
                                <label class="form-label font-w600">Session <span class="text-danger scale5 ms-2">*</span></label>
                                <select name="session_id" id="session_id">
                                    <option value="" selected disabled>Choose..</option>
                                    <?php foreach ($session as $row) { ?>
                                        <option value="<?= $row['id'] ?>" <?php if(isset($classdata)){ if($classdata['session_id']=$row['id']){ echo "selected";} }?> ><?= $row['session'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="col-xl-6  col-md-6 mb-4">
                                <label class="form-label font-w600">Batch <span class="text-danger scale5 ms-2">*</span></label>
                                <select name="batch_id" id="batch" class="form-control">
                                    <option value="<?= $bsatch['id'] ?? "" ?>"><?= $bsatch['batch_name'] ?? "Choose Batch" ?> </option>
                                </select>
                            </div>
                            <div class="col-xl-6  col-md-6 mb-4">
                                <label class="form-label font-w600">Metting Date</label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="far fa-clock"></i></div>
                                    <input size="16" name="metting_date" type="text" value="<?= $classdata['metting_date']??date('Y-m-d') ?>" readonly class="form-control form_datetime solid">
                                </div>
                            </div>

                            <div class="col-xl-6  col-md-6 mb-4">
                                <label class="form-label font-w600">Metting time</label>
                                <div class="input-group clockpicker">
                                    <input type="text" name="metting_time" class="form-control" value="<?=$classdata['metting_time']??date('H:i')?>"><span class="input-group-text">
                                        <i class="far fa-clock"></i></span>
                                </div>
                            </div>
                            <div class="col-xl-6  col-md-6 mb-4">
                                <label class="form-label font-w600">Class Duration</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Minute</span>
                                    <input type="text" name="duration" id="duration" value="<?=$classdata['duration']??""?>" class="form-control solid" aria-label="name">
                                </div>
                            </div>
                            <div class="col-xl-12  col-md-12 mb-4">
                                <label class="form-label font-w600">Class Metting Link</label>
                                <input type="text" name="metting_link" id="metting_link" value="<?=$classdata['metting_link']??""?>" class="form-control solid" placeholder="https://zoom.us/******">
                            </div>
                            <div class="col-xl-12  col-md-12 mb-4">
                                <label class="form-label font-w600">Discription</label>
                                <textarea rows="5" name="discription" class="form-control solid" placeholder="Wrote Class message..."><?=$classdata['discription']??""?></textarea>
                            </div>

                        </div>

                    </div>
                    <div class="card-footer text-end">
                        <div>
                            <input type="reset" class="btn btn-danger light me-3" value="Reset"></a>
                            <input type="submit" class="btn btn-primary" value="<?= isset($editdata) ? "Update" : "Submit" ?>">
                        </div>
                    </div>`
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->section('js') ?>
<!-- clockpicker -->
<script src="<?= site_url('public/admin/') ?>vendor/clockpicker/js/bootstrap-clockpicker.min.js"></script>
<!-- Clockpicker init -->
<script src="<?= site_url('public/admin/') ?>js/plugins-init/clock-picker-init.js"></script>
<script src="<?= site_url('public/admin/') ?>vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="<?= site_url('public/admin/') ?>vendor/select2/js/select2.full.min.js"></script>

<script>
    $("#session_id").select2();

    $('#session_id').change(function() {
        var session_id = $(this).val();

        $.ajax({
            url: '<?= url_to('getBatch') ?>',
            method: 'GET',
            data: {
                session_id: session_id
            },
            dataType: 'json',
            success: function(response) {
                $('#batch').find('option').not(':first').remove();
                if (response.batches) {
                    $.each(response.batches, function(index, batch) {
                        $('#batch').append('<option value="' + batch.id +
                            '">' + batch.batch_name + '</option>');
                    });
                }

            }
        });
    });
</script>
<?= $this->endSection() ?>
<?= $this->endSection() ?>
<?= $this->endSection() ?>