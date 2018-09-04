@extends('main')
@section('content')


<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-header">
                <h4>Job Info Add</h4>
            </div>
            <div class="card-body">

                <form method="POST" action="{{route('job.admin.insert')}}" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="">Title</label>
                            <input type="text" class="form-control" name="title" id="title" value="" placeholder="job Title" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Position</label>
                            <input type="text" class="form-control" id="position" name="position" value="" placeholder="position" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="">Salary</label>
                            <input type="text" class="form-control" name="salary" id="salary" value="" placeholder="salary" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="jobStatus">job Status</label>
                            <select class="form-control" id="jobStatus" name="jobStatus" required >
                                <option value="">select Job Status</option>
                                <option  value="1">Part Time</option>
                                <option  value="2">Full Time</option>

                            </select>

                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="">Deadline</label>
                            <input type="text" class="form-control date" name="deadline" id="deadline" value="" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="jobStatus">Status</label>
                            <select class="form-control" id="activestatus" name="status" >
                                <option value="">select Status</option>
                                <option  value="1">Posted</option>
                                <option  value="2">De-activate</option>

                            </select>

                        </div>
                    </div>
                    <div class="row">

                        <div class="form-group col-md-6">
                            <label for="jobStatus">Zone</label>
                            <select class="form-control" id="zone" name="zone" required>
                                <option value="">select zone</option>
                                @foreach($allZone as $zone)
                                <option  value="{{$zone->zoneId}}">{{$zone->zoneName}}</option>
                                @endforeach

                            </select>

                        </div>
                        <div class="form-group col-md-6">
                            <label for="">pdf</label>
                            <input type="file" name="jobPdf" accept="application/pdf">

                        </div>

                    </div>
                    <div class="row">

                        <div class="form-group col-md-6">
                            <label for="jobStatus">Details</label>
                            <textarea class="form-control" id="jobDetails" name="jobDetails"></textarea>

                        </div>


                    </div>
                    <div class="form-group">

                        <button type="submit" class="btn btn-success"> Submit</button>

                    </div>

                </form>


            </div>

        </div>
    </div> <!-- end col -->
</div> <!-- end row -->




@endsection
@section('foot-js')

<script>
    $(function () {
        $('.date').datepicker({
            format: 'yyyy-m-d'
        });

    });
</script>

@endsection