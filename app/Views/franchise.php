

<!-- START SECTION COURSES -->
<section class="small_pt bgimg">
    <div class="container bgragistration">
        
        <div class="contact-form-wrap p-4">

            <!-- Success / Error Messages -->
            <?php if(session()->getFlashdata('error')) : ?>
                <div class="text-danger">
                    <?= session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>

            <?php if(session()->getFlashdata('success')) : ?>
                <div class="text-success">
                    <?= session()->getFlashdata('success'); ?>
                </div>
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
                           value="<?= old('institute_name') ?>"
                           required>
                </div>

                <!-- Phone Number -->
                <div class="col-md-6 form-group mb-3">
                    <label>Phone Number *</label>
                    <input type="text"
                           name="phone_number"
                           class="form-control"
                           placeholder="Enter Phone Number"
                           value="<?= old('phone_number') ?>"
                           required>
                </div>

                <!-- Email -->
                <div class="col-md-6 form-group mb-3">
                    <label>Email Address *</label>
                    <input type="email"
                           name="email"
                           class="form-control"
                           placeholder="Enter Email Address"
                           value="<?= old('email') ?>"
                           required>
                </div>

                <!-- City -->
                <div class="col-md-6 form-group mb-3">
                    <label>City / Location *</label>
                    <input type="text"
                           name="city"
                           class="form-control"
                           placeholder="Enter City / Location"
                           value="<?= old('city') ?>"
                           required>
                </div>

                <!-- Own Institute -->
                <div class="col-md-6 form-group mb-3">
                    <label>Do you own an institute? *</label>
                    <select name="own_institute" class="form-control" required>
                        <option value="">Select Option</option>
                        <option value="Yes" <?= old('own_institute') == 'Yes' ? 'selected' : '' ?>>Yes</option>
                        <option value="No" <?= old('own_institute') == 'No' ? 'selected' : '' ?>>No</option>
                    </select>
                </div>

                <!-- Available Space -->
                <div class="col-md-6 form-group mb-3">
                    <label>Available Space (in sq. ft.)</label>
                    <input type="text"
                           name="available_space"
                           class="form-control"
                           placeholder="Enter Available Space"
                           value="<?= old('available_space') ?>">
                </div>

                <!-- Preferred Courses -->
                <div class="col-md-12 form-group mb-3">
                    <label>Preferred Courses</label>
                    <input type="text"
                           name="preferred_courses"
                           class="form-control"
                           placeholder="Enter Preferred Courses"
                           value="<?= old('preferred_courses') ?>">
                </div>

                <!-- Message -->
                <div class="col-md-12 form-group mb-3">
                    <label>Message / Additional Details</label>
                    <textarea name="message"
                              class="form-control"
                              rows="4"
                              placeholder="Write your message here..."><?= old('message') ?></textarea>
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

<section class="small_pt bgimg" style="padding:60px 0; background:#f8f9fc;">
    <div class="container bgragistration">
        <div class="contact-form-wrap p-4" style="background:#fff; border-radius:15px; box-shadow:0 5px 20px rgba(0,0,0,0.08);">
            <div style="text-align:center; margin-bottom:40px;">
                <h2 style="font-size:38px; font-weight:700; color:#0b3b75; margin-bottom:10px;">
                    Franchise Opportunity – DHCI
                </h2>
                <p style="font-size:18px; color:#d93343; font-weight:600;">
                    Partner With a Trusted Name in Healthcare Education
                </p>
            </div>
        </div>
    </div>
</section>

<style>
.bgimg{ background: linear-gradient(135deg,#f4f8fc,#eef6ff); padding:80px 0; }
.bgragistration{ max-width:1100px; margin:auto; background:#fff; border-radius:25px; box-shadow:0 20px 60px rgba(0,0,0,0.08); overflow:hidden; position:relative; }
.contact-form-wrap{ position:relative; z-index:2; padding:50px !important; }
.border-title{ text-align:center; font-size:42px; font-weight:700; color:#0388c6 !important; margin-bottom:10px; }
.form-group label{ font-size:14px; font-weight:600; color:#2c3e50; margin-bottom:8px; display:block; }
.form-control{ height:58px; border:1px solid #d9e4ee; border-radius:14px; background:#fafcff; padding:12px 18px; font-size:15px; }
.form-control:focus{ border-color:#0388c6; background:#fff; box-shadow:0 0 0 5px rgba(3,136,198,.12); outline:none; }
.btn-primary{ width:100%; height:60px; border:none !important; border-radius:15px; font-size:17px; font-weight:600; background:linear-gradient(135deg,#0388c6,#00588b) !important; }
.text-success{ background:#e8fff1; color:#198754 !important; padding:12px; border-radius:10px; margin-bottom:20px; font-size:15px; }
.text-danger{ background:#fff0f1; color:#dc3545 !important; padding:12px; border-radius:10px; margin-bottom:20px; font-size:15px; }
</style>


<script>
    $('#state').change(function() {
        var state_id = $(this).val();
        $.ajax({
            url: '<?= url_to('districtname') ?>',
            method: 'GET',
            data: { state_id: state_id },
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
</script>