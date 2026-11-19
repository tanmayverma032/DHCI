<?= $this->extend('admin/app/app') ?>
<?= $this->section('content') ?>
<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">About Us</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">About-Add</a></li>
            </ol>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header ">
                        <h4 class="card-title">About Add</h4>
                        <div>
                            <a href="<?= site_url(route_to('view_about')) ?>" class="btn btn-primary me-3 btn-sm"><i class="fas fa-eye me-2"></i>See All About</a>

                        </div>
                    </div>
                    <?= form_open_multipart(site_url(route_to('aboutAction')), ["class" => "form-valide-with-icon needs-validation", "id" => "courseAdd", "novalidate" => ""]) ?>
                    <div class="card-body">
                        `<div class="row">
                            <div class="col-xl-6  col-md-6 mb-4">
                                <label class="form-label font-w600">Title<span class="text-danger scale5 ms-2">*</span></label>
                                <input type="text" name="title" id="cname" value="" class="form-control solid" placeholder="Title" aria-label="name" required>
                            </div>
                            <div class="col-xl-6  col-md-6 mb-4">
                                <label class="form-label font-w600">Slug<span class="text-danger scale5 ms-2">*</span></label>
                                <input type="text" name="slug" id="slug" value="" class="form-control solid" placeholder="Slug" aria-label="name" required>
                            </div>
                            <div class="col-xl-12  col-md-12 mb-4">
                                <label class="form-label font-w600">Author<span class="text-danger scale5 ms-2">*</span></label>
                                <input type="text" name="author" value="" class="form-control solid" placeholder="Author" aria-label="name" required>
                            </div>
                            <div class="col-xl-12 mb-4">
                                <label class="form-label font-w600">About Thumbnail:<span class="text-danger scale5 ms-2">*</span></label>
                                <input class="form-control dropify input-file-events" name="thumbnail" type="file" data-default-file="">
                            </div>
                            <div class="col-xl-12 mb-4">
                                <label class="form-label font-w600">About (Conntent):<span class="text-danger scale5 ms-2">*</span></label>
                                <div class="custom-ekeditor">
                                    <textarea id="ckeditor" name="content"></textarea>
                                </div>
                            </div>

                        </div>
                        <div>

                        </div>
                        <div class="card-footer text-end">
                            <div>
                                <input type="reset" class="btn btn-danger light me-3" value="Reset"></a>
                                <input type="submit" name="about_btn" class="btn btn-primary" value="Submit">
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