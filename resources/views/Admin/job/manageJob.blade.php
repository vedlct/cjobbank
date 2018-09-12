@extends('main')
@section('content')


    <div class="row">

        <div class="col-2">

            <div style="background-color: white;margin-bottom: 20px;" class="card-body">

                <div class=" form-group">
                    <label>Zone</label>
                    <select name="zonefilter" id="zonefilter" class="form-control">
                        <option value="">Select a Zone</option>
                        @foreach($allZone as $zone)
                            <option  value="{{$zone->zoneId}}">{{$zone->zoneName}}</option>
                        @endforeach

                    </select>
                </div>
                <div class=" form-group">
                    <label>Post Date</label>
                    <input id="postDateFilter" name="postDateFilter" class="form-control date" type="text">
                </div>
                <div class=" form-group">
                    <label>Deadline</label>
                    <input id="deadlineFilter" name="deadlineFilter" class="form-control date" type="text">
                </div>
                <div class=" form-group">
                    <label>Job Status</label>
                    <select name="jobStatusFilter" id="jobStatusFilter" class="form-control">
                        <option selected value="">Select a Status</option>
                        @foreach(JOB_STATUS as $key=>$value)
                            <option value="{{$value}}">{{$key}}</option>
                        @endforeach


                    </select>
                </div>
                <hr>


            </div>
        </div>

        <div class="col-10">
            <div class="card m-b-30">
                <div class="card-header">
                    <h4 class="pull-left">Manage All Job</h4>
                    <a href="{{route('job.admin.create')}}"><button class="btn btn-success pull-right">Post Job</button></a>
                </div>
                <div class="card-body">


                    <table id="manageapplication" class="table table-striped table-bordered" style="width:100%" >
                        <thead>
                        <tr>
                            <th>Job Title</th>
                            <th>Position</th>
                            <th>Deadline</th>
                            <th>Zone</th>
                            <th>Create by</th>
                            <th>Create date</th>
                            <th>update by</th>
                            <th>update date</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>

                        </tbody>

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
    <script>
        $(document).ready(function() {
//            table=$('#manageapplication').DataTable(
//                {
//
//                    "columnDefs": [
//                        {
//                            "targets": [0,1,3,4,6,8,9], //first column / numbering column
//                            "orderable": false, //set not orderable
//
//                        },
//
//                    ],
//
//                }
//            );

            table = $('#manageapplication').DataTable({
                processing: true,
                serverSide: true,
                stateSave: true,
                "ordering": false,
                "ajax":{
                    "url": "{!! route('job.admin.getManageJobData')!!}",
                    "type": "POST",
                    data:function (d){

                        d._token="{{csrf_token()}}";

                    },
                },
                columns: [


                    { data: 'jobTitle', name: 'jobTitle',"orderable": false, "searchable":true },


                    { data: 'jobPosition', name: 'jobPosition', "orderable": false, "searchable":true },
                    { data: 'deadline', name: 'deadline', "orderable": false, "searchable":true },
                    { data: 'zoneName', name: 'zoneName', "orderable": false, "searchable":true },

                    { data: 'createBy', name: 'createBy', "orderable": false, "searchable":true },
                    { data: 'createDate', name: 'createDate', "orderable": false, "searchable":true },
                    { data: 'updateBy', name: 'updateBy', "orderable": false, "searchable":true },
                    { data: 'updateTime', name: 'updateTime', "orderable": false, "searchable":true },

                    { "data": function(data){
                            return "<select class='form-control'>" +
                                    "<option>select 1</option>"+
                                "</select>";
                                                ;},
                        "orderable": false, "searchable":false
                    },
                    { "data": function(data){
                        return "<button>Action</button>";
                        ;},
                        "orderable": false, "searchable":false
                    },






                ],

            });

        } );

                $('#zonefilter').change(function(){ //button filter event click
        //                table.search("").draw(); //just redraw myTableFilter
                    table.draw();  //just reload table
                });


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function changeJobStatus(x) {

            btn = $(x).data('panel-id');
            var job = document.getElementById('jobStatus'+btn).value;

            $.confirm({
                title: 'Confirm!',
                content: 'Are you sure To change this Job Status?',
                icon: 'fa fa-warning',
                type: 'red',
                typeAnimated: true,
                buttons: {
                    tryAgain: {
                        text: 'Yes',
                        btnClass: 'btn-red',
                        action: function(){

                            $.ajax({
                                type: "POST",
                                url: '{{route('job.admin.changeJobStatus')}}',
                                data: {'id':btn,'status':job,'_token':"{{csrf_token()}}"},
                                success: function (data) {

                                    $.alert({
                                        title: 'Success!',
                                        type: 'green',
                                        content: 'job Status change successfully',
                                        buttons: {
                                            tryAgain: {
                                                text: 'Ok',
                                                btnClass: 'btn-green',
                                                action: function () {

                                                    location.reload();

                                                }
                                            }
                                        }
                                    });

                                },
                            });
                        }
                    },
                    No: function () {

                        location.reload();

                    },
                }
            });

        }

        function deleteJob(x) {

            $.confirm({
                title: 'Confirm!',
                content: 'Are you sure To Delete this Job?',
                icon: 'fa fa-warning',
                type: 'red',
                typeAnimated: true,
                buttons: {
                    tryAgain: {
                        text: 'Yes',
                        btnClass: 'btn-red',
                        action: function(){

                            btn = $(x).data('panel-id');

                            $.ajax({
                                type: "POST",
                                url: '{{route('job.admin.delete')}}',
                                data: {'id':btn,'_token':"{{csrf_token()}}"},
                                success: function (data) {

                                    $.alert({
                                        title: 'Success!',
                                        type: 'green',
                                        content: 'job Deleted successfully',
                                        buttons: {
                                            tryAgain: {
                                                text: 'Ok',
                                                btnClass: 'btn-green',
                                                action: function () {

                                                    location.reload();

                                                }
                                            }
                                        }
                                    });

                                },
                            });
                        }
                    },
                    No: function () {

                        location.reload();


                    },
                }
            });


        }
    </script>

@endsection