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
                    <a href="{{route('candidate.cvPersonalInfo')}}"><i class="ti-home"></i>Candidate CV</a>
                </li>


                <li class="has-submenu">
                    <a href="{{route('job.all')}}"><i class="ti-layout-width-default"></i>Jobs</a>
                </li>
                    <li class="has-submenu">
                        {{--<a href="#"><i class="ti-archive"></i>Application</a>--}}
                        <a href="{{route('candidate.manageApplication')}}">Manage Application</a>
                        {{--<ul class="submenu">--}}
                            {{--<li><a href="{{route('candidate.manageApplication')}}">Manage Application</a></li>--}}
                            {{--<li><a href="{{route('manage.education')}}">Manage Education</a></li>--}}
                        {{--</ul>--}}
                    </li>
                    {{--<li class="has-submenu">--}}
                        {{--<a href="#"><i class="ti-settings"></i>Settings</a>--}}
                        {{--<ul class="submenu">--}}
                            {{--<li><a href="{{route('manage.zone')}}">Manage Zone</a></li>--}}
                            {{--<li><a href="{{route('manage.education')}}">Manage Education</a></li>--}}
                        {{--</ul>--}}
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
        <ul class="submenu">
        <li><a href="{{route('manage.zone')}}">Manage Zone</a></li>
        <li><a href="{{route('manage.education')}}">Manage Education Level</a></li>
        <li><a href="{{route('manage.educationDegree')}}">Manage Education Degree</a></li>
        <li><a href="{{route('manage.nationality')}}">Manage Nationality</a></li>
        <li><a href="#">Manage Religion</a></li>
        <li><a href="#">Manage Ethnicity</a></li>
        <li><a href="#">Manage Organization type</a></li>
        <li><a href="#">Manage Agreement</a></li>
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