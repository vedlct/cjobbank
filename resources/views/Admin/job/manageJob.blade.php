@extends('main')
@section('content')


    <div class="row">

        <div class="col-md-2">

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
                    <input id="postDateFilter" name="postDateFilter" class="form-control date" onkeypress="return isNumberKey(event)" type="text">
                </div>
                <div class=" form-group">
                    <label>Deadline</label>
                    <input id="deadlineFilter" name="deadlineFilter" class="form-control date" onkeypress="return isNumberKey(event)" type="text">
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

        <div class="col-md-10">
            <div class="card m-b-30">
                <div class="card-header">
                    <h4 class="pull-left">Manage All Job</h4>
                    <a href="{{route('job.admin.create')}}"><button class="btn btn-success pull-right">Post Job</button></a>
                </div>
                <div class="card-body">

                    <div class="table table-responsive">
                    <table id="manageapplication" class="table table-striped table-bordered" style="width:100%" >
                        <thead>
                        <tr>
                            <th width="20%">Job Title</th>
                            <th width="5%">Position</th>
                            <th width="10%">Deadline</th>
                            <th width="10%">Zone</th>
                            <th width="5%">Create by</th>
                            <th width="10%">Create date</th>
                            <th width="10%">update by</th>
                            <th width="10%">Post date</th>
                            <th width="10%">Status</th>
                            <th width="10%">Action</th>

                        </tr>
                        </thead>
                        <tbody>

                        </tbody>

                    </table>
                    </div>



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

        $('.date').datepicker({
            format: 'yyyy-mm-dd',
            todayHighlight: true,
            orientation: 'bottom',

            autoclose: true
        });
        function isNumberKey(evt)
        {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;

            return true;
        }
        $(document).ready(function() {

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
                        if ($('#zonefilter').val()!=""){
                            d.zonefilter=$('#zonefilter').val();
                        }
                        if ($('#postDateFilter').val()!=""){
                            d.postDateFilter=$('#postDateFilter').val();
                        }
                        if ($('#deadlineFilter').val()!=""){
                            d.deadlineFilter=$('#deadlineFilter').val();
                        }
                        if ($('#jobStatusFilter').val()!=""){
                            d.jobStatusFilter=$('#jobStatusFilter').val();
                        }

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
                    { data: 'postDate', name: 'postDate',"orderable": false, "searchable":true },

                    { "data": function(data){
                    if (data.status=='1') {


                        return '<select class="form-control" data-panel-id="' + data.jobId + '" onchange="changeJobStatus(this)" id="jobStatus' + data.jobId + '" name="status">' +
                            '<option value="">Select Status</option>' +
                            '<option selected value="1">Posted</option>' +
                            '<option  value="2">De-activate</option>' +

                            '</select>'
                    }else if(data.status == '2'){

                        return '<select class="form-control" data-panel-id="' + data.jobId + '" onchange="changeJobStatus(this)" id="jobStatus' + data.jobId + '" name="status">' +
                            '<option value="">Select Status</option>' +
                            '<option  value="1">Posted</option>' +
                            '<option selected value="2">De-activate</option>' +

                            '</select>'


                    }
                                ;},
                        "orderable": false, "searchable":false
                    },
                    { "data": function(data){
                        if(data.pdflink !=null) {


                            return '<a data-panel-id="' + data.jobId + '" onclick="jobEdit(this)"  class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>&nbsp;' +
                                '<a data-panel-id="' + data.jobId + '" onclick="deleteJob(this)" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></a>&nbsp;' +
                                '<a data-panel-id="' + data.pdflink + '" onclick="showPdf(this)" target="_blank" class="btn btn-sm btn-info"><i class="fa fa-file-pdf-o"></i></a>&nbsp;'
                        }else {
                            return '<a data-panel-id="' + data.jobId + '" onclick="jobEdit(this)"  class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>&nbsp;' +
                                '<a data-panel-id="' + data.jobId + '" onclick="deleteJob(this)" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></a>&nbsp;'

                        }
                        ;},
                        "orderable": false, "searchable":false
                    },






                ],

            });

        } );

                $('#zonefilter').change(function(){ //button filter event click
                    // table.search("").draw(); //just redraw myTableFilter

                    table.ajax.reload();  //just reload table

                    if ($('#zonefilter').val()!=""){

                        $('#zonefilter').css("background-color", "#7c9").css('color', 'white');
                    }else {
                        $('#zonefilter').css("background-color", "#FFF").css('color', 'black');
                    }

                });
                $('#jobStatusFilter').change(function(){ //button filter event click
        //                table.search("").draw(); //just redraw myTableFilter
                    table.ajax.reload();  //just reload table

                    if ($('#jobStatusFilter').val()!=""){

                        $('#jobStatusFilter').css("background-color", "#7c9").css('color', 'white');
                    }else {
                        $('#jobStatusFilter').css("background-color", "#FFF").css('color', 'black');
                    }

                });
        $("#postDateFilter").change(function(){
            // table.search("").draw(); //just redraw myTableFilter
            table.ajax.reload();  //just reload table
            if ($('#postDateFilter').val()!=""){

                $('#postDateFilter').css("background-color", "#7c9").css('color', 'white');
            }else {
                $('#postDateFilter').css("background-color", "#FFF").css('color', 'black');
            }
        });
        $("#deadlineFilter").change(function(){
            // table.search("").draw(); //just redraw myTableFilter
            table.ajax.reload();  //just reload table
            if ($('#deadlineFilter').val()!=""){

                $('#deadlineFilter').css("background-color", "#7c9").css('color', 'white');
            }else {
                $('#deadlineFilter').css("background-color", "#FFF").css('color', 'black');
            }
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

        function jobEdit(x) {

            var id=$(x).data('panel-id');
            var url = "{{ route('job.admin.edit', ':id') }}";
            url = url.replace(':id', id);
            document.location.href=url;

        }
        function showPdf(x) {

            var id=$(x).data('panel-id');
            window.open("public/jobPdf"+"/"+id,'_blank');


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

    </script>

@endsection