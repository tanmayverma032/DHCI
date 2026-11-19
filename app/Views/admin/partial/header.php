<div class="header">
    <div class="header-content">
        <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">
                <div class="header-left">
                    <div class="dashboard_bar">
                        <?= isset($title) ? $title : "Dashboard" ?>
                    </div>
                    <div class="nav-item d-flex align-items-center">
                        <div class="input-group search-area">
                            <input type="text" class="form-control" placeholder="Search">
                            <span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span>
                        </div>

                    </div>
                </div>
                <ul class="navbar-nav header-right">
                    <li class="nav-item dropdown notification_dropdown"> <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Payment Now
                        </button>
                    </li>
                    <li class="nav-item dropdown notification_dropdown">
                        <a class="nav-link bell dz-theme-mode p-0" href="javascript:void(0);">
                            <i id="icon-light" class="fas fa-sun"></i>
                            <i id="icon-dark" class="fas fa-moon"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown notification_dropdown ">
                        <a class="nav-link bell-link d-none d-md-block" href="<?= site_url() ?>" target="_black">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="22.871" viewBox="0 0 1000 1000" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" enable-background="new 0 0 1000 1000" xml:space="preserve">
                                <g>
                                    <path d="M500,10C229.4,10,10,229.4,10,500c0,270.6,219.4,490,490,490c270.6,0,490-219.4,490-490C990,229.4,770.6,10,500,10z M199.7,199.7L199.7,199.7c34.4-34.3,73.7-62.2,117.1-83c-31.5,42-57.9,94.6-76.9,154.6H142C158.5,245.6,177.8,221.6,199.7,199.7z M107.8,336.7h114.9c-8.8,41.3-14.3,85.1-16.1,130.7h-130C79.9,422.2,90.5,378.4,107.8,336.7z M76.6,532.7h130c1.8,45.5,7.3,89.4,16.1,130.7H107.8C90.4,621.6,79.9,577.8,76.6,532.7z M199.7,800.2c-21.9-21.9-41.2-45.9-57.7-71.6h97.9c19,60,45.3,112.5,76.9,154.6C273.3,862.4,234,834.6,199.7,800.2z M467.3,919.8c-14.9-4.3-29.7-11.6-44.1-21.8c-27.1-19.1-53.1-48.6-75.1-85.2c-15.2-25.3-28.3-53.5-39.3-84.2h158.5V919.8z M467.3,663.3H289.6c-9.8-41.8-15.7-85.6-17.6-130.7h195.3V663.3z M467.3,467.3H272c1.9-45.1,7.8-88.8,17.6-130.7h177.6V467.3z M467.3,271.4H308.8c11-30.7,24.1-58.8,39.3-84.2c22-36.7,48-66.1,75.1-85.2c14.5-10.2,29.2-17.5,44.1-21.8V271.4z M532.6,80.2c14.9,4.3,29.7,11.6,44.1,21.8c27.1,19.1,53.1,48.6,75.1,85.2c15.2,25.3,28.3,53.5,39.3,84.2H532.6V80.2z M532.6,336.7h177.6c9.8,41.8,15.7,85.6,17.6,130.7H532.6V336.7z M532.6,532.7h195.3c-1.9,45.1-7.8,88.8-17.6,130.7H532.6V532.7z M576.8,898c-14.5,10.2-29.2,17.5-44.1,21.8l-0.1-191.2h158.5c-11,30.7-24.1,58.9-39.2,84.2C629.9,849.5,603.9,879,576.8,898z M800.3,800.2c-34.4,34.4-73.7,62.2-117.1,83c31.6-42,57.9-94.6,76.9-154.6H858C841.5,754.4,822.2,778.4,800.3,800.2z M892.1,663.3H777.2c8.8-41.3,14.3-85.1,16.1-130.7h130C920,577.8,909.5,621.6,892.1,663.3z M923.4,467.3h-130c-1.8-45.5-7.3-89.4-16.1-130.7h114.9C909.5,378.4,920,422.2,923.4,467.3z M760.1,271.4c-19-60-45.3-112.6-76.9-154.6c43.4,20.8,82.8,48.6,117.1,83c21.9,21.9,41.2,45.9,57.7,71.6H760.1z" />
                                </g>
                            </svg>
                        </a>
                    </li>



                    <li class="nav-item dropdown header-profile">
                        <a class="nav-link " href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                            <div class="header-info2 d-flex align-items-center">
                                <img src="<?= site_url('public/') . is_admin()['center']['photo'] ?>" alt="">
                                <div class="d-flex align-items-center sidebar-info">
                                    <div class="ps-3 pe-2 d-none d-md-block">
                                        <span class="font-w400 d-block"><?= is_admin()['admin']['user_name'] ?></span>
                                    </div>
                                    <i class="fas fa-chevron-down d-none d-md-block"></i>
                                </div>

                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="<?= site_url(route_to('logout')) ?>" class="dropdown-item ai-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18"
                                    height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                </svg>
                                <span class="ms-2">Logout </span>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item">

                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Payment Now</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="row no-gutters">
                    <div class="col-lg-5 p-3 text-center">
                        <img src="<?= site_url('public/assets/img/qr-code.jpg') ?>" alt="QRcode" class="w-75">
                        <p class="text-center">To Pay, Scan QR Code</p>
                    </div>
                    <div class="col-lg-7">
                        <div class="padding_eight_all">

                            <div class="tab-content">
                                <div class="tab-pane fade show active p-2" id="login" role="tabpanel">
                                    <div class="heading_s1 mb-3">
                                        <h4>Account Details</h4>
                                    </div>
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>Bank Name :</td>
                                                <td>ICICI BANK </td>
                                            </tr>
                                            <tr>
                                                <td>BRANCH : </td>
                                                <td>GURGAON SECTOR 15</td>
                                            </tr>
                                            <tr>
                                                <td>IFSC Code :</td>
                                                <td>ICIC0001031</td>
                                            </tr>
                                            <tr>
                                                <td>ACC NO :</td>
                                                <td> 103105005861 </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>