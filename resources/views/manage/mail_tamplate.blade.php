@extends('main')
@section('content')

    <style>
        .modal-lg {
            max-width: 80%;
        }
    </style>

    <!-- Modal -->
    <div class="modal fade" id="NewMailTamplateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <b><h4 class="modal-title dark profile-title" id="myModalLabel">Create Mail Tamplate</h4></b>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

                </div>

                <div class="modal-body">

                    <form method="post" action="{{route('mailTamplate.store')}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" class="form-control" id="" placeholder="templete name" name="tamplateName">
                        </div>
                        <div class="form-group">
                            <label for="">Subject line</label>
                            <input type="text" class="form-control" id="" placeholder="subject line" name="subjectLine">
                        </div>

                        <div class="form-group">
                            <label for="">Body</label>
                            <textarea class="form-control ckeditor" name="tamplateBody" rows="6" ></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                            <select class="form-control" name="status">
                                <option value="">Select Status</option>
                                @foreach(STATUS as $key=>$value)
                                    <option value="{{$key}}">{{$value}}</option>
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Language</h4>
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
                        <h4>Manage Mail Tamplate</h4>
                    </div>

                    <div align="right">
                        {{--<a onclick="addMailTamplate()" href="#"> <button class="btn btn-info">Add New</button></a>--}}
                    </div>
                    <br>

                    <div class="table table-responsive">
                        <table id="managelanguage" class="table table-striped table-bordered" style="width:100%" >
                            <thead>
                            <tr>
                                <th>templete Name</th>
                                <th>templete status</th>
                                <th width="30%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($mailTemplete as $mail)
                                <tr>
                                    <td>{{$mail->tamplateName}}</td>
                                    <td>
                                        @if($mail->status=='1')
                                            Active
                                            @else
                                        InActive
                                            @endif
                                    </td>
                                    <td><button class="btn btn-success btn-sm" data-panel-id="{{$mail->tamplateId}}" onclick="editlanguage(this)">Edit</button></td>

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
    <script type="text/javascript" src="{{url('public/assets/ckeditor/ckeditor.js')}}"></script>




    <script>
        $(function () {
            $('#managelanguage').DataTable(
                {
                    "ordering": false,

                }
            );
        });
    </script>

    <script>
        function editlanguage(x) {
            var id=$(x).data('panel-id');

            $.ajax({
                type: 'POST',
                url: "{!! route('edit.mailTamplate') !!}",
                cache: false,
                data: {_token: "{{csrf_token()}}",'id': id},
                success: function (data) {
                   // console.log(data);
                    $('#editModalBody').html(data);
                    $('#editModal').modal();


                }
            });


        }
        function addMailTamplate() {
            $('#NewMailTamplateModal').modal({show:true});

        }
    </script>


@endsection