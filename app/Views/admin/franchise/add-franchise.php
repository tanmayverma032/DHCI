<?= $this->extend('admin/app/app') ?>
<?=$this->section('css')?>

<link rel="stylesheet" href="<?=site_url('public/admin/')?>vendor/select2/css/select2.min.css">
<link href="<?=site_url('public/admin/')?>vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
<style>
.form-group {
    margin-top: 20px;
    padding-left: 10px;
}

.form-group label {
    font-size: 14px;
    font-weight: 500;
}
.select2-container--default .select2-selection--single{
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
<?=$this->section('content')?>

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Franchise</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-xl-12 col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Franchise</h4>
                        <div>
                            <a href="<?=url_to('franchise')?>" class="btn btn-primary me-3 btn-sm"><i
                                    class="fas fa-eye me-2"></i>See All Franchise</a>
                        </div>
                    </div>
                    <?=form_open_multipart(url_to(isset($franchise)?"updateFranchise":"saveFranchise"),["id"=>"form-Franchise"])?>
                    <div class="card-body">
                        <div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <p class="h2 text-success"><i class="fas fa-user"></i> Institute Information
                                    </p>
                                </div>
                                <div class="col-md-3 form-group">
                                    <input type="hidden" name="id"  value="<?=isset($franchise)?$franchise['id']:""?>">
                                    <label class="form-label font-w600">Ragistration Number<span
                                            class="text-danger scale5 ms-2">*</span></label>
                                    <div class="input-group mb-2">

                                        <input readonly="true" name="center_code" type="text" value="<?=$center_code??$franchise['center_code']?>"  id="center_code" class="form-control  solid">
                                         
                                    </div>
                                </div>


                                <div class="col-md-3 form-group">
                                    <label class="form-label font-w600">State<span
                                            class="text-danger scale5 ms-2">*</span></label>
                                    <select name="state_id" id="state_id" required>
                                        <option value="" selected disabled >Choose State</option>
                                        <?php foreach($states as $row): ?>
                                        <option value="<?=$row['id']?>" <?php if(!empty($franchise)){if($franchise['state_id']==$row['id']){echo "selected";}}?> > <?=$row['state_name']?> </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label class="form-label font-w600">District<span
                                            class="text-danger scale5 ms-2">*</span></label>
                                    <select name="district_id" id="district_id" class="form-control solid" required>
                                        <option value="<?=isset($franchise)?$franchise['district_id']:""?>" selected ><?=isset($franchise)?$districName:"Choose District"?></option>
                                    </select>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label class="form-label font-w600"> Pin<span
                                            class="text-danger scale5 ms-2">*</span></label>
                                    <input name="pin_code" value="<?=isset($franchise)?$franchise['pin_code']:""?>" type="pin_code" aria-label="pin_code" id="pin_code" class="form-control  solid" min="100000" max="999999"  required>
                                </div>


                                <div class="col-md-6 form-group">
                                    <label class="form-label font-w600">Name of the Institute<span
                                            class="text-danger scale5 ms-2">*</span></label>
                                    <input name="institute_name" value="<?=isset($franchise)?$franchise['institute_name']:""?>" aria-label="institute_name" id="institute_name" type="text" class="form-control  solid" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label class="form-label font-w600">Institute Address<span
                                            class="text-danger scale5 ms-2">*</span></label>
                                    <input name="ins_address" value="<?=isset($franchise)?$franchise['ins_address']:""?>" aria-label="ins_address" id="ins_address" type="text" class="form-control  solid" required>
                                </div>
                                <div class=" col-md-4 form-group">
                                    <label class="form-label font-w600">Year of Establishment <span
                                            class="text-danger scale5 ms-2">*</span></label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-text">Year</div>
                                        <input name="establishment" value="<?=isset($franchise)?$franchise['establishment']:""?>" aria-label="establishment" id="establishment" type="number" class="form-control  solid" required>
                                    </div>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label class="form-label font-w600">Status of The Institution<span
                                            class="text-danger scale5 ms-2">*</span></label>
                                    <select name="ins_status" id="ins_status"
                                        class="nice-select default-select wide form-control solid" required>
                                        <option value="" selected disabled >Choose</option>
                                        <option value="Trust"  <?php if(!empty($franchise)){if($franchise['ins_status']=='Trust'){echo "selected";}}?>>Trust</option>
                                        <option value="Regd. Society" <?php if(!empty($franchise)){if($franchise['ins_status']=='Regd. Society'){echo "selected";}}?>>Regd. Society</option>
                                        <option value="Partnership Firm" <?php if(!empty($franchise)){if($franchise['ins_status']=='Partnership Firm'){echo "selected";}}?>>Partnership Firm</option>
                                        <option value="Proprietorship Firm" <?php if(!empty($franchise)){if($franchise['ins_status']=='Proprietorship Firm'){echo "selected";}}?>>Proprietorship Firm</option>
                                        <option value="Pvt. Ltd." <?php if(!empty($franchise)){if($franchise['ins_status']=='Pvt. Ltd.'){echo "selected";}}?>>Pvt. Ltd.</option>
                                        <option value="Others" <?php if(!empty($franchise)){if($franchise['ins_status']=='Others'){echo "selected";}}?>>Others</option>
                                    </select>
                                </div>

                                

                                <div class="col-md-4 form-group">
                                    <label class="form-label font-w600">Business Phone No.</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-text">+91</div>
                                        <input type="number" value="<?=isset($franchise)?$franchise['ins_num']:""?>" name="ins_num" class="form-control solid"
                                            aria-label="name" min="1000000000" max="9999999999" >
                                    </div>

                                </div>


                            </div>
                        </div>
                        <div>
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="h2 text-success mt-2"><i class="fas fa-user"></i> Information About Centre
                                        Head</p>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label class="form-label font-w600"> Name <span
                                            class="text-danger scale5 ms-2">*</span></label>
                                    <input name="h_name" value="<?=isset($franchise)?$franchise['h_name']:""?>" type="text" aria-label="h_name" id="h_name"  class="form-control  solid" required onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label class="form-label font-w600">Address </label>
                                    <input name="h_addres" value="<?=isset($franchise)?$franchise['h_addres']:""?>" type="text" class="form-control  solid">
                                </div>

                                <div class="col-md-4 form-group">
                                    <label class="form-label font-w600"> Email-Id <span
                                            class="text-danger scale5 ms-2">*</span></label>
                                    <input name="email" value="<?=isset($franchise)?$franchise['email']:""?>" type="email" aria-label="email" id="email" class="form-control  solid" required>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label class="form-label font-w600">Mobile Number<span
                                            class="text-danger scale5 ms-2">*</span></label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-text">+91</div>
                                        <input type="number" value="<?=isset($franchise)?$franchise['h_number']:""?>" name="h_number" class="form-control solid"
                                            aria-label="h_number" id="h_number" min="1000000000" max="9999999999" required>
                                    </div>
                                </div>
                                
                                <div class="col-md-3 form-group">
                                    <label class="form-label font-w600">Date of Birth<span
                                            class="text-danger scale5 ms-2">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="far fa-clock"></i></div>
                                        <input size="16"  value="<?=isset($franchise)?$franchise['dob']:""?>" type="date" name="dob"
                                             class="form-control solid" required=""  min="<?= date('Y-m-d', strtotime('-60 years')) ?>" max="<?= date('Y-m-d', strtotime('-18 years')) ?>">
                                    </div>
                                </div>

                                <div class="col-md-3 form-group">
                                    <label class="form-label font-w600"> Gender<span
                                            class="text-danger scale5 ms-2">*</span></label>
                                    <select name="gender" id="chead_sex"
                                        class="nice-select default-select wide form-control solid" required>
                                        <option value="">Select Gender</option>
                                        <option value="Male" <?php if(!empty($franchise)){if($franchise['gender']=='Male'){echo "selected";}}?> >Male</option>
                                        <option value="Female" <?php if(!empty($franchise)){if($franchise['gender']=='Female'){echo "selected";}}?> >Female</option>
                                    </select>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label class="form-label font-w600"> Marital Status </label>
                                    <select name="marital_status" id="chead_marital_status"
                                        class="nice-select default-select wide form-control solid" required>
                                        <option value="Married" <?php if(!empty($franchise)){if($franchise['marital_status']=='Married'){echo "selected";}}?> >Married</option>
                                        <option value="Unmarried" <?php if(!empty($franchise)){if($franchise['marital_status']=='Unmarried'){echo "selected";}}?> >Unmarried</option>
                                    </select>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label class="form-label font-w600"> Educational </label>
                                    <select name="h_qual" id="chead_qual"
                                        class="nice-select default-select wide form-control solid" required>
                                        <option value="" selected disabled>Select Educational Qualification</option>
                                        <option value="Class VIII"  <?php if(!empty($franchise)){if($franchise['h_qual']=='Class VIII'){echo "selected";}}?> >Class VIII</option>
                                        <option value="Madhyamik"<?php if(!empty($franchise)){if($franchise['h_qual']=='Madhyamik'){echo "selected";}}?> >Madhyamik</option>
                                        <option value="H.S."<?php if(!empty($franchise)){if($franchise['h_qual']=='H.S.'){echo "selected";}}?> >H.S.</option>
                                        <option value="Graduate"<?php if(!empty($franchise)){if($franchise['h_qual']=='Graduate'){echo "selected";}}?> >Graduate</option>
                                        <option value="Post Graduate"<?php if(!empty($franchise)){if($franchise['h_qual']=='Post Graduate'){echo "selected";}}?> >Post Graduate</option>
                                        <option value="Others" <?php if(!empty($franchise)){if($franchise['h_qual']=='Others'){echo "selected";}}?>>Others</option>
                                    </select>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label class="form-label font-w600"> Experience </label>
                                    <div class="input-group">
                                        <div class="input-group-text">Year</div>
                                        <input type="number" value="<?=isset($franchise)?$franchise['h_exp']:""?>" name="h_exp" id="chead_exp" class="form-control  solid">
                                    </div>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label class="form-label font-w600">PanCard No.</label>
                                    <input name="pan_no"value="<?=isset($franchise)?$franchise['pan_no']:""?>"  type="text" class="form-control  solid">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label class="form-label font-w600">Aadhar No </label>
                                    <input name="aadhar_no" value="<?=isset($franchise)?$franchise['aadhar_no']:""?>" type="number" class="form-control  solid" min="100000000000" max="999999999999">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label class="form-label font-w600"> GSTIN No.(Optional)</label>
                                    <input name="gst_no" value="<?=isset($franchise)?$franchise['gst_no']:""?>" type="text" class="form-control  solid">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="h2 text-success mt-3"> <i class="fas fa-book"></i> Upload Documents </p>
                                </div>
                                <div class="col-md-4 form-group mt-5">
                                    <label class="form-label font-w600">Colour Passport Size Photo</label>
                                    <input type="file" name="photo" id="" class="form-control dropify input-file-events solid" data-height="200" data-max-file-size="1M" data-allowed-file-extensions="png jpg jpeg" <?php if(!empty($franchise)){ ?>data-default-file="<?=site_url('public/'.$franchise['photo'])?>"  <?php } ?> >
                                </div>

                                <div class="col-md-4 form-group mt-5">
                                    <label class="form-label font-w600">Pan Card of The Institute Head</label>
                                
                                    <input type="file" name="pan_photo" id="" class="form-control dropify input-file-events solid" data-height="200" data-max-file-size="1M" data-allowed-file-extensions="png jpg jpeg" <?php if(!empty($franchise)){ ?> data-default-file="<?=site_url('public/'.$franchise['pan_photo'])?>" <?php } ?> >
                                </div>
                                <div class="col-md-4 form-group mt-5 mb-4">
                                    <label class="form-label font-w600">Colour Photograph of Front Side of The
                                        Institute</label>
                                
                                    <input type="file" name="ins_photo" id="" class="form-control dropify input-file-events solid" data-height="200" data-max-file-size="1M" data-allowed-file-extensions="png jpg jpeg" <?php if(!empty($franchise)){ ?> data-default-file="<?=site_url('public/'.$franchise['ins_photo'])?>" <?php } ?> >
                                </div>
                                <div class="col-xl-6  col-md-6 mb-4 mt-2">
                                    <label class="form-label font-w600">Posted Date<span
                                            class="text-danger scale5 ms-2">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="far fa-clock"></i></div>
                                        <input size="16" type="text" name="reg_date"
                                            value="<?=isset($franchise)?date('Y-m-d',strtotime($franchise['reg_date'])):date('Y-m-d')?>"
                                            readonly class="form-control form_datetime solid" required>
                                    </div>
                                </div>

                            </div>
                            <div>
                                <span>Status:<label class="radio-inline mx-3"><input type="radio" value="1"
                                            name="status" class="form-check-input" required
                                            <?php if(!empty($franchise)){if($franchise['status']==1){echo "checked";}}?>>
                                        Active</label></span>
                                <span><label class="radio-inline me-3"><input type="radio" value="0" name="status"
                                            class="form-check-input" required
                                            <?php if(!empty($franchise)){if($franchise['status']==0){echo "checked";}}?>>
                                        In Active</label></span>
                                <span><label class="radio-inline me-3"><input type="radio" value="-1" name="status"
                                            class="form-check-input" required
                                            <?php if(!empty($franchise)){if($franchise['status']==-1){echo "checked";}}?>>
                                        Reject</label></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <div>
                            <input type="reset" class="btn btn-danger light me-3" value="Reset"></a>
                            <input type="submit" class="btn btn-primary" value="<?=isset($franchise)?"Update":"Submit"?>">
                        </div>
                    </div>
                    <?=form_close()?>
                </div>
            </div>
        </div>
    </div>
</div>

<?=$this->section('js')?>
<script src="<?=site_url('public/admin/')?>vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="<?=site_url('public/admin/')?>vendor/select2/js/select2.full.min.js"></script>
<script>
$(document).ready(function() {
    $('.dropify1').dropify({
        messages: {
            'default': 'Drag and drop a file here or click',
            'replace': 'Drag and drop or click to replace',
            'remove':  'Remove',
            'error':   'Ooops, something wrong happended.'
        }
    });
    $("#state_id").select2();

    $('#state_id').change(function() {
        var state_id = $(this).val();
        

        $.ajax({
            url: '<?=url_to('districtname')?>',
            method: 'GET',
            data: {
                state_id: state_id
            },
            dataType: 'json',
            success: function(response) {
                $('#district_id').find('option').not(':first').remove();
                if (response.distric) {
                    $.each(response.distric, function(index, district) {
                        $('#district_id').append('<option value="' + district.id +
                            '">' + district.city_name + '</option>');
                    });
                }

            }
        });
    });

});
</script>
<?=$this->endSection()?>
<?=$this->endSection()?>
<?=$this->endSection()?>