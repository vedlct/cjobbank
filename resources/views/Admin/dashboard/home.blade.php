@extends('main')
@section('content')


    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                {{--<div class="card-header">--}}
                    {{--<h4 class="pull-left">Manage All Job</h4>--}}
                    {{--<a href="{{route('job.admin.create')}}"><button class="btn btn-success pull-right">Post Job</button></a>--}}
                {{--</div>--}}
                <div class="card-body">

                    <div class="row">
                        <h2 style=" margin-bottom: 25px; margin-left: 13px; ">Todays Job Apply</h2>
                    </div>


                    <table id="todayJobApply" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>

                            <th>No</th>
                            <th>Name</th>
                            <th>Degisnation</th>
                            <th>Gender</th>
                            <th>Email</th>
                            <th>Zone</th>
                        </tr>
                        </thead>
                        <tbody>

                        @php
                            $sl=1;
                                @endphp

                        @foreach($todaysJobApply as $TodayJobApply)

                        <tr>
                            <td>{{$sl}}</td>

                            <td>{{$TodayJobApply->firstName." ".$TodayJobApply->lastName}}</td>

                            <td>{{$TodayJobApply->position}}</td>
                            <td>
                                @foreach(GENDER as $key=>$value)
                                    @if($TodayJobApply->gender == $value){{$key}} @endif
                                @endforeach

                            </td>
                            <td>{{$TodayJobApply->email}}</td>
                            <td>
                                @foreach($allZone as $zone)
                                    @if($TodayJobApply->fkzoneId == $zone->zoneId){{$zone->zoneName}} @endif
                                @endforeach

                            </td>
                        </tr>

                        @php
                            $sl++;
                        @endphp


                        @endforeach



                        </tbody>

                    </table>
                    <br>

                </div>

            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
    <!-- end page title end breadcrumb -->

    <div style="margin-top: 30px;" class="row">
        <div class="col-12">
            <div class="card m-b-30">


                <div class="card-body">

                    <div class="row">
                        <h2 style=" margin-bottom: 25px; margin-left: 13px; ">Todays Register CV</h2>
                    </div>

                    <table id="managecv" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>

                            <th>No</th>
                            <th>Name</th>
                            <th>Degisnation</th>
                            <th>Gender</th>
                            <th>Email</th>
                            <th>Zone</th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr>

                            <td> Sakib Rahman</td>
                            <td>Executive</td>
                            <td>Male</td>
                            <td>sakib@gmail.com</td>
                            <td>Dhaka</td>
                        </tr>
                        <tr>

                            <td> Forhad Uddin</td>
                            <td>Senior Executive</td>
                            <td>Male</td>
                            <td>forhad@gmail.com</td>
                            <td>Brisal</td>
                        </tr>
                        <tr>

                            <td> Farzad Rahman</td>
                            <td>Executive</td>
                            <td>Male</td>
                            <td>farzad@gmail.com</td>
                            <td>Dhaka</td>
                        </tr>
                        <tr>

                            <td> Mujtaba Rumi</td>
                            <td>Executive</td>
                            <td>Male</td>
                            <td>sakib@gmail.com</td>
                            <td>Dhaka</td>
                        </tr>
                        <tr>

                            <td> Sakib Rahman</td>
                            <td>Executive</td>
                            <td>Male</td>
                            <td>sakib@gmail.com</td>
                            <td>Khulna</td>
                        </tr>
                        <tr>

                            <td> Forhad Uddin</td>
                            <td>Executive</td>
                            <td>Male</td>
                            <td>forhad@gmail.com</td>
                            <td>Khulna</td>
                        </tr>
                        <tr>

                            <td> Farzad Rahman</td>
                            <td>Senior Executive</td>
                            <td>Male</td>
                            <td>farzad@gmail.com</td>
                            <td>Dhaka</td>
                        </tr>
                        <tr>

                            <td> Mujtaba Rumi</td>
                            <td>Senior Executive</td>
                            <td>Male</td>
                            <td>sakib@gmail.com</td>
                            <td>Dhaka</td>
                        </tr>
                        <tr>

                            <td> Sakib Rahman</td>
                            <td>Senior Executive</td>
                            <td>Male</td>
                            <td>sakib@gmail.com</td>
                            <td>Khulna</td>
                        </tr>
                        <tr>

                            <td> Sakib Rahman</td>
                            <td>Executive</td>
                            <td>Male</td>
                            <td>sakib@gmail.com</td>
                            <td>Dhaka</td>
                        </tr>
                        <tr>

                            <td> Sakib Rahman</td>
                            <td>Senior Executive</td>
                            <td>Male</td>
                            <td>sakib@gmail.com</td>
                            <td>Khulna</td>
                        </tr>
                        <tr>

                            <td> Sakib Rahman</td>
                            <td>Executive</td>
                            <td>Male</td>
                            <td>sakib@gmail.com</td>
                            <td>Dhaka</td>
                        </tr>
                        <tr>

                            <td> Sakib Rahman</td>
                            <td>Senior Executive</td>
                            <td>Male</td>
                            <td>sakib@gmail.com</td>
                            <td>Khulna</td>
                        </tr>
                        <tr>

                            <td> Sakib Rahman</td>
                            <td>Executive</td>
                            <td>Male</td>
                            <td>sakib@gmail.com</td>
                            <td>Dhaka</td>
                        </tr>
                        <tr>

                            <td> Sakib Rahman</td>
                            <td>Senior Executive</td>
                            <td>Male</td>
                            <td>sakib@gmail.com</td>
                            <td>Khulna</td>
                        </tr>


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
    {{--<script src="{{url('public/assets/plugins/datatables/dataTables.buttons.min.js')}}"></script>--}}
    {{--<script src="https://cdn.datatables.net/rowreorder/1.2.3/js/dataTables.rowReorder.min.js"></script>--}}
    {{--<script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>--}}
    <script src="{{url('public/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            table=$('#todayJobApply').DataTable(
                {

                    "columnDefs": [
                        {
                            "targets": [0], //first column / numbering column
                            "orderable": false, //set not orderable

                        },

                    ],
                    "ordering": false,

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