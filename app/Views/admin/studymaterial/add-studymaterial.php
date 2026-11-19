<?= $this->extend('admin/app/app') ?>
<?= $this->section('content') ?>
<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Study Material</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Study Material</a></li>
            </ol>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header ">
                        <h4 class="card-title">Study Material Add</h4>
                        <div>
                            <a href="<?= site_url(route_to('AllStudyMaterial')) ?>" class="btn btn-primary me-3 btn-sm"><i
                                    class="fas fa-eye me-2"></i>See All Study Material</a>

                        </div>
                    </div>
                    <?= form_open_multipart(site_url(route_to('saveStudyMaterial')), ["class" => "form-valide-with-icon needs-validation", "id" => "StudyMaterialAdd", "novalidate" => ""]) ?>

                    <input type="hidden" name="id" value="<?= isset($editdata) ? $editdata['id'] : '' ?>">

                    <div class="card-body">
                        <div class="row">
                            <!-- Program Dropdown -->
                            <div class="col-xl-4 col-md-4 mb-4">
                                <label class="form-label font-w600">Program <span class="text-danger">*</span></label>
                                <select class="nice-select default-select wide form-control solid" name="program_id" id="program_id" required>
                                    <option selected disabled>Choose...</option>
                                    <?php foreach ($programs as $row) : ?>
                                        <option value="<?= $row['id'] ?>" <?= (isset($editdata) && $editdata['program_id'] == $row['id']) ? "selected" : "" ?>>
                                            <?= $row['title'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- Course Dropdown -->
                            <div class="col-xl-4 col-md-4 mb-4">
                                <label class="form-label font-w600">Course <span class="text-danger">*</span></label>
                                <select class="nice-select default-select wide form-control solid" name="course_id" id="course_id" required>
                                    <option selected disabled>Choose...</option>
                                    <?php if (isset($editdata)) : ?>
                                        <?php foreach ($courses as $row) : ?>
                                            <option value="<?= $row['id'] ?>" data-semester="<?= $row['semester'] ?>" <?= ($editdata['course_id'] == $row['id']) ? "selected" : "" ?>>
                                                <?= $row['name'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>


                            <div class="col-xl-4 col-md-4 mb-4">
                                <label class="form-label font-w600">Total Semester</label>
                                <input type="text" class="form-control" id="semester_count">
                            </div>
                        </div>

                        <!-- Dynamic Semester Fields -->
                        <div id="semesterFields"></div>

                        <!-- Add More Button -->
                        <button type="button" class="btn btn-dark mt-3 float-end" id="addMore">
                            <i class="fas fa-plus"></i> Add More
                        </button>


                        <!-- Status -->
                        <div class="mt-3">
                            <span>Status:</span>
                            <label class="radio-inline mx-3">
                                <input type="radio" value="1" name="status" class="form-check-input" required <?= (isset($editdata) && $editdata['status'] == 1) ? "checked" : "" ?>> Active
                            </label>
                            <label class="radio-inline me-3">
                                <input type="radio" value="0" name="status" class="form-check-input" required <?= (isset($editdata) && $editdata['status'] == 0) ? "checked" : "" ?>> Inactive
                            </label>
                        </div>
                    </div>

                    <!-- Form Buttons -->
                    <div class="card-footer text-end">
                        <div>
                            <input type="reset" class="btn btn-danger light me-3" value="Reset">
                            <input type="submit" class="btn btn-primary" value="<?= isset($editdata) ? "Update" : "Submit" ?>">
                        </div>
                    </div>

                    <?= form_close() ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->section('js') ?>
<script>
    function convertToSlug(input) {
        return input
            .trim()
            .replace(/\s+/g, '-');
    }

    $('#cname').keyup(function() {
        const userInput = $('#cname').val();
        const slug = convertToSlug(userInput);
        $('#slug').val(slug);
    });
</script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>


// $(document).ready(function () {
//     let maxSemesterCount = 10; // Change this if needed

//     // Load courses when program changes
//     $('#program_id').change(function () {
//         let program_id = $(this).val();

//         if (program_id) {
//             $.ajax({
//                 url: "<?= site_url(route_to('coursesbyProgram')) ?>?program_id=" + program_id,
//                 type: "GET",
//                 dataType: "json",
//                 success: function (data) {
//                     $('#course_id').html('<option selected disabled>Choose...</option>');
//                     $.each(data, function (key, value) {
//                         $('#course_id').append('<option value="' + value.id + '" data-semester="' + value.semester + '">' + value.name + '</option>');
//                     });
//                 },
//                 error: function (xhr, status, error) {
//                     console.error(xhr.responseText);
//                 }
//             });
//         } else {
//             $('#course_id').html('<option selected disabled>Choose...</option>');
//         }
//     });

//     // ✅ Function to add semester fields dynamically
//         function addSemesterField(index, code = '', name = '', file = '') {
//             if ($('.semester-group').length < maxSemesterCount) {
//                 $('#semesterFields').append(`
//                     <div class="row semester-group" id="semester-${index}">
//                         <div class="col-xl-4 col-md-4 mb-4">
//                             <label class="form-label font-w600">Code<span class="text-danger">*</span></label>
//                             <input type="text" class="form-control" name="code[]" value="${code}" required>
//                         </div>

//                         <div class="col-xl-4 col-md-4 mb-4">
//                             <label class="form-label font-w600">Name <span class="text-danger">*</span></label>
//                             <input type="text" class="form-control" name="name[]" value="${name}" required>
//                         </div>

//                         <div class="col-xl-3 col-md-3 mb-4">
//                                 <label class="form-label font-w600">Upload PDF  <span class="text-danger">*</span></label>
//                                 <input type="file" class="form-control" name="filepdf[]">
//                                 ${file ? `<a href="<?= site_url('uploads/studymaterials/') ?>${file}" target="_blank">View File</a>` : ''}
//                                 <input type="hidden" name="old_filepdf[]" value="${file}">
//                         </div>


//                         <div class="col-xl-1 col-md-1 mb-4 d-flex align-items-end">
//                             <button type="button" class="btn btn-danger remove-semester">X</button>
//                         </div>
//                     </div>
//                 `);
//             }

//             // Disable Add More button if max limit is reached
//             if ($('.semester-group').length >= maxSemesterCount) {
//                 $('#addMore').prop('disabled', true);
//             }
//         }

//     let semesterCount = 0; // Initialize globally

//     // ✅ Pre-fill existing data when editing
//     let existingData = <?= json_encode($editdata ?? []) ?>; // Handle empty case

//     if (existingData && existingData.code) {
//         let selectedCourse = $('#course_id').find(':selected'); // Get preselected course
//         semesterCount = selectedCourse.data('semester') || 0; // Get semester count from selected course

//         $('#semesterFields').empty();
//         $('#semester_count').val(semesterCount); // Display correct semester count

//         // Add semester fields dynamically based on the existing semester count
//         addSemesterField(1, existingData.code, existingData.name, existingData.filepdf);
//     }

//     // ✅ Update semester count dynamically when course changes
//     $('#course_id').change(function () {
//         let selectedOption = $(this).find(':selected');
//         semesterCount = selectedOption.data('semester') || 0; // Get semester count
//         $('#semester_count').val(semesterCount); // Display semester count


        
//     });


//     // ✅ Add new semester on button click
//     $('#addMore').click(function () {
//         let newIndex = $('.semester-group').length + 1;
//         addSemesterField(newIndex);
//     });

//     // ✅ Remove semester input fields
//     $(document).on('click', '.remove-semester', function () {
//         $(this).closest('.semester-group').remove();

//         // Enable Add More if below max limit
//         if ($('.semester-group').length < maxSemesterCount) {
//             $('#addMore').prop('disabled', false);
//         }
//     });
// });




$(document).ready(function () {
    let maxSemesterCount = 10;
    let semesterCount = 0;  

        // ✅ Function to add semester fields dynamically
        // function addSemesterField(index, code = '', name = '', file = '') {
        //     if ($('.semester-group').length < semesterCount && $('.semester-group').length < maxSemesterCount) {
        //         $('#semesterFields').append(`
        //             <div class="row semester-group" id="semester-${index}">
        //                 <div class="col-xl-4 col-md-4 mb-4">
        //                     <label class="form-label font-w600">Code<span class="text-danger">*</span></label>
        //                     <input type="text" class="form-control" name="code[]" value="${code}" required>
        //                 </div>

        //                 <div class="col-xl-4 col-md-4 mb-4">
        //                     <label class="form-label font-w600">Name <span class="text-danger">*</span></label>
        //                     <input type="text" class="form-control" name="name[]" value="${name}" required>
        //                 </div>

        //                 <div class="col-xl-3 col-md-3 mb-4">
        //                     <label class="form-label font-w600">Upload PDF  <span class="text-danger">*</span></label>
        //                     <input type="file" class="form-control" name="filepdf[]">
        //                     ${file ? `<a href="<?= site_url('uploads/studymaterials/') ?>${file}" target="_blank">View File</a>` : ''}
        //                     <input type="hidden" name="old_filepdf[]" value="${file}">
        //                 </div>

        //                 <div class="col-xl-1 col-md-1 mb-4 d-flex align-items-end">
        //                     <button type="button" class="btn btn-danger remove-semester">X</button>
        //                 </div>
        //             </div>
        //         `);
        //     }

        //     // Disable Add More button if max limit or semester count is reached
        //     if ($('.semester-group').length >= semesterCount || $('.semester-group').length >= maxSemesterCount) {
        //         $('#addMore').prop('disabled', true);
        //     }
        // }


        // ✅ Function to add semester fields dynamically
        function addSemesterField(index, code = '', name = '', file = '', semester = '') {
            if ($('.semester-group').length < semesterCount && $('.semester-group').length < maxSemesterCount) {
                $('#semesterFields').append(`
                    <div class="row semester-group" id="semester-${index}">
                        <div class="col-xl-3 col-md-3 mb-4">
                            <label class="form-label font-w600">Code<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="code[]" value="${code}" required>
                        </div>

                        <div class="col-xl-3 col-md-3 mb-4">
                            <label class="form-label font-w600">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name[]" value="${name}" required>
                        </div>

                        <div class="col-xl-3 col-md-3 mb-4">
                            <label class="form-label font-w600">Upload PDF  <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" name="filepdf[]">
                            ${file ? `<a href="<?= site_url('uploads/studymaterials/') ?>${file}" target="_blank">View File</a>` : ''}
                            <input type="hidden" name="old_filepdf[]" value="${file}">
                        </div>

                        <!-- ✅ New Semester Input Field -->
                        <div class="col-xl-2 col-md-2 mb-4">
                            <label class="form-label font-w600">Semester <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="semester" value="${semester}" required>
                        </div>

                        <div class="col-xl-1 col-md-1 mb-4 d-flex align-items-end">
                            <button type="button" class="btn btn-danger remove-semester">X</button>
                        </div>
                    </div>
                `);
            }

            // Disable Add More button if max limit or semester count is reached
            if ($('.semester-group').length >= semesterCount || $('.semester-group').length >= maxSemesterCount) {
                $('#addMore').prop('disabled', true);
            }
        }


    // ✅ Load courses when program changes
    $('#program_id').change(function () {
        let program_id = $(this).val();

        if (program_id) {
            $.ajax({
                url: "<?= site_url(route_to('coursesbyProgram')) ?>?program_id=" + program_id,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $('#course_id').html('<option selected disabled>Choose...</option>');
                    $.each(data, function (key, value) {
                        $('#course_id').append('<option value="' + value.id + '" data-semester="' + value.semester + '">' + value.name + '</option>');
                    });
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        } else {
            $('#course_id').html('<option selected disabled>Choose...</option>');
        }
    });

    // ✅ Pre-fill existing data when editing
    let existingData = <?= json_encode($editdata ?? []) ?>; // Handle empty case

    if (existingData && existingData.code) {
        let selectedCourse = $('#course_id').find(':selected'); // Get preselected course
        semesterCount = selectedCourse.data('semester') || 0; // Get semester count from selected course

        $('#semesterFields').empty();
        $('#semester_count').val(semesterCount); // Display correct semester count

        // Add semester fields dynamically based on the existing semester count
        addSemesterField(1, existingData.code, existingData.name, existingData.filepdf,existingData.semester);
    }

    // ✅ Update semester count dynamically when course changes
    $('#course_id').change(function () {
        let selectedOption = $(this).find(':selected');
        semesterCount = selectedOption.data('semester') || 0; // Get semester count
        $('#semester_count').val(semesterCount); // Display semester count

        $('#semesterFields').empty(); // Clear previous fields
        $('#addMore').prop('disabled', false); // Enable Add More button if needed
    });

    // ✅ Add new semester on button click
    $('#addMore').click(function () {
        if ($('.semester-group').length < semesterCount) {
            let newIndex = $('.semester-group').length + 1;
            addSemesterField(newIndex);
        }

        // If semester limit is reached, disable Add More button
        if ($('.semester-group').length >= semesterCount || $('.semester-group').length >= maxSemesterCount) {
            $('#addMore').prop('disabled', true);
        }
    });

    // ✅ Remove semester input fields
    $(document).on('click', '.remove-semester', function () {
        $(this).closest('.semester-group').remove();

        // Enable Add More button if below the semester limit
        if ($('.semester-group').length < semesterCount && $('.semester-group').length < maxSemesterCount) {
            $('#addMore').prop('disabled', false);
        }
    });
});

</script>


>
<?= $this->endSection() ?>
<?= $this->endSection() ?>