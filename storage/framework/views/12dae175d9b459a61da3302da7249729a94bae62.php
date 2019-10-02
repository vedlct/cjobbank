<!-- MENU Start -->
<div class="navbar-custom">
    <div class="container-fluid">
        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu">

                
                    
                
                <?php if(USER_TYPE['User']== Auth::user()->fkuserTypeId): ?>

                    <li class="has-submenu">
                        <a href="#"><i class="ti-home"></i>My CV</a>
                        <ul class="submenu">
                            <li><a href="<?php echo e(route('candidate.cvPersonalInfo')); ?>">Add/Edit CV</a></li>
                            <li><a href="<?php echo e(route('candidate.viewUserCv')); ?>">View CV</a></li>
                        </ul>
                    </li>


                <li class="has-submenu">
                    <a href="<?php echo e(route('job.all')); ?>"><i class="ti-layout-width-default"></i>Apply Job</a>
                </li>
                    <li class="has-submenu">

                        <a href="<?php echo e(route('candidate.manageApplication')); ?>">Manage Application</a>

                    </li>
                    

                        

                    
                <?php endif; ?>

                <?php if(USER_TYPE['Admin']== Auth::user()->fkuserTypeId || USER_TYPE['Emp']== Auth::user()->fkuserTypeId): ?>
                    <li class="has-submenu">
                        <a href="<?php echo e(route('admin.dashboard')); ?>"><i class="ti-home"></i>DashBoard</a>
                    </li>
                <?php if(USER_TYPE['Admin']== Auth::user()->fkuserTypeId): ?>
                    <li class="has-submenu">
                        <a href="<?php echo e(route('cv.admin.manage')); ?>"><i class="ti-layout-width-default"></i>Manage CV</a>
                    </li>
                <?php endif; ?>


    <li class="has-submenu">
        <a href="<?php echo e(route('job.admin.manage')); ?>"><i class="ti-archive"></i>Manage Job</a>
    </li>
    <li class="has-submenu">
        <a href="<?php echo e(route('application.admin.manage')); ?>"><i class="ti-archive"></i>Manage Application</a>
    </li>
    <?php if(USER_TYPE['Admin']== Auth::user()->fkuserTypeId): ?>
    <li class="has-submenu">
        <a href="<?php echo e(route('admin.manageUser')); ?>"><i class="ti-user"></i>User Management</a>
    </li>
    <?php endif; ?>
    <?php if(USER_TYPE['Admin']== Auth::user()->fkuserTypeId): ?>
    <li class="has-submenu">
        <a href="#"><i class="ti-settings"></i>Settings</a>
        <ul class="submenu" style="height: 500px;overflow-y: scroll">
            <li><a href="<?php echo e(route('manage.zone')); ?>">Manage Zone</a></li>
            <li><a href="<?php echo e(route('manage.education')); ?>">Manage Education Level</a></li>
            <li><a href="<?php echo e(route('manage.educationDegree')); ?>">Manage Education Degree</a></li>
            <li><a href="<?php echo e(route('manage.major')); ?>">Manage Major</a></li>
            <li><a href="<?php echo e(route('manage.board')); ?>">Manage Board</a></li>
            <li><a href="<?php echo e(route('manage.nationality')); ?>">Manage Nationality</a></li>
            <li><a href="<?php echo e(route('manage.religion')); ?>">Manage Religion</a></li>
            <li><a href="<?php echo e(route('manage.ethnicity')); ?>">Manage Ethnicity</a></li>
            <li><a href="<?php echo e(route('manage.organizationType')); ?>">Manage Organization type</a></li>
            <li><a href="<?php echo e(route('manage.agreement')); ?>">Manage Agreement</a></li>
            <li><a href="<?php echo e(route('manage.degisnation')); ?>">Manage Designation</a></li>
            <li><a href="<?php echo e(route('manage.getApplicantQuestionAnswer')); ?>">Applicant Question Answer</a></li>
            
            <li><a href="<?php echo e(route('manage.skill')); ?>">Manage Computer Skill</a></li>
            <li><a href="<?php echo e(route('manage.language')); ?>">Manage Language</a></li>
            
            <li><a href="<?php echo e(route('manage.careerObjectiveAndApplicationInformation')); ?>">Career Objective and Application Information</a></li>
            <li><a href="<?php echo e(route('manage.terms_and_condition')); ?>">Terms and Condition</a></li>
            <li><a href="<?php echo e(route('manage.typeOfEmployment')); ?>">Type of Employment</a></li>
            <li><a  href="<?php echo e(route('backup.wholeDbBackup')); ?>">Database backup</a></li>
            <li><a  href="<?php echo e(url('/email-template-settings')); ?>">Email template settings</a></li>
        </ul>
    </li>
    <?php endif; ?>
<?php endif; ?>


</ul>
<!-- End navigation menu -->
</div>
<!-- end #navigation -->
</div>
<!-- end container -->
</div>

<div id="display_dialog"></div>

<?php if(Session::has('message')): ?>
    <p class="alert alert-info" style="text-align: center"><?php echo e(Session::get('message')); ?></p>
<?php endif; ?>
<?php if(Session::has('error-message')): ?>
    <p class="alert alert-danger" style="text-align: center"><?php echo e(Session::get('error-message')); ?></p>
<?php endif; ?>

