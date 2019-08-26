@include('layouts/header')

<div class="container" >
    <div class="card">
        <div class="card-header">
            <div style="margin-bottom: 20px;" class="row">

                <div class="col-md-1">
                    <h5 >Zone</h5>
                </div>
                <div class="col-md-2">
                    <select name="zonefilter" id="zonefilter" class="form-control">
                        <option value="">Select a Zone</option>
                        @foreach($allZone as $zone)
                            <option  value="{{$zone->zoneId}}">{{$zone->zoneName}}</option>
                        @endforeach

                    </select>

                </div>

                <div class="col-md-2">
                    <h5>Job Search: </h5>
                </div>
                <div class="col-md-7">
                    {{--<form class="navbar-form" role="search">--}}
                    <div class="input-group add-on">
                        <input class="form-control" placeholder="Search" name="srch-term" id="search-job" type="text">
                        <div style="color: black;" class="input-group-btn">
                            <button style="background: #a3a3a4; color: white;" class="btn btn-default" onclick="getAllJob()"><i style="font-size: 18px;" class="ti-arrow-circle-right"></i></button>
                        </div>
                    </div>
                    {{--</form>--}}
                </div>
                <!-- end col -->
            </div>
        </div>
    </div>

    <!-- end row -->

    <div id="allJob">

    </div>
</div>
@section('foot-js')
    <script>


        $(function () {

            getAllJob();

        });

        // $("#search-job").on('keyup', function (e) {
        //     if($("#search-job").val()==""){
        //         getAllJob();
        //     }
        //     if (e.keyCode == 13) {
        //         getAllJob();
        //     }
        //
        //     if (e.keyCode == 32) {
        //         getAllJob();
        //     }
        // });
        //
        // $('#zonefilter').change(function(){ //button filter event click
        //     getAllJob();
        // });

        function getAllJob() {
            var search=$("#search-job").val();
            var zone=$("#zonefilter").val();
            $.ajax({
                type: 'POST',
                url: "{{url('/available-job/all')}}",
                cache: false,
                data: {_token: "{{csrf_token()}}",search:search,zonefilter:zone},
                success: function (data) {
                    $('#allJob').html(data);

                }
            });
        }

        function getData(page){
            var search=$("#search-job").val();

            $.ajax(
                {
                    url: '?page=' + page,
                    type: "get",
                    data: {search:search},
                    datatype: "html",
                    // beforeSend: function()
                    // {
                    //     you can show your loader
                    // }
                })
                .done(function(data)
                {
                    $("#allJob").html(data);
                    location.hash ='?page='+page;

                })
                .fail(function(jqXHR, ajaxOptions, thrownError)
                {
                    alert('No response from server');
                });
        }


    </script>


@endsection

@include('layouts/footer')