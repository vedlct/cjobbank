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
            <div class="card updateCardclass="incomplete" ">
                <div style="background-color: #F1F1F1" class="card-body">

                    <div class="col-md-3">

                        <div class="sidenav">
                            <a href="{{route('candidate.cvPersonalInfo')}}">Personal details</a>
                            <a href="{{route('candidate.cvQuesObj')}}">Career objective and application information</a>
                            <a href="{{route('candidate.cvEducation')}}">Education</a>
                            <a href="{{route('candidate.language.index')}}" class="activeNav">Language</a>
                            <a onclick="return false;" class="incomplete" href="{{route('candidate.computerSkill.index')}}">Computer-skill</a>
                            {{--<a onclick="return false;" class="incomplete" href="{{route('candidate.skill.index')}}">Other Skill Information</a>--}}
                            <a onclick="return false;" class="incomplete" href="{{route('cv.OthersInfo')}}">Other information</a>
                            <a onclick="return false;" class="incomplete" href="{{route('candidate.cvTrainingCertificate')}}">Training certification</a>
                            <a onclick="return false;" class="incomplete" href="{{route('candidate.cvProfessionalCertificate')}}">Professional certification</a>
                            <a onclick="return false;" class="incomplete" href="{{route('JobExperience.index')}}">Job experience</a>
                            <a onclick="return false;" class="incomplete" href="{{route('candidate.previousWorkInCB.index')}}">Previous work information in Caritas Bangladesh</a>
                            <a onclick="return false;" class="incomplete" href="{{route('candidate.membershipInSocialNetwork.index')}}">Certification of membership in professional network/ forum</a>
                            <a onclick="return false;" class="incomplete" href="{{route('refree.index')}}">Referee</a>
                            <a onclick="return false;" class="incomplete" href="{{route('relativeInCaritas.getRelationInfo')}}">Relatives working in Caritas Bangladesh</a>
                        </div>

                    </div>

                    <form class="col-md-9" id="regForm" name="skillForm" action="{{route('candidate.language.insert')}}"  method="post">
                        <!-- One "tab" for each step in the form: -->
                        {{csrf_field()}}

                        <div id="" class="tab">

                            <h2 style="margin-bottom: 30px; text-align: center">Language</h2>



                            <div style="display: block" id="otherSkillDiv">
                                <div id="TextBoxesGroup">

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Language<span style="color: red">*</span></label>
                                            <select name="languagehead[]" onchange="checkUnique(this)" class="form-control" id="skill" required>
                                                <option selected value="">Select language </option>


                                                @foreach($languagehead as $languageheads)

                                                    <option value="{{$languageheads->id}}">{{$languageheads->languagename}}</option>
                                                @endforeach
                                            </select>

                                        </div>

                                        @foreach($languageskill as $ls)
                                            <div class="col-sm-12 row">

                                                <div class="form-group col-md-4" style="margin-top: 20px">
                                                    <label>{{$ls->languageSkillName}}</label>

                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Percentage of skill (out of 100)</label>
                                                    <div class="slidecontainer">
                                                        <input type="range" min="0" max="100" value="0" class="slider" onchange="myRangeChanged2('{{$ls->id}}')" name="languageskill[]" id="myRange<?php echo $ls->id?>" >
                                                        <p>Value: <span id="demo<?php echo $ls->id?>"></span> %</p>
                                                        <input type="hidden" id="skillPercentage<?php echo $ls->id?>" name="langskillid" value="{{$ls->id}}" class="form-control"  />
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach


                                    </div>


                                </div>

                                <button type="button" id="addButton" class="btn btn-success">Add more</button>
                                <button type="button" id="removeButton" class="btn btn-success" >Remove</button>

                            </div>
                        </div>

                        <div style="overflow:auto;">
                            <div style="float:right;">
                                <a href="{{route('candidate.cvEducation')}}"><button type="button" id="btnPevious" >Back</button></a>
                                <button type="submit" id="submitBtn">Save</button>
{{--                                <a href="{{route('candidate.computerSkill.index')}}"><button type="button" id="nextBtn" >Next</button></a>--}}

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
        // var slider = document.getElementById("myRange");
        // var output = document.getElementById("demo");
        // output.innerHTML = slider.value;
        //
        // slider.oninput = function() {
        //     output.innerHTML = this.value;
        //     $("#skillPercentage").val(this.value);
        // }
        // function myRangeChanged(x){
        //
        //     var slider = document.getElementById("myRange"+x);
        //     var output = document.getElementById("demo"+x);
        //     output.innerHTML = slider.value;
        //
        //     slider.oninput = function() {
        //         output.innerHTML = this.value;
        //         $("#skillPercentage"+x).val(this.value);
        //     }
        //
        // }
        $("input[name=hasOtherSkill]").click( function () {
            if ($(this).val()=='1'){
                $('#otherSkillDiv').show();
            }else {
                $('#otherSkillDiv').hide();
            }
        });
        function  checkUnique(x) {
            var values =  $('select[name="languagehead[]"]').map(function () {
                return this.value; // $(this).val()
            }).get();
            var unique = values.filter(function(itm, i, values) {
                return i == values.indexOf(itm);
            });
            if(values.length != unique.length){
                alert("Already Inserted");
                $(x).val('');
            }
            // alert($(x).val());
        }
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
    </script>



    <script type="text/javascript">
        var newArray = [];
        $(document).ready(function(){
            var counter = 1;
            var limit = '<?php echo count($languagehead)?>';
            $("#removeButton").hide();
            $("#addButton").click(function () {
                if(counter == 1)
                {
                    var id=document.getElementById("skill").value;
                    if(id==""){alert("Please select a language first!!");
                        return false;
                    }
                }
                else{
                    var id=$('#skill'+(counter-1)).val();
                    if(id=="") {
                        alert("Please select a language first!!");
                        return false;
                    }
                }
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
                    '<label for="inputEmail4">Language<span style="color: red">*</span></label> ' +
                    '<select required name="languagehead[]" onchange="checkUnique(this)" class="form-control" id="skill'+counter+'"> ' +
                    '<option selected value="">Select language</option>'+
                    '@foreach($languagehead as $languageheads)'+
                    '<option value="{{$languageheads->id}}">{{$languageheads->languagename}}</option>'+
                    '@endforeach'+
                    '</select> ' +
                    '</div>'+
                    '@foreach($languageskill as $ls)'+
                    '<div class="col-sm-12 row">'+
                    '<div class="form-group col-md-4" style="margin-top: 20px">'+
                    '<label>{{$ls->languageSkillName}}</label>'+
                    '</div>'+
                    '<div class="form-group col-md-6">'+
                    '<label>Percentage of skill (out of 100)</label>'+
                    '<div class="slidecontainer">'+
                    '<input type="range" min="0" max="100" value="0" class="slider" onchange="myRangeChanged3('+'{{$ls->id}},'+counter+')" name="languageskill[]" id="myRange1'+'<?php echo $ls->id?>'+counter+'" >'+
                    '<p>Value: <span id="demo1'+'<?php echo $ls->id?>'+counter+'"></span> %</p>'+
                    '<input type="hidden" id="skillPercentage'+'<?php echo $ls->id?>'+counter+'" name="langskillid" value="{{$ls->id}}" class="form-control"  />'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                    '@endforeach'
                );
                newTextBoxDiv.appendTo("#TextBoxesGroup");
                if(counter == (limit-1)){
                    //alert("There are no more language!!");
                    $("#addButton").hide();
                    // return false;
                }
                counter++;
                if(counter>1){
                    $("#removeButton").show();
                }
            });
            $("#removeButton").click(function () {
                if(counter==1){
                    var id=document.getElementById("skill").value;
                    alert("Atleast one language is needed!!");
                    document.getElementById("skill").selectedIndex= 0;
                    return false;
                }
                else{
                    var id=document.getElementById("skill"+(counter-1)).value;
                }
                var index = newArray.indexOf(id);
                newArray.splice(index, 1);
//                if(counter=='1'){
//                    alert("Atleast One Language is needed!!");
//                    return false;
//                }
                counter--;
                if(counter<2){
                    $("#removeButton").hide();
                    $("#addButton").show();
                }
                $("#TextBoxDiv" + counter).remove();
            });
        });

        function myRangeChanged2(x){
            var slider = document.getElementById("myRange"+x);
            var output = document.getElementById("demo"+x);
            output.innerHTML = slider.value;
            slider.oninput = function() {
                output.innerHTML = this.value;
                $("#skillPercentage"+x).val(this.value);
            }
        }

        function myRangeChanged3(x,y){
            var slider = document.getElementById("myRange1"+x+y);
            var output = document.getElementById("demo1"+x+y);
            output.innerHTML = slider.value;
            slider.oninput = function() {
                output.innerHTML = this.value;
                $("#skillPercentage"+x+y).val(this.value);
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