<?= $this->extend('admin/app/app') ?>
<?=$this->section('css')?>

<style>
    .dropify-message span p{
        font-size: 24px !important;
    }
</style>
<?=$this->section('content')?>
<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Settings</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Site/Contact-Setting</a></li>
            </ol>
        </div>
        <!-- row -->


        <div class="row mb-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header ">
                        <h4 class="card-title">Site Setting</h4>
                    </div>
                    <?=form_open_multipart(url_to('web_setting1'),["class"=>"form-valide-with-icon needs-validation", "id"=>"courseAdd", "novalidate"=>""])?>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-6  col-md-6 mb-4">
                                    <label class="form-label font-w600">Site Name<span
                                            class="text-danger scale5 ms-2">*</span></label>
                                    <input type="text" name="site_name" value="<?=$setting['site_name']?>" class="form-control solid" 
                                        required>
                                </div>
                                <div class="col-xl-6  col-md-6 mb-4">
                                    <label class="form-label font-w600">Site Title<span
                                            class="text-danger scale5 ms-2">*</span></label>
                                    <input type="text" name="site_title" value="<?=$setting['site_title']?>" class="form-control solid"  required>
                                </div>
                               

                                <div class="col-xl-12 mb-4">
                                    <label class="form-label font-w600">Site Description:<span
                                            class="text-danger scale5 ms-2">*</span></label>
                                    <div class="custom-ekeditor">
                                        <textarea rows="6" name="description" class="form-control"><?=$setting['description']?></textarea>
                                    </div>
                                </div>
                                <div class="col-xl-6 mb-4">
                                    <label class="form-label font-w600">Site Logo:<span
                                            class="text-danger scale5 ms-2">*</span></label>
                                    <input class="form-control dropify input-file-events" name="site_logo" type="file" data-default-file="<?=site_url('public/').$setting['site_logo']?>"   >
                                </div>
                                <div class="col-xl-6 mb-4">
                                    <label class="form-label font-w600">Site Fav-Icon<span
                                            class="text-danger scale5 ms-2">*</span></label>
                                    <input class="form-control dropify input-file-events" name="site_fav" type="file" data-default-file="<?=site_url('public/').$setting['site_fav']?>" >
                                </div>
                            </div>
                            
                        </div>
                        <div class="card-footer text-end">
                            <div>
                                <input type="submit" class="btn btn-primary" value="Update">
                            </div>
                        </div>`
                    <?=form_close()?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header ">
                        <h4 class="card-title">Contact</h4>
                    </div>
                    <?=form_open_multipart(url_to('web_setting2'),["class"=>"form-valide-with-icon needs-validation", "id"=>"courseAdd", "novalidate"=>""])?>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-12  col-md-12 mb-4">
                                    <label class="form-label font-w600">Number<span
                                            class="text-danger scale5 ms-2">*</span></label>
                                    <input type="text" name="number"  value="<?=$setting['number']?>" class="form-control solid"
                                        required>
                                </div>
                                <div class="col-xl-12 col-md-12 mb-4">
                                    <label class="form-label font-w600">Email<span
                                            class="text-danger scale5 ms-2">*</span></label>
                                    <input type="text" name="email"  value="<?=$setting['email']?>" class="form-control solid"  required>
                                </div>
                               

                                <div class="col-xl-12 mb-4">
                                    <label class="form-label font-w600">Address:<span
                                            class="text-danger scale5 ms-2">*</span></label>
                                    <div class="custom-ekeditor">
                                        <textarea rows="6" name="address" class="form-control"><?=$setting['address']?></textarea>
                                    </div>
                                </div>
                                <div class="col-xl-12 mb-4">
                                    <label class="form-label font-w600">Map Location link:<span
                                            class="text-danger scale5 ms-2">*</span></label>
                                    <div class="custom-ekeditor">
                                        <textarea rows="6" name="map_link" class="form-control"><?=$setting['map_link']?></textarea>
                                    </div>
                                </div>
                                
                            </div>
                            
                        </div>
                        <div class="card-footer text-end">
                            <div>
                                <input type="submit" class="btn btn-primary" value="Update">
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
<?=$this->endSection()?>