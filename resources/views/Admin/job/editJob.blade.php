@extends('main')
@section('content')


    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h4>Job Info Edit</h4>
                </div>
                <div class="card-body">
                    @foreach($jobInfo as $info)
                  <form method="POST" action="{{route('job.admin.update')}}" enctype="multipart/form-data">
                      {{csrf_field()}}
                      <input type="hidden" required id="jobId" name="jobId" value="{{$info->jobId}}">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="">Title<span style="color: red">*</span></label>
                            <input type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" id="title" value="{{$info->title}}" placeholder="job Title" required>
                            @if ($errors->has('title'))

                                <span class="">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Position<span style="color: red">*</span></label>
                            <input type="text" class="form-control {{ $errors->has('position') ? ' is-invalid' : '' }}" id="position" name="position" value="{{$info->position}}" placeholder="position" required>
                            @if ($errors->has('position'))

                                <span class="">
                                        <strong>{{ $errors->first('position') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                      <div class="row">
                        <div class="form-group col-md-6">
                            <label for="">Salary<span style="color: red">*</span></label>
                            <input type="text" class="form-control {{ $errors->has('salary') ? ' is-invalid' : '' }}" name="salary" id="salary" value="{{$info->salary}}" placeholder="salary" required>
                            @if ($errors->has('salary'))

                                <span class="">
                                        <strong>{{ $errors->first('salary') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label for="jobStatus">job Status<span style="color: red">*</span></label>
                            <select class="form-control {{ $errors->has('jobStatus') ? ' is-invalid' : '' }}" id="jobStatus" name="jobStatus" required >
                                <option value="">select Job Status</option>
                                <option @if($info->jobstatus =='1') selected @endif value="1">Part Time</option>
                                <option @if($info->jobstatus =='2') selected @endif value="2">Full Time</option>
                                <option @if($info->jobstatus =='3') selected @endif value="3">Other</option>

                            </select>

                            @if ($errors->has('jobStatus'))

                                <span class="">
                                        <strong>{{ $errors->first('jobStatus') }}</strong>
                                    </span>
                            @endif

                        </div>
                    </div>
                      <div class="row">
                        <div class="form-group col-md-6">
                            <label for="">Deadline<span style="color: red">*</span></label>
                            <input type="text" class="form-control date {{ $errors->has('deadline') ? ' is-invalid' : '' }}" name="deadline" id="deadline" value="{{$info->deadline}}" required>
                            @if ($errors->has('deadline'))

                                <span class="">
                                        <strong>{{ $errors->first('deadline') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label for="jobStatus">Status<span style="color: red">*</span></label>
                            <select required class="form-control" id="activestatus" name="status" >
                                <option value="">select Status</option>

                                @foreach(JOB_STATUS as $key=>$value)
                                    <option @if($info->status == $value ) selected @endif value="{{$value}}">{{$key}}</option>
                                @endforeach



                            </select>

                        </div>
                    </div>
                      <div class="row">

                        <div class="form-group col-md-6">
                            <label for="jobStatus">Zone<span style="color: red">*</span></label>
                            <select class="form-control" id="zone" name="zone" required>
                                <option value="">select zone</option>
                                @foreach($allZone as $zone)
                                <option @if($zone->zoneId == $info->fkzoneId ) selected @endif value="{{$zone->zoneId}}">{{$zone->zoneName}}</option>
                                @endforeach

                            </select>

                        </div>
                          <div class="form-group col-md-6">
                              <label for="">pdf</label>
                              <input type="file" name="jobPdf" accept="application/pdf">
                              @if(!empty($info->pdflink))
                              <a target="_blank" href="{{$info->pdflink}}"></a>
                               @endif
                          </div>

                    </div>
                      <div class="row">

                        <div class="form-group col-md-12">
                            <label for="jobStatus">Details</label>
                            <textarea class="form-control" rows="5" id="jobDetails" name="jobDetails">{{$info->details}}</textarea>

                        </div>


                    </div>
                      <div class="form-group">

                        <button type="submit" class="btn btn-success"> Submit</button>


                    </div>

                  </form>
                        @endforeach

                </div>

            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->






@endsection
@section('foot-js')

<script>
    $(function () {
        $('.date').datepicker({
            format: 'yyyy-m-d',
            todayHighlight: true,
            startDate: new Date(),
            autoclose: true,
        });

    });
</script>

@endsection