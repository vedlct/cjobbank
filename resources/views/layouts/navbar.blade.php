<!-- MENU Start -->
<div class="navbar-custom">
    <div class="container-fluid">
        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu">

                {{--<li class="has-submenu">--}}
                    {{--<a href="{{route('cv.apply')}}"><i class="ti-home"></i>Apply CV</a>--}}
                {{--</li>--}}
                @if(USER_TYPE['User']== Auth::user()->fkuserTypeId)

                    <li class="has-submenu">
                        <a href="#"><i class="ti-home"></i>My CV</a>
                        <ul class="submenu">
                            <li><a href="{{route('candidate.cvPersonalInfo')}}">Add/Edit CV</a></li>
                            <li><a href="{{route('candidate.viewUserCv')}}">View CV</a></li>
                        </ul>
                    </li>


                <li class="has-submenu">
                    <a href="{{route('job.all')}}"><i class="ti-layout-width-default"></i>Apply Job</a>
                </li>
                    <li class="has-submenu">

                        <a href="{{route('candidate.manageApplication')}}">Manage Application</a>

                    </li>
                    {{--<li class="has-submenu">--}}

                        {{--<a   href="{{route('candidate.viewUserCv')}}"><i class="ti-file"></i>View Cv</a>--}}

                    {{--</li>--}}
                @endif

                @if(USER_TYPE['Admin']== Auth::user()->fkuserTypeId || USER_TYPE['Emp']== Auth::user()->fkuserTypeId)
                    <li class="has-submenu">
                        <a href="{{route('admin.dashboard')}}"><i class="ti-home"></i>DashBoard</a>
                    </li>
                @if(USER_TYPE['Admin']== Auth::user()->fkuserTypeId)
                    <li class="has-submenu">
                        <a href="{{route('cv.admin.manage')}}"><i class="ti-layout-width-default"></i>Manage CV</a>
                    </li>
                @endif


    <li class="has-submenu">
        <a href="{{route('job.admin.manage')}}"><i class="ti-archive"></i>Manage Job</a>
    </li>
    <li class="has-submenu">
        <a href="{{route('application.admin.manage')}}"><i class="ti-archive"></i>Manage Application</a>
    </li>
    @if(USER_TYPE['Admin']== Auth::user()->fkuserTypeId)
    <li class="has-submenu">
        <a href="{{route('admin.manageUser')}}"><i class="ti-user"></i>User Management</a>
    </li>
    @endif
    @if(USER_TYPE['Admin']== Auth::user()->fkuserTypeId)
    <li class="has-submenu">
        <a href="#"><i class="ti-settings"></i>Settings</a>
        <ul class="submenu" style="height: 500px;overflow-y: scroll">
            <li><a href="{{route('manage.zone')}}">Manage Zone</a></li>
            <li><a href="{{route('manage.education')}}">Manage Education Level</a></li>
            <li><a href="{{route('manage.educationDegree')}}">Manage Education Degree</a></li>
            <li><a href="{{route('manage.major')}}">Manage Major</a></li>
            <li><a href="{{route('manage.board')}}">Manage Board</a></li>
            <li><a href="{{route('manage.nationality')}}">Manage Nationality</a></li>
            <li><a href="{{route('manage.religion')}}">Manage Religion</a></li>
            <li><a href="{{route('manage.ethnicity')}}">Manage Ethnicity</a></li>
            <li><a href="{{route('manage.organizationType')}}">Manage Organization type</a></li>
            <li><a href="{{route('manage.agreement')}}">Manage Agreement</a></li>
            <li><a href="{{route('manage.degisnation')}}">Manage Designation</a></li>
            <li><a href="{{route('manage.getApplicantQuestionAnswer')}}">Applicant Question Answer</a></li>
            {{--<li><a href="{{route('manage.otherSkill')}}">Manage Other Skill</a></li>--}}
            <li><a href="{{route('manage.skill')}}">Manage Computer Skill</a></li>
            <li><a href="{{route('manage.language')}}">Manage Language</a></li>
            {{--<li><a href="{{route('manage.mailTamplate')}}">Manage Mail Tamplate</a></li>--}}
            <li><a href="{{route('manage.careerObjectiveAndApplicationInformation')}}">Career Objective and Application Information</a></li>
            <li><a href="{{route('manage.terms_and_condition')}}">Terms and Condition</a></li>
            <li><a href="{{route('manage.typeOfEmployment')}}">Type of Employment</a></li>
            <li><a  href="{{route('backup.wholeDbBackup')}}">Database backup</a></li>
            <li><a  href="{{url('/email-template-settings')}}">Email template settings</a></li>
        </ul>
    </li>
    @endif
@endif


</ul>
<!-- End navigation menu -->
</div>
<!-- end #navigation -->
</div>
<!-- end container -->
</div>

<div id="display_dialog"></div>

@if(Session::has('message'))
    <p class="alert alert-info" style="text-align: center">{{ Session::get('message') }}</p>
@endif
@if(Session::has('error-message'))
    <p class="alert alert-danger" style="text-align: center">{{ Session::get('error-message') }}</p>
@endif

