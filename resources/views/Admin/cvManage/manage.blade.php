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
                            <th>Name</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Email</th>
                            <th>Apply Date</th>
                            <th width="10%">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            <td><input type="checkbox"></td>
                            <td> Sakib Rahman</td>
                            <td>30</td>
                            <td>Male</td>
                            <td>sakib@gmail.com</td>
                            <td>2018/04/10</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td> Forhad Uddin</td>
                            <td>40</td>
                            <td>Male</td>
                            <td>forhad@gmail.com</td>
                            <td>2018/06/12</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td> Farzad Rahman</td>
                            <td>25</td>
                            <td>Male</td>
                            <td>farzad@gmail.com</td>
                            <td>2018/05/12</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td> Mujtaba Rumi</td>
                            <td>24</td>
                            <td>Male</td>
                            <td>sakib@gmail.com</td>
                            <td>2018/02/15</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td> Sakib Rahman</td>
                            <td>30</td>
                            <td>Male</td>
                            <td>sakib@gmail.com</td>
                            <td>2018/04/10</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td> Forhad Uddin</td>
                            <td>40</td>
                            <td>Male</td>
                            <td>forhad@gmail.com</td>
                            <td>2018/06/12</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td> Farzad Rahman</td>
                            <td>25</td>
                            <td>Male</td>
                            <td>farzad@gmail.com</td>
                            <td>2018/05/12</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td> Mujtaba Rumi</td>
                            <td>24</td>
                            <td>Male</td>
                            <td>sakib@gmail.com</td>
                            <td>2018/02/15</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td> Sakib Rahman</td>
                            <td>30</td>
                            <td>Male</td>
                            <td>sakib@gmail.com</td>
                            <td>2011/04/25</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td> Sakib Rahman</td>
                            <td>30</td>
                            <td>Male</td>
                            <td>sakib@gmail.com</td>
                            <td>2018/04/25</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td> Sakib Rahman</td>
                            <td>30</td>
                            <td>Male</td>
                            <td>sakib@gmail.com</td>
                            <td>2011/04/25</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td> Sakib Rahman</td>
                            <td>30</td>
                            <td>Male</td>
                            <td>sakib@gmail.com</td>
                            <td>2011/04/25</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td> Sakib Rahman</td>
                            <td>30</td>
                            <td>Male</td>
                            <td>sakib@gmail.com</td>
                            <td>2011/04/25</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td> Sakib Rahman</td>
                            <td>30</td>
                            <td>Male</td>
                            <td>sakib@gmail.com</td>
                            <td>2011/04/25</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td> Sakib Rahman</td>
                            <td>30</td>
                            <td>Male</td>
                            <td>sakib@gmail.com</td>
                            <td>2018/04/10</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td> Forhad Uddin</td>
                            <td>40</td>
                            <td>Male</td>
                            <td>forhad@gmail.com</td>
                            <td>2018/06/12</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td> Farzad Rahman</td>
                            <td>25</td>
                            <td>Male</td>
                            <td>farzad@gmail.com</td>
                            <td>2018/05/12</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td> Mujtaba Rumi</td>
                            <td>24</td>
                            <td>Male</td>
                            <td>sakib@gmail.com</td>
                            <td>2018/02/15</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td> Sakib Rahman</td>
                            <td>30</td>
                            <td>Male</td>
                            <td>sakib@gmail.com</td>
                            <td>2011/04/25</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td> Sakib Rahman</td>
                            <td>30</td>
                            <td>Male</td>
                            <td>sakib@gmail.com</td>
                            <td>2018/04/10</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td> Forhad Uddin</td>
                            <td>40</td>
                            <td>Male</td>
                            <td>forhad@gmail.com</td>
                            <td>2018/06/12</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td> Farzad Rahman</td>
                            <td>25</td>
                            <td>Male</td>
                            <td>farzad@gmail.com</td>
                            <td>2018/05/12</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td> Mujtaba Rumi</td>
                            <td>24</td>
                            <td>Male</td>
                            <td>sakib@gmail.com</td>
                            <td>2018/02/15</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>

                        </tbody>

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