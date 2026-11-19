<div class="dlabnav">
    <div class="dlabnav-scroll">

        <ul class="metismenu" id="menu">
            <li>
                <a class="<?php //areActiveRoutesHome(['dashboard']) 
                            ?>" href="<?= url_to('dashboard') ?>" aria-expanded="false">
                    <i class="flaticon-025-dashboard"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-013-checkmark"></i>
                    <span class="nav-text">Course</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="<?= site_url(route_to('AddProgram')) ?>">Programs</a></li>

                    <li><a href="<?= site_url(route_to('AllCourse')) ?>">Courses</a></li>
                    <li><a href="<?= site_url(route_to('AllStudyMaterial')) ?>">Study material</a></li>
                </ul>

            </li>
            <?php if (is_admin()['admin']['role'] == 1) { ?>
                <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                        <i class="flaticon-093-waving"></i>
                        <span class="nav-text">Franchise</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="<?= site_url(route_to('franchise')) ?>">All Franchise</a></li>
                        <li><a href="<?= site_url(route_to('franchise_panding')) ?>">Panding Franchise</a></li>
                        <li><a href="<?= site_url(route_to('franchise_reject')) ?>">Reject Franchise</a></li>
                        <li><a href="<?= site_url(route_to('AddFranchise')) ?>">Add Franchise</a></li>
                    </ul>
                </li>
            <?php } ?>
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-user"></i>
                    <span class="nav-text">Students</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="<?= url_to('students') ?>">All Student</a></li>
                    <li><a href="<?= url_to('addStudent') ?>">Add Student</a></li>
                    <li><a href="<?= url_to('students_panding') ?>">Panding Student</a></li>
                    <li><a href="<?= url_to('students_reject') ?>">Reject Student</a></li>
                </ul>
            </li>

            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-072-printer "></i>
                    <span class="nav-text">Results</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="<?= url_to('student_certificate') ?>">Results</a></li>
                    <!-- <li><a href="<?php //echo  url_to('') 
                                        ?>">Marksheet</a></li>
                    <li><a href="<?php //echo  url_to('') 
                                    ?>">Admit Card</a></li> -->

                </ul>
            </li>
             <?php if (is_admin()['admin']['role'] == 1) { ?>
           <li>
                <a href="<?= url_to('showEnquiries') ?>" class="" aria-expanded="false">
                    <i class="fas fa-sign-out"></i>
                    <span class="nav-text">Enquiry Form</span>
                </a>
            </li>
            <?php } ?>
            <?php if (is_admin()['admin']['role'] == 1) { ?>
                <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                        <i class="fas fa-users"></i>
                        <span class="nav-text">Users</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="<?= url_to('Userlist') ?>">All User </a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow " href="javascript:void()" aria-expanded="false">
                        <i class="fa-solid fa-cube "></i>
                        <span class="nav-text">Blog / Event</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="<?= url_to('add_blog') ?>">Add Blog</a></li>
                        <li><a href="<?= url_to('view_blog') ?>">View Blogs</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow " href="javascript:void()" aria-expanded="false">
                        <i class="fa-solid fa-cube "></i>
                        <span class="nav-text">News / Event</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="<?= url_to('add_news') ?>">News </a></li>
                        <li><a href="<?= url_to('view_blog') ?>">View Blogs</a></li>
                    </ul>
                </li>
                <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                        <i class="flaticon-086-star"></i>
                        <span class="nav-text">Frontend</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="<?= url_to('web_setting') ?>">Web Setting</a></li>
                        <li><a href="<?= url_to('galleryList') ?>">Gallery</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="fas fa-comments"></i>
                        <span class="nav-text">Testimonials</span>
                    </a>
                    <ul aria-expanded="false">
                       <li>
                          <a href="<?= site_url('admin/testimonial/add') ?>">Add Testimonial</a>
                        </li>
                        
                        <li>
                          <a href="<?= site_url('admin/testimonial/view') ?>">View Testimonials</a>
                        </li>
                    </ul>  
                </li>
            <?php } ?>
            <!-- <li>
                <a href="<?= site_url(route_to('logout')) ?>" class="" aria-expanded="false">
                    <i class="far fa-comments"></i>
                    <span class="nav-text">Contact Form</span>
                </a>
            </li> -->
            <li>
                <a href="<?= site_url(route_to('logout')) ?>" class="" aria-expanded="false">
                    <i class="fas fa-sign-out"></i>
                    <span class="nav-text">Logout</span>
                </a>
            </li>
        </ul>


    </div>
</div>