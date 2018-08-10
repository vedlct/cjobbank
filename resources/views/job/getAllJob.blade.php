@foreach($jobs as $job)
    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-body">

                    <div style="width: 60%" class="media">
                        <div class="media-body">
                            <h4 style="margin-bottom: 5px;" class="mt-0 font-20 mb-1">{{$job->title}}</h4>
                            <p class="text-muted font-14">{{$job->details}} </p>
                            <p class="text-muted font-14"><b>Deadline: {{$job->deadline}}</b></p>
                            <p class="text-muted font-14"> <a style="color: #707083;" href="#"><b> Download Details..</b></a> </p>
                        </div>
                    </div>

                    <div style="float: right; position: absolute; bottom: 10%; right: 1%;" class="applynow">
                        <button type="button" class="btn btn-primary">Apply Now</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>


@endforeach
{{--{{$jobs->currentPage()}}--}}

<ul class="pagination">
    {{--<li class="page-item"><a class="page-link" href="#">Previous</a></li>--}}
    @if($jobs->currentPage()!= 1)
        <li class="page-item"> <a data-id="{{$jobs->previousPageUrl()}}" href="javascript:void(0)" class="page-link pagiNextPrevBtn"><i class="ion-ios-arrow-left"></i>Prev</a></li>
    @endif

    @for($i=$jobs->perPage(); $i <= $jobs->total();$i=($i+$jobs->perPage()))
        <li  @if($jobs->currentPage() == $i) class="page-item active " @else class="page-item" @endif> <a class="page-link pagiNextPrevBtn" data-id="{{$jobs->url($i)}}" href="javascript:void(0)">{{$i}}</a></li>
    @endfor
    @if($jobs->lastPage()!=$jobs->currentPage())
        <li class="page-item"><a data-id="{{$jobs->nextPageUrl()}}" href="javascript:void(0)"  class="page-link pagiNextPrevBtn">Next<i class="ion-ios-arrow-right"></i></a></li>
    @endif
</ul>






<script>
    $(".pagiNextPrevBtn").on("click",function() {
        var page=$(this).data('id').split('page=')[1];
        getData(page);
    });
</script>



{{--<div class="row">--}}
    {{--<div class="col-lg-12">--}}
        {{--<div class="card m-b-30">--}}
            {{--<div class="card-body">--}}

                {{--<div style="width: 60%" class="media">--}}
                    {{--<div class="media-body">--}}
                        {{--<h4 style="margin-bottom: 5px;" class="mt-0 font-20 mb-1">Support Engineer</h4>--}}
                        {{--<p class="text-muted font-14">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has </p>--}}
                        {{--<p class="text-muted font-14"><b>Deadline: 01-12-2018</b></p>--}}
                        {{--<p class="text-muted font-14"> <a style="color: #707083;" href="#"><b> Download Details..</b></a> </p>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div style="float: right; position: absolute; bottom: 10%; right: 1%;" class="applynow">--}}
                    {{--<button type="button" class="btn btn-primary">Apply Now</button>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<!-- end col -->--}}
{{--</div>--}}
{{--<!-- end row -->--}}

