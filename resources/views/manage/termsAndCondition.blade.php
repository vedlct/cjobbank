@extends('main')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-header">
                <h4 class="pull-left">Terms And Conditions</h4>
                {{--<a href="{{route('job.admin.create')}}"><button class="btn btn-success pull-right">Post Job</button></a>--}}
                </div>
                <div class="card-body">


                    <form method="post" action="{{route('admin.termsAndCondition.update')}}">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" maxlength="500" class="form-control" value="@if($terms){{$terms->page_Header}}@endif" placeholder="title" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="">Content &nbsp;</label>
                            <textarea class="form-control ckeditor" name="contents" rows="6">@if(($terms)){{$terms->page_content}}@endif</textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>






                </div>

            </div>
        </div>
        <!-- end col -->
    </div>

@endsection
@section('foot-js')

    <script type="text/javascript" src="{{url('public/assets/ckeditor/ckeditor.js')}}"></script>

@endsection