@extends('main')
@section('content')


<div class="container">
    <div style="margin-bottom: 20px;" class="row">
        <div class="col-lg-2">
            <h5>Job Search: </h5>
        </div>


        <div class="col-lg-10">
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
    <!-- end row -->

     <div id="allJob">

     </div>
</div>





@endsection
@section('foot-js')
<script>


 $(function () {

     getAllJob();

    });

 $("#search-job").on('keyup', function (e) {
     if($("#search-job").val()==""){
         getAllJob();
     }
     if (e.keyCode == 13) {
         getAllJob();
     }

     if (e.keyCode == 32) {
         getAllJob();
     }
 });

 function getAllJob() {
     var search=$("#search-job").val();
     $.ajax({
         type: 'POST',
         url: "{!! route('job.getJobData') !!}",
         cache: false,
         data: {_token: "{{csrf_token()}}",search:search},
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