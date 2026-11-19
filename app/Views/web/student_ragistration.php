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
            <?= form_open_multipart(url_to('student_save'), ["class" => "contact-form", "id" => "studentForm"]) ?>
            <div class="row">

                <!-- 1. Admission Session -->
                <div class="col-md-6 form-group">
                    <label for="">Admission Session <span class="text-danger">*</span></label>
                    <select name="admission_session" class="form-control" required>
                        <option value="" selected disabled>Select Session</option>
                        <option value="A26-27">A26-27</option>
                        <option value="A25-26">A25-26</option>
                        <option value="A24-25">A24-25</option>
                    </select>
                </div>

                <!-- 2. Admission Type -->
                <div class="col-md-6 form-group">
                    <label for="">Admission Type <span class="text-danger">*</span></label>
                    <select name="admission_type" class="form-control" required>
                        <option value="" selected disabled>Select Type</option>
                        <option value="Fresh">Fresh</option>
                        <option value="Lateral">Lateral</option>
                        <option value="Distance">Distance</option>
                    </select>
                </div>

                <!-- 3. Course -->
                <div class="col-md-6 form-group">
                    <label for="">Course <span class="text-danger">*</span></label>
                    <select name="course" class="form-control" id="course_category" required>
                        <option value="" selected disabled>Select Course</option>
                        <option value="Diploma">Diploma (2 Years)</option>
                        <option value="Certificate">Certificate (1 Year)</option>
                        <option value="Short Term">Short Term (6 Months / 3 Months)</option>
                    </select>
                </div>

                <!-- 4. Sub Course -->
                <div class="col-md-6 form-group">
                    <label for="">Sub Course <span class="text-danger">*</span></label>
                    <select name="sub_course" class="form-control" id="course_select" required>
                        <option value="" selected disabled>Select Sub Course</option>
                    </select>
                </div>

                <!-- 4b. Semester (Locked to 1, cannot be changed) -->
                <div class="col-md-6 form-group">
                    <label for="">Semester <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" value="1" readonly tabindex="-1" style="background:#eef2f6; cursor:not-allowed;">
                    <input type="hidden" name="semester" value="1">
                </div>

                <!-- 5. Full Name -->
                <div class="col-md-6 form-group">
                    <label for="">Full Name <span class="text-danger">*</span></label>
                    <input name="full_name" type="text" value="<?= set_value('full_name') ?>" class="form-control" placeholder="Full Name" required>
                </div>

                <!-- 6. Father Name -->
                <div class="col-md-6 form-group">
                    <label for="">Father's Name <span class="text-danger">*</span></label>
                    <input name="father_name" type="text" value="<?= set_value('father_name') ?>" class="form-control" placeholder="Father's Name" required>
                </div>

                <!-- 7. Mother Name -->
                <div class="col-md-6 form-group">
                    <label for="">Mother's Name <span class="text-danger">*</span></label>
                    <input name="mother_name" type="text" value="<?= set_value('mother_name') ?>" class="form-control" placeholder="Mother's Name" required>
                </div>

                <!-- 8. Date of Birth -->
                <div class="col-md-6 form-group">
                    <label for="">Date of Birth <span class="text-danger">*</span></label>
                    <input name="dob" type="date" value="<?= set_value('dob') ?>" class="form-control" required>
                </div>

                <!-- 9. Gender -->
                <div class="col-md-6 form-group">
                    <label for="">Gender <span class="text-danger">*</span></label>
                    <select name="gender" class="form-control" required>
                        <option value="" selected disabled>Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                <!-- 10. Category -->
                <div class="col-md-6 form-group">
                    <label for="">Category <span class="text-danger">*</span></label>
                    <select name="category" class="form-control" required>
                        <option value="" selected disabled>Select Category</option>
                        <option value="General">General</option>
                        <option value="OBC">OBC</option>
                        <option value="SC">SC</option>
                        <option value="ST">ST</option>
                        <option value="EWS">EWS</option>
                    </select>
                </div>

                <!-- 11. Aadhar Number -->
                <div class="col-md-6 form-group">
                    <label for="">Aadhar Number <span class="text-danger">*</span></label>
                    <input name="aadhar" type="text" value="<?= set_value('aadhar') ?>" class="form-control" placeholder="Enter 12-digit Aadhar" maxlength="12" required>
                </div>

                <!-- 12. Nationality -->
                <div class="col-md-6 form-group">
                    <label for="">Nationality</label>
                    <input name="nationality" type="text" value="<?= set_value('nationality', 'Indian') ?>" class="form-control" placeholder="Enter Nationality">
                </div>

                <!-- 13. Email -->
                <div class="col-md-6 form-group">
                    <label for="">Email Address</label>
                    <input name="email" type="email" value="<?= set_value('email') ?>" class="form-control" placeholder="Email Address">
                </div>

                <!-- 14. Alternate Email -->
                <div class="col-md-6 form-group">
                    <label for="">Alternate Email</label>
                    <input name="alternate_email" type="email" value="<?= set_value('alternate_email') ?>" class="form-control" placeholder="Alternate Email">
                </div>

                <!-- 15. Mobile -->
                <div class="col-md-6 form-group">
                    <label for="">Mobile Number</label>
                    <input name="mobile" type="number" value="<?= set_value('mobile') ?>" class="form-control" placeholder="Enter 10-digit Mobile" min="1000000000" max="9999999999">
                </div>

                <!-- 16. Alternate Mobile -->
                <div class="col-md-6 form-group">
                    <label for="">Alternate Mobile</label>
                    <input name="alternate_mobile" type="number" value="<?= set_value('alternate_mobile') ?>" class="form-control" placeholder="Alternate Mobile" min="1000000000" max="9999999999">
                </div>

                <!-- 17. City -->
                <div class="col-md-4 form-group">
                    <label for="">City</label>
                    <input name="city" type="text" value="<?= set_value('city') ?>" class="form-control" placeholder="Enter City">
                </div>

                <!-- 18. District -->
                <div class="col-md-4 form-group">
                    <label for="">District</label>
                    <input name="district" type="text" value="<?= set_value('district') ?>" class="form-control" placeholder="Enter District">
                </div>

                <!-- 19. State -->
                <div class="col-md-4 form-group">
                    <label for="">State</label>
                    <input name="state" type="text" value="<?= set_value('state') ?>" class="form-control" placeholder="Enter State">
                </div>

                <!-- Address -->
                <div class="col-md-12 form-group">
                    <label for="">Address</label>
                    <textarea name="address" class="form-control" placeholder="Enter Full Address" rows="2"><?= set_value('address') ?></textarea>
                </div>

                <!-- 20. Photo -->
                <div class="col-md-6 form-group">
                    <label for="">Photo <span class="text-danger">*</span></label>
                    <input name="photo" type="file" class="form-control" accept="image/*" required>
                </div>

                <!-- 21. Aadhaar Image -->
                <div class="col-md-6 form-group">
                    <label for="">Aadhaar <span class="text-danger">*</span></label>
                    <input name="aadhar_image" type="file" class="form-control" accept=".pdf,.jpg,.jpeg,.png" required>
                </div>

                <!-- 22. Student's Signature -->
                <div class="col-md-6 form-group">
                    <label for="">Student's Signature <span class="text-danger">*</span></label>
                    <input name="student_signature" type="file" class="form-control" accept="image/*" required>
                </div>

                <!-- 23. Other Certificates -->
                <div class="col-md-6 form-group">
                    <label for="">Other Certificates</label>
                    <input name="other_certificate" type="file" class="form-control" accept=".pdf,.jpg,.jpeg,.png">
                </div>

                <!-- Study Center (Hidden - Default 1 as per API) -->
                <input type="hidden" name="center_id" value="1">

                <!-- Submit Button -->
                <div class="form-group col-12">
                    <button class="btn btn-primary" type="submit" name="search_registration" style="background-color: #0388c6; border-color: #00588b;">
                        Submit <i class="fa fa-arrow-right"></i>
                    </button>
                </div>

            </div>
            <?= form_close() ?>
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

<!-- Razor pay Checkout -->
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>
$(document).ready(function() {

    // ========================================================
    // RAZORPAY CONFIG (fill in your own live/test Key ID + fee amount)
    // ========================================================
    var RAZORPAY_KEY_ID = 'YOUR_RAZORPAY_KEY_ID';   // <-- put your Razorpay Key ID here
    var ADMISSION_FEE_PAISE = 500000;                // <-- amount in paise (500000 = Rs.5000). Change as needed.

    // ========================================================
    // GENERATE LOGIN CREDENTIALS (DHCI + 5 random digits)
    // ========================================================
    function generateCredentials() {
        var randomDigits = Math.floor(10000 + Math.random() * 90000).toString(); // 5-digit random
        return {
            loginId: 'DHCI' + randomDigits,
            password: randomDigits
        };
    }

    // ========================================================
    // COURSE DATA STRUCTURE (From E-courses.docx)
    // ========================================================
    var courseData = {
        'Diploma': {
            'DMLT': 'DMLT (Diploma in Medical Laboratory Technology)',
            'DRIT': 'DRIT (Diploma in Radiology & Imaging Technology)',
            'DOTT': 'DOTT (Diploma in Operation Theatre Technology)',
            'DOPT': 'DOPT (Diploma in Optometry)',
            'DDT': 'DDT (Diploma in Dialysis Technology)',
            'DPCT': 'DPCT (Diploma in Patient Care Technology)',
            'DHM': 'DHM (Diploma in Hospital Management)',
            'DHSM': 'DHSM (Diploma in Hospital Sterilization Management)',
            'CMSED': 'CMSED (Diploma in Community Health & Sanitation)'
        },
        'Certificate': {
            'CMLT': 'CMLT (Certificate in Medical Laboratory Technology)',
            'CRAD': 'CRAD (Certificate in Radiology)',
            'COTT': 'COTT (Certificate in Operation Theatre Technology)',
            'COPT': 'COPT (Certificate in Optometry)',
            'CDT': 'CDT (Certificate in Dialysis)',
            'CPCT': 'CPCT (Certificate in Patient Care)',
            'CHM': 'CHM (Certificate in Hospital Management)',
            'CHSM': 'CHSM (Certificate in Hospital Sterilization Management)',
            'CCMSED': 'CCMSED (Certificate in Community Health & Sanitation)'
        },
        'Short Term': {
            'GDA_6M': 'GDA (General Duty Assistant) - 6 Months',
            'GDA_3M': 'GDA (General Duty Assistant) - 3 Months',
            'EMT_2S': 'EMT (Emergency Medical Technician) - 2 Semesters',
            'EMT_3M': 'EMT (Emergency Medical Technician) - 3 Months',
            'MNA_2S': 'MNA (Medical Nursing Assistant) - 2 Semesters',
            'MNA_3M': 'MNA (Medical Nursing Assistant) - 3 Months'
        }
    };

    // ========================================================
    // DYNAMIC SUB COURSE SELECTION
    // ========================================================
    $('#course_category').change(function() {
        var category = $(this).val();
        var courseSelect = $('#course_select');

        courseSelect.find('option:not(:first)').remove();

        if (category && courseData[category]) {
            var courses = courseData[category];
            for (var key in courses) {
                if (courses.hasOwnProperty(key)) {
                    courseSelect.append('<option value="' + key + '">' + courses[key] + '</option>');
                }
            }
        }
    });

    // ========================================================
    // SUBMIT CLICK -> PEHLE PAYMENT -> PHIR DATA SAVE (payment success par hi)
    // ========================================================
    $('#studentForm').on('submit', function(e) {
        e.preventDefault();

        var formEl = this;

        // Required fields check (kyunki e.preventDefault() se browser validation ruk jaati hai)
        if (!formEl.checkValidity()) {
            formEl.reportValidity();
            return;
        }

        // Form ka poora data payment se pehle hi capture kar lo
        var formData = new FormData(formEl);

        var options = {
            key: RAZORPAY_KEY_ID,
            amount: ADMISSION_FEE_PAISE,
            currency: 'INR',
            name: 'DHCI',
            description: 'Admission Fee',

            // ===== YE SIRF PAYMENT SUCCESS HONE PAR CHALTA HAI =====
            handler: function(response) {

                formData.append('razorpay_payment_id', response.razorpay_payment_id);

                Swal.fire({
                    title: 'Submitting...',
                    text: 'Payment successful. Saving your registration...',
                    allowOutsideClick: false,
                    didOpen: function() {
                        Swal.showLoading();
                    }
                });

                var apiKey = 'sk_live_123456789'; // <-- API KEY

                $.ajax({
                    url: 'https://admission.dhciindia.com/api/admission/create-student.php',
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-API-KEY': apiKey
                    },
                    success: function(res) {
                        Swal.close();

                        if (res.success && res.code == 200) {
                            var creds = generateCredentials();

                            $.ajax({
                                url: 'https://admission.dhciindia.com/api/admission/save-payment.php',
                                method: 'POST',
                                data: {
                                    student_id: res.data.student_id,
                                    unique_id: res.data.unique_id,
                                    razorpay_payment_id: response.razorpay_payment_id,
                                    login_id: creds.loginId,
                                    password: creds.password
                                },
                                complete: function() {
                                    formEl.reset();
                                    $('#course_select').find('option:not(:first)').remove();

                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Registration Successful!',
                                        html: 'Payment complete. Aapka Login ID / Password:<br><br>' +
                                              '<b>Login ID:</b> ' + creds.loginId + '<br>' +
                                              '<b>Password:</b> ' + creds.password,
                                        confirmButtonColor: '#0388c6'
                                    });
                                }
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Payment received, but registration failed',
                                text: (res.message || 'Kripya support se sampark karein, aapka payment ho chuka hai.'),
                                confirmButtonColor: '#dc3545'
                            });
                        }
                    },
                    error: function(xhr) {
                        Swal.close();
                        var errorMsg = 'Payment ho gaya hai lekin data save nahi hua. Please support se contact karein.';
                        if (xhr.status == 422) {
                            try {
                                var r = JSON.parse(xhr.responseText);
                                errorMsg = r.message || errorMsg;
                            } catch(e) {}
                        }
                        Swal.fire({
                            icon: 'error',
                            title: 'Submission Error',
                            text: errorMsg,
                            confirmButtonColor: '#dc3545'
                        });
                    }
                });
            },

            // ===== PAYMENT CANCEL -> DATA SUBMIT NAHI HOGA =====
            modal: {
                ondismiss: function() {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Payment Cancelled',
                        text: 'Aapki registration submit nahi hui kyunki payment complete nahi hua.',
                        confirmButtonColor: '#dc3545'
                    });
                }
            },
            theme: { color: '#0388c6' }
        };

        var rzp = new Razorpay(options);
        rzp.open();
    });

});
</script>

<!-- END FOOTER -->