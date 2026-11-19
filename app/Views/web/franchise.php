<!-- START HEADER -->
<?php include("inc/header.php"); ?>
<!-- END HEADER -->

<!-- START SECTION BREADCRUMB -->
<?php include("inc/headtitle.php"); ?>
<!-- END SECTION BREADCRUMB -->

<!-- START SECTION COURSES -->
<section class="small_pt bgimg">
    <div class="container bgragistration">
        <div class="contact-form-wrap p-4">

            <!-- Session Messages -->
            <?php if(session()->getFlashdata('error')) : ?>
                <h4 class="text-center text-danger">
                    <?= session()->getFlashdata('error'); ?>
                </h4>
            <?php endif; ?>

            <?php if(session()->getFlashdata('success')) : ?>
                <h4 class="text-center text-success">
                    <?= session()->getFlashdata('success'); ?>
                </h4>
            <?php endif; ?>

            <h1 class="border-title text_blue3 mb-4" style="color:#0388c6;">
                Apply For Franchise
            </h1>

            <?= form_open_multipart(route_to('branch_save')); ?>

            <div class="row mt-2">

                <!-- Full Name -->
                <div class="col-md-6 form-group mb-3">
                    <label>Full Name *</label>
                    <input type="text"
                           name="institute_name_1"
                           class="form-control"
                           placeholder="Enter Full Name"
                           required>
                </div>

                <!-- Phone Number -->
                <div class="col-md-6 form-group mb-3">
                    <label>Phone Number *</label>
                    <input type="text"
                           name="phone_number_!"
                           class="form-control"
                           placeholder="Enter Phone Number"
                           required>
                </div>

                <!-- Email Address -->
                <div class="col-md-6 form-group mb-3">
                    <label>Email Address *</label>
                    <input type="email"
                           name="email_!"
                           class="form-control"
                           placeholder="Enter Email Address"
                           required>
                </div>

                <!-- City / Location -->
                <div class="col-md-6 form-group mb-3">
                    <label>City / Location *</label>
                    <input type="text"
                           name="city!"
                           class="form-control"
                           placeholder="Enter City / Location"
                           required>
                </div>

                <!-- Own Institute -->
                <div class="col-md-6 form-group mb-3">
                    <label>Do you own an institute? *</label>
                    <select name="own_institute_1" class="form-control" required>
                        <option value="">Select Option</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>

                <!-- Available Space -->
                <div class="col-md-6 form-group mb-3">
                    <label>Available Space (in sq. ft.)</label>
                    <input type="text"
                           name="available_space"
                           class="form-control"
                           placeholder="Enter Available Space">
                </div>

                <!-- Preferred Courses -->
                <div class="col-md-12 form-group mb-3">
                    <label>Preferred Courses</label>
                    <input type="text"
                           name="preferred_courses_!"
                           class="form-control"
                           placeholder="Enter Preferred Courses">
                </div>

                <!-- Message -->
                <div class="col-md-12 form-group mb-3">
                    <label>Message / Additional Details</label>
                    <textarea name="message_1"
                              class="form-control"
                              placeholder="Write your message here..."
                              rows="4"></textarea>
                </div>

                <!-- Submit Button -->
                <div class="form-group col-12">
                    <button class="btn btn-primary"
                            style="background-color:#0388c6; border-color:#00588b;"
                            type="submit"
                            name="submit_btn">
                        Submit <i class="fa fa-arrow-right"></i>
                    </button>
                </div>

            </div>

            <?= form_close(); ?>

        </div>
    </div>
</section>
<!-- END SECTION COURSES -->

<p class="text-center franchise-subtitle">
Become our authorized franchise partner and grow your education business with us.
</p>

<style>
    
/* ==========================
   MODERN FRANCHISE FORM UI
========================== */

.bgimg{
    background: linear-gradient(135deg,#f4f7fb,#eef5ff);
    padding:80px 0;
}

/* Main Container */
.bgragistration{
    max-width:1200px;
    margin:auto;
    background:#fff;
    border-radius:24px;
    box-shadow:0 20px 50px rgba(0,0,0,0.08);
    overflow:hidden;
    position:relative;
}

/* Decorative Circles */
.bgragistration::before{
    content:'';
    position:absolute;
    width:350px;
    height:350px;
    border-radius:50%;
    background:rgba(3,136,198,.06);
    top:-150px;
    right:-100px;
}

.bgragistration::after{
    content:'';
    position:absolute;
    width:250px;
    height:250px;
    border-radius:50%;
    background:rgba(11,59,117,.05);
    left:-80px;
    bottom:-80px;
}

/* Form Wrapper */
.contact-form-wrap{
    position:relative;
    z-index:2;
    padding:60px !important;
}

/* Heading */
.border-title{
    font-size:42px;
    font-weight:700;
    text-align:center;
    color:#0b3b75 !important;
    margin-bottom:15px;
}

.border-title::after{
    content:'';
    width:90px;
    height:4px;
    background:linear-gradient(90deg,#0388c6,#0b3b75);
    display:block;
    margin:15px auto 0;
    border-radius:50px;
}

/* Form Grid Spacing */
.row{
    margin-top:20px;
}

.form-group{
    margin-bottom:25px;
}

/* Labels */
.form-group label{
    font-size:14px;
    font-weight:600;
    color:#2c3e50;
    margin-bottom:8px;
    display:block;
}

/* Inputs */
.form-control{
    width:100%;
    height:56px;
    border:1px solid #dce6f0;
    border-radius:14px;
    background:#fafcff;
    padding:0 18px;
    font-size:15px;
    color:#2c3e50;
    transition:all .3s ease;
}

.form-control::placeholder{
    color:#9aa7b6;
}

.form-control:focus{
    border-color:#0388c6;
    background:#fff;
    box-shadow:0 0 0 4px rgba(3,136,198,.12);
    outline:none;
}

/* Textarea */
textarea.form-control{
    min-height:150px;
    padding:15px 18px;
    resize:vertical;
}

/* Select */
select.form-control{
    cursor:pointer;
}

/* Hover */
.form-group:hover .form-control{
    border-color:#0388c6;
}

/* Button */
.btn-primary{
    width:100%;
    height:60px;
    border:none;
    border-radius:14px;
    background:linear-gradient(135deg,#0388c6,#0b3b75) !important;
    font-size:17px;
    font-weight:600;
    color:#fff;
    transition:.3s ease;
    box-shadow:0 12px 25px rgba(3,136,198,.25);
}

.btn-primary:hover{
    transform:translateY(-3px);
    box-shadow:0 18px 35px rgba(3,136,198,.35);
}

.btn-primary i{
    margin-left:8px;
}

/* Success Message */
.text-success{
    background:#e8fff1;
    border-left:4px solid #198754;
    padding:14px;
    border-radius:10px;
    margin-bottom:20px;
}

/* Error Message */
.text-danger{
    background:#fff1f2;
    border-left:4px solid #dc3545;
    padding:14px;
    border-radius:10px;
    margin-bottom:20px;
}

/* Franchise Subtitle */
.franchise-subtitle{
    text-align:center;
    font-size:17px;
    color:#6b7280;
    max-width:700px;
    margin:30px auto;
    line-height:1.8;
}

/* Feature Cards */
.feature-card{
    background:#fff;
    border-radius:18px;
    padding:30px;
    height:100%;
    transition:.3s ease;
    border:1px solid #eef2f7;
    box-shadow:0 8px 20px rgba(0,0,0,0.04);
}

.feature-card:hover{
    transform:translateY(-6px);
    box-shadow:0 18px 35px rgba(0,0,0,.08);
}

.feature-card h4{
    font-size:20px;
    color:#0b3b75;
    font-weight:700;
    margin-bottom:15px;
}

.feature-card p{
    color:#555;
    line-height:1.8;
    margin:0;
}

/* Benefits */
.benefit-box{
    background:#f8fbff;
    border:1px solid #e4eef8;
    padding:18px 20px;
    border-radius:14px;
    font-weight:600;
    color:#0b3b75;
    height:100%;
    transition:.3s;
}

.benefit-box:hover{
    background:#0388c6;
    color:#fff;
    transform:translateY(-3px);
}

/* Responsive */
@media(max-width:991px){

    .contact-form-wrap{
        padding:40px !important;
    }

    .border-title{
        font-size:34px;
    }

}

@media(max-width:767px){

    .bgimg{
        padding:40px 15px;
    }

    .contact-form-wrap{
        padding:25px !important;
    }

    .border-title{
        font-size:28px;
    }

    .form-control{
        height:52px;
    }

    textarea.form-control{
        min-height:120px;
    }

    .btn-primary{
        height:54px;
    }

    .feature-card{
        padding:22px;
    }

}
    
</style>


<!-- START FRANCHISE SECTION -->
<section class="small_pt bgimg" style="padding:60px 0; background:#f8f9fc;">
    <div class="container bgragistration">
        <div class="contact-form-wrap p-4"
             style="background:#fff; border-radius:15px; box-shadow:0 5px 20px rgba(0,0,0,0.08);">

            <!-- Heading -->
            <div style="text-align:center; margin-bottom:40px;">
                <h2 style="font-size:38px; font-weight:700; color:#0b3b75; margin-bottom:10px;">
                    Franchise Opportunity – DHCI
                </h2>

                <p style="font-size:18px; color:#d93343; font-weight:600;">
                    Partner With a Trusted Name in Healthcare Education
                </p>

                <p style="font-size:16px; color:#555; max-width:950px; margin:auto; line-height:1.8;">
                    Join DHCI (Delhi Healthcare Institute) and become a part of a fast-growing network committed to delivering quality healthcare and vocational education across India.
                </p>
            </div>

            <!-- Features -->
            <div class="row">

                <!-- Card -->
                <div class="col-md-6 mb-4">
                    <div class="feature-card border-danger">
                        <h4>🚀 Low Investment, High Returns</h4>
                        <p>
                            Start your own institute with minimal investment and scalable revenue opportunities.
                        </p>
                    </div>
                </div>

                <!-- Card -->
                <div class="col-md-6 mb-4">
                    <div class="feature-card border-primary">
                        <h4>🎓 Recognized & Industry-Relevant Programs</h4>
                        <p>
                            Offer in-demand healthcare and vocational courses designed as per industry requirements.
                        </p>
                    </div>
                </div>

                <!-- Card -->
                <div class="col-md-6 mb-4">
                    <div class="feature-card border-success">
                        <h4>📜 Certification Support</h4>
                        <p>
                            Get authorized certification support for all enrolled students.
                        </p>
                    </div>
                </div>

                <!-- Card -->
                <div class="col-md-6 mb-4">
                    <div class="feature-card border-warning">
                        <h4>📈 Complete Business Support</h4>
                        <p>
                            We guide you from setup to operations for smooth growth.
                        </p>
                    </div>
                </div>

            </div>

            <!-- What You Get -->
            <div style="margin-top:50px;">
                <h3 style="text-align:center; color:#0b3b75; font-weight:700; margin-bottom:25px;">
                    What You Get
                </h3>

                <div class="row">

                    <div class="col-md-4 mb-3">
                        <div class="benefit-box">
                            ✔ Authorization to operate under DHCI brand
                        </div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <div class="benefit-box">
                            ✔ Access to healthcare & vocational courses
                        </div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <div class="benefit-box">
                            ✔ Certification support for students
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>
<!-- END FRANCHISE SECTION -->


<!-- START FOOTER -->
<?php include("inc/footer.php"); ?>


<script>
$(document).ready(function () {

    // State Change
    $('#state').change(function () {

        let state_id = $(this).val();

        $.ajax({
            url: "<?= url_to('districtname'); ?>",
            type: "GET",
            data: {
                state_id: state_id
            },
            dataType: "json",

            success: function (response) {

                $('#district').find('option:not(:first)').remove();

                if (response.distric) {

                    $.each(response.distric, function (index, district) {

                        $('#district').append(
                            '<option value="' + district.id + '">' +
                            district.city_name +
                            '</option>'
                        );

                    });

                }
            },

            error: function (xhr, status, error) {
                console.log(error);
            }
        });

    });

    // Success Alert
    <?php if(session()->getFlashdata('success')) : ?>

        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '<?= session()->getFlashdata('success'); ?>'
        });

    <?php endif; ?>

});
</script>

<!-- END FOOTER -->