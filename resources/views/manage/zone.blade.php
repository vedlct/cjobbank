@extends('main')
@section('content')

    <!-- Modal -->
    <div class="modal fade" id="NewZoneModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <b><h4 class="modal-title dark profile-title" id="myModalLabel">Create Zone</h4></b>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

                </div>

                <div class="modal-body">

                    <form method="post" action="{{route('admin.zone.insert')}}">
                        {{csrf_field()}}
                            <div class="form-group">
                                <label for="">Zone Name</label>
                                <input type="text" class="form-control" id="" placeholder="zone" name="zone">
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
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Zone</h4>
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
                        <h4>Manage Zone</h4>
                    </div>

                    <div align="right">
                        <a onclick="addZone()" href="#"> <button class="btn btn-info">Add New</button></a>
                    </div>
                    <br>

                    <div class="table table-responsive">
                    <table id="manageZone" class="table table-striped table-bordered" style="width:100%" >
                        <thead>
                        <tr>


                            <th>Zone Name</th>
                            <th>Zone status</th>
                            <th width="30%">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($zones as $zone)
                            <tr>
                                <td>{{$zone->zoneName}}</td>
                                <td>
                                    @foreach(STATUS as $key=>$value)
                                        @if($zone->status == $key)
                                            {{$value}}
                                        @endif
                                    @endforeach

                                </td>
                                <td><button class="btn btn-success btn-sm" data-panel-id="{{$zone->zoneId}}" onclick="editZone(this)">Edit</button></td>

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

    <script>
        $(function () {
            $('#manageZone').DataTable(
                {
                    "ordering": false,

                }
            );
        });
    </script>

    <script>
        function editZone(x) {
            var id=$(x).data('panel-id');

            $.ajax({
                type: 'POST',
                url: "{!! route('admin.editZone') !!}",
                cache: false,
                data: {_token: "{{csrf_token()}}",'id': id},
                success: function (data) {
//                    console.log(data);
                    $('#editModalBody').html(data);
                    $('#editModal').modal();
                }
            });


        }
        function addZone() {
            $('#NewZoneModal').modal({show:true});

        }
    </script>


@endsection