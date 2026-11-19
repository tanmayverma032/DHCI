<!-- START HEADER -->
<?php include("inc/header.php"); ?>
<!-- END HEADER -->

 <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-18194245812">
</script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-18194245812');
</script>


<!-- START SECTION COURSES -->
<section class="small_pt bgimg">
    <div class="container bgragistration p-5">
        <div class="contact-form-wrap ">
            <h2 class="border-title" style="color:#0388c6;">Student Registration </h2>
            <h4 class="text-center text-danger"><?= session()->error ?></h4>
            <h4 class="text-center text-success"><?= session()->success ?></h4>
            <?= form_open_multipart(url_to('student_save'), ["class" => "contact-form"]) ?>
            <div class="row">

            <!-- Student Name -->
            <div class="col-md-6 form-group">
                <label>Student Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
        
            <!-- Father Name -->
            <div class="col-md-6 form-group">
                <label>Father's Name</label>
                <input type="text" name="father_name" class="form-control" required>
            </div>
        
            <!-- Mother Name -->
            <div class="col-md-6 form-group">
                <label>Mother's Name</label>
                <input type="text" name="mother_name" class="form-control" required>
            </div>
        
            <!-- DOB -->
            <div class="col-md-6 form-group">
                <label>Date of Birth</label>
                <input type="date" name="dob" class="form-control" required>
            </div>
        
            <!-- Mobile Number -->
            <div class="col-md-6 form-group">
                <label>Mobile Number</label>
                <input type="tel" name="phone" class="form-control"
                    pattern="[0-9]{10}" maxlength="10" required>
            </div>
        
            <!-- Pincode -->
            <div class="col-md-6 form-group">
                <label>Pincode</label>
                <input type="number" name="pincode" class="form-control" required>
            </div>
        
            <!-- Address -->
            <div class="col-md-12 form-group">
                <label>Address</label>
                <textarea name="address" class="form-control" rows="3" required></textarea>
            </div>
        
            <div class="col-12">
                <h4 class="mt-4 mb-3 text-primary">Documents Upload</h4>
            </div>
        
            <!-- 10th Marksheet -->
            <div class="col-md-6 form-group">
                <label>10th Marksheet</label>
                <input type="file" name="marksheet_10" class="form-control"
                    accept=".pdf,.jpg,.jpeg,.png">
            </div>
        
            <!-- 12th Marksheet -->
            <div class="col-md-6 form-group">
                <label>12th Marksheet</label>
                <input type="file" name="marksheet_12" class="form-control"
                    accept=".pdf,.jpg,.jpeg,.png">
            </div>
        
            <!-- Aadhaar Card -->
            <div class="col-md-6 form-group">
                <label>Aadhaar Card</label>
                <input type="file" name="aadhaar_card" class="form-control"
                    accept=".pdf,.jpg,.jpeg,.png">
            </div>
        
            <!-- Photo -->
            <div class="col-md-6 form-group">
                <label>Student Photo</label>
                <input type="file" name="photo" class="form-control"
                    accept=".jpg,.jpeg,.png">
            </div>
        
            <!-- Submit Button -->
            <div class="col-12 form-group">
                <button type="submit" class="btn btn-primary">
                    Submit <i class="fa fa-arrow-right"></i>
                </button>
            </div>

</div>
</section>
<!-- END SECTION COURSES -->

<style>
    /* Registration Section */
.bgimg {
    background: linear-gradient(135deg, #f4f8ff, #eef5ff);
    padding: 60px 0;
}

/* Form Card */
.bgragistration {
    max-width: 1100px;
    margin: auto;
    background: #ffffff;
    border-radius: 20px;
    box-shadow: 0 15px 40px rgba(0,0,0,0.08);
    overflow: hidden;
    position: relative;
}

/* Header */
.border-title {
    font-size: 32px;
    font-weight: 700;
    text-align: center;
    margin-bottom: 35px;
    position: relative;
}

.border-title::after {
    content: "";
    width: 80px;
    height: 4px;
    background: #0388c6;
    display: block;
    margin: 12px auto 0;
    border-radius: 50px;
}

/* Labels */
.contact-form label {
    font-size: 14px;
    font-weight: 600;
    color: #444;
    margin-bottom: 6px;
    display: block;
}

/* Inputs */
.contact-form .form-control {
    height: 52px;
    border: 1px solid #dce5f0;
    border-radius: 12px;
    padding: 12px 15px;
    font-size: 15px;
    transition: all 0.3s ease;
    background: #fafcff;
}

.contact-form textarea.form-control {
    height: auto;
}

/* Focus Effect */
.contact-form .form-control:focus {
    border-color: #0388c6;
    box-shadow: 0 0 0 4px rgba(3,136,198,0.15);
    background: #fff;
    outline: none;
}

/* Select */
.contact-form select.form-control {
    cursor: pointer;
}

/* File Upload */
input[type="file"] {
    padding: 10px;
    background: #fafcff;
}

/* Button */
.contact-form .btn-primary {
    width: 100%;
    height: 55px;
    border-radius: 12px;
    border: none;
    background: linear-gradient(135deg, #0388c6, #00588b);
    font-size: 17px;
    font-weight: 600;
    transition: all 0.4s ease;
    box-shadow: 0 10px 20px rgba(3,136,198,0.25);
}

.contact-form .btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 25px rgba(3,136,198,0.35);
    background: linear-gradient(135deg, #00588b, #0388c6);
}

/* Form Fields Hover */
.form-group:hover .form-control {
    border-color: #0388c6;
}

/* Success & Error */
.text-success,
.text-danger {
    text-align: center;
    margin-bottom: 15px;
    font-weight: 600;
}

/* Responsive */
@media(max-width:768px){
    
    .bgragistration{
        padding:20px !important;
        border-radius:15px;
    }

    .border-title{
        font-size:26px;
    }

    .contact-form .form-control{
        height:48px;
        font-size:14px;
    }

    .contact-form .btn-primary{
        height:50px;
        font-size:16px;
    }
}

.bgragistration::before{
    content:'';
    position:absolute;
    top:-100px;
    right:-100px;
    width:250px;
    height:250px;
    background:rgba(3,136,198,0.08);
    border-radius:50%;
}

.bgragistration::after{
    content:'';
    position:absolute;
    bottom:-80px;
    left:-80px;
    width:200px;
    height:200px;
    background:rgba(0,88,139,0.08);
    border-radius:50%;
}
</style>


<!-- START FOOTER -->
<?php include("inc/footer.php"); ?>
<script>
    $('#state').change(function() {
        var state_id = $(this).val();
        $.ajax({
            url: '<?= url_to('districtname') ?>',
            method: 'GET',
            data: {
                state_id: state_id
            },
            dataType: 'json',
            success: function(response) {
                $('#district').find('option').not(':first').remove();
                $('#town_city').find('option').not(':first').remove();
                if (response.distric) {
                    $.each(response.distric, function(index, district) {
                        $('#district').append('<option value="' + district.id + '">' + district.city_name + '</option>');
                        $('#town_city').append('<option value="' + district.city_name + '">' + district.city_name + '</option>');
                    });
                }

            }
        });
    });
    <?php if (session()->success) { ?>
        Swal.fire('<?= session()->success ?>');
    <?php } ?>
    <?php if (session()->error) { ?>

        Swal.fire('<?= session()->error ?>');
    <?php } ?>
</script>

<!-- END FOOTER -->