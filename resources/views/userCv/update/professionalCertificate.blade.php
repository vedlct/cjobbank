@extends('main')

@section('content')

    <div class="row ">

        <div class="col-12 ">
            <div class="card">
                <div style="background-color: #F1F1F1" class="card-body">


<div id="regForm">
                        <div id="" class="tab">

                            <h2 style="margin-bottom: 30px;">Professional Certification </h2>


                            <div  id="profCertificateDiv">

                                @php($tempHr=0)
                                @foreach($professional as $val)
                                    @if($tempHr>0)
                                        <div class="col-md-12"><hr style="border-top:1px dotted #000;"></div>
                                    @endif
                                    <div id="edit{{$val->professionalQualificationId}}">
                                        <input type="hidden" name="professionalQualificationId[]" value="{{$val->professionalQualificationId}}">
                                            <div class="row">
                                                <div class="form-group col-md-10">
                                                    <label for="inputEmail4">Certificate Name :</label>
                                                    <label for="inputEmail4">{{$val->certificateName}}</label>
                                                    {{--<input type="text" class="form-control" name="certificateName{{$val->professionalQualificationId}}" id="inputEmail4" value="{{$val->certificateName}}" placeholder="certificate" required>--}}
                                                </div>
                                                <div class="form-group col-md-2 ">
                                                    <button type="button" class="btn btn-info btn-sm " onclick="editInfo({{$val->professionalQualificationId}})"><i class="fa fa-edit"></i></button>
                                                    <button type="button" class="btn btn-danger btn-sm " onclick="deleteProfession({{$val->professionalQualificationId}})"><i class="fa fa-trash"></i></button>

                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-8">
                                                    <label for="inputEmail4">Institute Name :</label>
                                                    <label >{{$val->institutionName}}</label>
                                                    {{--<input type="text" class="form-control" name="institutionName{{$val->professionalQualificationId}}" id="inputEmail4" value="{{$val->institutionName}}" placeholder="institution" required>--}}
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4">Result System :</label>

                                                    <label >
                                                        @foreach(RESULT_SYSTEM as $key=>$value)
                                                            @if($value==$val->resultSystem){{$key}}
                                                            @endif
                                                        @endforeach
                                                    </label>

                                                    {{--<input type="text" class="form-control" name="institutionName{{$val->professionalQualificationId}}" id="inputEmail4" value="{{$val->institutionName}}" placeholder="institution" required>--}}
                                                </div>



                                                <div class="form-group col-md-4">
                                                    <label for="inputPassword4">Result :</label>
                                                    <label for="inputPassword4">{{$val->result}}</label>
                                                    {{--<input type="text" class="form-control" name="result{{$val->professionalQualificationId}}" value="{{$val->result}}" id="inputPassword4" placeholder="">--}}
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputPassword4">Start Date :</label>
                                                    <label for="inputPassword4">{{$val->startDate}}</label>
                                                    {{--<input type="text" class="form-control date" name="startDate{{$val->professionalQualificationId}}" value="{{$val->startDate}}" id="start" placeholder="date" required>--}}
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputPassword4">End Date :</label>
                                                    <label for="inputPassword4">{{$val->endDate}}</label>
                                                    {{--<input type="text" class="form-control date" name="endDate{{$val->professionalQualificationId}}" value="{{$val->endDate}}" id="end" placeholder="date">--}}
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputPassword4">Staus :</label>
                                                    <label for="inputPassword4">
                                                        @foreach(COMPLETING_STATUS as $key=>$values)

                                                            @if($val->status == $values) {{$key}} @endif
                                                        @endforeach
                                                        {{--@if($value->status == 1)--}}
                                                        {{--Completed--}}
                                                        {{--@endif--}}
                                                        {{--@if($value->status == 2)--}}
                                                                {{--On going--}}
                                                            {{--@endif--}}

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




                    <form id="" action="{{route('submit.cvProfessionalCertificate')}}"  method="post">
                        <!-- One "tab" for each step in the form: -->
                        {{csrf_field()}}
                        <input class="form-check-input"  type="hidden"  name="hasProfCertificate" value="1">
                        <div id="TextBoxesGroup">


                        </div>

                        <button type="button" id="addButton" class="btn btn-success">Add More</button>
                        <button type="button" id="removeButton" class="btn btn-success" >remove</button>

                        <div style="overflow:auto;">
                            <div style="float:right;">
                                <a href="{{route('candidate.cvTrainingCertificate')}}"><button type="button" id="btnPevious">Back</button></a>
                                <button type="submit" id="submitBtn">Save</button>
                                <a href="{{route('JobExperience.index')}}"><button type="button" id="nextBtn" >Next</button></a>
                            </div>
                        </div>

                    </form>
                        </div>



                        <!-- Circles which indicates the steps of the form: -->
                        <div style="text-align:center;margin-top:40px;">
                            <span class="step"></span>
                            <span class="step"></span>
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
            x[(n+2)].className += " active";
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

                if (counter > 1)
                {
                    var certificateName=$('#certificateName'+(counter-1)).val();
                    var institutionName=$('#institutionName'+(counter-1)).val();
//                    var result=$('#result'+(counter-1)).val();
                    var start=$('#start'+(counter-1)).val();
                    var end=$('#end'+(counter-1)).val();
                    var status=$('#professinalCertificateStatus'+(counter-1)).val();


                    if(certificateName==""){

                        var errorMsg='Please Type certificateName First!!'
                        validationError(errorMsg)
                        return false;
                    }
                    if (certificateName.length > 100){

                        var errorMsg='certificateName Should not more than 100 Charecter Length!!'
                        validationError(errorMsg)
                        return false;

                    }
                    if(institutionName==""){

                        var errorMsg='Please Type instituteName First!!'
                        validationError(errorMsg)
                        return false;

                    }
                    if (institutionName.length > 255){

                        var errorMsg='Institute Name Should not more than 255 Charecter Length!!'
                        validationError(errorMsg)
                        return false;

                    }
//                    if(result==""){
//
//                        var errorMsg='Please Type a Result First!!'
//                        validationError(errorMsg)
//                        return false;
//
//                    }
//                    if (result.length > 10){
//
//                        var errorMsg='Result Should not more than 10 Charecter Length!!'
//                        validationError(errorMsg)
//                        return false;
//
//                    }
                    if(start==""){

                        var errorMsg='Please Select a Strat Date First!!'
                        validationError(errorMsg)
                        return false;

                    }
//                    if(end==""){
//
//                        var errorMsg='Please Select a End Date First!!'
//                        validationError(errorMsg)
//                        return false;
//
//                    }

                    if (end != "") {


                        if (Date.parse(end) < Date.parse(start)) {

                            var errorMsg = 'End date should after Start Date!!'
                            validationError(errorMsg)
                            return false;

                        }
                    }

                    if(status==""){

                        var errorMsg='Please Select a status First!!'
                        validationError(errorMsg)
                        return false;

                    }
                }




                var newTextBoxDiv = $(document.createElement('div'))
                    .attr("id", 'TextBoxDiv' + counter).attr("class", 'row');
                newTextBoxDiv.after().html(
                    '<div class="col-md-12"><hr style="border-top:1px dotted #000;"></div>'+
                    '<div id="TextBoxesGroup">'+
                    '<div class="row">'+
                    '<div class="form-group col-md-12">'+
                    '<label for="inputEmail4">Certificate Name<span style="color: red">*</span></label>'+
                    '<input type="text" class="form-control" name="certificateName[]" id="certificateName'+counter+'" placeholder="certificate" >'+
                    '</div>'+
                    '</div>'+
                    '<div class="row">'+
                    '<div class="form-group col-md-8">'+
                    '<label for="inputEmail4">Institute Name<span style="color: red">*</span></label>'+
                    '<input type="text" class="form-control" name="institutionName[]" id="institutionName'+counter+'" placeholder="institution" >'+
                    '</div>'+
                    '<div class="form-group col-md-4">'+
                    '<label for="">Result System<span style="color: red">*</span></label>'+
                    '<select name="resultSystem[]" class="form-control"  id="resultSydtem'+counter+'">'+
                    '<option value="">Select System</option>'+
                    @foreach(RESULT_SYSTEM as $key=>$value)
                        '<option value="{{$value}}">{{$key}}</option>'+
                    @endforeach
                        '</select>'+
                    '</div>'+
                    '<div class="form-group col-md-4">'+
                    '<label for="inputPassword4">Result</label>'+
                    '<input type="text" class="form-control" name="result[]" id="result'+counter+'" placeholder="">'+
                    '</div>'+

                    '<div class="form-group col-md-4">'+
                    '<label for="inputPassword4">Start Date<span style="color: red">*</span></label>'+
                    '<input type="text" class="form-control date" name="startDate[]" id="start'+counter+'" placeholder="date" required>'+
                    '</div>'+
                    '<div class="form-group col-md-4">'+
                    '<label for="inputPassword4">End Date</label>'+
                    '<input type="text" class="form-control date" name="endDate[]" id="end'+counter+'"  placeholder="date">'+
                    '</div>'+

                    '<div class="form-group col-md-4">'+
                    '<label for="inputPassword4">Staus<span style="color: red">*</span></label>'+
                    '<select  class="form-control" id="professinalCertificateStatus'+counter+'" name="status[]">'+
                    '<option value="">Select Status</option>'+
                    @foreach(COMPLETING_STATUS as $key=>$value)
                        '<option value="{{$value}}">{{$key}}</option>'+
                    @endforeach
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
                    alert("Atleast One Section is needed!!");
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

        function validationError(errorMsg){

            $.alert({
                title: 'Error',
                type: 'red',
                content: errorMsg,
                buttons: {
                    tryAgain: {
                        text: 'Ok',
                        btnClass: 'btn-green',
                        action: function () {

                        }
                    }
                }
            });

        }

    </script>



@endsection
