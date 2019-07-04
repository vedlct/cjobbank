@extends('main')

@section('content')
    <style>
        .slidecontainer {
            width: 100%;
        }

        .slider {
            -webkit-appearance: none;
            width: 100%;
            height: 15px;
            border-radius: 5px;
            /*background: #d3d3d3;*/
            outline: none;
            opacity: 0.7;
            -webkit-transition: .2s;
            transition: opacity .2s;
        }

        .slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background: #4CAF50;
            cursor: pointer;
        }

        .slider::-moz-range-thumb {
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background: #4CAF50;
            cursor: pointer;
        }

    </style>

    <div class="row ">

        <div class="col-12 ">
            <div class="card updateCard">
                <div style="background-color: #F1F1F1" class="card-body">

                    <div class="col-md-3">

                        <div class="sidenav">
                            <a href="{{route('candidate.cvPersonalInfo')}}">Personal details</a>
                            <a href="{{route('candidate.cvQuesObj')}}">Career objective and application information</a>
                            <a href="{{route('candidate.cvEducation')}}">Education</a>
                            <a href="{{route('candidate.language.index')}}" >Language</a>
                            <a href="{{route('candidate.computerSkill.index')}}" >Computer-skill</a>
                            <a href="{{route('candidate.skill.index')}}" class="activeNav">Other skill information</a>
                            <a <?php if ($hasOtherSkill!='0'){?> onclick="return false;" class="incomplete"<?php } ?> href="{{route('cv.OthersInfo')}}">Other information</a>
                            <a onclick="return false;" class="incomplete" href="{{route('candidate.cvTrainingCertificate')}}">Training certification</a>
                            <a onclick="return false;" class="incomplete" href="{{route('candidate.cvProfessionalCertificate')}}">Professional certification</a>
                            <a onclick="return false;" class="incomplete" href="{{route('JobExperience.index')}}">Job experience</a>
                            <a onclick="return false;" class="incomplete" href="{{route('candidate.previousWorkInCB.index')}}">Previous work information in Caritas Bangladesh</a>
                            <a onclick="return false;" class="incomplete" href="{{route('candidate.membershipInSocialNetwork.index')}}">Certification of membership in professional network/ forum</a>
                            <a onclick="return false;" class="incomplete" href="{{route('refree.index')}}">Referee</a>
                            <a onclick="return false;" class="incomplete" href="{{route('relativeInCaritas.getRelationInfo')}}">Relatives working in Caritas Bangladesh</a>
                        </div>

                    </div>





                    <form class="col-md-9" id="regForm" onsubmit="return chkOtherSkill()"  action="{{route('candidate.skill.insert')}}"  method="post">
                        <!-- One "tab" for each step in the form: -->
                        {{csrf_field()}}

                        <div id="" class="tab">

                            <h2 style="margin-bottom: 30px; text-align: center">Other skill information</h2>

                            <div class="row">
                                <div class="form-group">
                                    <label class="control-label">Do you have  other skills?<span style="color: red" class="required">*</span>:</label>
                                    <div class="col-md-10 mb-3">
                                        <input class="form-check-input" type="radio" required <?php if ($hasOtherSkill=='1'){?>checked<?php } ?> name="hasOtherSkill" value="1"> Yes&nbsp;&nbsp;
                                    </div>
                                    <div class="col-md-10">
                                        <input class="form-check-input" type="radio" required <?php if ($hasOtherSkill=='0'){?>checked<?php } ?> name="hasOtherSkill" value="0"> No&nbsp;&nbsp;
                                    </div>
                                </div>
                            </div>

                            <div style="display: none" id="otherSkillDiv">
                            <div id="TextBoxesGroup">

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Skill<span style="color: red">*</span></label>
                                        <select name="skill[]" class="form-control" id="skill" onchange="checkUnique(this)">
                                            <option selected value="">Select skill type</option>
                                            @foreach($skills as $skill)
                                                <option value="{{$skill->id}}">{{$skill->skillName}}</option>
                                            @endforeach
                                            <option value="{{OTHERS}}" >{{OTHERS}}</option>
                                        </select>

                                    </div>
                                    <div style="display: none" id="otherSkillNameDiv" class="form-group col-md-6">
                                        <label for="">Other skill name</label>
                                        <input type="text" maxlength="255" name="otherSkillName[]" class="form-control" id="otherSkillName"  placeholder="Other skill name">

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Percentage of skill (out of 100)</label>
                                        <div class="slidecontainer">
                                            <input type="range" min="1" max="100" value="0" class="slider" name="skillPercentage[]" id="myRange" >
                                            <p>Value: <span id="demo"></span> %</p>
                                            {{--<input type="hidden" id="skillPercentage"  class="form-control"  />--}}
                                        </div>
                                    </div>

                                </div>


                            </div>

                            <button type="button" id="addButton" class="btn btn-success">Add more</button>
                            <button type="button" id="removeButton" class="btn btn-success" >Remove</button>

                        </div>
                        </div>

                        <div style="overflow:auto;">
                            <div style="float:right;">
                                <a href="{{route('candidate.computerSkill.index')}}"><button type="button" id="btnPevious" >Back</button></a>
                                <button type="submit" id="submitBtn">Save</button>
                                @if($hasOtherSkill == 0 || $hasOtherSkill == 1)
                                <a href="{{route('cv.OthersInfo')}}"><button type="button" id="nextBtn" >Next</button></a>
                                @endif

                            </div>
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

                    </form>

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
        var slider = document.getElementById("myRange");
        var output = document.getElementById("demo");
        output.innerHTML = slider.value;

        slider.oninput = function() {
            output.innerHTML = this.value;
            $("#skillPercentage").val(this.value);
        }

        function myRangeChanged(x){

            var slider = document.getElementById("myRange"+x);
            var output = document.getElementById("demo"+x);
            output.innerHTML = slider.value;

            slider.oninput = function() {
                output.innerHTML = this.value;
                $("#skillPercentage"+x).val(this.value);
            }

        }

        function  checkUnique(x) {


            var values =  $('select[name="skill[]"]').map(function () {
                return this.value; // $(this).val()
            }).get();

            for( var i = values.length-1; i--;){
                if ( values[i] === '{{OTHERS}}') values.splice(i, 1);
            }


            var unique = values.filter(function(itm, i, values) {

                    return i == values.indexOf(itm);


            });

            if(values.length != unique.length){

                alert("Already inserted");
                $(x).val('');

            }

            // alert($(x).val());

        }

        $("input[name=hasOtherSkill]").click( function () {

            if ($(this).val()=='1'){
                $('#otherSkillDiv').show();
                $("#submitBtn").show();
            }else {
                $('#otherSkillDiv').hide();
            }
        });

        $(document).ready(function(){
            if ('<?php echo $hasOtherSkill?>'== '0'){

                $('#otherSkillDiv').hide();
                $("#submitBtn").hide();

            }else if ('<?php echo $hasOtherSkill?>'== '1'){
                $('#otherSkillDiv').show();


            }
        });



    </script>
    <script>
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
            x[(n+4)].className += " active";
        }

        function chkOtherSkill(){

            if ($("input[name=hasOtherSkill]:checked").val()=="1") {

                var skill=document.getElementsByName('skill[]');
                var skillPercentage=document.getElementsByName('skillPercentage[]');


                for (i=0;i<skill.length;i++){

                    if(skill[i].value==""){

                        var errorMsg='Please select a skill first!!';
                        validationError(errorMsg);
                        return false;
                    }

                    if(skillPercentage[i].value==""){

                        var errorMsg='Please type skill percentage first!!';
                        validationError(errorMsg);
                        return false;
                    }


                }


            }
            else {
                return true;

            }
        }

    </script>



    <script type="text/javascript">


        $(document).ready(function(){

            var counter = 1;
            $("#removeButton").hide();


            $("#addButton").click(function () {

                if (counter == 1 ) {

                    var skill = $('#skill').val();
                    var myRange = $('#myRange').val();


                    if (skill == "") {

                        var errorMsg = 'Please select a skill first!!';
                        validationError(errorMsg);
                        return false;
                    }
                    if (myRange == "") {

                        var errorMsg = 'Please select skill level first!!';
                        validationError(errorMsg);
                        return false;
                    }
                }else {

                    var skill = $('#skill'+counter).val();
                    var myRange = $('#myRange'+counter).val();


                    if (skill == "") {

                        var errorMsg = 'Please select a skill first!!';
                        validationError(errorMsg);
                        return false;
                    }
                    if (myRange == "") {

                        var errorMsg = 'Please select skill level first!!';
                        validationError(errorMsg);
                        return false;
                    }

                }



                var newTextBoxDiv = $(document.createElement('div'))
                    .attr("id", 'TextBoxDiv' + counter).attr("class", 'row');
                newTextBoxDiv.after().html(
                    '<div class="col-md-12"><hr style="border-top:1px dotted #000;"></div>' +
                    '<div class="form-group col-md-6"> ' +
                    '<label for="inputEmail4">Skill<span style="color: red">*</span></label> ' +
                    '<select required name="skill[]" onchange="checkUnique(this);skillchange('+counter+')"   class="form-control" id="skill'+counter+'"> ' +
                    '<option selected value="">Select skill type</option>'+
                '@foreach($skills as $skill)'+
                '<option value="{{$skill->id}}">{{$skill->skillName}}</option>'+
                 '@endforeach'+
                    '<option value="{{OTHERS}}" >{{OTHERS}}</option>'+
                    '</select>' +
                    '</div>' +
                        '<div style="display: none" id="otherSkillNameDiv'+counter+'" class="form-group col-md-6">'+
                    '<label for="">Other skill name</label>'+
                '<input type="text" maxlength="255" name="otherSkillName[]" class="form-control" id="otherSkillName'+counter+'"  placeholder="Other skill name">'+

                    '</div>'+
                    '<div class="form-group col-md-6"> ' +
                    '<label>Percentage of skill (out of 100)</label> ' +
                    '<div class="slidecontainer"> ' +
                    '<input type="range" min="1" max="100" onchange="myRangeChanged('+counter+')" value="0" class="slider" name="skillPercentage[]" id="myRange'+counter+'" required> ' +
                    '<p>Value: <span id="demo'+counter+'"></span> %</p> ' +
                    '<input type="hidden" id="skillPercentage'+counter+'" name="" class="form-control" required /> ' +
                    '</div> ' +
                    '</div>'+
                    '</div> ' +
                    '</div>'+
                    '</div>'

                );
                newTextBoxDiv.appendTo("#TextBoxesGroup");

                counter++;
                if(counter>1){
                    $("#removeButton").show();
                }

            });

            $("#removeButton").click(function () {


                if(counter=='1'){
                    alert("Atleast One course section is needed!!");
                    return false;
                }
                counter--;
                if(counter<2){
                    $("#removeButton").hide();
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

        $('#skill').on('change', function() {

            var skill =$('#skill').val();
            if (skill == "{{OTHERS}}"){

                $("#otherSkillNameDiv").show();
            }else {


                $("#otherSkillNameDiv").hide();


            }



        });

        function skillchange(x) {


            var skill =$('#skill'+x).val();
            if (skill == "{{OTHERS}}"){

                $("#otherSkillNameDiv"+x).show();
            }else {


                $("#otherSkillNameDiv"+x).hide();


            }

        }


    </script>



@endsection
