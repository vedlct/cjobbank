<!-- Modal -->
<div class="modal" id="jobModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" id="jobModalTitle"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body" id="jobModalBody">

            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                {{--<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>--}}
            </div>

        </div>
    </div>
</div>

@foreach($jobs as $job)

    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-10">
                <div class="card-body">

                    <div  class="media">
                        <div class="media-body">
                            <h4 style="margin-bottom: 5px;" class="mt-0 font-20 mb-1">{{$job->title}}</h4>
                            <p class="text-muted font-14">{{$job->details}} </p>
                            <p class="font-14" ><b>Deadline: <span style="color: red">{{$job->deadline}}</span></b></p>
                            @if($job->pdflink != null )
                            <p class=""> <a class="btn btn-info btn-sm" target="_blank" href="{{url('public/jobPdf').'/'.$job->pdflink}}"><b>Details</b></a> </p>
                            @endif
                        </div>
                    </div>

                    <div style="float: right; position: absolute; bottom: 10%; right: 1%;" class="applynow">

                        @php
                            $flag= "False"
                        @endphp
                        @if(isset($applyjob) && $applyjob != null)
                        @foreach($applyjob as $aj)
                        @if($job->jobId ==  $aj->fkjobId)

                                <h5><span class="badge badge-success">Applied</span></h5>

                            @php
                            $flag= "True"
                            @endphp
                            @endif
                        @endforeach
                        @endif

                        @if($flag == "True")
                        @else
                            @if(isset($cvStatus) && $cvStatus == null)
                                 <label style="color: red">Please complete your cv to apply job</label>
                             @else
                        {{--<a href="{{route('candidate.ApplyJob',$job->jobId)}}"><button type="button" class="btn btn-primary">Apply Now</button></a>--}}
                                <button type="button" class="btn btn-info btn-lg" data-job-title="{{$job->title}}" data-panel-id="{{$job->jobId}}" onclick="applyJob(this)">Apply Now</button>
                            @endif

                        @endif

                    </div>


                </div>
            </div>
        </div>
        <!-- end col -->
    </div>


@endforeach


<ul class="pagination">


        <li class="page-item @if($jobs->currentPage()== 1) disabled @endif"> <a data-id="{{$jobs->previousPageUrl()}}" href="javascript:void(0)" class="page-link pagiNextPrevBtn"><i class="ion-ios-arrow-left"></i>Prev</a></li>


    @for($i=$jobs->perPage(); $i <= $jobs->total();$i=($i+$jobs->perPage()))
        <li  @if($jobs->currentPage() == $i) class="page-item active " @else class="page-item" @endif> <a class="page-link pagiNextPrevBtn" data-id="{{$jobs->url($i)}}" href="javascript:void(0)">{{$i}}</a></li>
    @endfor

        <li  class="page-item @if($jobs->lastPage()==$jobs->currentPage()) disabled @endif"><a data-id="{{$jobs->nextPageUrl()}}" href="javascript:void(0)"  class="page-link pagiNextPrevBtn">Next<i class="ion-ios-arrow-right"></i></a></li>

</ul>






<script>
    $(".pagiNextPrevBtn").on("click",function() {
        var page=$(this).data('id').split('page=')[1];
        getData(page);
    });

    function applyJob(x) {
        var id=$(x).data('panel-id');
        var title=$(x).data('job-title');

        $.ajax({
            type: 'POST',
            url: "{!! route('job.applyJobModal') !!}",
            cache: false,
            data: {_token: "{{csrf_token()}}",jobId:id,jobTitle:title},
            success: function (data) {
//                console.log(data);
                $('#jobModalTitle').html(title);
                $('#jobModalBody').html(data);
                $('#jobModal').modal();

            }
        });
    }


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

