<!-- MENU Start -->
<div class="navbar-custom">
    <div class="container-fluid">
        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu">

                <li class="has-submenu">
                    <a href="<?php echo e(route('cv.apply')); ?>"><i class="ti-home"></i>Apply CV</a>
                </li>

                <li class="has-submenu">
                    <a href="<?php echo e(route('job.all')); ?>"><i class="ti-layout-width-default"></i>Jobs</a>
                </li>

                <li class="has-submenu">
                    <a href="<?php echo e(route('job.manage')); ?>"><i class="ti-archive"></i>Manage Job</a>
                </li>

                <li class="has-submenu">
                    <a href="<?php echo e(route('application')); ?>"><i class="ti-archive"></i>Application</a>
                </li>
                <li class="has-submenu">
                    <a href="#"><i class="ti-settings"></i>Settings</a>
                    <ul class="submenu">
                        <li><a href="<?php echo e(route('manage.zone')); ?>">Manage Zone</a></li>
                        <li><a href="<?php echo e(route('manage.education')); ?>">Manage Education</a></li>
                    </ul>
                </li>

            </ul>
            <!-- End navigation menu -->
        </div>
        <!-- end #navigation -->
    </div>
    <!-- end container -->
</div>