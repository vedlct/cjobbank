@extends('main')

@section('header')

{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>--}}
{{--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>--}}

{{--<link href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" rel="stylesheet">--}}

@endsection

@section('content')


    <div class="row">
        <div class="col-md-2">

            <div style="background-color: white;margin-bottom: 20px;" class="card-body">

                <!-- Modal -->
                <div class="modal fade" id="mail_info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <b><h4 class="modal-title dark profile-title" id="myModalLabel">Mail Info</h4></b>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

                            </div>

                            <div class="modal-body">

                                <div class="row">
                                    <div  class="col-md-6">

                                            <label for="mailTamplate" class="control-label">Mail Tamplate</label>

                                            <select class="form-control" id="mailTamplate">
                                                <option selected value="" selected>Select Tamplate</option>
                                                @foreach($mailTamplate as $mT)
                                                    <option value="{{$mT->tamplateId}}">{{$mT->tamplateName}}</option>
                                                @endforeach

                                            </select>

                                        </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-6">

                                        <label for="refNo">Ref No:</label>
                                        <input class="form-control" id="refNo" name="refNo" value="">

                                    </div>
                                    <div id="testDateDiv" class="col-md-6">

                                        <label for="">Test Date</label>
                                        <input class="form-control date1" id="testDate" name="testDate" value="">

                                    </div>

                                </div>

                                <div class="row" id="forinterview">

                                    <div class="col-md-3">

                                        <label for="refNo">Selected applicant:</label>
                                        <input type="text" id="totalSelected" name="numberofapplicant" class="form-control" readonly>

                                    </div>
                                    <div class="col-md-3">

                                        <label for="">Start Time</label>
                                        <input type="time" class="form-control" id="StartTime">

                                    </div>
                                    <div class="col-md-3">

                                        <label for="">End Time</label>
                                        <input type="time" class="form-control" id="EndTime">

                                    </div>
                                    <div class="col-md-3">

                                        <label for="">Interval Time</label>
                                        <input class="form-control" id="IntervalTime">

                                    </div>

                                </div>

                                <div id="subjectLineDiv" class="form-group">
                                    <label for="">Subject line</label>
                                    <input type="text" class="form-control" id="subjectLine" placeholder="subject line" value="" name="subjectLine">
                                </div>

                                    <div class="form-group">
                                        <label for="">Test Details</label>

                                        <textarea class="form-control" id="tamplateBody" name="testDetails" rows="2" ></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Test Address</label>
                                        <textarea class="form-control" id="testAddress" name="testAddress" rows="2" ></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Mail Footer</label>
                                        <textarea class="form-control ckeditor" id="ckBox" value="" name="tamplateFooterAndSign" rows="6" ></textarea>
                                    </div>

                                    <div class="form-group">

                                        <button type="submit" onclick="sendMailToJobApplied()" class="btn btn-success">Submit</button>
                                        <button type="button" onclick="downloadmailDoc()" class="btn btn-success">Download as doc</button>
                                    </div>

                                {{--</form>--}}

                            </div>



                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="excel_info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <b><h4 class="modal-title dark profile-title" id="myModalLabel">Excel Info</h4></b>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

                            </div>

                            <div class="modal-body">




                                    <div class="form-group">

                                        <label for="excelName">Excel Name:</label>
                                        <input class="form-control" id="excelName" name="excelName" value="">

                                    </div>



                                <div style="display: none" id="HRfullreport" class="form-group">

                                    <a href="#" onclick="return myfunc()" ><button type="submit" class="btn btn-success">Submit</button></a>
                                </div>
                                <div style="display: none" id="HRreport02" class="form-group">

                                    <a href="#" onclick="return myfunchrreport02()" ><button type="submit" class="btn btn-success">Submit</button></a>
                                </div>
                                <div style="display: none" id="HRreport03" class="form-group">

                                    <a href="#" onclick="return myfunchrreport03()" ><button type="submit" class="btn btn-success">Submit</button></a>
                                </div>



                            </div>



                        </div>
                    </div>
                </div>

                <div class=" form-group ">
                    <label>Gender</label>
                    <select name="genderFilter" id="genderFilter" class="form-control">
                        <option value="">Select a Gender</option>
                        @foreach(GENDER as $key=>$value)
                            <option value="{{$value}}">{{$key}}</option>
                        @endforeach

                    </select>
                </div>

                <div class=" form-group ">
                    <label>Age From</label><span style="color: red">(Year)</span>
                    <input class="form-control" id="ageFromFilter" name="ageFromFilter" onkeypress="return isNumberKey(event)" type="text">
                </div>
                <div class=" form-group ">
                    <label>Age to</label><span style="color: red">(Year)</span>
                    <input class="form-control" id="ageToFilter" name="ageToFilter" onkeypress="return isNumberKey(event)" type="text">
                </div>
                <div class=" form-group ">
                    <label>Apply Date</label>
                    <input class="form-control date" id="applyDate" name="applyDate" onkeypress="return isNumberKey(event)" type="text">
                </div>


                <div class=" form-group ">
                    <label>Job Title</label>
                    <select name="jobTitle" id="jobTitle" class="form-control">
                        <option value="">Select a jobTitle</option>
                        @foreach($allJobTitle as $jobTitle)
                            <option value="{{$jobTitle->title}}">{{$jobTitle->title}}</option>
                        @endforeach

                    </select>
                </div>
                <div class=" form-group ">
                    <label>Applicant Status</label>
                    <select name="applicant_Status" id="applicant_Status" class="form-control">
                        <option value="" id="blankStatus">Select a Status</option>
                        <option value="Pending">Pending</option>
                        <option value="Viewed">Viewed</option>
                        <option value="Called">Called</option>
                        <option value="Rejected">Rejected</option>
                    </select>
                </div>
                <div class=" form-group ">
                    <label>Religion</label>
                    <select name="religionFilter" id="religionFilter" class="form-control">
                        <option value="">Select a Religion</option>
                        @foreach($religion as $reli)
                            <option value="{{$reli->religionId}}">{{$reli->religionName}}</option>
                        @endforeach

                    </select>
                </div>
                <div class=" form-group ">
                    <label>Ethnicity</label>
                    <select name="ethnicityFilter" id="ethnicityFilter" class="form-control">
                        <option value="">Select a Ethnicity</option>
                        @foreach($ethnicity as $ethi)
                            <option value="{{$ethi->ethnicityId}}">{{$ethi->ethnicityName}}</option>
                        @endforeach

                    </select>
                </div>
                <div class=" form-group ">
                    <label>Disability</label>
                    <select name="disabilityFilter" id="disabilityFilter" class="form-control">
                        <option value="">Select a Disability</option>
                        @foreach(DISABILITY as $key=>$value)
                            <option value="{{$value}}">{{$key}}</option>
                        @endforeach

                    </select>
                </div>

                <div class=" form-group ">
                    <label>Marital Status</label>
                    <select name="maritalStatusFilter" id="maritalStatusFilter" class="form-control">
                        <option value="">Select marital status</option>
                        @foreach(MARITAL_STATUS as $key=>$value)
                            <option value="{{$value}}">{{$key}}</option>
                        @endforeach
                    </select>
                </div>


                <div class=" form-group ">
                    <label>Nationality</label>
                    <select name="nationalityFilter" id="nationalityFilter" class="form-control">
                        <option  value="">Select a Nationality</option>
                        @foreach($natinality as $natio)
                            <option value="{{$natio->nationalityId}}">{{$natio->nationalityName}}</option>
                        @endforeach

                    </select>
                </div>
                <div class=" form-group">
                    <label>Zone</label>
                    <select name="zonefilter" id="zonefilter" class="form-control">
                        <option value="">Select a Zone</option>
                        @foreach($allZone as $zone)
                            <option  value="{{$zone->zoneId}}">{{$zone->zoneName}}</option>
                        @endforeach

                    </select>
                </div>
                <hr>
                <div class="form-group">
                    <label style="text-align: center" class="col-12">Education</label>
                <div class=" form-group ">
                    <label>Educational Qualification</label>
                    <select id="educationLvlFilter" name="educationLvlFilter" class="form-control">
                        <option value="">Select a Qualification</option>
                        @foreach($allEducationLevel as $eduLvl)
                            <option  value="{{$eduLvl->educationLevelId}}">{{$eduLvl->educationLevelName}}</option>
                        @endforeach


                    </select>
                </div>

                    <div class=" form-group ">
                        <label>Degree</label>
                        <select id="degreeLvlFilter" name="degreeLvlFilter" class="form-control">
                            <option value="">Select a Degree</option>
                            @foreach($degree as $de)
                                <option  value="{{$de->degreeId}}">{{$de->degreeName}}</option>
                            @endforeach

                        </select>
                    </div>

{{--                    <div class="example">--}}
{{--                        <script type="text/javascript">--}}
{{--                            $(document).ready(function() {--}}
{{--                                $('#educationMajorFilter').multiselect();--}}
{{--                            });--}}
{{--                        </script>--}}
{{--                        <select id="multi-select-demo" multiple="multiple">--}}
{{--                            <option value="jQuery">jQuery tutorial</option>--}}
{{--                            <option value="Bootstrap">Bootstrap Tips</option>--}}
{{--                            <option value="HTML">HTML</option>--}}
{{--                            <option value="CSS">CSS tricks</option>--}}
{{--                            <option value="angular">Angular JS</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}



                    <div class=" form-group ">
                        <label>Major</label>
{{--                        <select data-placeholder="Choose a Country..."id="educationMajorFilter" class="chosen-select" multiple style="width:350px;" tabindex="4">--}}
                        <select id="educationMajorFilter" name="educationMajorFilter" class="form-control" multiple>
                            <option value="">Select a Major</option>
                        </select>
                    </div>
                <div class=" form-group ">
                    <label>Status of completion</label>
                    <select id="educationCompletingFilter" name="educationCompletingFilter" class="form-control">
                        <option value="">Select a Status</option>
                        @foreach(COMPLETING_STATUS as $key=>$value)
                            <option value="{{$value}}">{{$key}}</option>
                        @endforeach

                    </select>
                </div>
                </div>
                <hr>
                <div class="form-group">
                    <label style="text-align: center" class="col-12">Professional Qualification</label>
                    <div class=" form-group ">
                        <label>Qualification</label>
                        <input id="professionalQualificationFilter" name="professionalQualificationFilter" class="form-control" type="text">
                    </div>
                    <div class=" form-group ">
                        <label>Status of completion</label>
                        <select id="qualificationCompletingFilter" name="qualificationCompletingFilter" class="form-control">
                            <option value="">Select a Status</option>
                            @foreach(COMPLETING_STATUS as $key=>$value)
                                <option value="{{$value}}">{{$key}}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label style="text-align: center" class="col-12">Training information</label>
                    <div class=" form-group ">
                        <label>Name of Training</label>
                        <input id="TrainingNameFilter" name="TrainingNameFilter" class="form-control" type="text">
                    </div>
                    <div class=" form-group ">
                        <label>Status of completion</label>
                        <select id="trainingCompletingFilter" name="trainingCompletingFilter" class="form-control">
                            <option value="">Select a Status</option>
                            @foreach(COMPLETING_STATUS as $key=>$value)
                                <option value="{{$value}}">{{$key}}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label style="text-align: center" class="col-12">Job Experiences</label>

                    <div class=" form-group ">
                        <label>From</label>&nbsp;<span style="color: red">(Year)</span>
                        <input id="jobExperienceFromFilter" name="jobExperienceFromFilter" class="form-control" onkeypress="return isNumberKey(event)" type="text">
                    </div>
                    <div class="form-group ">
                        <label>to</label>&nbsp;<span style="color: red">(Year)</span>
                        <input id="jobExperienceToFilter" name="jobExperienceToFilter" class="form-control" onkeypress="return isNumberKey(event)" type="text">
                    </div>

                    <div class=" form-group ">
                        <label>Organization Type</label>
                        <select id="jobExperienceFilter" name="jobExperienceFilter" class="form-control">
                            <option value="">Select a Type</option>
                            @foreach($organizationType as $type)
                                <option value="{{$type->organizationTypeId}}">{{$type->organizationTypeName}}</option>
                            @endforeach

                        </select>


                    </div>

                </div>
                <hr>


            </div>
        </div>

        <div class="col-md-10">
            <div class="card m-b-30">
                <div class="card-header">
                    <h4 class="pull-left">Manage All Application</h4>

                </div>
                <div class="card-body">


                    <div style="margin-top: 10px;" class="row">
                        <label class="checkbox-inline"><input style="width: auto;" type="checkbox" id="selectall2" value="">Select all</label>

                        <div class="col-md-3">
                            <a onclick="excelInfomationSubmit()"><button class="btn btn-danger btn-sm">Export candidates excel</button></a>
                        </div>
                        <div class="col-md-3">
                            <a onclick="excelReport03InfomationSubmit()"><button class="btn btn-primary btn-sm">Export HR report-02</button></a>
                        </div>
                        <div class="col-md-3">
                            <a onclick="excelReport02InfomationSubmit()"><button class="btn btn-primary btn-sm">Export HR report-03</button></a>
                        </div>






                    </div>
                    <div style="margin-top: 10px;" class="row">

                        <div class="col-md-3">
                            <a onclick="sendMail()"><button class="btn btn-danger btn-sm">Send Mail</button></a>
                        </div>

                    </div>
                    {{--<div class="row">--}}

                        {{--<div class="col-md-1">--}}
                            {{--<a onclick="return sendMail()"><button class="btn btn-danger btn-sm">Send Mail</button></a>--}}
                        {{--</div>--}}


                    {{--</div>--}}
                    <br>
                    <div class="table table-responsive">
                    <table id="manageapplication" class="table table-striped table-bordered" style="width:100%" >
                        <thead>
                        <tr>

                            <th style="width: 4%">Select</th>
                            <th>Given name</th>
                            <th>Surname</th>

                            <th>Job Title</th>
                            <th>Zone</th>
                            <th>Apply Date</th>
                            <th>Status</th>
                            <th>Schedule Date</th>
                            <th>Schedule Time</th>

                            <th>Action</th>


                        </tr>
                        </thead>
                    </table>
                    </div>




                </div>

            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->






@endsection
@section('foot-js')

{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.js"></script>--}}

    <script src="{{url('public/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('public/assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script type="text/javascript" src="{{url('public/assets/ckeditor/ckeditor.js')}}"></script>
{{--    <script type="text/javascript" src="{{url('public/assets/js/moment.js')}}"></script>--}}

    <script>

        CKEDITOR.config.autoParagraph = false;

        CKEDITOR.config.toolbar = [
            { name: 'document', items: [ 'Source', '-', 'Preview', '-'] },
            { name: 'clipboard', items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
            '/',
            { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline' ] },
            { name: 'paragraph',   items: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
            { name: 'styles', items: [ 'Format', 'Styles', 'blocks', 'align', 'bidi' ]},
            { name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ]},
            { name: 'paragraph', items: [ 'Outdent', 'Indent', 'Blockquote' ]}

        ];
    </script>

    <script>

        $(document).ready(function() {

            $("#applicant_Status").attr("disabled", true);

            $('.date').datepicker({
                format: 'yyyy-m-d',
                todayHighlight: true,
                autoclose: true
            });
            $('.date1').datepicker({
                format: 'yyyy-m-d',
                todayHighlight: true,
                autoclose: true,
                startDate: '-0d',
            });

            $('#forinterview').hide();

            table = $('#manageapplication').DataTable({
                processing: true,
                serverSide: true,
                stateSave: true,
                "ajax":{
                    "url": "{!! route('application.admin.showAll')!!}",
                    "type": "POST",
                    data:function (d){

                        d._token="{{csrf_token()}}";

                        if ($('#maritalStatusFilter').val()!=""){
                            d.maritalStatusFilter=$('#maritalStatusFilter').val();
                        }
                        if ($('#genderFilter').val()!=""){
                            d.genderFilter=$('#genderFilter').val();
                        }
                        if ($('#religionFilter').val()!=""){
                            d.religionFilter=$('#religionFilter').val();
                        }
                        if ($('#ethnicityFilter').val()!=""){
                            d.ethnicityFilter=$('#ethnicityFilter').val();
                        }
                        if ($('#disabilityFilter').val()!=""){
                            d.disabilityFilter=$('#disabilityFilter').val();
                        }
                        if ($('#nationalityFilter').val()!=""){
                            d.nationalityFilter=$('#nationalityFilter').val();
                        }
                        if ($('#zonefilter').val()!=""){
                            d.zonefilter=$('#zonefilter').val();
                        }
                        if ($('#ageFromFilter').val()!=""){
                            d.ageFromFilter=$('#ageFromFilter').val();
                        }
                        if ($('#ageToFilter').val()!=""){
                            d.ageToFilter=$('#ageToFilter').val();
                        }
                        if ($('#jobTitle').val()!=""){
                            d.jobTitle=$('#jobTitle').val();
                            $("#applicant_Status").attr("disabled", false);
                        }
                        if ($('#applicant_Status').val()!=""){
                            d.applicant_Status=$('#applicant_Status').val();
                        }
                        if ($('#applyDate').val()!=""){
                            d.applyDate=$('#applyDate').val();
                        }
                        if ($('#educationLvlFilter').val()!=""){
                            d.educationLvlFilter=$('#educationLvlFilter').val();
                        }if ($('#degreeLvlFilter').val()!=""){
                            d.degreeLvlFilter=$('#degreeLvlFilter').val();
                        }
                        if ($('#educationCompletingFilter').val()!=""){
                            d.educationCompletingFilter=$('#educationCompletingFilter').val();
                        }
                        if ($('#educationMajorFilter').val()!=""){
                            d.educationMajorFilter=$('#educationMajorFilter').val();
                        }
                        if ($('#qualificationCompletingFilter').val()!=""){
                            d.qualificationCompletingFilter=$('#qualificationCompletingFilter').val();
                        }
                        if ($('#trainingCompletingFilter').val()!=""){
                            d.trainingCompletingFilter=$('#trainingCompletingFilter').val();
                        }
                        if ($('#jobExperienceFromFilter').val()!=""){
                            d.jobExperienceFromFilter=$('#jobExperienceFromFilter').val();
                        }
                        if ($('#jobExperienceToFilter').val()!=""){
                            d.jobExperienceToFilter=$('#jobExperienceToFilter').val();
                        }
                        if ($('#professionalQualificationFilter').val()!=""){
                            d.professionalQualificationFilter=$('#professionalQualificationFilter').val();
                        }
                        if ($('#TrainingNameFilter').val()!=""){
                            d.TrainingNameFilter=$('#TrainingNameFilter').val();
                        }
                        if ($('#jobExperienceFilter').val()!=""){
                            d.jobExperienceFilter=$('#jobExperienceFilter').val();
                        }

                    },
                },
                columns: [

                    { "data": function(data){
                        return '<input  data-panel-id="'+data.applyId+'"onclick="selected_rows(this)" type="checkbox" class="chk" name="selected_rows[]" value="'+ data.applyId +'" />'
                            ;},
                        "orderable": false, "searchable":false
                    },
                    { data: 'firstName', name: 'employee.firstName',"orderable": false, "searchable":true },
                    { data: 'lastName', name: 'employee.lastName',"orderable": false, "searchable":true },
                    { data: 'title', name: 'job.title', "orderable": false, "searchable":true },
                    { data: 'zoneName', name: 'zone.zoneName', "orderable": false, "searchable":true },
                    { data: 'applydate', name: 'jobapply.applydate', "orderable": true, "searchable":true },
                    { data: 'status', name: 'jobapply.status', "orderable": true, "searchable":true },
                    { data: 'interviewCallDate', name: 'jobapply.interviewCallDate', "orderable": true, "searchable":true },
                    { data: 'interviewCallDateTime', name: 'jobapply.interviewCallDateTime', "orderable": true, "searchable":true },


                    { "data": function(data){
                        return '<button class="btn btn-smbtn-info" onclick="getEmpCv('+data.employeeId+')"><i class="fa fa-file-pdf-o"></i></button>'
                            +'&nbsp;' +'<button class="btn btn-sm btn-danger" onclick="empReject('+data.employeeId+')"><i class="fa fa-trash-o"></i></button>'
                            ;},
                        "orderable": false, "searchable":false
                    },


                ],
            });

            $('#applicant_Status').change(function(){
                table.ajax.reload();
            });

            // maritial status
            $('#maritalStatusFilter').change(function(){
                table.ajax.reload();
                emptySelect();
                if ($('#maritalStatusFilter').val()!=""){

                    $('#maritalStatusFilter').css("background-color", "#7c9").css('color', 'white');
                }else {
                    $('#maritalStatusFilter').css("background-color", "#FFF").css('color', 'black');
                }
            });

            $('#genderFilter').change(function(){ //button filter event click
//                table.search("").draw(); //just redraw myTableFilter
                table.ajax.reload();  //just reload table
                emptySelect();
                if ($('#genderFilter').val()!=""){

                    $('#genderFilter').css("background-color", "#7c9").css('color', 'white');
                }else {
                    $('#genderFilter').css("background-color", "#FFF").css('color', 'black');
                }
            });
            $('#religionFilter').change(function(){ //button filter event click
//                table.search("").draw(); //just redraw myTableFilter

                table.ajax.reload();  //just reload table
                emptySelect();
                if ($('#religionFilter').val()!=""){

                    $('#religionFilter').css("background-color", "#7c9").css('color', 'white');
                }else {
                    $('#religionFilter').css("background-color", "#FFF").css('color', 'black');
                }


            });
            $('#ethnicityFilter').change(function(){ //button filter event click
//                table.search("").draw(); //just redraw myTableFilter

                table.ajax.reload();  //just reload table
                emptySelect();
                if ($('#ethnicityFilter').val()!=""){

                    $('#ethnicityFilter').css("background-color", "#7c9").css('color', 'white');
                }else {
                    $('#ethnicityFilter').css("background-color", "#FFF").css('color', 'black');
                }

            });
            $('#disabilityFilter').change(function(){ //button filter event click
//                table.search("").draw(); //just redraw myTableFilter

                table.ajax.reload();  //just reload table
                emptySelect();
                if ($('#disabilityFilter').val()!=""){

                    $('#disabilityFilter').css("background-color", "#7c9").css('color', 'white');
                }else {
                    $('#disabilityFilter').css("background-color", "#FFF").css('color', 'black');
                }

            });
            $('#nationalityFilter').change(function(){ //button filter event click
//                table.search("").draw(); //just redraw myTableFilter
                table.ajax.reload();  //just reload table
                emptySelect();
                if ($('#nationalityFilter').val()!=""){

                    $('#nationalityFilter').css("background-color", "#7c9").css('color', 'white');
                }else {
                    $('#nationalityFilter').css("background-color", "#FFF").css('color', 'black');
                }
            });
            $('#zonefilter').change(function(){ //button filter event click
//                table.search("").draw(); //just redraw myTableFilter
                table.ajax.reload();  //just reload table
                emptySelect();
                if ($('#zonefilter').val()!=""){

                    $('#zonefilter').css("background-color", "#7c9").css('color', 'white');
                }else {
                    $('#zonefilter').css("background-color", "#FFF").css('color', 'black');
                }
            });
            $('#jobTitle').change(function(){
                table.ajax.reload();
                emptySelect();
                $("#blankStatus").prop('selected',true);
                if ($('#jobTitle').val()!=""){
                    $('#jobTitle').css("background-color", "#7c9").css('color', 'white');
                    $("#applicant_Status").attr("disabled", false);
                }else {
                    $('#jobTitle').css("background-color", "#FFF").css('color', 'black');
                    $("#applicant_Status").attr("disabled", true);
                }

            });
            $('#applyDate').change(function(){ //button filter event click
//                table.search("").draw(); //just redraw myTableFilter
                table.ajax.reload();  //just reload table
                emptySelect();
                if ($('#applyDate').val()!=""){

                    $('#applyDate').css("background-color", "#7c9").css('color', 'white');
                }else {
                    $('#applyDate').css("background-color", "#FFF").css('color', 'black');
                }
            });
            $('#jobExperienceFromFilter').keyup(function(){ //button filter event click
//                table.search("").draw(); //just redraw myTableFilter
                emptySelect();
                if ($('#jobExperienceFromFilter').val()!="") {


                    if ($('#jobExperienceToFilter').val() != "") {

                        if (Date.parse($('#jobExperienceToFilter').val()) < Date.parse($('#jobExperienceFromFilter').val())) {

                            var errorMsg = 'Job Experience From should not after Job Experience To!!';
                            validationError(errorMsg);
                            $('#jobExperienceFromFilter').val("");
                            $('#jobExperienceFromFilter').css("background-color", "#FFF").css('color', 'black');

                        } else {
                            $('#jobExperienceFromFilter').css("background-color", "#7c9").css('color', 'white');
                            table.ajax.reload();
                        }


                    } else {
                        $('#jobExperienceFromFilter').css("background-color", "#7c9").css('color', 'white');
                        table.ajax.reload();


                    }
                }else {
                    table.ajax.reload();  //just reload table
                    $('#jobExperienceFromFilter').css("background-color", "#FFF").css('color', 'black');
                }
            });
            $('#jobExperienceToFilter').keyup(function(){ //button filter event click
//                table.search("").draw(); //just redraw myTableFilter
                emptySelect();
                if ($('#jobExperienceToFilter').val()!="") {

                    if ($('#jobExperienceFromFilter').val() != "") {

                        if (Date.parse($('#jobExperienceToFilter').val()) < Date.parse($('#jobExperienceFromFilter').val())) {

                            var errorMsg = 'Job Experience To should not less than Job Experience From!!';
                            validationError(errorMsg);
                            $('#jobExperienceToFilter').val("");
                            $('#jobExperienceToFilter').css("background-color", "#FFF").css('color', 'black');

                        } else {
                            $('#jobExperienceToFilter').css("background-color", "#7c9").css('color', 'white');
                            table.ajax.reload();

                        }


                    } else {
                        // $("#age").css('background-color', 'green');
                        $('#jobExperienceToFilter').css("background-color", "#7c9").css('color', 'white');
                        table.ajax.reload();

                    }
                }else {
                    table.ajax.reload();  //just reload table
                    $('#jobExperienceToFilter').css("background-color", "#FFF").css('color', 'black');
                }
            });
            $('#educationCompletingFilter').change(function(){ //button filter event click
//                table.search("").draw(); //just redraw myTableFilter
                emptySelect();
                if ($('#educationCompletingFilter').val()!=""){

                    if ($('#educationLvlFilter').val()!="") {
                        table.ajax.reload();  //just reload table
                        $('#educationCompletingFilter').css("background-color", "#7c9").css('color', 'white');
                    }else {
                        var errorMsg='Please Select Education Lavel First!!'
                        validationError(errorMsg);
                        $("#educationCompletingFilter").prop("selectedIndex", 0);
                        $('#educationCompletingFilter').css("background-color", "#FFF").css('color', 'black');

                    }

                }else {
                    table.ajax.reload();  //just reload table
                    $('#educationCompletingFilter').css("background-color", "#FFF").css('color', 'black');
                }

            });
            $('#educationMajorFilter').change(function(){ //button filter event click
//                table.search("").draw(); //just redraw myTableFilter
                table.ajax.reload();  //just reload table
                emptySelect();
                if ($('#educationMajorFilter').val()!=""){

                    $('#educationMajorFilter').css("background-color", "#7c9").css('color', 'white');
                }else {
                    $('#educationMajorFilter').css("background-color", "#FFF").css('color', 'black');
                }
            });
            $('#educationLvlFilter').change(function(){ //button filter event click
//                table.search("").draw(); //just redraw myTableFilter
                table.ajax.reload();  //just reload table

                emptySelect();
                if ($('#educationLvlFilter').val()!=""){

                    $('#educationLvlFilter').css("background-color", "#7c9").css('color', 'white');
                }else {
                    $('#educationLvlFilter').css("background-color", "#FFF").css('color', 'black');
                }

            });
            $('#degreeLvlFilter').change(function(){ //button filter event click
//                table.search("").draw(); //just redraw myTableFilter
                table.ajax.reload();  //just reload table

                emptySelect();
                if ($('#degreeLvlFilter').val()!=""){

                    $('#degreeLvlFilter').css("background-color", "#7c9").css('color', 'white');
                }else {
                    $('#degreeLvlFilter').css("background-color", "#FFF").css('color', 'black');
                }

            });
            $('#qualificationCompletingFilter').change(function(){ //button filter event click
//                table.search("").draw(); //just redraw myTableFilter
                emptySelect();

                if($('#qualificationCompletingFilter').val()!=""){

                    if($('#professionalQualificationFilter').val()==""){

                        var errorMsg = 'Please Type Qualification First!!';
                        validationError(errorMsg);
                        $("#qualificationCompletingFilter").prop("selectedIndex", 0);
                        $('#qualificationCompletingFilter').css("background-color", "#FFF").css('color', 'black');
                    }else {
                        table.ajax.reload();  //just reload table
                        $('#qualificationCompletingFilter').css("background-color", "#7c9").css('color', 'white');
                    }

                }else {
                    table.ajax.reload();  //just reload table
                    $('#qualificationCompletingFilter').css("background-color", "#FFF").css('color', 'black');
                }

            });
            $('#trainingCompletingFilter').change(function(){ //button filter event click
//                table.search("").draw(); //just redraw myTableFilter
//                table.ajax.reload();  //just reload table
                emptySelect();
                if($('#trainingCompletingFilter').val()!=""){

                    if($('#TrainingNameFilter').val()==""){

                        var errorMsg = 'Please Type Training First!!';
                        validationError(errorMsg);
                        $("#trainingCompletingFilter").prop("selectedIndex", 0);
                        $('#trainingCompletingFilter').css("background-color", "#FFF").css('color', 'black');
                    }else {
                        table.ajax.reload();  //just reload table
                        $('#trainingCompletingFilter').css("background-color", "#7c9").css('color', 'white');
                    }

                }else {
                    table.ajax.reload();  //just reload table
                    $('#trainingCompletingFilter').css("background-color", "#FFF").css('color', 'black');
                }

            });
            $("#ageFromFilter").keyup(function(){
                // table.search("").draw(); //just redraw myTableFilter
                emptySelect();

                if ($('#ageFromFilter').val()!="") {


                    if ($('#ageToFilter').val() != "") {

                        if (Date.parse($('#ageToFilter').val()) < Date.parse($('#ageFromFilter').val())) {

                            var errorMsg = 'Age From should not after Age To!!';
                            validationError(errorMsg);
                            $('#ageFromFilter').val("");
                            $('#ageFromFilter').css("background-color", "#FFF").css('color', 'black');

                        } else {
                            $('#ageFromFilter').css("background-color", "#7c9").css('color', 'white');
                            table.ajax.reload();
                        }


                    } else {
                        $('#ageFromFilter').css("background-color", "#7c9").css('color', 'white');
                        table.ajax.reload();


                    }
                }else {
                    table.ajax.reload();  //just reload table
                    $('#ageFromFilter').css("background-color", "#FFF").css('color', 'black');
                }


            });
            $("#ageToFilter").keyup(function(){
                // table.search("").draw(); //just redraw myTableFilter
               // table.ajax.reload();  //just reload table

                emptySelect();

                if ($('#ageToFilter').val()!="") {

                    if ($('#ageFromFilter').val() != "") {

                        if (Date.parse($('#ageToFilter').val()) < Date.parse($('#ageFromFilter').val())) {

                            var errorMsg = 'Age To should not less than Age From!!';
                            validationError(errorMsg);
                            $('#ageToFilter').val("");
                            $('#ageToFilter').css("background-color", "#FFF").css('color', 'black');

                        } else {
                            $('#ageToFilter').css("background-color", "#7c9").css('color', 'white');
                            table.ajax.reload();

                        }


                    } else {
                        // $("#age").css('background-color', 'green');
                        $('#ageToFilter').css("background-color", "#7c9").css('color', 'white');
                        table.ajax.reload();

                    }
                }else {
                    table.ajax.reload();  //just reload table
                    $('#ageToFilter').css("background-color", "#FFF").css('color', 'black');
                }

            });
            $("#professionalQualificationFilter").keyup(function(){
                // table.search("").draw(); //just redraw myTableFilter
                table.ajax.reload();  //just reload table
                emptySelect();
                if ($('#professionalQualificationFilter').val()!=""){

                    $('#professionalQualificationFilter').css("background-color", "#7c9").css('color', 'white');
                }else {

                    $("#qualificationCompletingFilter").prop("selectedIndex", 0);
                    $('#qualificationCompletingFilter').css("background-color", "#FFF").css('color', 'black');
                    $('#professionalQualificationFilter').css("background-color", "#FFF").css('color', 'black');
                }
            });
            $("#TrainingNameFilter").keyup(function(){
                // table.search("").draw(); //just redraw myTableFilter
                emptySelect();

                table.ajax.reload();  //just reload table
                if ($('#TrainingNameFilter').val()!=""){

                    $('#TrainingNameFilter').css("background-color", "#7c9").css('color', 'white');
                }else {

                    $("#trainingCompletingFilter").prop("selectedIndex", 0);
                    $('#trainingCompletingFilter').css("background-color", "#FFF").css('color', 'black');
                    $('#TrainingNameFilter').css("background-color", "#FFF").css('color', 'black');
                }
            });
            $("#jobExperienceFilter").change(function(){
                // table.search("").draw(); //just redraw myTableFilter
                table.ajax.reload();  //just reload table
                emptySelect();
                if ($('#jobExperienceFilter').val()!=""){

                    $('#jobExperienceFilter').css("background-color", "#7c9").css('color', 'white');
                }else {
                    $('#jobExperienceFilter').css("background-color", "#FFF").css('color', 'black');
                }
            });

            });

        var selecteds = [];
        function selected_rows(x) {

            btn = $(x).data('panel-id');
            var index = selecteds.indexOf(btn);

            if (index == "-1"){
                selecteds.push(btn);
            }else {

                selecteds.splice(index, 1);
            }



        }

        function myfunc() {


            if ($('#jobTitle').val()!=""){


                var products=selecteds;

                if (products.length >0) {

                    $.ajax({
                        type: 'POST',
                        url: "{!! route('jobAppliedCadidate.admin.Exportxls') !!}",
                        cache: false,
                        data: {'jobApply': products,'excelName':$('#excelName').val(),_token:"{{csrf_token()}}",jobTitle:$('#jobTitle').val()},
                        success: function (data) {
                           // console.log(data);

                            $('#SessionMessage').load(document.URL +  ' #SessionMessage');
                            table.ajax.reload();  //just reload table

                            selecteds=[];

                            $(':checkbox:checked').prop('checked',false);

                            //alert(data);

//                            location.reload();

                            if (data.success=='1'){

                                $.alert({
                                    title: 'Success!',
                                    type: 'green',
                                    content: data.message,
                                    buttons: {
                                        tryAgain: {
                                            text: 'Ok',
                                            btnClass: 'btn-blue',
                                            action: function () {

                                                var link = document.createElement("a");
                                                link.download = data.fileName+".xls";
                                                var uri = '{{url("public/exportedExcel")}}'+"/"+data.fileName+".xls";
                                                link.href = uri;
                                                document.body.appendChild(link);
                                                link.click();
                                                document.body.removeChild(link);
                                                delete link;

                                                location.reload();




                                            }
                                        }

                                    }
                                });


                            }else if(data.success=='0'){

                                $.alert({
                                    title: 'Alert!',
                                    type: 'Red',
                                    content: data.message,
                                    buttons: {
                                        tryAgain: {
                                            text: 'Ok',
                                            btnClass: 'btn-red',
                                            action: function () {
                                                location.reload();

                                            }
                                        }

                                    }
                                });


                            }


                        }

                    });
                }
                else {


                    $.alert({
                        title: 'Alert!',
                        type: 'Red',
                        content: 'Please select Application for exporting CV',
                        buttons: {
                            tryAgain: {
                                text: 'Ok',
                                btnClass: 'btn-red',
                                action: function () {


                                }
                            }

                        }
                    });
                }



            }else {

                $.alert({
                    title: 'Alert!',
                    type: 'red',
                    content: 'Please Filter With Job Title First',
                    buttons: {
                        tryAgain: {
                            text: 'Ok',
                            btnClass: 'btn-blue',
                            action: function () {


                            }
                        }

                    }
                });

            }

        }
        function myfunchrreport03() {


            if ($('#jobTitle').val()!=""){


                var products=selecteds;

                if (products.length >0) {

                    $.ajax({
                        type: 'POST',
                        url: "{!! route('jobAppliedCadidate.admin.Exporthrreport03xls') !!}",
                        cache: false,
                        data: {'jobApply': products,'excelName':$('#excelName').val(),_token:"{{csrf_token()}}",jobTitle:$('#jobTitle').val()},
                        success: function (data) {
                           // console.log(data);

                            $('#SessionMessage').load(document.URL +  ' #SessionMessage');
                            table.ajax.reload();  //just reload table

                            selecteds=[];

                            $(':checkbox:checked').prop('checked',false);

                            //alert(data);

//                            location.reload();

                            if (data.success=='1'){

                                $.alert({
                                    title: 'Success!',
                                    type: 'green',
                                    content: data.message,
                                    buttons: {
                                        tryAgain: {
                                            text: 'Ok',
                                            btnClass: 'btn-blue',
                                            action: function () {

                                                var link = document.createElement("a");
                                                link.download = data.fileName+".xls";
                                                var uri = '{{url("public/exportedExcel")}}'+"/"+data.fileName+".xls";
                                                link.href = uri;
                                                document.body.appendChild(link);
                                                link.click();
                                                document.body.removeChild(link);
                                                delete link;

                                                location.reload();




                                            }
                                        }

                                    }
                                });


                            }else if(data.success=='0'){

                                $.alert({
                                    title: 'Alert!',
                                    type: 'Red',
                                    content: data.message,
                                    buttons: {
                                        tryAgain: {
                                            text: 'Ok',
                                            btnClass: 'btn-red',
                                            action: function () {
                                                location.reload();

                                            }
                                        }

                                    }
                                });


                            }


                        }

                    });
                }
                else {


                    $.alert({
                        title: 'Alert!',
                        type: 'Red',
                        content: 'Please select Application for exporting CV',
                        buttons: {
                            tryAgain: {
                                text: 'Ok',
                                btnClass: 'btn-red',
                                action: function () {


                                }
                            }

                        }
                    });
                }



            }else {

                $.alert({
                    title: 'Alert!',
                    type: 'red',
                    content: 'Please Filter With Job Title First',
                    buttons: {
                        tryAgain: {
                            text: 'Ok',
                            btnClass: 'btn-blue',
                            action: function () {


                            }
                        }

                    }
                });

            }

        }
        function myfunchrreport02() {


            if ($('#jobTitle').val()!=""){


                var products=selecteds;

                if (products.length >0) {

                    $.ajax({
                        type: 'POST',
                        url: "{!! route('jobAppliedCadidate.admin.Exporthrreport02xls') !!}",
                        cache: false,
                        data: {'jobApply': products,'excelName':$('#excelName').val(),_token:"{{csrf_token()}}",jobTitle:$('#jobTitle').val()},
                        success: function (data) {
                           // console.log(data);

                            $('#SessionMessage').load(document.URL +  ' #SessionMessage');
                            table.ajax.reload();  //just reload table

                            selecteds=[];

                            $(':checkbox:checked').prop('checked',false);

                            //alert(data);

//                            location.reload();

                            if (data.success=='1'){

                                $.alert({
                                    title: 'Success!',
                                    type: 'green',
                                    content: data.message,
                                    buttons: {
                                        tryAgain: {
                                            text: 'Ok',
                                            btnClass: 'btn-blue',
                                            action: function () {

                                                var link = document.createElement("a");
                                                link.download = data.fileName+".xls";
                                                var uri = '{{url("public/exportedExcel")}}'+"/"+data.fileName+".xls";
                                                link.href = uri;
                                                document.body.appendChild(link);
                                                link.click();
                                                document.body.removeChild(link);
                                                delete link;

                                                location.reload();




                                            }
                                        }

                                    }
                                });


                            }else if(data.success=='0'){

                                $.alert({
                                    title: 'Alert!',
                                    type: 'Red',
                                    content: data.message,
                                    buttons: {
                                        tryAgain: {
                                            text: 'Ok',
                                            btnClass: 'btn-red',
                                            action: function () {
                                                location.reload();

                                            }
                                        }

                                    }
                                });


                            }


                        }

                    });
                }
                else {


                    $.alert({
                        title: 'Alert!',
                        type: 'Red',
                        content: 'Please select Application for exporting CV',
                        buttons: {
                            tryAgain: {
                                text: 'Ok',
                                btnClass: 'btn-red',
                                action: function () {


                                }
                            }

                        }
                    });
                }



            }else {

                $.alert({
                    title: 'Alert!',
                    type: 'red',
                    content: 'Please Filter With Job Title First',
                    buttons: {
                        tryAgain: {
                            text: 'Ok',
                            btnClass: 'btn-blue',
                            action: function () {


                            }
                        }

                    }
                });

            }

        }
        function sendMail() {


            if ($('#jobTitle').val()!=""){


                var products=selecteds;

                if (products.length >0) {
                    $('#mail_info').modal({show: true});
                    $("#totalSelected").val(products.length);
                }
                else {


                    $.alert({
                        title: 'Alert!',
                        type: 'Red',
                        content: 'Please select Application for Sending Mail',
                        buttons: {
                            tryAgain: {
                                text: 'Ok',
                                btnClass: 'btn-red',
                                action: function () {


                                }
                            }

                        }
                    });
                }

            }
            else {

                $.alert({
                    title: 'Alert!',
                    type: 'red',
                    content: 'Please Filter With Job Title First',
                    buttons: {
                        tryAgain: {
                            text: 'Ok',
                            btnClass: 'btn-blue',
                            action: function () {


                            }
                        }

                    }
                });

            }

        }

        function sendMailToJobApplied() {


            if ($('#mailTamplate').val() !=""){

                $("#wait").css("display", "block");

                var products=selecteds;


                    $.ajax({
                        type: 'POST',
                        url: "{!! route('jobAppliedCadidate.admin.sendMail') !!}",
                        cache: false,
                        data: {'jobApply': products,_token:"{{csrf_token()}}",'tamplateId':$('#mailTamplate').val(),'tamplateversion':$('#TamplateVersion').val(),'testDate':$('#testDate').val(),
                            'testAddress':$('#testAddress').val(),'testDetails':$('#tamplateBody').val(),'footerAndSign':CKEDITOR.instances['ckBox'].getData(),
                            'subjectLine':$('#subjectLine').val(),'refNo':$('#refNo').val(),'selected':$('#totalSelected').val(),'start':$('#StartTime').val(),'end':$('#EndTime').val(),'interval':$('#IntervalTime').val()},
                        success: function (data) {

                            $("#wait").css("display", "none");
//
                            $('#SessionMessage').load(document.URL +  ' #SessionMessage');
                            table.ajax.reload();  //just reload table

                            selecteds=[];

                           if(data.status=='error'){
                               $.alert({
                                   title: 'Alert!',
                                   type: 'red',
                                   content: data.msg,
                                   buttons: {
                                       tryAgain: {
                                           text: 'Ok',
                                           btnClass: 'btn-blue',
                                       }
                                   }
                               });
                           }

                            $(':checkbox:checked').prop('checked',false);



                            if (data =='1'){

                                $.alert({
                                    title: 'Alert!',
                                    type: 'green',
                                    content: 'Mail Send successfully',
                                    buttons: {
                                        tryAgain: {
                                            text: 'Ok',
                                            btnClass: 'btn-blue',
                                            action: function(){

                                                location.reload();
                                            }
                                        }
                                    }
                                });


                            }
                            else if(data=='0'){

                                $.alert({
                                    title: 'Alert!',
                                    type: 'Red',
                                    content: 'There is something wrong with the mail',
                                    buttons: {
                                        tryAgain: {
                                            text: 'Ok',
                                            btnClass: 'btn-red',
                                            action: function () {
                                                location.reload();

                                            }
                                        }

                                    }
                                });


                            }


                        }

                    });



            }

            else {

                $.alert({
                    title: 'Alert!',
                    type: 'red',
                    content: 'Please Select a Tamplate First',
                    buttons: {
                        tryAgain: {
                            text: 'Ok',
                            btnClass: 'btn-blue',
                            action: function () {


                            }
                        }

                    }
                });

            }



        }
        function downloadmailDoc() {


            if ($('#mailTamplate').val() !=""){

                $("#wait").css("display", "block");

                var products=selecteds;


                    $.ajax({
                        type: 'POST',
                        url: "{!! route('jobAppliedCadidate.admin.downloadMailDoc') !!}",
                        cache: false,
                        data: {'jobApply': products,_token:"{{csrf_token()}}",'tamplateId':$('#mailTamplate').val(),'testDate':$('#testDate').val(),
                            'testAddress':$('#testAddress').val(),'testDetails':$('#tamplateBody').val(),'footerAndSign':CKEDITOR.instances['ckBox'].getData(),
                            'subjectLine':$('#subjectLine').val(),'refNo':$('#refNo').val()},
                        success: function (data) {

                            $("#wait").css("display", "none");
//
                            $('#SessionMessage').load(document.URL +  ' #SessionMessage');
                            table.ajax.reload();  //just reload table

                            selecteds=[];

                           // console.log(data);

                            $(':checkbox:checked').prop('checked',false);

//                            win = window.open("", "_blank");
//                            win.document.body.innerHTML = data;


                            for (var i=0; i<data.length;i++){


                                var link = document.createElement("a");
                                link.download = data[i]['Name'];
                                var uri = '{{url("public/mailPreview")}}'+"/"+data[i]['Name'];
                                link.href = uri;
                                document.body.appendChild(link);
                                link.click();
                                document.body.removeChild(link);
                                delete link;

                            }

                            $.alert({
                                title: 'Alert!',
                                type: 'green',
                                content: 'Mail Preview is Downloaded successfully',
                                buttons: {
                                    tryAgain: {
                                        text: 'Ok',
                                        btnClass: 'btn-blue',
                                        action: function(){

                                            location.reload();
                                        }
                                    }
                                }
                            });



                          //  location.reload();

                           // console.log(data);


                        }

                    });



            }

            else {

                $.alert({
                    title: 'Alert!',
                    type: 'red',
                    content: 'Please Select a Tamplate First',
                    buttons: {
                        tryAgain: {
                            text: 'Ok',
                            btnClass: 'btn-blue',
                            action: function () {


                            }
                        }

                    }
                });

            }



        }

        // add multiple select / deselect functionality
        $("#selectall2").click(function () {

            if($('#selectall2').is(":checked")) {
                selecteds=[];
                //$('#selectall1').prop('checked',true);
                checkboxes = document.getElementsByName('selected_rows[]');
                for(var i in checkboxes) {
                    checkboxes[i].checked = 'TRUE';
                }

                /* look for all checkboes that have a class 'chk' attached to it and check if it was checked */
                $(".chk:checked").each(function () {
                    selecteds.push($(this).val());
                });


            }
            else {
                selecteds=[];
                $(':checkbox:checked').prop('checked',false);

            }

        });

        function getEmpCv(id) {
            {{--var url = "{{ route('userCv.get', ':empId') }}";--}}
            {{--url = url.replace(':empId', id);--}}
            {{--window.open(url,'_blank');--}}

            $.ajax({
                type:'get',
                url:'{{url('/user/cv')}}'+'/'+id,
                cache: false,
                success:function(data) {
                    table.ajax.reload();
                }
            });
        }

        function empReject(id) {

            $.ajax({
                type:'get',
                url:'{{url('/application-status-change/')}}'+'/'+id,
                cache: false,
                success:function(data) {
                    table.ajax.reload();
                }
            });
        }

        function validationError(errorMsg){

            $.alert({
                title: 'Error',
                type: 'red',
                content: errorMsg,
                buttons: {
                    tryAgain: {
                        text: 'Ok',
                        btnClass: 'btn-green',
                        action: function () {

                        }
                    }
                }
            });



        }
        function emptySelect(){

            selecteds=[];
            $(':checkbox:checked').prop('checked',false);

        }

        $('#educationLvlFilter').on('change', function() {

            {{--$.ajax({--}}
                {{--type:'POST',--}}
                {{--url:'{{route('application.admin.getMajorFromEducationlvl')}}',--}}
                {{--data:{_token:"{{csrf_token()}}",id:this.value},--}}
                {{--cache: false,--}}
                {{--success:function(data) {--}}

                   {{--// console.log(data);--}}
                    {{--document.getElementById("educationMajorFilter").innerHTML = data;--}}
                    {{--$('#educationMajorFilter').css("background-color", "#FFF").css('color', 'black');--}}

                {{--}--}}
            {{--});--}}


            $.ajax({
                type:'POST',
                url:'{{route('application.admin.getDegreeFromEducationlvl')}}',
                data:{_token:"{{csrf_token()}}",id:this.value},
                cache: false,
                success:function(data) {
                     document.getElementById("degreeLvlFilter").innerHTML = data;
                     $('#degreeLvlFilter').css("background-color", "#FFF").css('color', 'black');

                }
            });




        });
        $('#degreeLvlFilter').on('change', function() {

            $.ajax({
                type:'POST',
                url:'{{route('application.admin.getMajorFromEducationlvl')}}',
                data:{_token:"{{csrf_token()}}",id:this.value},
                cache: false,
                success:function(data) {

                   // console.log(data);
                    document.getElementById("educationMajorFilter").innerHTML = data;
                    $('#educationMajorFilter').css("background-color", "#FFF").css('color', 'black');

                }
            });




        });

        $("#educationMajorFilter").on('focus', function (){

                if ($('#educationLvlFilter').val()=="") {

                    var errorMsg = 'Please Select Education Qualification First!!';
                    validationError(errorMsg);
                    return false;

                }

            });

        $("#mailTamplate").on('change', function (){

                if ($('#mailTamplate').val()=="") {

                    var errorMsg = 'Please Select Tamplate First!!';
                    validationError(errorMsg);
                    return false;

                }else{

                    $.ajax({
                        type: 'POST',
                        url: "{!! route('edit.mailTamplate1') !!}",
                        cache: false,
                        data: {_token: "{{csrf_token()}}",'id': $('#mailTamplate').val(),},
                        success: function (data) {

                            if ($('#mailTamplate').val()==1){
                                $('#subjectLineDiv').show();
                                $('#testDateDiv').show();
                                $('#forinterview').show();
                            }else{
                                $('#subjectLineDiv').hide();
                                $('#testDateDiv').hide();
                                $('#forinterview').hide();
                            }


                            $('#testDate').val(data['testDate']);
                            $('#subjectLine').val(data['subject']);
//                            $('#tamplateBody').val(data['testDetails']);
                            $('#testAddress').val(data['testAddress']);
                            $('#refNo').val(data['refNo']);

                            CKEDITOR.instances['ckBox'].setData(data['tamplateFooterAndSign']); // where editor1 is id
                            CKEDITOR.instances['tamplateBody'].setData(data['testDetails']); // where editor1 is id



                        }
                    });

                }

        });


        function isNumberKey(evt)
        {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;

            return true;
        }
        function excelInfomationSubmit()
        {
            if ($('#jobTitle').val()!=""){


                var products=selecteds;

                if (products.length >0) {

                    $('#excel_info').modal({show: true});
                    $("#HRfullreport").show();
                    $("#HRreport02").hide();
                    $("#HRreport03").hide();
                }
                else {


                    $.alert({
                        title: 'Alert!',
                        type: 'Red',
                        content: 'Please select Application for Export',
                        buttons: {
                            tryAgain: {
                                text: 'Ok',
                                btnClass: 'btn-red',
                                action: function () {


                                }
                            }

                        }
                    });
                }

            }
            else {

                $.alert({
                    title: 'Alert!',
                    type: 'red',
                    content: 'Please Filter With Job Title First',
                    buttons: {
                        tryAgain: {
                            text: 'Ok',
                            btnClass: 'btn-blue',
                            action: function () {


                            }
                        }

                    }
                });

            }
        }
        function excelReport03InfomationSubmit()
        {
            if ($('#jobTitle').val()!=""){


                var products=selecteds;

                if (products.length >0) {

                    $('#excel_info').modal({show: true});
                    $("#HRfullreport").hide();
                    $("#HRreport03").show();
                    $("#HRreport02").hide();
                }
                else {


                    $.alert({
                        title: 'Alert!',
                        type: 'Red',
                        content: 'Please select Application for Export',
                        buttons: {
                            tryAgain: {
                                text: 'Ok',
                                btnClass: 'btn-red',
                                action: function () {


                                }
                            }

                        }
                    });
                }

            }
            else {

                $.alert({
                    title: 'Alert!',
                    type: 'red',
                    content: 'Please Filter With Job Title First',
                    buttons: {
                        tryAgain: {
                            text: 'Ok',
                            btnClass: 'btn-blue',
                            action: function () {


                            }
                        }

                    }
                });

            }
        }
        function excelReport02InfomationSubmit()
        {
            if ($('#jobTitle').val()!=""){


                var products=selecteds;

                if (products.length >0) {

                    $('#excel_info').modal({show: true});
                    $("#HRfullreport").hide();
                    $("#HRreport03").hide();
                    $("#HRreport02").show();
                }
                else {


                    $.alert({
                        title: 'Alert!',
                        type: 'Red',
                        content: 'Please select Application for Export',
                        buttons: {
                            tryAgain: {
                                text: 'Ok',
                                btnClass: 'btn-red',
                                action: function () {


                                }
                            }

                        }
                    });
                }

            }
            else {

                $.alert({
                    title: 'Alert!',
                    type: 'red',
                    content: 'Please Filter With Job Title First',
                    buttons: {
                        tryAgain: {
                            text: 'Ok',
                            btnClass: 'btn-blue',
                            action: function () {


                            }
                        }

                    }
                });

            }
        }





    </script>



@endsection