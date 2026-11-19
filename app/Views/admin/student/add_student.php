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
                <li class="breadcrumb-item"><a href="javascript:void(0)">Student</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-xl-12 col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Student</h4>
                        <div>
                            <a href="<?=url_to('students')?>" class="btn btn-primary me-3 btn-sm"><i
                                    class="fas fa-eye me-2"></i>See All Student</a>

                        </div>
                    </div>
                    <?=form_open_multipart(url_to(isset($student)?"updateStudent":"saveStudent"),["id"=>"form-student"])?>
                    <div class="card-body">
                        <div>
                            <div class="row mt-2">
                                
                                <div class="col-md-12">
                                    <p class="h2 text-success"><i class="fas fa-user"></i> Course Information
                                    </p>
                                </div>
                                <?php if(!empty($student)){?>
                                    <input type="hidden" name="id" value="<?=$student['id']?>">
                                <?php }?>
                                <div class="col-md-4 form-group">
                                    <label class="form-label font-w600">Ragistration Number<span
                                            class="text-danger scale5 ms-2">*</span></label>
                                    <input name="rag_no" type="text" value="<?=$rag_no?>"  id="rag_no" class="form-control  solid" readonly >
                                </div>
                                <div class="col-md-4 form-group">
                                    <label class="form-label font-w600">Study Center<span
                                            class="text-danger scale5 ms-2">*</span></label>
                                    <select name="center_id" id="select2" >
                                        <option value="" selected disabled>Choose Study Center</option>
                                        <?php foreach ($centers as $center): ?>
                                            <option value="<?= $center['id'] ?>"  <?php if(!empty($student)){if($student['center_id']==$center['id']){echo "selected";}}?> ><?= $center["institute_name"] ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label class="form-label font-w600">Course Name <span
                                            class="text-danger scale5 ms-2">*</span></label>
                                    <select name="course_id" id="course_id" >
                                        <option value="">Select Course </option>
                                        <?php foreach($course as $row){?>
                                            <option value="<?= $row['id']?>" <?php if(!empty($student)){if($student['course_id']==$row['id']){echo "selected";}}?>   ><?=$row['name']?></option>";
                                       <?php  } ?>
                                    </select>
                                </div>
                               <div class="col-md-3 form-group">
                                    <label class="form-label font-w600">Session <span
                                            class="text-danger scale5 ms-2">*</span></label>
                                    <select name="session_id" id="session_id" >
                                        <option value="" selected disabled>Choose..</option>
                                        <?php foreach($session as $row){?>
                                        <option value="<?=$row['id']?>"  <?php if(!empty($student)){if($student['session_id']==$row['id']){echo "selected";}}?> ><?=$row['session']?></option>
                                        <?php }?>
                                    </select>
                                </div>
                                <!-- <div class="col-md-3 form-group">
                                    <label class="form-label font-w600">Batch <span
                                            class="text-danger scale5 ms-2">*</span></label>
                                    <select name="batch_id" id="batch" class="form-control">
                                        <option value="<?=$bsatch['id']??""?>" ><?=$bsatch['batch_name']??"Choose Batch"?> </option>
                                    </select>
                                </div> - -->
                                <div class="col-md-12 mt-2">
                                    <p class="h2 text-success"><i class="fas fa-user"></i> Student Information
                                    </p>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label class="form-label font-w600">Student Name <span
                                            class="text-danger scale5 ms-2">*</span></label>
                                    <input name="name" type="text" value="<?=$student['name']??set_value('sname')?>" class="form-control solid"  >
                                </div>

                                <div class="col-md-4 form-group">
                                    <label class="form-label font-w600">Father's Name <span
                                            class="text-danger scale5 ms-2">*</span></label>
                                    <input name="father_name" type="text" value="<?=$student['father_name']??set_value('father_name')?>" class="form-control solid">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label class="form-label font-w600">Mother's Name (Optional)</label>
                                    <input name="mother_name" type="text"  value="<?=$student['mother_name']??set_value('mother_name')?>" class="form-control solid" >
                                </div>
                                <div class="col-md-4 form-group">
                                    <label class="form-label font-w600">Date of Birth <span
                                            class="text-danger scale5 ms-2">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="far fa-clock"></i></div>
                                        <input size="16" type="date" name="dob" value="<?=$student['dob']??set_value('dob')?>" 
                                             class="form-control solid"  max="<?= date('Y-m-d') ?>">
                                    </div>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label class="form-label font-w600">Email Address <span
                                            class="text-danger scale5 ms-2">*</span></label>
                                    <input name="email" type="email" value="<?=$student['email']??set_value('email')?>" class="form-control solid"  >
                                </div>
                                <div class="col-4 form-group">
                                    <label class="form-label font-w600">Phone Number <span
                                            class="text-danger scale5 ms-2">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-text">+91</div>
                                        <input type="number" value="<?=$student['number']??set_value('number')?>" name="number" class="form-control solid" >
                                    </div>
                                </div>
                                
                                <div class="col-md-4 form-group">
                                    <label class="form-label font-w600">Gender <span
                                            class="text-danger scale5 ms-2">*</span></label>
                                    <select name="gender" id="sex" class="form-control solid">
                                        <option value="" selected disabled>Select Gender</option>
                                        <option value="Male"  <?php if(!empty($student)){if($student['gender']=='Male'){echo "selected";}}?>  >Male</option>
                                        <option value="Female"  <?php if(!empty($student)){if($student['gender']=='Female'){echo "selected";}}?>  >Female</option>
                                        <option value="Other"  <?php if(!empty($student)){if($student['gender']=='Other'){echo "selected";}}?>  >Other</option>
                                        
                                    </select>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label class="form-label font-w600">Category <span
                                            class="text-danger scale5 ms-2">*</span></label>
                                    <select name="category" class="form-control solid" >
                                        <option value="">Select Category</option>
                                        <option value="General" <?php if(!empty($student)){if($student['category']=='General'){echo "selected";}}?>  >General</option>
                                        <option value="SC" <?php if(!empty($student)){if($student['category']=='SC'){echo "selected";}}?>  >SC</option>
                                        <option value="ST"  <?php if(!empty($student)){if($student['category']=='ST'){echo "selected";}}?>   >ST</option>
                                        <option value="OBC"  <?php if(!empty($student)){if($student['category']=='OBC'){echo "selected";}}?>   >OBC</option>
                                        <option value="Other"  <?php if(!empty($student)){if($student['category']=='Other'){echo "selected";}}?>   >Others</option>
                                    </select>
                                </div>
                                
                                <div class="col-md-4 form-group">
                                    <label class="form-label font-w600">Identity Card. </label>
                                    <select name="idcard_type" class="form-control solid" >
                                        <option value="">Select Identity Card</option>
                                        <option value="Voter ID" <?php if(!empty($student)){if($student['idcard_type']=='Voter ID'){echo "selected";}}?>  >Voter ID</option>
                                        <option value="Pan Card" <?php if(!empty($student)){if($student['idcard_type']=='Pan Card'){echo "selected";}}?>>Pan Card</option>
                                        <option value="Aadhar Card" <?php if(!empty($student)){if($student['idcard_type']=='Aadhar Card'){echo "selected";}}?>>Aadhar Card</option>
                                    </select>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label class="form-label font-w600">ID Card Number </label>
                                    <input name="id_card_no" type="text" value="<?=$student['id_card_no']??set_value('id_card_no')?>" class="form-control solid" >
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="State">State <span
                                            class="text-danger scale5 ms-2"></span></label>
                                    <select name="state_id" class="form-control solid" id="state_id">
                                        <option selected disabled value="">Select State</option>
                                        <?php foreach($state as $row): ?>
                                            <option value="<?=$row['id']?>" <?php if(!empty($student)){if($student['state_id']==$row['id']){echo "selected";}}?> > <?=$row['state_name']?> </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label class="form-label font-w600">District <span
                                            class="text-danger scale5 ms-2"></span></label>
                                    <!--<select name="district_id" id="district_id" class="form-control solid">-->
                                    <!--    <option value="<?=$student['district_id']??""?>"><?=$district['city_name']??"Select District"?></option>-->
                                    <!--</select>-->
                                    <select name="district_id" id="district_id" class="form-control solid">
                                        <option value="">Select District</option>
                                        <?php if(!empty($districts)): ?>
                                            <?php foreach($districts as $d): ?>
                                                <option value="<?= $d['id'] ?>" <?= (!empty($student) && $student['district_id'] == $d['id']) ? 'selected' : '' ?>>
                                                    <?= $d['city_name'] ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>

                                </div>
                                
                                
                                <div class="col-md-3 form-group">
                                    <label class="form-label font-w600">Postcode / Zip <span
                                            class="text-danger scale5 ms-2"></span></label>
                                    <input name="pincode" type="number" value="<?=$student['pincode']??set_value('pincode')?>" class="form-control solid" 
                                        min="100000" max="999999" >
                                </div>
                                <div class="col-12 form-group">
                                    <label class="form-label font-w600">Address <span
                                            class="text-danger scale5 ms-2">*</span></label>
                                    <textarea name="address" rows="5" class="form-control solid" 
                                        ><?=$student['address']??set_value('address')?></textarea>
                                </div>

                                
                            
                            </div>
                        </div>
                       
                        <div>
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="h2 text-success mt-2"> <i class="fas fa-book"></i> Upload Documents </p>
                                </div>
                                <div class="col-md-12 form-group mt-2">
                                    <label class="form-label font-w600">Colour Passport Size Photo</label>
                                    <input type="file" name="photo" id="" class="form-control solid dropify input-file-events solid" data-height="200" data-max-file-size="1M" data-allowed-file-extensions="png jpg jpeg" <?php if(!empty($student)){ ?>data-default-file="<?=site_url('public/'.$student['photo'])?>"  <?php } ?> >
                                </div>

                                <div class="col-xl-6  col-md-6 mb-4 mt-2">
                                    <label class="form-label font-w600">Ragistration Date<span
                                            class="text-danger scale5 ms-2">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="far fa-clock"></i></div>
                                        <input size="16" type="text" name="reg_date"
                                            value="<?=isset($student)?date('Y-m-d',strtotime($student['reg_date'])):date('Y-m-d')?>"
                                            readonly class="form-control solid form_datetime solid" >
                                    </div>
                                </div>

                            </div>
                            <div>
                                <span>Status:<label class="radio-inline mx-3"><input type="radio" value="1"
                                            name="status" class="form-check-input" 
                                            <?php if(!empty($student)){if($student['status']==1){echo "checked";}}?>>
                                        Active</label></span>
                                <span><label class="radio-inline me-3"><input type="radio" value="0" name="status"
                                            class="form-check-input" 
                                            <?php if(!empty($student)){if($student['status']==0){echo "checked";}}?>>
                                        In Active</label></span>
                                <span><label class="radio-inline me-3"><input type="radio" value="-1" name="status"
                                            class="form-check-input" 
                                            <?php if(!empty($student)){if($student['status']==-1){echo "checked";}}?>>
                                        Reject</label></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <div>
                            <input type="reset" class="btn btn-danger light me-3" value="Reset"></a>
                            <input type="submit" class="btn btn-primary" value="<?=isset($student)?"Update":"Submit"?>">
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
    $("#select2").select2();
    $("#course_id").select2();
    $("#session_id").select2();
    $("#batch").select2();
    
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

    $('#session_id').change(function() {
        var session_id = $(this).val();
        
        $.ajax({
            url: '<?=url_to('getBatch')?>',
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

});
</script>
<?=$this->endSection()?>
<?=$this->endSection()?>
<?=$this->endSection()?>