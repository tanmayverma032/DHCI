<!-- START HEADER -->
<?php include("inc/header.php"); ?>
<!-- END HEADER -->

<!-- START SECTION BREADCRUMB -->
<?php include("inc/headtitle.php"); ?>
<!-- END SECTION BREADCRUMB -->

<div class="container bgragistration mt-5 mb-5 p-5">
    <div class="contact-form-wrap">

        <h2 class="border-title">Apply Now for Job</h2>

        <!-- SUCCESS MESSAGE -->
        <?php if(session()->getFlashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                <?= session()->getFlashdata('success'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <!-- ERROR MESSAGE -->
        <?php if(session()->getFlashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                <?= session()->getFlashdata('error'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

       <form action="<?= base_url('job-submit') ?>" 
             class="contact-form" 
             enctype="multipart/form-data" 
             method="post" 
             accept-charset="utf-8">

        <?= csrf_field(); ?>

        <div class="row">

            <!-- Full Name -->
            <div class="col-md-6 form-group">
                <label class="form-label text-dark">Full Name <span class="text-danger">*</span></label>
                <input name="name" type="text" class="form-control" 
                       placeholder="Full Name" value="<?= esc(old('name')) ?>" required>
            </div>

            <!-- Email -->
            <div class="col-md-6 form-group">
                <label class="form-label text-dark">Email Address <span class="text-danger">*</span></label>
                <input name="email" type="email" class="form-control"
                       placeholder="Email Address" value="<?= esc(old('email')) ?>" required>
            </div>

            <!-- Mobile -->
            <div class="col-md-6 form-group">
                <label class="form-label text-dark">Mobile Number <span class="text-danger">*</span></label>
                <input name="mobile" type="tel" class="form-control"
                       placeholder="Enter 10-digit number"
                       pattern="[0-9]{10}" value="<?= esc(old('mobile')) ?>" required>
            </div>

            <!-- District -->
            <div class="col-md-6 form-group">
                <label class="form-label text-dark">District <span class="text-danger">*</span></label>
                <input name="district" type="text" class="form-control"
                       placeholder="Enter Your District" value="<?= esc(old('district')) ?>" required>
            </div>

            <!-- Work Status -->
            <div class="col-md-6 form-group">
                <label class="form-label text-dark">Work Status <span class="text-danger">*</span></label>
                <?php $ws = old('work_status'); ?>
                <select name="work_status" class="form-control" required>
                    <option value="">Select Work Status</option>
                    <option value="fresher" <?= ($ws === 'fresher') ? 'selected' : '' ?>>Fresher</option>
                    <option value="experienced" <?= ($ws === 'experienced') ? 'selected' : '' ?>>Experienced</option>
                    <option value="student" <?= ($ws === 'student') ? 'selected' : '' ?>>Student</option>
                    <option value="currently_working" <?= ($ws === 'currently_working') ? 'selected' : '' ?>>Currently Working</option>
                </select>
            </div>

            <!-- Preferred Job Location -->
            <div class="col-md-6 form-group">
                <label class="form-label text-dark">Preferred Job Location <span class="text-danger">*</span></label>
                <input name="preferred_location" type="text" 
                       class="form-control"
                       placeholder="Preferred Job Location" value="<?= esc(old('preferred_location')) ?>" required>
            </div>

            <!-- Resume Upload -->
            <div class="col-md-6 form-group">
                <label class="form-label text-dark">Upload Resume (PDF only, max 10MB) <span class="text-danger">*</span></label>
                <input name="resume" 
                       type="file" 
                       class="form-control"
                       accept="application/pdf"
                       required>
            </div>

            <!-- Submit Button -->
            <div class="form-group col-12 mt-3">
                <button class="btn btn-primary"
                        type="submit"
                        style="background-color:#00588b;border-color:#00588b; padding: 12px 30px; font-weight: 600;">
                    Apply Now <i class="fa fa-arrow-right ms-2"></i>
                </button>
            </div>

        </div>

        <!-- Honeypot -->
        <div style="display:none">
            <label>Fill This Field</label>
            <input type="text" name="honeypot">
        </div>

    </form>

    </div>
</div>

<!-- AUTO HIDE SUCCESS MESSAGE ONLY -->
<script>
setTimeout(function(){
    document.querySelectorAll('.alert-success').forEach(function(el){
        el.style.display = 'none';
    });
}, 7000);
</script>

<!-- START FOOTER -->
<?php include("inc/footer.php"); ?>
<!-- END FOOTER -->
