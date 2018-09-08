@extends('main')
@section('content')


    <div class="row">

        <div class="col-2">

            <div style="background-color: white;margin-bottom: 20px;" class="card-body">

                <div class=" form-group">
                    <label>Zone</label>
                    <select class="form-control">
                        <option>Select a Zone</option>
                        <option>Dhaka</option>
                        <option>Khulna</option>
                        <option>Barishal</option>
                        <option>Rangpur</option>

                    </select>
                </div>
                <div class=" form-group">
                    <label>Post Date</label>
                    <input class="form-control" type="date">
                </div>
                <div class=" form-group">
                    <label>Deadline</label>
                    <input class="form-control" type="date">
                </div>
                <div class=" form-group">
                    <label>Job Status</label>
                    <select class="form-control">
                        <option>Select a Status</option>
                        <option>Posted</option>
                        <option>De-activate</option>

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
                        @foreach($allJobList as $jobList)
                            <tr>

                                <td>{{$jobList->jobTitle}}</td>
                                <td>{{$jobList->jobPosition}}</td>
                                <td>{{$jobList->deadline}}</td>
                                <td>{{$jobList->zoneName}}</td>
                                <td>{{$jobList->createBy}}</td>
                                <td>{{date('Y-m-d',strtotime($jobList->createDate))}}</td>
                                <td>{{$jobList->updateBy}}</td>
                                <td>{{date('Y-m-d',strtotime($jobList->updateTime))}}</td>
                                <td>
                                    <select class="form-control" data-panel-id="{{$jobList->jobId}}" onchange="changeJobStatus(this)" id="jobStatus{{$jobList->jobId}}" name="status">
                                        <option value="">Select Status</option>
                                        <option @if($jobList->status =='1') selected @endif value="1">Posted</option>
                                        <option @if($jobList->status =='2') selected @endif value="2">De-activate</option>

                                    </select>

                                </td>

                                <td><a href="{{route('job.admin.edit',$jobList->jobId)}}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>&nbsp;
                                    <a data-panel-id="{{$jobList->jobId}}" onclick="deleteJob(this)" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></a>&nbsp;
                                    @if(!empty($jobList->pdflink))
                                    <a target="_blank" href="{{$jobList->pdflink}}" class="btn btn-sm btn-info"><i class="fa fa-file-pdf-o"></i></a>&nbsp;
                                    @endif
                                </td>




                            </tr>
                        @endforeach


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
            table=$('#manageapplication').DataTable(
                {

                    "columnDefs": [
                        {
                            "targets": [0,1,3,4,6,8,9], //first column / numbering column
                            "orderable": false, //set not orderable

                        },

                    ],

                }
            );
        } );

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