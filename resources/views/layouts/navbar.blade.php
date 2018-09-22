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
                    <a href="{{route('candidate.cvPersonalInfo')}}"><i class="ti-home"></i>User CV</a>
                </li>


                <li class="has-submenu">
                    <a href="{{route('job.all')}}"><i class="ti-layout-width-default"></i>Job Bank</a>
                </li>
                    <li class="has-submenu">
                        {{--<a href="#"><i class="ti-archive"></i>Application</a>--}}
                        <a href="{{route('candidate.manageApplication')}}">Manage Application</a>
                        {{--<ul class="submenu">--}}
                            {{--<li><a href="{{route('candidate.manageApplication')}}">Manage Application</a></li>--}}
                            {{--<li><a href="{{route('manage.education')}}">Manage Education</a></li>--}}
                        {{--</ul>--}}
                    </li>
                    <li class="has-submenu">
                        {{--<a  onclick="viewUserCv()" href="#"><i class="ti-settings"></i>View Cv</a>--}}
                        <a target="_blank"  href="{{route('candidate.viewUserCv')}}"><i class="ti-file"></i>View Cv</a>
                        {{--<ul class="submenu">--}}
                            {{--<li><a href="{{route('manage.zone')}}">Manage Zone</a></li>--}}
                            {{--<li><a href="{{route('manage.education')}}">Manage Education</a></li>--}}
                        {{--</ul>--}}
                    </li>
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
        <li><a href="{{route('manage.religion')}}">Manage Religion</a></li>
        <li><a href="{{route('manage.ethnicity')}}">Manage Ethnicity</a></li>
        <li><a href="{{route('manage.organizationType')}}">Manage Organization type</a></li>
        <li><a href="{{route('manage.agreement')}}">Manage Agreement</a></li>
        <li><a href="{{route('manage.degisnation')}}">Manage Degisnation</a></li>
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

<script>
    function viewUserCv() {

        $.ajax({
            type: "get",
            url: '{{route('candidate.viewUserCv')}}',
            data: {},
            success: function (data) {


                if ( data.cvStatus == 1){


                    $.ajax({
                        type: "get",
                        url: '{{route('userCv.post')}}',
                        data: {_token:"{{csrf_token()}}",id:data.employeeId},
                        success: function (data) {

//                            $.alert({
//                                title: 'Success!',
//                                type: 'green',
//                                content: 'Download Complted',
//                                buttons: {
//                                    tryAgain: {
//                                        text: 'Ok',
//                                        btnClass: 'btn-greed',
//                                        action: function () {
//
//                                            // location.reload();
//
//                                        }
//                                    }
//                                }
//                            });

//                            var pdfWin= window.open("data:application/pdf;base64, " + data, '','_blank');

//                            window.open("data:application/pdf;base64, " + encodeURI(data), '','_blank');
//                            window.open(escape(data), "Title", "");


//                            window.open("data:application/pdf" + decodeURI(data), '','_blank');





                        },
                    });



                    {{--var url = "{{route('userCv.get', ':empId') }}";--}}
                    {{--url = url.replace(':empId', data.employeeId);--}}
                    {{--window.open(url,'_blank');--}}


                }else if(data.cvStatus == 0) {

                    $.alert({
                        title: 'Alert!',
                        type: 'red',
                        content: 'Your CV is not Completed yet,Please Complete First',
                        buttons: {
                            tryAgain: {
                                text: 'Ok',
                                btnClass: 'btn-red',
                                action: function () {

                                   // location.reload();

                                }
                            }
                        }
                    });

                }



            },
        });

    }
</script>