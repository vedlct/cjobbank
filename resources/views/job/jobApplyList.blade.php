@extends('main')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h4>Manage Application</h4>
                </div>
                <div class="card-body">



                    <table id="manageapplication" class="table table-striped table-bordered" style="width:100%" >
                        <thead>
                        <tr>

                            <th>Job Title</th>
                            <th>Zone</th>
                            <th>Apply Date</th>

                        </tr>
                        </thead>
                        <tbody>

                        @foreach($jobApplyList as $applyList)
                        <tr>

                            <td>{{$applyList->title}}</td>
                            <td>{{$applyList->zoneName}}</td>
                            <td>{{date('Y-m-d',strtotime($applyList->applydate))}}</td>

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
    <script src="{{url('public/assets/plugins/datatables/dataTables.buttons.min.js')}}"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.2.3/js/dataTables.rowReorder.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
    <script src="{{url('public/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#manageapplication').DataTable(

                {
                    "columnDefs": [
                        {
                            "targets": [0,1], //first column / numbering column
                            "orderable": false, //set not orderable

                        },

                    ]
                }
            );
        } );
    </script>

@endsection