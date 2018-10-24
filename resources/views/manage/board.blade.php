@extends('main')
@section('content')

    <!-- Modal -->
    <div class="modal fade" id="NewBoardModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <b><h4 class="modal-title dark profile-title" id="myModalLabel">Create Board</h4></b>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

                </div>

                <div class="modal-body">

                    <form action="{{route('manage.board.insert')}}" method="post">
                        {{csrf_field()}}


                        <div class="form-group">

                            <label for="">Board<span style="color: red">*</span></label>

                            <input class="form-control" maxlength="50" name="board" required type="text">

                        </div>

                        <div class="form-group">

                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>

                    </form>

                </div>



            </div>
        </div>
    </div>



    <div class="modal" id="editModalBoard">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Board</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div  id="editModalBodyBoard">

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
                        <h4>Manage Board</h4>
                    </div>

                    <div align="right">
                        <a onclick="addnewBoard()" href="#"> <button class="btn btn-info">Add New</button></a>
                    </div>
                    <br>

                    <div class="table table-responsive">
                    <table id="boardtable" class="table table-striped table-bordered" style="width:100%" >
                        <thead>
                        <tr>


                            <th>Board</th>
                            <th>Status</th>
                            <th width="30%">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($board as $b)
                            <tr>
                                <td>{{$b->boardName}}</td>
                                <td>
                                    @foreach(STATUS as $key=>$value)
                                        @if($b->status == $key)
                                            {{$value}}
                                        @endif
                                    @endforeach
                                </td>
                                <td width="10%"><button class="btn btn-sm btn-success" data-panel-id="{{$b->boardId}}" onclick="editBoard(this)">Edit</button>
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
            $('#boardtable').DataTable({
                "ordering": false,
            });
        });
        function addnewBoard() {


            $('#NewBoardModal').modal({show:true});

        }
        function editBoard(x) {
            var id=$(x).data('panel-id');

            $.ajax({
                type: 'POST',
                url: "{!! route('admin.editBoard') !!}",
                cache: false,
                data: {_token: "{{csrf_token()}}",'id': id},
                success: function (data) {
//                    console.log(data);
                    $('#editModalBodyBoard').html(data);
                    $('#editModalBoard').modal();
                }
            });


        }
    </script>


@endsection