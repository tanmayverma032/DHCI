<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Admission Form' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .required::after {
            content: " *";
            color: red;
        }
        .form-section {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .form-section h4 {
            border-bottom: 2px solid #0d6efd;
            padding-bottom: 10px;
            margin-bottom: 20px;
            color: #0d6efd;
        }
        .error-text {
            color: #dc3545;
            font-size: 0.875rem;
        }
        .preview-image {
            max-width: 100px;
            max-height: 100px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center mb-4">Student Admission Form</h1>
                
                <!-- Alert Messages -->
                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('success') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>
                
                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('error') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>
                
                <?php if (session()->getFlashdata('errors')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Please fix the following errors:</strong>
                        <ul>
                            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                <li><?= $error ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>
                
                <!-- Form -->
                <form action="<?= base_url('admission/submit') ?>" method="post" enctype="multipart/form-data" id="admissionForm">
                    <?= csrf_field() ?>
                    
                    <div class="form-section">
                        <h4>Academic Details</h4>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="admission_session" class="form-label required">Admission Session</label>
                                <select name="admission_session" id="admission_session" class="form-select <?= ($validation->getError('admission_session')) ? 'is-invalid' : '' ?>">
                                    <option value="">Select Session</option>
                                    <option value="A26-27" <?= old('admission_session') == 'A26-27' ? 'selected' : '' ?>>A26-27</option>
                                    <option value="A27-28" <?= old('admission_session') == 'A27-28' ? 'selected' : '' ?>>A27-28</option>
                                </select>
                                <?php if ($validation->getError('admission_session')): ?>
                                    <div class="error-text"><?= $validation->getError('admission_session') ?></div>
                                <?php endif; ?>
                            </div>
                            
                            <div class="col-md-4 mb-3">
                                <label for="admission_type" class="form-label required">Admission Type</label>
                                <select name="admission_type" id="admission_type" class="form-select <?= ($validation->getError('admission_type')) ? 'is-invalid' : '' ?>">
                                    <option value="">Select Type</option>
                                    <option value="Fresh" <?= old('admission_type') == 'Fresh' ? 'selected' : '' ?>>Fresh</option>
                                    <option value="Lateral" <?= old('admission_type') == 'Lateral' ? 'selected' : '' ?>>Lateral</option>
                                </select>
                                <?php if ($validation->getError('admission_type')): ?>
                                    <div class="error-text"><?= $validation->getError('admission_type') ?></div>
                                <?php endif; ?>
                            </div>
                            
                            <div class="col-md-4 mb-3">
                                <label for="semester" class="form-label required">Semester</label>
                                <select name="semester" id="semester" class="form-select <?= ($validation->getError('semester')) ? 'is-invalid' : '' ?>">
                                    <option value="">Select Semester</option>
                                    <?php for ($i = 1; $i <= 8; $i++): ?>
                                        <option value="<?= $i ?>" <?= old('semester') == $i ? 'selected' : '' ?>><?= $i ?></option>
                                    <?php endfor; ?>
                                </select>
                                <?php if ($validation->getError('semester')): ?>
                                    <div class="error-text"><?= $validation->getError('semester') ?></div>
                                <?php endif; ?>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="course" class="form-label required">Course</label>
                                <input type="text" name="course" id="course" class="form-control <?= ($validation->getError('course')) ? 'is-invalid' : '' ?>" 
                                       value="<?= old('course') ?>" placeholder="e.g., vocational">
                                <?php if ($validation->getError('course')): ?>
                                    <div class="error-text"><?= $validation->getError('course') ?></div>
                                <?php endif; ?>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="sub_course" class="form-label required">Sub Course</label>
                                <input type="text" name="sub_course" id="sub_course" class="form-control <?= ($validation->getError('sub_course')) ? 'is-invalid' : '' ?>" 
                                       value="<?= old('sub_course') ?>" placeholder="e.g., DMLT">
                                <?php if ($validation->getError('sub_course')): ?>
                                    <div class="error-text"><?= $validation->getError('sub_course') ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-section">
                        <h4>Personal Details</h4>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="full_name" class="form-label required">Full Name</label>
                                <input type="text" name="full_name" id="full_name" class="form-control <?= ($validation->getError('full_name')) ? 'is-invalid' : '' ?>" 
                                       value="<?= old('full_name') ?>" placeholder="Enter full name">
                                <?php if ($validation->getError('full_name')): ?>
                                    <div class="error-text"><?= $validation->getError('full_name') ?></div>
                                <?php endif; ?>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="father_name" class="form-label required">Father's Name</label>
                                <input type="text" name="father_name" id="father_name" class="form-control <?= ($validation->getError('father_name')) ? 'is-invalid' : '' ?>" 
                                       value="<?= old('father_name') ?>" placeholder="Enter father's name">
                                <?php if ($validation->getError('father_name')): ?>
                                    <div class="error-text"><?= $validation->getError('father_name') ?></div>
                                <?php endif; ?>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="mother_name" class="form-label required">Mother's Name</label>
                                <input type="text" name="mother_name" id="mother_name" class="form-control <?= ($validation->getError('mother_name')) ? 'is-invalid' : '' ?>" 
                                       value="<?= old('mother_name') ?>" placeholder="Enter mother's name">
                                <?php if ($validation->getError('mother_name')): ?>
                                    <div class="error-text"><?= $validation->getError('mother_name') ?></div>
                                <?php endif; ?>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="dob" class="form-label required">Date of Birth</label>
                                <input type="date" name="dob" id="dob" class="form-control <?= ($validation->getError('dob')) ? 'is-invalid' : '' ?>" 
                                       value="<?= old('dob') ?>">
                                <?php if ($validation->getError('dob')): ?>
                                    <div class="error-text"><?= $validation->getError('dob') ?></div>
                                <?php endif; ?>
                            </div>
                            
                            <div class="col-md-4 mb-3">
                                <label for="gender" class="form-label required">Gender</label>
                                <select name="gender" id="gender" class="form-select <?= ($validation->getError('gender')) ? 'is-invalid' : '' ?>">
                                    <option value="">Select Gender</option>
                                    <option value="Male" <?= old('gender') == 'Male' ? 'selected' : '' ?>>Male</option>
                                    <option value="Female" <?= old('gender') == 'Female' ? 'selected' : '' ?>>Female</option>
                                    <option value="Other" <?= old('gender') == 'Other' ? 'selected' : '' ?>>Other</option>
                                </select>
                                <?php if ($validation->getError('gender')): ?>
                                    <div class="error-text"><?= $validation->getError('gender') ?></div>
                                <?php endif; ?>
                            </div>
                            
                            <div class="col-md-4 mb-3">
                                <label for="category" class="form-label required">Category</label>
                                <select name="category" id="category" class="form-select <?= ($validation->getError('category')) ? 'is-invalid' : '' ?>">
                                    <option value="">Select Category</option>
                                    <option value="General" <?= old('category') == 'General' ? 'selected' : '' ?>>General</option>
                                    <option value="OBC" <?= old('category') == 'OBC' ? 'selected' : '' ?>>OBC</option>
                                    <option value="SC" <?= old('category') == 'SC' ? 'selected' : '' ?>>SC</option>
                                    <option value="ST" <?= old('category') == 'ST' ? 'selected' : '' ?>>ST</option>
                                    <option value="EWS" <?= old('category') == 'EWS' ? 'selected' : '' ?>>EWS</option>
                                </select>
                                <?php if ($validation->getError('category')): ?>
                                    <div class="error-text"><?= $validation->getError('category') ?></div>
                                <?php endif; ?>
                            </div>
                            
                            <div class="col-md-4 mb-3">
                                <label for="nationality" class="form-label required">Nationality</label>
                                <input type="text" name="nationality" id="nationality" class="form-control <?= ($validation->getError('nationality')) ? 'is-invalid' : '' ?>" 
                                       value="<?= old('nationality') ?>" placeholder="Enter nationality">
                                <?php if ($validation->getError('nationality')): ?>
                                    <div class="error-text"><?= $validation->getError('nationality') ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-section">
                        <h4>Contact Details</h4>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control <?= ($validation->getError('email')) ? 'is-invalid' : '' ?>" 
                                       value="<?= old('email') ?>" placeholder="Enter email address">
                                <?php if ($validation->getError('email')): ?>
                                    <div class="error-text"><?= $validation->getError('email') ?></div>
                                <?php endif; ?>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="alternate_email" class="form-label">Alternate Email</label>
                                <input type="email" name="alternate_email" id="alternate_email" class="form-control <?= ($validation->getError('alternate_email')) ? 'is-invalid' : '' ?>" 
                                       value="<?= old('alternate_email') ?>" placeholder="Enter alternate email">
                                <?php if ($validation->getError('alternate_email')): ?>
                                    <div class="error-text"><?= $validation->getError('alternate_email') ?></div>
                                <?php endif; ?>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="mobile" class="form-label">Mobile Number</label>
                                <input type="tel" name="mobile" id="mobile" class="form-control <?= ($validation->getError('mobile')) ? 'is-invalid' : '' ?>" 
                                       value="<?= old('mobile') ?>" placeholder="Enter 10 digit mobile number" maxlength="10">
                                <?php if ($validation->getError('mobile')): ?>
                                    <div class="error-text"><?= $validation->getError('mobile') ?></div>
                                <?php endif; ?>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="alternate_mobile" class="form-label">Alternate Mobile</label>
                                <input type="tel" name="alternate_mobile" id="alternate_mobile" class="form-control <?= ($validation->getError('alternate_mobile')) ? 'is-invalid' : '' ?>" 
                                       value="<?= old('alternate_mobile') ?>" placeholder="Enter alternate mobile" maxlength="10">
                                <?php if ($validation->getError('alternate_mobile')): ?>
                                    <div class="error-text"><?= $validation->getError('alternate_mobile') ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-section">
                        <h4>Address Details</h4>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="city" class="form-label">City</label>
                                <input type="text" name="city" id="city" class="form-control <?= ($validation->getError('city')) ? 'is-invalid' : '' ?>" 
                                       value="<?= old('city') ?>" placeholder="Enter city">
                                <?php if ($validation->getError('city')): ?>
                                    <div class="error-text"><?= $validation->getError('city') ?></div>
                                <?php endif; ?>
                            </div>
                            
                            <div class="col-md-4 mb-3">
                                <label for="district" class="form-label">District</label>
                                <input type="text" name="district" id="district" class="form-control <?= ($validation->getError('district')) ? 'is-invalid' : '' ?>" 
                                       value="<?= old('district') ?>" placeholder="Enter district">
                                <?php if ($validation->getError('district')): ?>
                                    <div class="error-text"><?= $validation->getError('district') ?></div>
                                <?php endif; ?>
                            </div>
                            
                            <div class="col-md-4 mb-3">
                                <label for="state" class="form-label">State</label>
                                <input type="text" name="state" id="state" class="form-control <?= ($validation->getError('state')) ? 'is-invalid' : '' ?>" 
                                       value="<?= old('state') ?>" placeholder="Enter state">
                                <?php if ($validation->getError('state')): ?>
                                    <div class="error-text"><?= $validation->getError('state') ?></div>
                                <?php endif; ?>
                            </div>
                            
                            <div class="col-md-12 mb-3">
                                <label for="aadhar" class="form-label required">Aadhar Number</label>
                                <input type="text" name="aadhar" id="aadhar" class="form-control <?= ($validation->getError('aadhar')) ? 'is-invalid' : '' ?>" 
                                       value="<?= old('aadhar') ?>" placeholder="Enter 12 digit Aadhar number" maxlength="12">
                                <?php if ($validation->getError('aadhar')): ?>
                                    <div class="error-text"><?= $validation->getError('aadhar') ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-section">
                        <h4>Document Upload</h4>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="photo" class="form-label required">Photo</label>
                                <input type="file" name="photo" id="photo" class="form-control <?= ($validation->getError('photo')) ? 'is-invalid' : '' ?>" 
                                       accept="image/*" onchange="previewImage(this, 'photoPreview')">
                                <small class="text-muted">Max size: 2MB, Format: JPG, JPEG, PNG</small>
                                <img id="photoPreview" class="preview-image" style="display:none;">
                                <?php if ($validation->getError('photo')): ?>
                                    <div class="error-text"><?= $validation->getError('photo') ?></div>
                                <?php endif; ?>
                            </div>
                            
                            <div class="col-md-4 mb-3">
                                <label for="aadhar_image" class="form-label required">Aadhar Image</label>
                                <input type="file" name="aadhar_image" id="aadhar_image" class="form-control <?= ($validation->getError('aadhar_image')) ? 'is-invalid' : '' ?>" 
                                       accept="image/*" onchange="previewImage(this, 'aadharPreview')">
                                <small class="text-muted">Max size: 2MB, Format: JPG, JPEG, PNG</small>
                                <img id="aadharPreview" class="preview-image" style="display:none;">
                                <?php if ($validation->getError('aadhar_image')): ?>
                                    <div class="error-text"><?= $validation->getError('aadhar_image') ?></div>
                                <?php endif; ?>
                            </div>
                            
                            <div class="col-md-4 mb-3">
                                <label for="student_signature" class="form-label required">Student's Signature</label>
                                <input type="file" name="student_signature" id="student_signature" class="form-control <?= ($validation->getError('student_signature')) ? 'is-invalid' : '' ?>" 
                                       accept="image/*" onchange="previewImage(this, 'signaturePreview')">
                                <small class="text-muted">Max size: 1MB, Format: JPG, JPEG, PNG</small>
                                <img id="signaturePreview" class="preview-image" style="display:none;">
                                <?php if ($validation->getError('student_signature')): ?>
                                    <div class="error-text"><?= $validation->getError('student_signature') ?></div>
                                <?php endif; ?>
                            </div>
                            
                            <div class="col-md-4 mb-3">
                                <label for="other_certificate" class="form-label">Other Certificates</label>
                                <input type="file" name="other_certificate" id="other_certificate" class="form-control <?= ($validation->getError('other_certificate')) ? 'is-invalid' : '' ?>" 
                                       accept=".jpg,.jpeg,.png,.pdf" onchange="previewImage(this, 'certPreview')">
                                <small class="text-muted">Max size: 2MB, Format: JPG, JPEG, PNG, PDF</small>
                                <img id="certPreview" class="preview-image" style="display:none;">
                                <?php if ($validation->getError('other_certificate')): ?>
                                    <div class="error-text"><?= $validation->getError('other_certificate') ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-lg">Submit Application</button>
                        <button type="reset" class="btn btn-secondary btn-lg">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    function previewImage(input, previewId) {
        const preview = document.getElementById(previewId);
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.style.display = 'none';
        }
    }
    
    document.getElementById('admissionForm').addEventListener('submit', function(e) {
        const requiredFields = document.querySelectorAll('[required]');
        let hasError = false;
        
        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                field.classList.add('is-invalid');
                hasError = true;
            } else {
                field.classList.remove('is-invalid');
            }
        });
        
        const aadhar = document.getElementById('aadhar');
        if (aadhar.value && !/^\d{12}$/.test(aadhar.value)) {
            aadhar.classList.add('is-invalid');
            hasError = true;
        }
        
        const mobile = document.getElementById('mobile');
        if (mobile.value && !/^\d{10}$/.test(mobile.value)) {
            mobile.classList.add('is-invalid');
            hasError = true;
        }
        
        if (hasError) {
            e.preventDefault();
            alert('Please fill all required fields correctly.');
        }
    });
    </script>
</body>
</html>