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

                <div class=" form-group ">
                    <label>Age to</label>
                    <input class="form-control" type="number">
                </div>
                <div class=" form-group ">
                    <label>Age From</label>
                    <input class="form-control" type="number">
                </div>
                <div class=" form-group ">
                    <label>Gender</label>
                    <select class="form-control">
                        <option>Select a Gender</option>
                        <option>Male</option>
                        <option>Female</option>

                    </select>
                </div>
                <div class=" form-group ">
                    <label>Apply Date</label>
                    <input class="form-control date" type="text">
                </div>
                <div class=" form-group ">
                    <label>Religion</label>
                    <select class="form-control">
                        <option>Select a Religion</option>
                        <option>Islam</option>
                        <option>Hindu</option>
                        <option>Christian</option>

                    </select>
                </div>

                <div class=" form-group ">
                    <label>Job Title</label>
                    <input class="form-control" type="text">
                </div>


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


                    { "data": function(data){
                        return '<button class="btn btn-sm btn-success">Accept</button>'
                            +'&nbsp;<button class="btn btn-sm btn-danger">Reject</button>'
                            ;},
                        "orderable": false, "searchable":false
                    },


                ],
            });

            });
    </script>



@endsection