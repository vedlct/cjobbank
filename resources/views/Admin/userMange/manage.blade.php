@extends('main')
@section('content')


    <div class="row">

        <div class="col-2">

            <div style="background-color: white;margin-bottom: 20px;" class="card-body">

                <div class=" form-group">
                    <label>Zone</label>
                    <select class="form-control" id="zoneId" onchange="refreshTable()">
                        <option value="">Select a Zone</option>
                        @foreach($zones as $zone)
                            <option value="{{$zone->zoneId}}">{{$zone->zoneName}}</option>
                        @endforeach
                    </select>
                </div>

                <div class=" form-group">
                    <label>Degisnation</label>
                    <select class="form-control" id="designationId" onchange="refreshTable()">
                        <option value="">Select a Degisnation</option>
                        @foreach($designations as $designation)
                            <option value="{{$designation->designationId}}">{{$designation->designationName}}</option>
                        @endforeach

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
                            <th>Status</th>
                            <th width="10%">Action</th>
                        </tr>
                        </thead>
                        <tbody>


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
//            table=$('#managecv').DataTable(
//                {
//
//                    "columnDefs": [
//                        {
//                            "targets": [0,1,3,4,6,8,9], //first column / numbering column
//                            "orderable": false, //set not orderable
//
//                        },
//
//                    ],
//
//                }
//            );
            table = $('#managecv').DataTable({
                processing: true,
                serverSide: true,
                stateSave: true,
                "ordering": false,
                "ajax":{
                    "url": "{!! route('admin.getmanageUserData')!!}",
                    "type": "POST",
                    data:function (d){
                        d._token="{{csrf_token()}}";
                        d.zoneId=$('#zoneId').val();
                        d.designationId=$('#designationId').val();

                    },
                },
                columns: [


                    { "data": function(data){
                        return "<input type='checkbox'>";
                        },
                        "orderable": false, "searchable":false
                    },

                    { data: 'firstName', name: 'firstName', "orderable": false, "searchable":true },
                    { data: 'designationName', name: 'designationName', "orderable": false, "searchable":true },

                    { data: 'gender', name: 'gender', "orderable": false, "searchable":true },
                    { data: 'email', name: 'email', "orderable": false, "searchable":true },
                    { data: 'zoneName', name: 'zoneName', "orderable": false, "searchable":true },
                    { "data": function(data){
                        if(data.status==1){
                            return "<select class='form-control' data-panel-id='"+data.hrId+"' onchange='deleteUser(this)'>" +
                                "<option value='1' selected>active</option>" +
                                "<option value='0'>deactive</option>" +
                                "</select>";
                        }
                        else if(data.status==0){
                            return "<select class='form-control' data-panel-id='"+data.hrId+"' onchange='deleteUser(this)'>" +
                                "<option value='1' >active</option>" +
                                "<option value='0' selected>deactive</option>" +
                                "</select>";
                        }

                       },
                        "orderable": false, "searchable":false
                    },

                    { "data": function(data){
//                        status
                        var btn="<button class='btn btn-success btn-sm' data-panel-id='"+data.hrId+"' onclick='editUser(this)'>Edit</button>";

                        return btn;
                        },
                        "orderable": false, "searchable":false
                    },

                ],

            });

        } );

        function refreshTable() {
            table.ajax.reload();
        }
        function editUser(x) {
            var id=$(x).data('panel-id');
            var url = "{{ route('admin.editmanageUserData', ':id') }}";
            url = url.replace(':id', id);
            document.location.href=url;
        }
        function deleteUser(x) {
            var id=$(x).data('panel-id');

            $.ajax({
            type: 'POST',
            url: "{!! route('admin.changeUserStatus') !!}",
            cache: false,
            data: {_token: "{{csrf_token()}}",'id': id},
            success: function (data) {
//                console.log(data);
                refreshTable();
            }
            });
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    </script>



@endsection