<div class="nav-header">
    <a href="javascript:void(0);" class="brand-logo">
        <img src="<?= site_url('public/').site_setting('site_logo') ?>" alt="logo" width="62" height="60">
       



        <svg class="brand-title" xmlns="http://www.w3.org/2000/svg" width="134.01" height="48.365"
            viewBox="0 0 134.01 48.365">
            <g id="Group_38" data-name="Group 38" transform="translate(-133.99 -40.635)">
                <text id="Admin_Dashboard" data-name="Admin Dashboard" transform="translate(134 85)"
                    fill="#787878" font-size="12" font-family="Poppins-Light, Poppins" font-weight="300">
                    <tspan x="0" y="0"><?php if (is_admin()['admin']['role'] == 1){echo "Admin";}else{echo "Franchise";}?> Dashboard</tspan>
                </text>
                <text id="Creative_Education" data-name="DNPI VOCATIONAL INSTITUTE." transform="translate(133.63 53.217)" fill="#464646" font-size="13" font-family="Poppins-Light, Poppins" font-weight="700">
                    <tspan x="0" y="0"><?=site_setting('site_name')?>n</tspan>
                </text>
            </g>
        </svg>

    </a>
    <div class="nav-control">
        <div class="hamburger">
            <span class="line"></span><span class="line"></span><span class="line"></span>
        </div>
    </div>
</div>