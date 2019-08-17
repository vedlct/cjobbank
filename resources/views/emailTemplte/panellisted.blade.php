@extends('main')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h4 class="pull-left">Change panellisted template</h4>
                </div>
                <div class="card-body">

                    <div style="margin: 0px 30px 0px 30px;">

                        <form method="post" action="{{route('changeemailtemplate.updateemailtemplate')}}">
                            {{csrf_field()}}

                            <div class="form-group">
                                @if(($email_data))
                                    <input type="hidden" name="contant_id" value="{{$email_data->email_id}}">
                                @endif

                                <input type="hidden" name="contant_type" value="@if(($email_data)){{$email_data->emailfor}}@else panellisted @endif">

                                <textarea class="form-control ckeditor" name="contents" rows="6">@if(($email_data)){{$email_data->emailbody}}@endif</textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </form>

                    </div>

                </div>

            </div>
        </div>
        <!-- end col -->
    </div>

@endsection
@section('foot-js')

    <script type="text/javascript" src="{{url('public/assets/ckeditor/ckeditor.js')}}"></script>

@endsection