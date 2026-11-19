<!-- START HEADER -->
<?php include("inc/header.php"); ?>
<!-- END HEADER -->

<!-- START SECTION COURSES -->
<section class="small_pt bgimg">
    <div class="container bgragistration">
        
        <div class="contact-form-wrap p-4">

            <!-- Success / Error Messages -->
            <?php if(session()->getFlashdata('error')) : ?>
                <h5 class="text-center text-danger">
                    <?= session()->getFlashdata('error'); ?>
                </h5>
            <?php endif; ?>

            <?php if(session()->getFlashdata('success')) : ?>
                <h5 class="text-center text-success">
                    <?= session()->getFlashdata('success'); ?>
                </h5>
            <?php endif; ?>

            <h1 class="border-title text_blue3 mb-4" style="color:#0388c6;">
                Apply For Franchise
            </h1>

            <?= form_open(route_to('branch_save')) ?>

            <div class="row mt-2">

                <!-- Institute Name -->
                <div class="col-md-6 form-group mb-3">
                    <label>Name of the Institute *</label>
                    <input type="text"
                           name="institute_name"
                           class="form-control"
                           placeholder="Enter Institute Name"
                           required>
                </div>

                <!-- Phone Number -->
                <div class="col-md-6 form-group mb-3">
                    <label>Phone Number *</label>
                    <input type="text"
                           name="phone_number"
                           class="form-control"
                           placeholder="Enter Phone Number"
                           required>
                </div>

                <!-- Email -->
                <div class="col-md-6 form-group mb-3">
                    <label>Email Address *</label>
                    <input type="email"
                           name="email"
                           class="form-control"
                           placeholder="Enter Email Address"
                           required>
                </div>

                <!-- City -->
                <div class="col-md-6 form-group mb-3">
                    <label>City / Location *</label>
                    <input type="text"
                           name="city"
                           class="form-control"
                           placeholder="Enter City / Location"
                           required>
                </div>

                <!-- Own Institute -->
                <div class="col-md-6 form-group mb-3">
                    <label>Do you own an institute? *</label>
                    <select name="own_institute"
                            class="form-control"
                            required>
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
                           name="preferred_courses"
                           class="form-control"
                           placeholder="Enter Preferred Courses">
                </div>

                <!-- Message -->
                <div class="col-md-12 form-group mb-3">
                    <label>Message / Additional Details</label>
                    <textarea name="message"
                              class="form-control"
                              rows="4"
                              placeholder="Write your message here..."></textarea>
                </div>

                <!-- Submit Button -->
                <div class="col-12">
                    <button type="submit"
                            name="submit_btn"
                            class="btn btn-primary"
                            style="background-color:#0388c6; border-color:#00588b;">
                        Submit <i class="fa fa-arrow-right"></i>
                    </button>
                </div>

            </div>

            <?= form_close() ?>

        </div>

    </div>
</section>
<!-- END SECTION COURSES -->
<!-- END SECTION BREADCRUMB -->
<section class="small_pt bgimg" style="padding:60px 0; background:#f8f9fc;">
    <div class="container bgragistration">
        <div class="contact-form-wrap p-4" style="background:#fff; border-radius:15px; box-shadow:0 5px 20px rgba(0,0,0,0.08);">

            <!-- Heading -->
            <div style="text-align:center; margin-bottom:40px;">
                <h2 style="font-size:38px; font-weight:700; color:#0b3b75; margin-bottom:10px;">
                    Franchise Opportunity – DHCI
                </h2>
                <p style="font-size:18px; color:#d93343; font-weight:600;">
                    Partner With a Trusted Name in Healthcare Education
                </p>
                <p style="font-size:16px; color:#555; max-width:950px; margin:auto; line-height:1.8;">
                    Join DHCI (Delhi Healthcare Institute) and become a part of a fast-growing network committed to delivering quality healthcare and vocational education across India. We offer you the opportunity to build a profitable and purpose-driven education business with complete institutional support.
                </p>
            </div>

            <!-- Features -->
            <div class="row">

                <!-- Card -->
                <div class="col-md-6 mb-4">
                    <div style="background:#f9fbff; border-left:5px solid #d93343; padding:25px; border-radius:12px; height:100%; box-shadow:0 3px 10px rgba(0,0,0,0.05);">
                        <h4 style="color:#0b3b75; font-weight:700;">🚀 Low Investment, High Returns</h4>
                        <p style="color:#555; line-height:1.8; margin-bottom:0;">
                            Start your own institute with minimal investment and scalable revenue opportunities through multiple course offerings.
                        </p>
                    </div>
                </div>

                <!-- Card -->
                <div class="col-md-6 mb-4">
                    <div style="background:#f9fbff; border-left:5px solid #0b3b75; padding:25px; border-radius:12px; height:100%; box-shadow:0 3px 10px rgba(0,0,0,0.05);">
                        <h4 style="color:#0b3b75; font-weight:700;">🎓 Recognized & Industry-Relevant Programs</h4>
                        <p style="color:#555; line-height:1.8; margin-bottom:0;">
                            Offer in-demand healthcare and vocational courses designed as per current industry requirements.
                        </p>
                    </div>
                </div>

                <!-- Card -->
                <div class="col-md-6 mb-4">
                    <div style="background:#f9fbff; border-left:5px solid #28a745; padding:25px; border-radius:12px; height:100%; box-shadow:0 3px 10px rgba(0,0,0,0.05);">
                        <h4 style="color:#0b3b75; font-weight:700;">📜 Certification Support</h4>
                        <p style="color:#555; line-height:1.8; margin-bottom:0;">
                            Get authorized certification from DHCI for all enrolled students, adding credibility and value to your institute.
                        </p>
                    </div>
                </div>

                <!-- Card -->
                <div class="col-md-6 mb-4">
                    <div style="background:#f9fbff; border-left:5px solid #ff9800; padding:25px; border-radius:12px; height:100%; box-shadow:0 3px 10px rgba(0,0,0,0.05);">
                        <h4 style="color:#0b3b75; font-weight:700;">📈 Complete Business Support</h4>
                        <p style="color:#555; line-height:1.8; margin-bottom:0;">
                            From setup to operations, we guide you at every step—ensuring smooth execution and growth.
                        </p>
                    </div>
                </div>

                <!-- Card -->
                <div class="col-md-6 mb-4">
                    <div style="background:#f9fbff; border-left:5px solid #17a2b8; padding:25px; border-radius:12px; height:100%; box-shadow:0 3px 10px rgba(0,0,0,0.05);">
                        <h4 style="color:#0b3b75; font-weight:700;">🎯 High Demand Sector</h4>
                        <p style="color:#555; line-height:1.8; margin-bottom:0;">
                            Healthcare education is one of the fastest-growing sectors, ensuring consistent student demand and long-term stability.
                        </p>
                    </div>
                </div>

                <!-- Card -->
                <div class="col-md-6 mb-4">
                    <div style="background:#f9fbff; border-left:5px solid #6f42c1; padding:25px; border-radius:12px; height:100%; box-shadow:0 3px 10px rgba(0,0,0,0.05);">
                        <h4 style="color:#0b3b75; font-weight:700;">🤝 Marketing & Admission Assistance</h4>
                        <p style="color:#555; line-height:1.8; margin-bottom:0;">
                            Get guidance on student acquisition strategies, promotions, and lead conversion.
                        </p>
                    </div>
                </div>

                <!-- Card -->
                <div class="col-md-12 mb-4">
                    <div style="background:#f9fbff; border-left:5px solid #dc3545; padding:25px; border-radius:12px; box-shadow:0 3px 10px rgba(0,0,0,0.05);">
                        <h4 style="color:#0b3b75; font-weight:700;">🧑🏫 Training & Operational Guidance</h4>
                        <p style="color:#555; line-height:1.8; margin-bottom:0;">
                            We provide training support for you and your team to maintain quality standards and deliver excellence.
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
                        <div style="background:#fff5f5; padding:18px; border-radius:10px; font-weight:600; color:#333;">
                            ✔ Authorization to operate under DHCI brand
                        </div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <div style="background:#fff5f5; padding:18px; border-radius:10px; font-weight:600; color:#333;">
                            ✔ Access to multiple healthcare & vocational courses
                        </div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <div style="background:#fff5f5; padding:18px; border-radius:10px; font-weight:600; color:#333;">
                            ✔ Certification support for students
                        </div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <div style="background:#fff5f5; padding:18px; border-radius:10px; font-weight:600; color:#333;">
                            ✔ Academic and operational guidance
                        </div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <div style="background:#fff5f5; padding:18px; border-radius:10px; font-weight:600; color:#333;">
                            ✔ Marketing and branding support
                        </div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <div style="background:#fff5f5; padding:18px; border-radius:10px; font-weight:600; color:#333;">
                            ✔ Continuous mentorship and business growth support
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<style>
    /* =========================
   FRANCHISE FORM UI
========================= */

.bgimg{
    background: linear-gradient(135deg,#f4f8fc,#eef6ff);
    padding:80px 0;
}

/* Main Card */
.bgragistration{
    max-width:1100px;
    margin:auto;
    background:#fff;
    border-radius:25px;
    box-shadow:0 20px 60px rgba(0,0,0,0.08);
    overflow:hidden;
    position:relative;
}

/* Decorative Background */
.bgragistration::before{
    content:'';
    position:absolute;
    width:350px;
    height:350px;
    background:rgba(3,136,198,0.08);
    border-radius:50%;
    top:-180px;
    right:-120px;
}

.bgragistration::after{
    content:'';
    position:absolute;
    width:250px;
    height:250px;
    background:rgba(0,88,139,0.08);
    border-radius:50%;
    left:-100px;
    bottom:-100px;
}

.contact-form-wrap{
    position:relative;
    z-index:2;
    padding:50px !important;
}

/* Title */
.border-title{
    text-align:center;
    font-size:42px;
    font-weight:700;
    color:#0388c6 !important;
    margin-bottom:10px;
    letter-spacing:.5px;
}

.border-title::after{
    content:'';
    width:90px;
    height:4px;
    background:linear-gradient(90deg,#0388c6,#00588b);
    display:block;
    margin:15px auto;
    border-radius:50px;
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
    height:58px;
    border:1px solid #d9e4ee;
    border-radius:14px;
    background:#fafcff;
    padding:12px 18px;
    font-size:15px;
    transition:all .3s ease;
}

.form-control::placeholder{
    color:#98a6b5;
}

/* Focus Effect */
.form-control:focus{
    border-color:#0388c6;
    background:#fff;
    box-shadow:0 0 0 5px rgba(3,136,198,.12);
    outline:none;
}

/* Select Styling */
select.form-control{
    cursor:pointer;
}

/* Textarea */
textarea.form-control{
    min-height:140px;
    resize:vertical;
    padding-top:15px;
}

/* Hover Animation */
.form-group:hover .form-control{
    border-color:#0388c6;
    transform:translateY(-2px);
}

/* Submit Button */
.btn-primary{
    width:100%;
    height:60px;
    border:none !important;
    border-radius:15px;
    font-size:17px;
    font-weight:600;
    background:linear-gradient(135deg,#0388c6,#00588b) !important;
    transition:all .35s ease;
    box-shadow:0 12px 25px rgba(3,136,198,.25);
}

.btn-primary:hover{
    transform:translateY(-4px);
    box-shadow:0 18px 35px rgba(3,136,198,.35);
    background:linear-gradient(135deg,#00588b,#0388c6) !important;
}

.btn-primary i{
    margin-left:8px;
}

/* Success Message */
.text-success{
    background:#e8fff1;
    color:#198754 !important;
    padding:12px;
    border-radius:10px;
    margin-bottom:20px;
    font-size:15px;
}

/* Error Message */
.text-danger{
    background:#fff0f1;
    color:#dc3545 !important;
    padding:12px;
    border-radius:10px;
    margin-bottom:20px;
    font-size:15px;
}

/* Input Row Gap */
.row .form-group{
    margin-bottom:22px !important;
}

/* Responsive */
@media(max-width:991px){

    .contact-form-wrap{
        padding:35px !important;
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
        font-size:14px;
    }

    textarea.form-control{
        min-height:120px;
    }

    .btn-primary{
        height:54px;
        font-size:16px;
    }

    .bgragistration{
        border-radius:18px;
    }

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
                if (response.distric) {
                    $.each(response.distric, function(index, district) {
                        $('#district').append('<option value="' + district.id + '">' + district.city_name + '</option>');
                    });
                }

            }
        });
    });
    <?php if (session()->success) { ?>
        Swal.fire('<?= session()->success ?>');
    <?php } ?>
</script>
<!-- END FOOTER -->

