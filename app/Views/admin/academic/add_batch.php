<?= $this->extend('admin/app/app') ?>
<?=$this->section('content')?>
<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Batch</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Batch-Add</a></li>
            </ol>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header ">
                        <h4 class="card-title"><?=$title?></h4>
                        <div>
                            <a href="<?=url_to('batch')?>" class="btn btn-primary me-3 btn-sm"><i
                                    class="fas fa-eye me-2"></i>See All Batches</a>

                        </div>
                    </div>
                    <?=form_open(url_to('save_batch'),["class"=>"form-valide-with-icon needs-validation", "id"=>"courseAdd", "novalidate"=>""])?>
                        <div class="card-body">
                            `<div class="row">
                                <div class="col-xl-6  col-md-6 mb-4">
                                    <label class="form-label font-w600">Session<span
                                            class="text-danger scale5 ms-2">*</span></label>
                                    <select class="nice-select default-select wide form-control solid" name="session_id" required>
                                        <option selected disabled>Choose...</option>
                                        <?php foreach($session as $row) :?>
                                            <option value="<?=$row['id']?>"<?php if(!empty($editdata)){if($editdata['session_id']==$row['id']){echo "selected";}}?> ><?=$row['session']?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                
                                <div class="col-xl-6  col-md-6 mb-4">
                                    <label class="form-label font-w600">Batch Name<span
                                            class="text-danger scale5 ms-2">*</span></label>
                                    <input type="hidden" name="batch_id" value="<?=isset($editdata)?$editdata['id']:""?>">

                                    <input type="text" name="batch_name" id="batch_name" value="<?=isset($editdata)?$editdata['batch_name']:""?>" class="form-control solid" placeholder="Name" aria-label="name"
                                        required>
                                </div>
                                <div class="col-xl-6  col-md-6 mb-4">
                                    <label class="form-label font-w600">Batch Code</label>
                                    <input type="text" name="batch_code"  id="batch_code" value="<?=isset($editdata)?$editdata['batch_code']:"N/A"?>" class="form-control solid" placeholder="Name" aria-label="name">
                                </div>
                                
                            </div>
                            
                        </div>
                        <div class="card-footer text-end">
                            <div>
                                <input type="reset" class="btn btn-danger light me-3" value="Reset"></a>
                                <input type="submit" class="btn btn-primary" value="<?=isset($editdata)?"Update":"Submit"?>">
                            </div>
                        </div>`
                    <?=form_close()?>
                </div>
            </div>
        </div>
    </div>
</div>
<?=$this->section('js')?>

<?=$this->endSection()?>
<?=$this->endSection()?>