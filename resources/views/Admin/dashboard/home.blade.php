@extends('main')
@section('content')


    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">

                    <div class="row">
                        <h2 style=" margin-bottom: 25px; margin-left: 13px; ">Today's Job Apply</h2>
                    </div>

                    <div class="table table-responsive">
                    <table id="todayJobApply" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Position</th>
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
                    </div>
                    <br>

                </div>

            </div>
        </div>
        <!-- end col -->
    </div>
    @if(Auth::user()->fkuserTypeId!==USER_TYPE['ZoneAdmin'])

    <div style="margin-top: 30px;" class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="row">
                        <h2 style=" margin-bottom: 25px; margin-left: 13px; ">Today's Register CV</h2>
                    </div>
                    <div class="table table-responsive">
                    <table id="todayRegisterCV" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Gender</th>
                            <th>Religion</th>
                            <th>Ethnicity</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $no=1;
                        @endphp

                        @foreach($todaysRegisterCv as $todayCv)
                        <tr>

                            <td>{{$no}}</td>
                            <td>{{$todayCv->firstName." ".$todayCv->lastName}}</td>
                            <td>{{$todayCv->email}}</td>
                            <td>{{$todayCv->personalMobile}}</td>
                            <td>
                                @foreach(GENDER as $key=>$value)
                                    @if($todayCv->gender == $value){{$key}} @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach($religion as $reli)
                                    @if($todayCv->fkreligionId == $reli->religionId){{$reli->religionName}} @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach($ethnicity as $ethen)
                                    @if($todayCv->ethnicityId == $ethen->ethnicityId){{$ethen->ethnicityName}} @endif
                                @endforeach
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

@endsection
@section('foot-js')

    <script src="{{url('public/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('public/assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{url('public/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            table1=$('#todayJobApply').DataTable(
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
            table2=$('#todayRegisterCV').DataTable(
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
