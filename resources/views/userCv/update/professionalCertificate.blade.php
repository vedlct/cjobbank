@extends('main')

@section('content')

    <div class="row ">

        <div class="col-12 ">
            <div class="card updateCard">
                <div style="background-color: #F1F1F1" class="card-body">

                    <div class="col-md-3">

                        <div class="sidenav">
                            <a href="{{route('candidate.cvPersonalInfo')}}">Personal details</a>
                            <a href="{{route('candidate.cvQuesObj')}}">Career objective and application information</a>
                            <a href="{{route('candidate.cvEducation')}}">Education</a>
                            <a href="{{route('candidate.language.index')}}">Language</a>
                            <a href="{{route('candidate.computerSkill.index')}}">Computer-skill</a>
                            {{--<a href="{{route('candidate.skill.index')}}">Other Skill Information</a>--}}
                            <a href="{{route('cv.OthersInfo')}}">Other information</a>
                            <a href="{{route('candidate.cvTrainingCertificate')}}">Training certification</a>
                            <a class="activeNav" href="{{route('candidate.cvProfessionalCertificate')}}">Professional
                                certification</a>
                            <a href="{{route('JobExperience.index')}}">Job experience</a>
                            <a href="{{route('candidate.previousWorkInCB.index')}}">Previous work information in Caritas
                                Bangladesh</a>
                            <a href="{{route('candidate.membershipInSocialNetwork.index')}}">Certification of membership
                                in professional network/ forum</a>
                            <a href="{{route('refree.index')}}">Referee</a>
                            <a href="{{route('relativeInCaritas.getRelationInfo')}}">Relatives working in Caritas
                                Bangladesh</a>
                        </div>

                    </div>


                    <div class="col-md-9" id="regForm">
                        <div id="" class="tab">

                            <h2 style="margin-bottom: 30px;">Professional certification</h2>

                            <div id="profCertificateDiv">

                                @php($tempHr=0)
                                @foreach($professional as $val)
                                    @if($tempHr>0)
                                        <div class="col-md-12">
                                            <hr style="border-top:1px dotted #000;">
                                        </div>
                                    @endif
                                    <div id="edit{{$val->professionalQualificationId}}">
                                        <input type="hidden" name="professionalQualificationId[]"
                                               value="{{$val->professionalQualificationId}}">
                                        <div class="row">
                                            <div class="form-group col-md-10">
                                                <label for="inputEmail4">Certificate name :</label>
                                                {{$val->certificateName}}
                                                {{--<input type="text" class="form-control" name="certificateName{{$val->professionalQualificationId}}" id="inputEmail4" value="{{$val->certificateName}}" placeholder="certificate" required>--}}
                                            </div>
                                            <div class="form-group col-md-2 ">
                                                <button type="button" class="btn btn-info btn-sm "
                                                        onclick="editInfo({{$val->professionalQualificationId}})"><i
                                                            class="fa fa-edit"></i></button>
                                                <button type="button" class="btn btn-danger btn-sm "
                                                        onclick="deleteProfession({{$val->professionalQualificationId}})">
                                                    <i class="fa fa-trash"></i></button>

                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label for="inputEmail4">Institute name :</label>
                                                {{$val->institutionName}}
                                                {{--<input type="text" class="form-control" name="institutionName{{$val->professionalQualificationId}}" id="inputEmail4" value="{{$val->institutionName}}" placeholder="institution" required>--}}
                                            </div>


                                            {{--@if($val->resultSystem)--}}
                                            {{--<div class="form-group col-md-4">--}}
                                            {{--<label for="inputPassword4">Result System :</label>--}}
                                            {{--<label for="inputPassword4">{{$val->grade}}</label>--}}
                                            {{--</div>--}}

                                            {{--@else--}}
                                            <div class="form-group col-md-4">
                                                <label for="inputEmail4">Result System :</label>


                                                {{--@foreach(RESULT_SYSTEM as $key=>$value)--}}
                                                {{--@if($value==$val->resultSystem){{$key}}--}}
                                                {{--@endif--}}
                                                {{--@endforeach--}}

                                                @if($val->resultSystem!=4)

                                                    @foreach(RESULT_SYSTEM as $key=>$value)
                                                        @if($val->resultSystem ==$value)
                                                            {{$key}}
                                                        @endif


                                                    @endforeach
                                                @else
                                                    {{$val->resultSystemName}}
                                                @endif



                                                {{--<input type="text" class="form-control" name="institutionName{{$val->professionalQualificationId}}" id="inputEmail4" value="{{$val->institutionName}}" placeholder="institution" required>--}}
                                            </div>
                                            {{--@endif--}}


                                            <div class="form-group col-md-4">
                                                <label for="inputPassword4">Result :</label>
                                                {{$val->result}}
                                                {{--<input type="text" class="form-control" name="result{{$val->professionalQualificationId}}" value="{{$val->result}}" id="inputPassword4" placeholder="">--}}
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="inputPassword4">Start date :</label>
                                                {{$val->startDate}}
                                                {{--<input type="text" class="form-control date" name="startDate{{$val->professionalQualificationId}}" value="{{$val->startDate}}" id="start" placeholder="date" required>--}}
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputPassword4">End date :</label>
                                                {{$val->endDate}}
                                                {{--<input type="text" class="form-control date" name="endDate{{$val->professionalQualificationId}}" value="{{$val->endDate}}" id="end" placeholder="date">--}}
                                            </div>
                                            @if($val->hour || $val->day || $val->week || $val->month || $val->year)
                                                <div class="form-group col-md-12">
                                                    <label for="inputEmail4">Duration :</label>
                                                    <label for="inputEmail4">{{"H:".$val->hour." D:".$val->day." W:".$val->week." M:".$val->month." Y:".$val->year}} </label>
                                                    {{--<input type="text" class="form-control" name="vanue[]" id="inputEmail4" placeholder="vanue" required>--}}
                                                </div>
                                            @endif

                                            <div class="form-group col-md-4">
                                                <label for="inputPassword4">Staus :</label>

                                                @foreach(COMPLETING_STATUS as $key=>$values)

                                                    @if($val->status == $values) {{$key}} @endif
                                                @endforeach
                                                {{--@if($value->status == 1)--}}
                                                {{--Completed--}}
                                                {{--@endif--}}
                                                {{--@if($value->status == 2)--}}
                                                {{--On going--}}
                                                {{--@endif--}}

                                            </div>
                                        </div>
                                    </div>

                                    @php($tempHr++)

                                @endforeach


                                <form id="" action="{{route('submit.cvProfessionalCertificate')}}" onsubmit="return chkProfessinalCertificate()" method="post">
                                    <!-- One "tab" for each step in the form: -->
                                    {{csrf_field()}}
                                    <input class="form-check-input" type="hidden" id="hasProfCertificate" name="hasProfCertificate" value="1">
                                    <div id="TextBoxesGroup">


                                    </div>

                                    <button type="button" id="addButton" class="btn btn-success">Add more</button>
                                    <button type="button" id="removeButton" class="btn btn-success">Remove</button>

                                    <div style="overflow:auto;">
                                        <div style="float:right;">
                                            <a href="{{route('candidate.cvTrainingCertificate')}}">
                                                <button type="button" id="btnPevious">Back</button>
                                            </a>
                                            <button type="submit" id="submitBtn">Save</button>
                                            <a href="{{route('JobExperience.index')}}">
                                                <button type="button" id="nextBtn">Next</button>
                                            </a>
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
                data: {_token: "{{csrf_token()}}", 'professionalQualificationId': x},
                success: function (data) {
                    $('#edit' + x).html(data);

                }
            });
        }

        function chkProfessinalCertificate() {



            if ($("#hasProfCertificate").val()=="1") {

               // return false;


                var certificateName = document.getElementsByName("certificateName[]");

//                var institutionName = document.getElementsByName("institutionName[]");

                var start = document.getElementsByName("startDate[]");
                var end = document.getElementsByName("endDate[]");
                var status = document.getElementsByName("status[]");
//                var resultSystem = document.getElementsByName("resultSystem[]");



                for (i = 0; i < certificateName.length; i++) {

                    if(certificateName[i].value==""){

                        var errorMsg='Please type certificate name first!!';
                        validationError(errorMsg);
                        return false;
                    }
//                    if(resultSystem[i].value==""){
//
//                        var errorMsg='Please select result system first!!';
//                        validationError(errorMsg);
//                        return false;
//                    }
                    if (certificateName[i].value.length > 100){

                        var errorMsg='certificate name should not more than 100 charecter length!!';
                        validationError(errorMsg);
                        return false;

                    }
//                    if(institutionName[i].value==""){
//
//                        var errorMsg='Please type instituteName first!!';
//                        validationError(errorMsg);
//                        return false;
//
//                    }

                    if (start[i].value != "" && end[i].value != "") {


                        if (Date.parse(end[i].value) < Date.parse(start[i].value)) {

                            var errorMsg = 'End date should after start date!!'
                            validationError(errorMsg)
                            return false;

                        }
                    }

                    if(status[i].value==""){

                        var errorMsg='Please select a status first!!';
                        validationError(errorMsg);
                        return false;

                    }

                }

            }else {

                return true;

            }


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
                            data: {_token: "{{csrf_token()}}", 'professionalQualificationId': x},
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
            x[(n + 2)].className += " active";
        }
    </script>



    <script type="text/javascript">
        $(function () {
            $('.date').datepicker({
                format: 'yyyy-m-d'
            });
            $('.js-example-basic-single').select2();
        });

        function getResultSystemName(x) {


            var resultSydtem = document.getElementById("resultSydtem" + x).value;

            if (resultSydtem == "{{OTHERS}}") {

                $("#resultSydtemNameDiv" + x).show();
            } else {


                $("#resultSydtemNameDiv" + x).hide();


            }

        }

        function selectStatusAdd(x) {

            var value = $(x).val();
            var id = $(x).data('panel-id');
            if (value == 1) {
                $('#courseDuration' + id).hide();
            } else if (value == 2) {
                $('#courseDuration' + id).show();
            }
        }


        $(document).ready(function () {

            var counter = 1;
            $("#removeButton").hide();
            $("#submitBtn").hide();


            $("#addButton").click(function () {

                if (counter > 10) {
                    alert("Only 10 section allow per time!!");
                    return false;
                }

                if (counter > 1) {
                    var certificateName = $('#certificateName' + (counter - 1)).val();
                    var institutionName = $('#institutionName' + (counter - 1)).val();
//                    var result=$('#result'+(counter-1)).val();
                    var start = $('#start' + (counter - 1)).val();
                    var end = $('#end' + (counter - 1)).val();
                    var status = $('#professinalCertificateStatus' + (counter - 1)).val();


                    if (certificateName == "") {

                        var errorMsg = 'Please type certificate name first!!'
                        validationError(errorMsg)
                        return false;
                    }
                    if (certificateName.length > 100) {

                        var errorMsg = 'certificate name should not more than 100 charecter length!!'
                        validationError(errorMsg)
                        return false;

                    }
//                    if (institutionName == "") {
//
//                        var errorMsg = 'Please type institute name first!!'
//                        validationError(errorMsg)
//                        return false;
//
//                    }
                    if (institutionName.length > 255) {

                        var errorMsg = 'Institute name should not more than 255 charecter length!!'
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
//                    if(start==""){
//
//                        var errorMsg='Please select a start date first!!'
//                        validationError(errorMsg)
//                        return false;
//
//                    }
//                    if(end==""){
//
//                        var errorMsg='Please Select a End Date First!!'
//                        validationError(errorMsg)
//                        return false;
//
//                    }

                    if (start != "" && end != "") {


                        if (Date.parse(end) < Date.parse(start)) {

                            var errorMsg = 'End date should after Start Date!!'
                            validationError(errorMsg)
                            return false;

                        }
                    }

                    if (status == "") {

                        var errorMsg = 'Please Select a status First!!'
                        validationError(errorMsg)
                        return false;

                    }
                }


                var newTextBoxDiv = $(document.createElement('div'))
                    .attr("id", 'TextBoxDiv' + counter).attr("class", 'row');
                newTextBoxDiv.after().html(
                    '<div class="col-md-12"><hr style="border-top:1px dotted #000;"></div>' +
                    '<div id="TextBoxesGroup">' +
                    '<div class="row">' +
                    '<div class="form-group col-md-12">' +
                    '<label for="inputEmail4">Certificate Name<span style="color: red">*</span></label>' +
                    '<input type="text" class="form-control" name="certificateName[]" id="certificateName' + counter + '" placeholder="certificate" >' +
                    '</div>' +
                    '</div>' +
                    '<div class="row">' +
                    '<div class="form-group col-md-8">' +
                    '<label for="inputEmail4">Institution</label>' +
                    '<input type="text" class="form-control" name="institutionName[]" id="institutionName' + counter + '" placeholder="institution" >' +
                    '</div>' +
                    '<div class="form-group col-md-4">' +
                    '<label for="">Result System</label>' +
                    '<select name="resultSystem[]" class="form-control" id="resultSydtem' + counter + '" data-panel-id="' + counter + '" onchange="getResultSystemName(' + counter + ')">' +
                    '<option value="">Select System</option>' +
                        @foreach(RESULT_SYSTEM as $key=>$value)
                            '<option value="{{$value}}">{{$key}}</option>' +
                        @endforeach
                            '<option value="{{OTHERS}}" >{{OTHERS}}</option>' +
                    '</select>' +

                    '</div>' +
                    '<div style="display: none" id="resultSydtemNameDiv' + counter + '" class="form-group col-md-4">' +
                    '<label for="">Result system name</label>' +
                    '<input type="text" maxlength="255" name="resultSydtemName[]" class="form-control" id="resultSydtemName' + counter + '"  placeholder="">' +

                    '</div>' +
                    '<div class="form-group" id="otherField' + counter + '"></div>' +
                    '<div class="form-group col-md-4">' +
                    '<label for="inputPassword4">Result</label>' +
                    '<input type="text" class="form-control" name="result[]" id="result' + counter + '" placeholder="">' +
                    '</div>' +

                    '<div class="form-group col-md-4">' +
                    '<label for="inputPassword4">Start Date</label>' +
                    '<input type="text" class="form-control date" name="startDate[]" id="start' + counter + '" placeholder="date">' +
                    '</div>' +
                    '<div class="form-group col-md-4">' +
                    '<label for="inputPassword4">End Date</label>' +
                    '<input type="text" class="form-control date" name="endDate[]" id="end' + counter + '"  placeholder="date">' +
                    '</div>' +


                    '</div>' +
                    '<div class="row" style="margin-left: 10px" id="courseDuration' + counter + '">' +
                    '<label>Duration</label>' +
                    '<div class="form-group col-md-2">' +
                    '<label for="inputPassword4">Hour</label>' +
                    '<select  class="form-control js-example-basic-single"id="trainingCertificatehour" name="hour[]">' +

                    '<option value="">Select Hour</option>' +
                        @for($i = 1 ; $i <=330 ; $i++)
                            '<option value="{{$i}}">{{$i}}</option>' +
                        @endfor
                            '</select>' +
                    '</div>' +
                    '<div class="form-group col-md-2">' +
                    '<label for="inputPassword4">Day</label>' +
                    '<select  class="form-control js-example-basic-single"id="trainingCertificateday" name="day[]">' +

                    '<option value="">Select Day</option>' +
                        @for($i = 1 ; $i <=365 ; $i++)
                            '<option value="{{$i}}">{{$i}}</option>' +
                        @endfor
                            '</select>' +
                    '</div>' +
                    '<div class="form-group col-md-2">' +
                    '<label for="inputPassword4">Week</label>' +
                    '<select  class="form-control js-example-basic-single"id="trainingCertificateweek" name="week[]">' +

                    '<option value="">Select Week</option>' +
                        @for($i = 1 ; $i <=52 ; $i++)
                            '<option value="{{$i}}">{{$i}}</option>' +
                        @endfor
                            '</select>' +
                    '</div>' +
                    '<div class="form-group col-md-2">' +
                    '<label for="inputPassword4">Month</label>' +
                    '<select  class="form-control js-example-basic-single"id="trainingCertificatemonth" name="month[]">' +

                    '<option value="">Select month</option>' +
                        @for($i = 1 ; $i <=12 ; $i++)
                            '<option value="{{$i}}">{{$i}}</option>' +
                        @endfor
                            '</select>' +
                    '</div>' +
                    '<div class="form-group col-md-2">' +
                    '<label for="inputPassword4">Year</label>' +
                    '<select  class="form-control js-example-basic-single"id="trainingCertificateyear" name="year[]">' +

                    '<option value="">Select year</option>' +
                        @for($i = 1 ; $i <51 ; $i++)
                            '<option value="{{$i}}">{{$i}}</option>' +
                        @endfor
                            '</select>' +
                    '</div>' +
                    '</div>' +
                    '<div class="form-group col-md-4">' +
                    '<label for="inputPassword4">Staus<span style="color: red">*</span></label>' +
                    '<select  class="form-control" id="professinalCertificateStatus' + counter + '" name="status[]" data-panel-id="' + counter + '" onchange="selectStatusAdd(this)">' +
                    '<option value="">Select Status</option>' +
                        @foreach(COMPLETING_STATUS as $key=>$value)
                            '<option value="{{$value}}">{{$key}}</option>' +
                        @endforeach
                            '</select>' +
                    '</div>'
                );
                newTextBoxDiv.appendTo("#TextBoxesGroup");
                $('#courseDuration' + counter).hide();
                counter++;
                if (counter > 1) {
//                    document.getElementById("removeButton").style.display='block';
                    $("#removeButton").show();
                    $("#submitBtn").show();

                }
                $('.date').datepicker({
                    format: 'yyyy-m-d'
                });
                $('.js-example-basic-single').select2();
            });

            $("#removeButton").click(function () {


                if (counter == '1') {
                    alert("Atleast one section is needed!!");
                    return false;
                }
                counter--;
                if (counter < 2) {
                    $("#removeButton").hide();
                    $("#submitBtn").hide();
                }
                $("#TextBoxDiv" + counter).remove();
            });


        });

        function validationError(errorMsg) {

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


        function changeResult(x) {
            // alert($(x).val());
            var value = $(x).val();
            var id = $(x).data('panel-id');
            var id2 = id - 1;

            if (value == 4) {
                $('#otherField' + id).html(' <div class="form-group col-md-12">\n' +
                    '                                    <label for="inputPassword4">Grade</label>\n' +
                    '                                    <input type="text" class="form-control" name="grade[' + id2 + ']"  placeholder="">\n' +
                    '                                </div>');
            } else {
                $('#otherField' + id).html('');
            }

        }

    </script>



@endsection
