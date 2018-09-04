@extends('main')

@section('content')

    <div class="row ">

        <div class="col-12 ">
            <div class="card">
                <div style="background-color: #F1F1F1" class="card-body">


<div id="regForm">
                        <div id="" class="tab">

                            <h2 style="margin-bottom: 30px;">Professional Certification </h2>

                                @php($tempHr=0)
                                @foreach($professional as $value)
                                    @if($tempHr>0)
                                        <div class="col-md-12"><hr style="border-top:1px dotted #000;"></div>
                                    @endif
                                    <div id="edit{{$value->professionalQualificationId}}">
                                        <input type="hidden" name="professionalQualificationId[]" value="{{$value->professionalQualificationId}}">
                                            <div class="row">
                                                <div class="form-group col-md-10">
                                                    <label for="inputEmail4">Certificate Name :</label>
                                                    <label for="inputEmail4">{{$value->certificateName}}</label>
                                                    {{--<input type="text" class="form-control" name="certificateName{{$value->professionalQualificationId}}" id="inputEmail4" value="{{$value->certificateName}}" placeholder="certificate" required>--}}
                                                </div>
                                                <div class="form-group col-md-2 ">
                                                    <button type="button" class="btn btn-info btn-sm " onclick="editInfo({{$value->professionalQualificationId}})"><i class="fa fa-edit"></i></button>
                                                    <button type="button" class="btn btn-danger btn-sm " onclick="deleteProfession({{$value->professionalQualificationId}})"><i class="fa fa-trash"></i></button>

                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-8">
                                                    <label for="inputEmail4">Institute Name :</label>
                                                    <label >{{$value->institutionName}}</label>
                                                    {{--<input type="text" class="form-control" name="institutionName{{$value->professionalQualificationId}}" id="inputEmail4" value="{{$value->institutionName}}" placeholder="institution" required>--}}
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputPassword4">Result :</label>
                                                    <label for="inputPassword4">{{$value->result}}</label>
                                                    {{--<input type="text" class="form-control" name="result{{$value->professionalQualificationId}}" value="{{$value->result}}" id="inputPassword4" placeholder="">--}}
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputPassword4">Start Date :</label>
                                                    <label for="inputPassword4">{{$value->startDate}}</label>
                                                    {{--<input type="text" class="form-control date" name="startDate{{$value->professionalQualificationId}}" value="{{$value->startDate}}" id="start" placeholder="date" required>--}}
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputPassword4">End Date :</label>
                                                    <label for="inputPassword4">{{$value->endDate}}</label>
                                                    {{--<input type="text" class="form-control date" name="endDate{{$value->professionalQualificationId}}" value="{{$value->endDate}}" id="end" placeholder="date">--}}
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputPassword4">Staus :</label>
                                                    <label for="inputPassword4">
                                                        @if($value->status == 1)
                                                        Completed
                                                        @endif
                                                        @if($value->status == 2)
                                                                On going
                                                            @endif

                                                    </label>
                                                    {{--<select class="form-control" name="status[]">--}}
                                                        {{--<option value="1" @if($value->status == 1) selected @endif>On going</option>--}}
                                                        {{--<option value="2" @if($value->status == 2) selected @endif>Completed</option>--}}
                                                    {{--</select>--}}
                                                </div>
                                            </div>
                                    </div>

                                    @php($tempHr++)

                                @endforeach


                        </div>
                    <form id="" action="{{route('submit.cvProfessionalCertificate')}}"  method="post">
                        <!-- One "tab" for each step in the form: -->
                        {{csrf_field()}}
                        <div id="TextBoxesGroup">


                        </div>

                        <button type="button" id="addButton" class="btn btn-success">Add More</button>
                        <button type="button" id="removeButton" class="btn btn-success" >remove</button>

                        <div style="overflow:auto;">
                            <div style="float:right;">

                                <button type="submit" id="submitBtn">Save</button>
                                <a href="{{route('candidate.cvTrainingCertificate')}}"><button type="button" id="nextBtn" >Next</button></a>
                            </div>
                        </div>

                    </form>


                        <!-- Circles which indicates the steps of the form: -->
                        <div style="text-align:center;margin-top:40px;">
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                        </div>

</div>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

    </div> <!-- end container -->
    </div>
    <!-- end wrapper -->


@endsection

@section('foot-js')
    <script>
        function editInfo(x) {
            $.ajax({
                type: 'POST',
                url: "{!! route('professionalQualificationId.edit') !!}",
                cache: false,
                data: {_token: "{{csrf_token()}}",'professionalQualificationId': x},
                success: function (data) {
                    $('#edit'+x).html(data);

                }
            });
        }
        function deleteProfession(x) {
            $.confirm({
                title: 'Delete!',
                content: 'Are you sure ?',
                buttons: {
                    confirm: function () {
                        $.ajax({
                            type: 'POST',
                            url: "{!! route('professionalQualificationId.delete') !!}",
                            cache: false,
                            data: {_token: "{{csrf_token()}}",'professionalQualificationId': x},
                            success: function (data) {
                                location.reload();
                            }
                        });
                    },
                    cancel: function () {
//                        $.alert('Canceled!');
                    }

                }
            });



        }
        var currentTab = 0; // Current tab is set to be the first tab (0)
        fixStepIndicator(currentTab); // Display the crurrent tab

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var x1 = document.getElementsByClassName("tab");
            x1[n].style.display = "block";
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class on the current step:
            x[(n+3)].className += " active";
        }
    </script>



    <script type="text/javascript">
        $(function () {
            $('.date').datepicker({
                format: 'yyyy-m-d'
            });
        });

        $(document).ready(function(){

            var counter = 1;
            $("#removeButton").hide();
            $("#submitBtn").hide();


            $("#addButton").click(function () {
                if(counter>10){
                    alert("Only 10 Section allow per Time!!");
                    return false;
                }




                var newTextBoxDiv = $(document.createElement('div'))
                    .attr("id", 'TextBoxDiv' + counter).attr("class", 'row');
                newTextBoxDiv.after().html(
                    '<div class="col-md-12"><hr style="border-top:1px dotted #000;"></div>'+
                    '<div id="TextBoxesGroup">'+
                    '<div class="row">'+
                    '<div class="form-group col-md-12">'+
                    '<label for="inputEmail4">Certificate Name</label>'+
                    '<input type="text" class="form-control" name="certificateName[]" id="inputEmail4" placeholder="certificate" required>'+
                    '</div>'+
                    '</div>'+
                    '<div class="row">'+
                    '<div class="form-group col-md-8">'+
                    '<label for="inputEmail4">Institute Name</label>'+
                    '<input type="text" class="form-control" name="institutionName[]" id="inputEmail4" placeholder="institution" required>'+
                    '</div>'+
                    '<div class="form-group col-md-4">'+
                    '<label for="inputPassword4">Result</label>'+
                    '<input type="text" class="form-control" name="result[]" id="inputPassword4" placeholder="">'+
                    '</div>'+

                    '<div class="form-group col-md-4">'+
                    '<label for="inputPassword4">Start Date</label>'+
                    '<input type="text" class="form-control date" name="startDate[]"  placeholder="date" required>'+
                    '</div>'+
                    '<div class="form-group col-md-4">'+
                    '<label for="inputPassword4">End Date</label>'+
                    '<input type="text" class="form-control date" name="endDate[]"  placeholder="date">'+
                    '</div>'+

                    '<div class="form-group col-md-4">'+
                    '<label for="inputPassword4">Staus</label>'+
                    '<select class="form-control" name="status[]">'+
                    '<option value="1">On going</option>'+
                    '<option value="2">Completed</option>'+
                    '</select>'+
                    '</div>'+
                    '</div>'+
                    '</div>'
                );
                newTextBoxDiv.appendTo("#TextBoxesGroup");

                counter++;
                if(counter>1){
//                    document.getElementById("removeButton").style.display='block';
                    $("#removeButton").show();
                    $("#submitBtn").show();

                }
                $('.date').datepicker({
                    format: 'yyyy-m-d'
                });
            });

            $("#removeButton").click(function () {


                if(counter=='1'){
                    alert("Atleast One Course Section is needed!!");
                    return false;
                }
                counter--;
                if(counter<2){
                    $("#removeButton").hide();
                    $("#submitBtn").hide();
                }
                $("#TextBoxDiv" + counter).remove();
            });


        });

    </script>



@endsection
