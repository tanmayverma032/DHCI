<?= $this->extend('admin/app/app') ?>
<?= $this->section('content') ?>
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 mt-4">
                <div class="row">

                    <?php if (is_admin()['admin']['role'] == '2') { ?>
                        <div class="col-xl-12">
                            <div class="card  mx-auto pe-5 ps-5">
                                <div class="card-body ">
                                    <div class="row shapreter-row" style="border: 1px solid #857171;">
                                        <div class="col-xl-10 col-lg-10 col-sm-6 col-6">
                                            <div class="static-icon mt-4">
                                                <h2 style="color:#e20001;">Welcome To</h2>
                                                <h3 style="color:#05449a;">DHCI India  </h3>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-2 col-sm-6 col-6">
                                            <div class="static-icon">
                                                <img src="<?= site_url('public/') ?><?= is_admin()['center']['photo'] ?>" alt="" width="90%">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row shapreter-row" style="border: 1px solid #857171;">
                                        <div class="col-lg-12 col-sm-12">
                                            <table class="table" style="font-size: 16px; color:#000; text-align:left;">
                                                <thead>
                                                    <tr>
                                                        <th>Director name</th>
                                                        <th style="text-align:left;"><?= is_admin()['admin']['user_name'] ?></th>
                                                    </tr>
                                                    <tr>
                                                        <th>Center Name</th>
                                                        <th style="text-align:left;"><?= is_admin()['center']['institute_name'] ?></th>
                                                    </tr>
                                                    <tr>
                                                        <th>Center Code</th>
                                                        <th style="text-align:left;"><?= is_admin()['center']['center_code'] ?></th>
                                                    </tr>
                                                    <tr>
                                                        <th>Address</th>
                                                        <th style="text-align:left;"><?= is_admin()['center']['ins_address'] ?></th>
                                                    </tr>
                                                    <tr>
                                                        <th>State</th>
                                                        <th style="text-align:left;"><?= getState(is_admin()['center']['state_id']) ?></th>
                                                    </tr>
                                                    <tr>
                                                        <th>Pincode</th>
                                                        <th style="text-align:left;"><?= is_admin()['center']['pin_code'] ?? 000000 ?></th>
                                                    </tr>
                                                    <tr>
                                                        <th>Contact Details</th>
                                                        <th style="text-align:left;"><?= is_admin()['center']['ins_num'] ?></th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row shapreter-row">
                                        <div class="col-xl-2 col-lg-2 col-sm-4 col-6">
                                            <div class="static-icon">
                                                <span>
                                                    <i class="fas fa-eye"></i>
                                                </span>
                                                <h3 class="count mb-0"><?= $totalStudents ?></h3>
                                                <span class="fs-14">Students</span>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-2 col-sm-4 col-6">
                                            <div class="static-icon">
                                                <span>
                                                    <i class="far fa-comments"></i>
                                                </span>
                                                <h3 class="count mb-0"><?= $totalFranchises ?></h3>
                                                <span class="fs-14">Branches</span>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-2 col-sm-4 col-6">
                                            <div class="static-icon">
                                                <span>
                                                    <i class="fas fa-suitcase"></i>
                                                </span>
                                                <h3 class="count mb-0"><?= $totalEnquiry ?></h3>
                                                <span class="fs-14">Enquiry</span>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-2 col-sm-4 col-6">
                                            <div class="static-icon">
                                                <span>
                                                    <i class="fas fa-suitcase"></i>
                                                </span>
                                                <h3 class="count mb-0"><?= $totalBlogs ?></h3>
                                                <span class="fs-14">Blogs</span>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-2 col-sm-4 col-6">
                                            <div class="static-icon">
                                                <span>
                                                    <i class="fas fa-calendar"></i>
                                                </span>
                                                <h3 class="count mb-0"><?= $totalCourses ?></h3>
                                                <span class="fs-14">Courses</span>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-2 col-sm-4 col-6">
                                            <div class="static-icon">
                                                <span>
                                                    <i class="fas fa-phone-alt"></i>
                                                </span>
                                                <h3 class="count mb-0"><?= $totalGallery ?></h3>
                                                <span class="fs-14">Gallery</span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--<div class="col-xl-6">
                        <div class="card">
                            <div class="card-header border-0 pb-0">
                                <h4 class="fs-20 mb-0">Profile Stregth</h4>
                            </div>
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-xl-6 col-sm-6">
                                        <div class="progress default-progress">
                                            <div class="progress-bar bg-vigit progress-animated" style="width: 90%; height:13px;" role="progressbar">
                                                <span class="sr-only">90% Complete</span>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-end mt-2 pb-4 justify-content-between">
                                            <span class="fs-14 font-w500">Visitor</span>
                                            <span class="fs-16"><span class="text-black pe-2"></span>90%</span>
                                        </div>
                                        <div class="progress default-progress">
                                            <div class="progress-bar bg-contact progress-animated" style="width: 68%; height:13px;" role="progressbar">
                                                <span class="sr-only">45% Complete</span>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-end mt-2 pb-4 justify-content-between">
                                            <span class="fs-14 font-w500">Contact</span>
                                            <span class="fs-16"><span class="text-black pe-2"></span>68%</span>
                                        </div>
                                        <div class="progress default-progress">
                                            <div class="progress-bar bg-follow progress-animated" style="width: 85%; height:13px;" role="progressbar">
                                                <span class="sr-only">85% Complete</span>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-end mt-2 pb-4 justify-content-between">
                                            <span class="fs-14 font-w500">Follow</span>
                                            <span class="fs-16"><span class="text-black pe-2"></span>85%</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-sm-6">
                                        <div id="pieChart3"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header border-0 flex-wrap pb-0">
                                <h4 class="fs-20 mb-0">Your Network Summary</h4>
                                <div>
                                    <span>
                                        <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13">
                                            <rect width="13" height="13" fill="#f73a0b" />
                                        </svg>
                                        Following
                                    </span>
                                    <span class="ms-4 fs-16 font-w600">239</span>
                                    <div class="mt-2">
                                        <span>
                                            <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13">
                                                <rect width="13" height="13" fill="#01111c" />
                                            </svg>
                                            Followers
                                        </span>
                                        <span class="ms-4 fs-16 font-w600">824</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0 pb-0 ps-sm-3 ps-0">
                                <div id="chartBar" class="chartBar"></div>
                            </div>
                        </div>
                    </div>-->
                        <div class="col-xl-12">
                            <div class="card" id="user-activity">
                                <div class="card-header flex-wrap">
                                    <h4 class="fs-20  mb-0">Students Application</h4>
                                    <div class="d-flex align-items-center flex-wrap">
                                        <div class="me-5">
                                            <span class="me-4">
                                                <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13">
                                                    <rect width="13" height="13" rx="6.5" fill="#35c556" />
                                                </svg>
                                                Approved
                                            </span>
                                            <span class="me-4">
                                                <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13">
                                                    <rect width="13" height="13" rx="6.5" fill="#3f4cfe" />
                                                </svg>
                                                Panding
                                            </span>
                                            <span>
                                                <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13">
                                                    <rect width="13" height="13" rx="6.5" fill="#f34040" />
                                                </svg>
                                                Rejected
                                            </span>
                                        </div>
                                        <div class="card-action coin-tabs mt-sm-0 mt-2">
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link " data-bs-toggle="tab" href="#Daily" role="tab">Daily</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link " data-bs-toggle="tab" href="#Daily" role="tab">Weekly</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-bs-toggle="tab" href="#Daily" role="tab">Monthly</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="Daily">
                                            <canvas id="activity" height="115"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->section('js') ?>

<script>
    $(document).ready(function() {

        var counters = $(".count");
        var countersQuantity = counters.length;
        var counter = [];

        for (i = 0; i < countersQuantity; i++) {
            counter[i] = parseInt(counters[i].innerHTML);
        }

        var count = function(start, value, id) {
            var localStart = start;
            setInterval(function() {
                if (localStart < value) {
                    localStart++;
                    counters[id].innerHTML = localStart;
                }
            }, 40);
        }

        for (j = 0; j < countersQuantity; j++) {
            count(0, counter[j], j);
        }
    });
</script>
<?= $this->endSection() ?>
<?= $this->endSection() ?>