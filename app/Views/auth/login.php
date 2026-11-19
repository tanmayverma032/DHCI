<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="CodeWins Technologies">
    <!-- Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Login - DHCI India </title>

    <!-- Favicon Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="https://dhciindia.com/public/uploads/1746786288_be02275cef907600af93.png">
    <link href="<?= site_url('public/admin/') ?>vendor/bootstrap-select/dist/css/bootstrap-select.min.css"
        rel="stylesheet">
    <link href="<?= site_url('public/admin/') ?>css/style.css" rel="stylesheet">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?= site_url('public/admin/') ?>vendor/toastr/css/toastr.min.css">
</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <a href="javascript:void(0);" class="brand-logo">
                                            <h2 class="text-primary">DHCI India</h2>
                                        </a>
                                    </div>
                                    <h4 class="text-center mb-4">Sign in your account</h4>

                                    <?= form_open(site_url(route_to('login')), ["id" => "login-form", "class" => "form-valide-with-icon needs-validation", "novalidate" => ""]) ?>

                                    <div class="mb-4">
                                        <label class="text-label form-label"
                                            for="validationCustomUsername">Username *</label>
                                        <div class="input-group">
                                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                            <input type="text" name="email" class="form-control border-left-end"
                                                id="validationCustomUsername" placeholder="Enter a username.." required>
                                            <div class="invalid-feedback">
                                                Please Enter a username.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label class="text-label form-label" for="dlab-password">Password *</label>
                                        <div class="input-group transparent-append">
                                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                            <input type="password" name="password" class="form-control"
                                                id="dlab-password" placeholder="Choose a safe one.." required>
                                            <span class="input-group-text show-pass border-left-end ">
                                                <i class="fa fa-eye-slash"></i>
                                                <i class="fa fa-eye"></i>
                                            </span>
                                            <div class="invalid-feedback">
                                                Please Enter a password.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="invalidCheck2"
                                                required>
                                            <label class="form-check-label" for="invalidCheck2">
                                                Remember my preference
                                            </label>
                                        </div>
                                    </div>


                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                                    </div>
                                    <?= form_close() ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->

    <script src="<?= site_url('public/admin/') ?>vendor/global/global.min.js"></script>
    <script src="<?= site_url('public/admin/') ?>vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="<?= site_url('public/admin/') ?>js/custom.min.js"></script>
    <script src="<?= site_url('public/admin/') ?>js/dlabnav-init.js"></script>
    <!-- Toastr -->
    <script src="<?= site_url('public/admin/') ?>vendor/toastr/js/toastr.min.js"></script>

    <script>
        <?php if (session()->has("error")) { ?>
            toastr.error("<?= strtoupper(session()->get("error")) ?>", "Error", {
                positionClass: "toast-top-right",
                timeOut: 5e3,
                closeButton: !0,
                debug: !1,
                newestOnTop: !0,
                progressBar: !0,
                preventDuplicates: !0,
                onclick: null,
                showDuration: "300",
                hideDuration: "1000",
                extendedTimeOut: "1000",
                showEasing: "swing",
                hideEasing: "linear",
                showMethod: "fadeIn",
                hideMethod: "fadeOut",
                tapToDismiss: !1
            });
        <?php } ?>

            (function() {
                'use strict'

                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.querySelectorAll('.needs-validation')

                // Loop over them and prevent submission
                Array.prototype.slice.call(forms)
                    .forEach(function(form) {
                        form.addEventListener('submit', function(event) {
                            if (!form.checkValidity()) {
                                event.preventDefault()
                                event.stopPropagation()
                            }

                            form.classList.add('was-validated')
                        }, false)
                    })
            })()
    </script>

</body>

</html>