@extends('main')
@section('content')

    <!-- Modal -->
    <div class="modal fade" id="NewEducationDegreeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <b><h4 class="modal-title dark profile-title" id="myModalLabel">Create Education Degree</h4></b>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

                </div>

                <div class="modal-body">

                    <form action="{{route('manage.educationDegree.insert')}}" method="post">
                        {{csrf_field()}}

                        <div class="form-group">

                            <label for="">Education Level<span style="color: red">*</span></label>
                            <select name="educationLevel" class="form-control" required id="educationLevel">
                                <option value="">Select Education Level</option>
                                    @foreach($educations as $education)
                                    <option value="{{$education->educationLevelId}}">{{$education->educationLevelName}}</option>
                                    @endforeach
                            </select>

                        </div>
                        <div class="form-group">

                            <label for="">Degree<span style="color: red">*</span></label>

                            <input class="form-control" maxlength="255" name="degree" required type="text">

                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                            <select class="form-control" name="status">
                                <option value="">Select Status</option>
                                @foreach(STATUS as $key=>$value)
                                    <option  value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">

                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>

                    </form>

                </div>



            </div>
        </div>
    </div>



    <div class="modal" id="editModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Degree</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div  id="editModalBody">

                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card container">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card-body">
                    <div class="card-header-tabs">
                        <h4>Manage Education Degree</h4>
                    </div>

                    <div align="right">
                        <a onclick="addnewEducation()" href="#"> <button class="btn btn-info">Add New</button></a>
                    </div>
                    <br>

                    <div class="table table-responsive">
                    <table id="managecv" class="table table-striped table-bordered" style="width:100%" >
                        <thead>
                        <tr>


                            <th>Education Level Name</th>
                            <th>Education Degree Name</th>
                            <th>Status</th>
                            <th width="30%">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                       @foreach($degree as $d)
                           <tr>
                               <td>{{$d->educationLevelName}}</td>
                               <td>{{$d->degreeName}}</td>
                               <td>
                                   @foreach(STATUS as $key=>$value)
                                       @if($d->status == $key)
                                           {{$value}}
                                       @endif
                                   @endforeach
                               </td>
                               <td><button class="btn btn-sm btn-success" data-panel-id="{{$d->degreeId}}" onclick="editDegree(this)">Edit</button>
                               </td>

                           </tr>

                       @endforeach


                        </tbody>

                    </table>
                    </div>
                    <br>


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
        $(function () {
           $('#managecv').DataTable({
               "ordering": false,
           });
        });
        function addnewEducation() {


            $('#NewEducationDegreeModal').modal({show:true});

        }
        function editDegree(x) {
            var id=$(x).data('panel-id');

            $.ajax({
                type: 'POST',
                url: "{!! route('admin.editDegree') !!}",
                cache: false,
                data: {_token: "{{csrf_token()}}",'id': id},
                success: function (data) {
//                    console.log(data);
                    $('#editModalBody').html(data);
                    $('#editModal').modal();
                }
            });


        }
    </script>


@endsection