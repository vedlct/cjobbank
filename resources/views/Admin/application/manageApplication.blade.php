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
                    <input class="form-control date" type="text">
                </div>


                <div class=" form-group ">
                    <label>Job Title</label>
                    <input class="form-control" type="text">
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
                    <select class="form-control">
                        <option>Select a Nationality</option>
                        <option>HSC</option>
                        <option>SSC</option>

                    </select>
                </div>
                <div class=" form-group ">
                    <label>Status of completion</label>
                    <select class="form-control">
                        <option>Select a Status</option>
                        <option>Completed</option>
                        <option>OnGoing</option>

                    </select>
                </div>
                <div class=" form-group ">
                    <label>Major</label>
                    <select class="form-control">
                        <option>Select a Major</option>
                        <option>xxvxc</option>
                        <option>sdfsdf</option>

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
                        <select class="form-control">
                            <option>Select a Status</option>
                            <option>Completed</option>
                            <option>OnGoing</option>

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
                        <select class="form-control">
                            <option>Select a Status</option>
                            <option>Completed</option>
                            <option>OnGoing</option>

                        </select>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label style="text-align: center" class="col-12">Job Experiences</label>

                    <div class=" form-group ">
                        <label>From</label>
                        <input class="form-control" type="number">
                    </div>
                    <div class=" form-group ">
                        <label>to</label>
                        <input class="form-control" type="number">
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
                            <th>Age</th>
                            <th>Action</th>


                        </tr>
                        </thead>
                    </table>

                    <br>

                    <label class="checkbox-inline"> <input type="checkbox" > </label> Select All

                    <div style="margin-top: 10px;" class="row">

                        <div class="col-md-1">
                            <button class="btn btn-danger">Export CV</button>
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

                    },
                },
                columns: [

                    { "data": function(data){
                        return '<input input type="checkbox" class="checkboxvar" name="checkboxvar[]" value="'+data.applyId+'">'
                            ;},
                        "orderable": false, "searchable":false
                    },
                    { data: 'name', name: 'name',"orderable": false, "searchable":true },
                    { data: 'title', name: 'title', "orderable": false, "searchable":true },
                    { data: 'zoneName', name: 'zoneName', "orderable": false, "searchable":true },
                    { data: 'applydate', name: 'applydate', "orderable": true, "searchable":true },
                    { data: 'Age', name: 'Age', "orderable": true, "searchable":true },


                    { "data": function(data){
                        return '<button class="btn btn-sm btn-success">Accept</button>'
                            +'&nbsp;<button class="btn btn-sm btn-danger">Reject</button>'+
                            '&nbsp;<button class="btn btn-smbtn-info">Show CV</button>'
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
            $("#ageFromFilter").keyup(function(){
                // table.search("").draw(); //just redraw myTableFilter
                table.ajax.reload();  //just reload table
            });

            });
    </script>



@endsection