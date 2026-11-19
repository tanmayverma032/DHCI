<?= $this->extend('admin/app/app') ?>
<?= $this->section('content') ?>
<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Courses</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Course-Add</a></li>
            </ol>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header ">
                        <h4 class="card-title">Course Add</h4>
                        <div>
                            <a href="<?= site_url(route_to('AllCourse')) ?>" class="btn btn-primary me-3 btn-sm"><i
                                    class="fas fa-eye me-2"></i>See All Course</a>

                        </div>
                    </div>
                    <?= form_open_multipart(site_url(route_to('saveCourse')), ["class" => "form-valide-with-icon needs-validation", "id" => "courseAdd", "novalidate" => ""]) ?>
                    <div class="card-body">
                        `<div class="row">
                            <div class="col-xl-6  col-md-6 mb-4">
                                <label class="form-label font-w600">Course Name<span
                                        class="text-danger scale5 ms-2">*</span></label>
                                <input type="hidden" name="id" value="<?= isset($editdata) ? $editdata['id'] : "" ?>">

                                <input type="text" name="cname" id="cname" value="<?= isset($editdata) ? $editdata['name'] : "" ?>" class="form-control solid" placeholder="Name" aria-label="name"
                                    required>
                            </div>
                            <div class="col-xl-4  col-md-4 mb-4">
                                <label class="form-label font-w600">Course Slug Name<span
                                        class="text-danger scale5 ms-2">*</span></label>
                                <input type="text" name="slug" id="slug" value="<?= isset($editdata) ? $editdata['slug'] : "" ?>" class="form-control solid" placeholder="Name" aria-label="name" required>
                            </div>
                            <div class="col-xl-4  col-md-4 mb-4">
                                <label class="form-label font-w600">Eligibility :<span
                                        class="text-danger scale5 ms-2">*</span></label>
                                <input type="text" name="course_eligibility" value="<?= isset($editdata) ? $editdata['course_eligibility'] : "" ?>" class="form-control solid" placeholder="Eligibility" aria-label="name" required>
                            </div>
                            <div class="col-xl-4  col-md-4 mb-4">
                                <label class="form-label font-w600">Course Fee<span
                                        class="text-danger scale5 ms-2">*</span></label>
                                <input type="text" name="fee" value="<?= isset($editdata) ? $editdata['course_fees'] : "" ?>" class="form-control solid" placeholder="Fee" aria-label="name" required>
                            </div>
                            <div class="col-xl-4  col-md-4 mb-4">
                                <label class="form-label font-w600">Course Duration<span
                                        class="text-danger scale5 ms-2">*</span></label>
                                <div class="input-group mb-2">
                                    <div class="input-group-text">Month</div>
                                    <input type="number" name="cduration" value="<?= isset($editdata) ? $editdata['duration'] : "" ?>" class="form-control solid" placeholder="Duration" aria-label="name" required>
                                </div>
                            </div>
                            <div class="col-xl-4  col-md-4 mb-4">
                                <label class="form-label font-w600">Semester<span
                                        class="text-danger scale5 ms-2">*</span></label>
                                <input type="text" name="semester" value="<?= isset($editdata) ? $editdata['semester'] : "" ?>" class="form-control solid" placeholder="Semester" aria-label="name" required>
                            </div>
                           
                            <div class="col-xl-4  col-md-4 mb-4">
                                <label class="form-label font-w600">Module Coverd<span
                                        class="text-danger scale5 ms-2">*</span></label>
                                <input type="number" name="module" value="<?= isset($editdata) ? $editdata['modules'] : "" ?>" class="form-control solid" placeholder="Module" aria-label="name" required>
                            </div>
                            <div class="col-xl-4  col-md-4 mb-4">
                                <label class="form-label font-w600">Course Category<span
                                        class="text-danger scale5 ms-2">*</span></label>
                                <select class="nice-select default-select wide form-control solid" name="c_category" required>
                                    <option selected disabled>Choose...</option>
                                    <?php foreach ($program as $row) : ?>
                                        <option value="<?= $row['id'] ?>" <?php if (!empty($editdata)) {
                                                                            if ($editdata['programid'] == $row['id']) {
                                                                                echo "selected";
                                                                            }
                                                                        } ?>><?= $row['title'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-xl-4  col-md-4 mb-4">
                                <label class="form-label font-w600">Posted Date<span
                                        class="text-danger scale5 ms-2">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="far fa-clock"></i></div>
                                    <input size="16" type="text" name="date" value="<?= isset($editdata) ? date('Y-m-d', strtotime($editdata['date'])) : date('Y-m-d') ?>" readonly
                                        class="form-control form_datetime solid" required>
                                </div>
                            </div>

                            <div class="col-xl-12 mb-4">
                                <label class="form-label font-w600">Description:<span
                                        class="text-danger scale5 ms-2">*</span></label>
                                <div class="custom-ekeditor">
                                    <textarea id="ckeditor" name="description"><?= isset($editdata) ? $editdata['description'] : "" ?>"</textarea>
                                </div>
                            </div>
                            <div class="col-xl-12 mb-4">
                                <label class="form-label font-w600">Course Thumbnail:<span
                                        class="text-danger scale5 ms-2">*</span></label>
                                <input class="form-control dropify input-file-events" name="thumbnail" type="file" data-default-file="<?= isset($editdata) ? site_url('public/') . $editdata['thumbnail'] : "" ?>" <?= isset($editdata) ? "" : "required" ?>>
                            </div>
                        </div>
                        <div>
                            <span>Status:<label class="radio-inline mx-3"><input type="radio" value="1" name="status"
                                        class="form-check-input" required <?php if (!empty($editdata)) {
                                                                                if ($editdata['status'] == 1) {
                                                                                    echo "checked";
                                                                                }
                                                                            } ?>> Active</label></span>
                            <span><label class="radio-inline me-3"><input type="radio" value="0" name="status"
                                        class="form-check-input" required <?php if (!empty($editdata)) {
                                                                                if ($editdata['status'] == 0) {
                                                                                    echo "checked";
                                                                                }
                                                                            } ?>> In Active</label></span>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <div>
                            <input type="reset" class="btn btn-danger light me-3" value="Reset"></a>
                            <input type="submit" class="btn btn-primary" value="<?= isset($editdata) ? "Update" : "Submit" ?>">
                        </div>
                    </div>`
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
<?= $this->endSection() ?>
<?= $this->endSection() ?>