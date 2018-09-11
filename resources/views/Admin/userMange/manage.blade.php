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
                    <label>Degisnation</label>
                    <select class="form-control">
                        <option>Select a Degisnation</option>
                        <option>Excutive</option>
                        <option>Senior Excutive</option>

                    </select>
                </div>
                <hr>


            </div>
        </div>

        <div class="col-10">
            <div class="card m-b-30">
                <div class="card-header">
                <h4 class="pull-left">Manage User</h4>
                <a href="{{route('admin.manageUser.add')}}"><button class="btn btn-success pull-right">Add New</button></a>
                </div>
                <div class="card-body">


                    <table id="managecv" class="table table-striped table-bordered " style="width:100%" >
                        <thead>
                        <tr>
                            <th width="4%">Select</th>
                            <th>Name</th>
                            <th>Degisnation</th>
                            <th>Gender</th>
                            <th>Email</th>
                            <th>Zone</th>
                            <th width="10%">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            <td><input type="checkbox"></td>
                            <td> Sakib Rahman</td>
                            <td>Executive</td>
                            <td>Male</td>
                            <td>sakib@gmail.com</td>
                            <td>Dhaka</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td> Forhad Uddin</td>
                            <td>Senior Executive</td>
                            <td>Male</td>
                            <td>forhad@gmail.com</td>
                            <td>Brisal</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td> Farzad Rahman</td>
                            <td>Executive</td>
                            <td>Male</td>
                            <td>farzad@gmail.com</td>
                            <td>Dhaka</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td> Mujtaba Rumi</td>
                            <td>Executive</td>
                            <td>Male</td>
                            <td>sakib@gmail.com</td>
                            <td>Dhaka</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td> Sakib Rahman</td>
                            <td>Executive</td>
                            <td>Male</td>
                            <td>sakib@gmail.com</td>
                            <td>Khulna</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td> Forhad Uddin</td>
                            <td>Executive</td>
                            <td>Male</td>
                            <td>forhad@gmail.com</td>
                            <td>Khulna</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td> Farzad Rahman</td>
                            <td>Senior Executive</td>
                            <td>Male</td>
                            <td>farzad@gmail.com</td>
                            <td>Dhaka</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td> Mujtaba Rumi</td>
                            <td>Senior Executive</td>
                            <td>Male</td>
                            <td>sakib@gmail.com</td>
                            <td>Dhaka</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td> Sakib Rahman</td>
                            <td>Senior Executive</td>
                            <td>Male</td>
                            <td>sakib@gmail.com</td>
                            <td>Khulna</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td> Sakib Rahman</td>
                            <td>Executive</td>
                            <td>Male</td>
                            <td>sakib@gmail.com</td>
                            <td>Dhaka</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td> Sakib Rahman</td>
                            <td>Senior Executive</td>
                            <td>Male</td>
                            <td>sakib@gmail.com</td>
                            <td>Khulna</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td> Sakib Rahman</td>
                            <td>Executive</td>
                            <td>Male</td>
                            <td>sakib@gmail.com</td>
                            <td>Dhaka</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td> Sakib Rahman</td>
                            <td>Senior Executive</td>
                            <td>Male</td>
                            <td>sakib@gmail.com</td>
                            <td>Khulna</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td> Sakib Rahman</td>
                            <td>Executive</td>
                            <td>Male</td>
                            <td>sakib@gmail.com</td>
                            <td>Dhaka</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td> Sakib Rahman</td>
                            <td>Senior Executive</td>
                            <td>Male</td>
                            <td>sakib@gmail.com</td>
                            <td>Khulna</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td> Forhad Uddin</td>
                            <td>Senior Executive</td>
                            <td>Male</td>
                            <td>forhad@gmail.com</td>
                            <td>Dhaka</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td> Farzad Rahman</td>
                            <td>Executive</td>
                            <td>Male</td>
                            <td>farzad@gmail.com</td>
                            <td>Khulna</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td> Mujtaba Rumi</td>
                            <td>Senior Executive</td>
                            <td>Male</td>
                            <td>sakib@gmail.com</td>
                            <td>Dhaka</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td> Sakib Rahman</td>
                            <td>Executive</td>
                            <td>Male</td>
                            <td>sakib@gmail.com</td>
                            <td>Khulna</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td> Sakib Rahman</td>
                            <td>Senior Executive</td>
                            <td>Male</td>
                            <td>sakib@gmail.com</td>
                            <td>Dhaka</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td> Forhad Uddin</td>
                            <td>Executive</td>
                            <td>Male</td>
                            <td>forhad@gmail.com</td>
                            <td>Khulna</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td> Farzad Rahman</td>
                            <td>Senior Executive</td>
                            <td>Male</td>
                            <td>farzad@gmail.com</td>
                            <td>Dhaka</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td> Mujtaba Rumi</td>
                            <td>Executive</td>
                            <td>Male</td>
                            <td>sakib@gmail.com</td>
                            <td>Khulna</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>

                        </tbody>

                    </table>
                    <br>
                    <br>

                    <label class="checkbox-inline"> <input type="checkbox" value=""> </label> Select All  <br>
                    <button style="margin-top: 10px;" class="btn btn-danger">Export CV</button>

                </div>

            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
    <!-- end page title end breadcrumb -->







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
            table=$('#managecv').DataTable(
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

    </script>



@endsection