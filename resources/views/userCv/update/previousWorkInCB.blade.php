@extends('main')

@section('content')

    <div class="row ">

        <div class="col-12 ">
            <div class="card updateCard">
                <div style="background-color: #F1F1F1" class="card-body">

                    <div class="col-md-3">

                        <div class="sidenav">
                            <a href="{{route('candidate.cvPersonalInfo')}}">Personal Details</a>
                            <a href="{{route('candidate.cvQuesObj')}}">Career Objective and Application Information</a>
                            <a href="{{route('candidate.cvEducation')}}">Education</a>
                            <a href="{{route('candidate.language.index')}}" >Language</a>
                            <a href="{{route('candidate.computerSkill.index')}}" >Computer-Skill</a>
                            {{--<a href="{{route('candidate.skill.index')}}" >Other Skill Information</a>--}}
                            <a href="{{route('cv.OthersInfo')}}" >Other Information</a>
                            <a href="{{route('candidate.cvTrainingCertificate')}}">Training Certification</a>
                            <a href="{{route('candidate.cvProfessionalCertificate')}}">Professional Certification</a>
                            <a  href="{{route('JobExperience.index')}}">Job Experience</a>
                            <a class="activeNav" href="{{route('candidate.previousWorkInCB.index')}}">Previous work information in Caritas Bangladesh</a>
                            <a  href="{{route('candidate.membershipInSocialNetwork.index')}}">Certification of membership in professional network/ forum</a>
                            <a  href="{{route('refree.index')}}">Referee</a>
                            <a  href="{{route('relativeInCaritas.getRelationInfo')}}">Relatives working in Caritas Bangladesh</a>
                        </div>

                    </div>

                    <div class="col-md-9" id="regForm" >


                        <div id="" class="tab">

                            <h2 style="margin-bottom: 30px;">Previous work information in Caritas Bangladesh</h2>
                            @php($tempHr=0)
                            @foreach($previousWorkInCB as $previousWorkInCB)
                                @if($tempHr>0)
                                    <div class="col-md-12"><hr style="border-top:1px dotted #000;"></div>
                                @endif
                                <div id="edit{{$previousWorkInCB->id}}">
                                    <div class="row">
                                        <div class="form-group col-md-10">

                                            <label for="inputEmail4">Designation :</label>
                                            {{$previousWorkInCB->designation}}
                                        </div>

                                        <div class="form-group col-md-2 ">
                                            <button type="button" class="btn btn-info btn-sm " onclick="editInfo({{$previousWorkInCB->id}})"><i class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-danger btn-sm " onclick="deletePreViousWork({{$previousWorkInCB->id}})"><i class="fa fa-trash"></i></button>

                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Start date</label>
                                            {{$previousWorkInCB->startDate}}
                                        </div>
                                        <div class="col-md-6">
                                            <label>End date</label>
                                            @if($previousWorkInCB->currentlyRunning=='0')
                                                {{$previousWorkInCB->endDate}}
                                            @else
                                                Running
                                            @endif


                                        </div>
                                    </div>

                                    @php($tempHr++)


                                </div>
                            @endforeach
                        </div>
                        <form onsubmit="return chkPreviousWork()"action="{{route('candidate.previousWorkInCB.insert')}}" method="post">
                            <!-- One "tab" for each step in the form: -->
                            <input type="hidden" required name="hasWorkedInCB" value="1">&nbsp;
                            {{csrf_field()}}

                            <div id="TextBoxesGroup">


                            </div>


                            <button type="button" id="addButton" class="btn btn-success">Add more</button>
                            <button type="button" id="removeButton" class="btn btn-success" >Remove</button>



                            <div style="overflow:auto;">
                                <div style="float:right;">
                                    <a href="{{route('JobExperience.index')}}"><button type="button" id="btnPevious" >Back</button></a>
                                    <button type="submit" id="submitBtn">Save</button>
                                    <a href="{{route('candidate.membershipInSocialNetwork.index')}}"><button type="button" id="nextBtn" >Next</button></a>
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
        var currentTab = 0; // Current tab is set to be the first tab (0)
        fixStepIndicator(currentTab); // Display the crurrent tab

        function editInfo(x) {

            $.ajax({
                type: 'POST',
                url: "{!! route('candidate.previousWorkInCB.edit') !!}",
                cache: false,
                data: {_token: "{{csrf_token()}}",'id': x},
                success: function (data) {

                    $('#edit'+x).html(data);
                    $("#addButton").hide();


                }
            });
        }
        function deletePreViousWork(x) {


            $.confirm({
                title: 'Delete!',
                content: 'Are you sure ?',
                buttons: {
                    confirm: function () {
                        $.ajax({
                            type: 'POST',
                            url: "{!! route('candidate.previousWorkInCB.delete') !!}",
                            cache: false,
                            data: {_token: "{{csrf_token()}}",'id': x},
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
//            $('#end').datepicker({
//                format: 'yyyy-m-d'
//            });
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
                    var degisnation=$('#degisnation'+(counter-1)).val();
                    var start=$('#start'+(counter-1)).val();
                    var end=$('#end'+(counter-1)).val();


                    if(degisnation==""){

                        var errorMsg='Please type designation first!!'
                        validationError(errorMsg)
                        return false;

                    }
                    if (degisnation.length > 255){

                        var errorMsg='Designation should not more than 255 charecter length!!';
                        validationError(errorMsg);
                        return false;

                    }
                    if(start==""){

                        var errorMsg='Please select a start date first!!';
                        validationError(errorMsg);
                        return false;

                    }
                    if(end != "") {


                        if (Date.parse(end) < Date.parse(start)) {

                            var errorMsg = 'End date should after start date!!';
                            validationError(errorMsg);
                            return false;

                        }
                    }else {
                        if ($("#currentlyRunning"+(counter-1)).prop('checked') != true){

                            var errorMsg = 'Either end date or currently running should be selected!!';
                            validationError(errorMsg);
                            return false;

                        }
                    }

                }




                var newTextBoxDiv = $(document.createElement('div'))
                    .attr("id", 'TextBoxDiv' + counter).attr("class", 'row');
                newTextBoxDiv.after().html(
                    '<div class="form-group"><hr style="border-top:1px dotted #000;"></div>' +
//                    '<div class="row"> ' +
                    '<div class="form-group col-md-12"> ' +
                    '<label for="inputEmail4">Designation</label> ' +
                    '<input type="text" class="form-control" name="degisnation[]" id="degisnation'+counter+'" placeholder="designation" > ' +
                    '</div> ' +
                    '<div class="form-group col-md-6"> ' +
                    '<label for="inputPassword4">Start date</label> ' +
                    '<input type="text" class="form-control date" name="startDate[]" id="start'+counter+'" placeholder="date"> ' +
                    '</div> ' +
                    '<div class="form-group col-md-6"> ' +
                    '<label for="inputPassword4">End date</label> ' +
                    '/ <input type="checkbox"  class="col-md-2" id="currentlyRunning'+counter+'" name="currentlyRunning[]" value="1">Running'+
                    '<input type="text" class="form-control date" name="endDate[]" id="end'+counter+'" placeholder="date"> ' +

//                    '</div> ' +
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
                $('.date').keydown(false);
            });

            $("#removeButton").click(function () {


                if(counter=='1'){
                    alert("Atleast one course section is needed!!");
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

        function chkPreviousWork() {






                var degisnation=document.getElementsByName('degisnation[]');
                var startDate=document.getElementsByName('startDate[]');

                var currentlyRunning=document.getElementsByName('currentlyRunning[]');


                var endDate=document.getElementsByName('endDate[]');


                for (i=0;i<degisnation.length;i++){

                    if(degisnation[i].value==""){

                        var errorMsg='Please type a designation first!!';
                        validationError(errorMsg);
                        return false;
                    }

                    if(startDate[i].value==""){

                        var errorMsg='Please type start date first!!';
                        validationError(errorMsg);
                        return false;
                    }

                    if ($("input[name=currentlyRunning]:checked").val()!=1){

                        if(endDate[i].value!=""){

                            if(Date.parse(startDate[i].value) > Date.parse(endDate[i].value)){

                                var errorMsg='startDate must be less then endDate';
                                validationError(errorMsg);
                                return false;
                            }

                        }

                    }


                }




        }

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
