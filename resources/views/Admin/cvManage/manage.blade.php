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
                <div class=" form-group">
                    <label>Apply Date</label>
                    <input class="form-control" type="date">
                </div>
                <div class=" form-group">
                    <label>Religion</label>
                    <select class="form-control">
                        <option>Select a Religion</option>
                        <option>Islam</option>
                        <option>Hindu</option>
                        <option>Christian</option>

                    </select>
                </div>
                <div class=" form-group">
                    <label>Ethnicity</label>
                    <select class="form-control">
                        <option>Select a Ethnicity</option>
                        <option>Bangali</option>
                        <option>Adivashi</option>

                    </select>
                </div>
                <hr>


            </div>
        </div>

        <div class="col-10">
            <div class="card m-b-30">
                <div class="card-header">
                    <h4 class="pull-left">Manage CV</h4>
                    <a href="#"><button class="btn btn-success pull-right">Add New</button></a>
                </div>
                <div class="card-body">


                    <table id="managecv" class="table table-striped table-bordered" style="width:100%" >
                        <thead>
                        <tr>
                            <th width="4%">Select</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Email</th>

                            <th width="10%">Action</th>
                        </tr>
                        </thead>


                    </table>
                    <br>

                    <br>

                    <label class="checkbox-inline"> <input type="checkbox" value="true"> </label> Select All  <br>
                    <button style="margin-top: 10px;" class="btn btn-danger">Export CV</button>



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

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {


            table = $('#managecv').DataTable({
                processing: true,
                serverSide: true,
                stateSave: true,
                "ajax":{
                    "url": "{!! route('cv.admin.manageApplicationData')!!}",
                    "type": "POST",
                    data:function (d){

                        d._token="{{csrf_token()}}";


                    },
                },
                columns: [

                    { "data": function(data){
                        return '<input  data-panel-id="'+data.employeeId+'"onclick="selected_rows(this)" type="checkbox" class="chk" name="selected_rows[]" value="'+ data.employeeId +'" />'
                            ;},
                        "orderable": false, "searchable":false
                    },
                    { data: 'name', name: 'name',"orderable": false, "searchable":true },
                    { data: 'name', name: 'name',"orderable": false, "searchable":true },
                    { data: 'Age', name: 'Age', "orderable": false, "searchable":true },
                    { data: 'gender', name: 'gender', "orderable": false, "searchable":true },
                    { data: 'email', name: 'email', "orderable": true, "searchable":true },


                    { "data": function(data){
                        return '<button class="btn btn-sm btn-danger"><i class="fa fa-envelope"></i></button>'+
                            '&nbsp;<button class="btn btn-smbtn-info"><i class="fa fa-file-pdf-o"></i></button>'
                            ;},
                        "orderable": false, "searchable":false
                    },


                ],
            });

        } );
    </script>

@endsection