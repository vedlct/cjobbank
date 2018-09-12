@extends('main')
@section('content')


    <div class="row">
        <div class="col-2">

            <div style="background-color: white;margin-bottom: 20px;" class="card-body">

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
                    <label>Age From</label>
                    <input class="form-control" id="ageFromFilter" name="ageFromFilter" type="number">
                </div>
                <div class=" form-group ">
                    <label>Age to</label>
                    <input class="form-control" id="ageToFilter" name="ageToFilter" type="number">
                </div>
                <div class=" form-group ">
                    <label>Apply Date</label>
                    <input class="form-control date" id="applyDate" name="applyDate" type="text">
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
                    <label>Status of completion</label>
                    <select id="educationCompletingFilter" name="educationCompletingFilter" class="form-control">
                        <option value="">Select a Status</option>
                        @foreach(COMPLETING_STATUS as $key=>$value)
                            <option value="{{$value}}">{{$key}}</option>
                        @endforeach

                    </select>
                </div>
                <div class=" form-group ">
                    <label>Major</label>
                    <select id="educationMajorFilter" name="educationMajorFilter" class="form-control">
                        <option value="">Select a Major</option>
                        @foreach($allEducationMajor as $eduMajor)
                            <option value="{{$eduMajor->educationMajorId}}">{{$eduMajor->educationMajorName}}</option>
                        @endforeach

                    </select>
                </div>
                </div>
                <hr>
                <div class="form-group">
                    <label style="text-align: center" class="col-12">Professional Qualification</label>
                    <div class=" form-group ">
                        <label>Qualification</label>
                        <input class="form-control" type="text">
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
                        <input class="form-control" type="text">
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
                        <label>From</label>
                        <input id="jobExperienceFromFilter" name="jobExperienceFromFilter" class="form-control date" type="text">
                    </div>
                    <div class=" form-group ">
                        <label>to</label>
                        <input id="jobExperienceToFilter" name="jobExperienceToFilter" class="form-control date" type="text">
                    </div>

                    <div class=" form-group ">
                        <label>Experinces</label>
                        <input class="form-control" type="text">
                    </div>

                </div>
                <hr>


            </div>
        </div>

        <div class="col-10">
            <div class="card m-b-30">
                <div class="card-header">
                    <h4 class="pull-left">Manage All Application</h4>

                </div>
                <div class="card-body">

                    <table id="manageapplication" class="table table-striped table-bordered" style="width:100%" >
                        <thead>
                        <tr>

                            <th style="width: 4%">Select</th>
                            <th>Name</th>
                            <th>Job Title</th>
                            <th>Zone</th>
                            <th>Apply Date</th>

                            <th>Action</th>


                        </tr>
                        </thead>
                    </table>

                    <br>


                   
                    
                   <label class="checkbox-inline"><input style="width: auto;" type="checkbox" value=""> Select All</label>
                    
                    
        

                    <div style="margin-top: 10px;" class="row">

                        <div class="col-md-1">
                            <a onclick="return myfunc()"><button class="btn btn-danger">Export CV</button></a>
                        </div>
                        <div class="col-md-4">

                            <button class="btn btn-info">Download CV</button>
                        </div>
                    </div>




                </div>

            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->






@endsection
@section('foot-js')
    <script src="{{url('public/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('public/assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <script>
        $(document).ready(function() {

            $('.date').datepicker({
                format: 'yyyy-m-d'
            });



            table = $('#manageapplication').DataTable({
                processing: true,
                serverSide: true,
                stateSave: true,
                "ajax":{
                    "url": "{!! route('application.admin.showAll')!!}",
                    "type": "POST",
                    data:function (d){

                        d._token="{{csrf_token()}}";
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
                        }
                        if ($('#applyDate').val()!=""){
                            d.applyDate=$('#applyDate').val();
                        }
                        if ($('#educationLvlFilter').val()!=""){
                            d.educationLvlFilter=$('#educationLvlFilter').val();
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

                    },
                },
                columns: [

                    { "data": function(data){
                        return '<input  data-panel-id="'+data.applyId+'"onclick="selected_rows(this)" type="checkbox" class="chk" name="selected_rows[]" value="'+ data.applyId +'" />'
                            ;},
                        "orderable": false, "searchable":false
                    },
                    { data: 'name', name: 'name',"orderable": false, "searchable":true },

                    { data: 'title', name: 'title', "orderable": false, "searchable":true },
                    { data: 'zoneName', name: 'zoneName', "orderable": false, "searchable":true },
                    { data: 'applydate', name: 'applydate', "orderable": true, "searchable":true },


                    { "data": function(data){
                        return '<button class="btn btn-sm btn-danger"><i class="fa fa-envelope"></i></button>'+
                            '&nbsp;<button class="btn btn-smbtn-info"><i class="fa fa-file-pdf-o"></i></button>'
                            ;},
                        "orderable": false, "searchable":false
                    },


                ],
            });

            $('#genderFilter').change(function(){ //button filter event click
//                table.search("").draw(); //just redraw myTableFilter
                table.ajax.reload();  //just reload table
            });
            $('#religionFilter').change(function(){ //button filter event click
//                table.search("").draw(); //just redraw myTableFilter
                table.ajax.reload();  //just reload table

            });
            $('#ethnicityFilter').change(function(){ //button filter event click
//                table.search("").draw(); //just redraw myTableFilter
                table.ajax.reload();  //just reload table
            });
            $('#disabilityFilter').change(function(){ //button filter event click
//                table.search("").draw(); //just redraw myTableFilter
                table.ajax.reload();  //just reload table
            });
            $('#nationalityFilter').change(function(){ //button filter event click
//                table.search("").draw(); //just redraw myTableFilter
                table.ajax.reload();  //just reload table
            });
            $('#zonefilter').change(function(){ //button filter event click
//                table.search("").draw(); //just redraw myTableFilter
                table.ajax.reload();  //just reload table
            });
            $('#jobTitle').change(function(){ //button filter event click
//                table.search("").draw(); //just redraw myTableFilter
                table.ajax.reload();  //just reload table
            });
            $('#applyDate').change(function(){ //button filter event click
//                table.search("").draw(); //just redraw myTableFilter
                table.ajax.reload();  //just reload table
            });
            $('#jobExperienceFromFilter').change(function(){ //button filter event click
//                table.search("").draw(); //just redraw myTableFilter
                table.ajax.reload();  //just reload table
            });
            $('#jobExperienceToFilter').change(function(){ //button filter event click
//                table.search("").draw(); //just redraw myTableFilter
                table.ajax.reload();  //just reload table
            });
            $('#educationCompletingFilter').change(function(){ //button filter event click
//                table.search("").draw(); //just redraw myTableFilter
                table.ajax.reload();  //just reload table
            });
            $('#educationMajorFilter').change(function(){ //button filter event click
//                table.search("").draw(); //just redraw myTableFilter
                table.ajax.reload();  //just reload table
            });
            $('#educationLvlFilter').change(function(){ //button filter event click
//                table.search("").draw(); //just redraw myTableFilter
                table.ajax.reload();  //just reload table
            });
            $('#qualificationCompletingFilter').change(function(){ //button filter event click
//                table.search("").draw(); //just redraw myTableFilter
                table.ajax.reload();  //just reload table
            });
            $('#trainingCompletingFilter').change(function(){ //button filter event click
//                table.search("").draw(); //just redraw myTableFilter
                table.ajax.reload();  //just reload table
            });
            $("#ageFromFilter").keyup(function(){
                // table.search("").draw(); //just redraw myTableFilter
                table.ajax.reload();  //just reload table
            });
            $("#ageToFilter").keyup(function(){
                // table.search("").draw(); //just redraw myTableFilter
                table.ajax.reload();  //just reload table
            });

            });

        var selecteds = [];
        function selected_rows(x) {

            btn = $(x).data('panel-id');
            var index = selecteds.indexOf(btn.toString())
            if (index == "-1"){
                selecteds.push(btn);
            }else {

                selecteds.splice(index, 1);
            }


        }

        function myfunc() {


            var products=selecteds;



            if (products.length >0) {

                $.ajax({
                    type: 'POST',
                    url: "{!! route('jobAppliedCadidate.admin.Exportxls') !!}",
                    cache: false,
                    data: {'jobApply': products},
                    success: function (data) {

                        $('#SessionMessage').load(document.URL +  ' #SessionMessage');
                        table.ajax.reload();  //just reload table

                        selecteds=[];

                        $(':checkbox:checked').prop('checked',false);
                        //alert(data);

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
        }

    </script>



@endsection