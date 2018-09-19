@extends('main')
@section('content')


    <div class="row">

        <div class="col-2">

            <div style="background-color: white;margin-bottom: 20px;" class="card-body">

                {{--<div class=" form-group">--}}
                    {{--<label>Zone</label>--}}
                    {{--<select name="zonefilter" id="zonefilter" class="form-control">--}}
                        {{--<option value="">Select a Zone</option>--}}
                        {{--@foreach($allZone as $zone)--}}
                            {{--<option  value="{{$zone->zoneId}}">{{$zone->zoneName}}</option>--}}
                        {{--@endforeach--}}

                    {{--</select>--}}
                {{--</div>--}}

                <div class=" form-group ">
                    <label>Age From</label>
                    <input class="form-control" id="ageFromFilter" name="ageFromFilter" type="number">
                </div>
                <div class=" form-group ">
                    <label>Age to</label>
                    <input class="form-control" id="ageToFilter" name="ageToFilter" type="number">
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
                {{--<div class=" form-group">--}}
                    {{--<label>Apply Date</label>--}}
                    {{--<input class="form-control date" type="text">--}}
                {{--</div>--}}
                <div class=" form-group">
                    <label>Religion</label>
                    <select name="religionFilter" id="religionFilter" class="form-control">
                        <option value="">Select a Religion</option>
                        @foreach($religion as $reli)
                            <option value="{{$reli->religionId}}">{{$reli->religionName}}</option>
                        @endforeach

                    </select>
                </div>
                <div class=" form-group">
                    <label>Ethnicity</label>
                    <select name="ethnicityFilter" id="ethnicityFilter" class="form-control">
                        <option value="">Select a Ethnicity</option>
                        @foreach($ethnicity as $ethi)
                            <option value="{{$ethi->ethnicityId}}">{{$ethi->ethnicityName}}</option>
                        @endforeach

                    </select>
                </div>
                <hr>


            </div>
        </div>

        <div class="col-10">
            <div class="card m-b-30">
                <div class="card-header">
                    <h4 class="pull-left">Manage CV</h4>
                    {{--<a href="#"><button class="btn btn-success pull-right">Add New</button></a>--}}
                </div>
                <div class="card-body">

                    <label class="checkbox-inline"><input style="width: auto;" type="checkbox" value=""> Select All</label>&nbsp;
                    <button  class="btn btn-danger btn-sm">Export CV</button>
                    <br><br>


                    <table id="managecv" class="table table-striped table-bordered" style="width:100%" >
                        <thead>
                        <tr>
                            <th width="4%">Select</th>
                            <th>Image</th>

                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Email</th>

                            <th width="10%">Action</th>
                        </tr>
                        </thead>


                    </table>






                </div>

            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->





@endsection
@section('foot-js')

    <script src="{{url('public/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('public/assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <!-- Buttons examples -->
    {{--<script src="{{url('public/assets/plugins/datatables/dataTables.buttons.min.js')}}"></script>--}}
    {{--<script src="https://cdn.datatables.net/rowreorder/1.2.3/js/dataTables.rowReorder.min.js"></script>--}}
    {{--<script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>--}}
    <script src="{{url('public/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <script type="text/javascript">
        var gend=[];

        $('.date').datepicker({
            format: 'yyyy-m-d'
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {

            @foreach(GENDER as $key=>$value)
            gend.push('{{$value}}');

            @endforeach


            table = $('#managecv').DataTable({
                processing: true,
                serverSide: true,
                stateSave: true,
                "ordering": false,
                "ajax":{
                    "url": "{!! route('cv.admin.manageApplicationData')!!}",
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
                        if ($('#ageFromFilter').val()!=""){
                            d.ageFromFilter=$('#ageFromFilter').val();
                        }
                        if ($('#ageToFilter').val()!=""){
                            d.ageToFilter=$('#ageToFilter').val();
                        }
//                        if ($('#zonefilter').val()!=""){
//                            d.zonefilter=$('#zonefilter').val();
//                        }


                    },
                },
                columns: [

                    { "data": function(data){
                        return '<input  data-panel-id="'+data.employeeId+'"onclick="selected_rows(this)" type="checkbox" class="chk" name="selected_rows[]" value="'+ data.employeeId +'" />'
                            ;},
                        "orderable": false, "searchable":false
                    },
                    {
                        "name": "image",
                        "data": "image",
                        "render": function (data, type, full, meta) {
                            return "<img src=\"{{url('public/candidateImages/thumb')}}"+"/"+ data + "\" height=\"50\"/>";
                        },
                        "title": "Image",
                        "orderable": false,
                        "searchable": false,
                    },

//                    { data: 'name', name: 'name',"orderable": false, "searchable":true },

                    { data: 'firstName', name: 'firstName',"orderable": false, "searchable":true },
                    { data: 'lastName', name: 'lastName',"orderable": false, "searchable":true },

                    { "data": function(data){
                        return data.age1+"."+data.age2 ;},
                        "orderable": true, "searchable":true,
                    },


//                    { data: 'age1', name: 'age', "orderable": false, "searchable":true },
//                    { data: 'gender', name: 'gender', "orderable": false, "searchable":true },

                    { "data": function(data){

                        var words = '<?php echo json_encode(GENDER) ?>';// don't use quotes

                        if( data.gender == "M"){
                            return "Male"
                        }else if (data.gender == "F") {
                            return "Female"
                        }
                       // $.each(words, function(key, value) {
                       //
                       //     if (value==data.gender){
                       //         return key;
                       //     }
                       //
                       // });

//                        for (var k in words){
//                            if (words.hasOwnProperty(k)) {
//
//                                if (words[k] == data.gender){
//                                return words[k];
//                            }
//                            }
//                        }
//
//                        Object.keys(obj).forEach(function (key) {
//                            // do something with obj[key]
//                        });

                       // for(key in words){
                       //     if (words[key]==data.gender){
                       //         return key;
                       //     }
                       // }
                       //      for (var x in words){
                       //          return ( words[x]);
                       //
                       //
                       //      }
                       // return words;



                        },
                        "orderable": true, "searchable":true,
                    },

                    { data: 'email', name: 'email', "orderable": false, "searchable":true },

                    { "data": function(data){
                        return '&nbsp;<button class="btn btn-smbtn-info"><i class="fa fa-file-pdf-o"></i></button>'
                            ;},
                        "orderable": false, "searchable":false
                    },





                ],

            });

        } );

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

        $("#ageFromFilter").keyup(function(){
            // table.search("").draw(); //just redraw myTableFilter
            table.ajax.reload();  //just reload table
        });
        $("#ageToFilter").keyup(function(){
            // table.search("").draw(); //just redraw myTableFilter
            table.ajax.reload();  //just reload table
        });

//        $('#zonefilter').change(function(){ //button filter event click
////                table.search("").draw(); //just redraw myTableFilter
//            table.ajax.reload();  //just reload table
//        });

    </script>

@endsection