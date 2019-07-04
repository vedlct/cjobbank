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
                            <a href="{{route('cv.OthersInfo')}}">Other information</a>
                            <a href="{{route('candidate.cvTrainingCertificate')}}">Training certification</a>
                            <a  href="{{route('candidate.cvProfessionalCertificate')}}">Professional certification</a>
                            <a  href="{{route('JobExperience.index')}}">Job experience</a>
                            <a  href="{{route('candidate.previousWorkInCB.index')}}">Previous work information in Caritas Bangladesh</a>
                            <a  href="{{route('candidate.membershipInSocialNetwork.index')}}">Certification of membership in professional network/ forum</a>
                            <a  href="{{route('refree.index')}}">Referee</a>
                            <a  href="{{route('relativeInCaritas.getRelationInfo')}}">Relatives working in Caritas Bangladesh</a>
                        </div>

                    </div>

                    <div class="col-md-9" id="regForm" >


                        <div id="" class="tab">

                            <h2 style="margin-bottom: 30px;">Other skill information</h2>

                            @foreach($empSkills as $empSkill)

                                <div id="edit{{$empSkill->id}}">
                                    <div class="row">
                                        <div class="form-group col-md-4">

                                            <label for="inputEmail4">Name of skill :</label>
                                            {{$empSkill->skillName}}
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Percentage of skill (out of 100) :</label>{{$empSkill->ratiing}}

                                            {{--<div class="slidecontainer">--}}
                                                {{--<input type="range" min="1" max="100" value="{{$empSkill->ratiing}}" class="slider" name="skillPercentage[]" id="myRange" required>--}}

                                            {{--</div>--}}


                                        </div>
                                        <div class="form-group col-md-2 ">
                                            <button type="button" class="btn btn-info btn-sm " onclick="editInfo({{$empSkill->id}})"><i class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-danger btn-sm " onclick="deleteSkill({{$empSkill->id}})"><i class="fa fa-trash"></i></button>

                                        </div>

                                    </div>







                                </div>
                            @endforeach
                        </div>
                        <form action="{{route('candidate.skill.insert')}}" method="post">
                            <!-- One "tab" for each step in the form: -->
                            {{csrf_field()}}
                            <input type="hidden" name="hasOtherSkill" value="1">&nbsp;

                            <div id="TextBoxesGroup">


                            </div>


                            <button type="button" id="addButton" class="btn btn-success">Add more</button>
                            <button type="button" id="removeButton" class="btn btn-success" >Remove</button>



                            <div style="overflow:auto;">
                                <div style="float:right;">
                                    <a href="{{route('candidate.computerSkill.index')}}"><button type="button" id="btnPevious" >Back</button></a>
                                    <button type="submit" id="submitBtn">Save</button>
                                    <a href="{{route('cv.OthersInfo')}}"><button type="button" id="nextBtn" >Next</button></a>
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
                url: "{!! route('candidate.skill.edit') !!}",
                cache: false,
                data: {_token: "{{csrf_token()}}",'skillId': x},
                success: function (data) {

                    $('#edit'+x).html(data);
                    $("#addButton").hide();
                    $("#btnPevious").hide();
                    $("#nextBtn").hide();

                }
            });
        }

        function  checkUnique(x) {


            var values =  $('select[name="skill[]"]').map(function (item) {
                return this.value; // $(this).val()

            }).get();


            for( var i = values.length-1; i--;){
                if ( values[i] === '{{OTHERS}}') values.splice(i, 1);
            }

           // alert(unique1);

            var unique = values.filter(function(itm, i, values) {

                return i == values.indexOf(itm);


            });

           // alert(unique);

            if(values.length != unique.length){

                alert("Already Inserted");
                $(x).val('');

            }

            // alert($(x).val());

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
        function deleteSkill(x) {


            $.confirm({
                title: 'Delete!',
                content: 'Are you sure ?',
                buttons: {
                    confirm: function () {
                        $.ajax({
                            type: 'POST',
                            url: "{!! route('candidate.skill.delete') !!}",
                            cache: false,
                            data: {_token: "{{csrf_token()}}",'skillId': x},
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


        $(document).ready(function(){

            var counter = 1;
            $("#removeButton").hide();
            $("#submitBtn").hide();


            $("#addButton").click(function () {
                if(counter>10){
                    alert("Only 10 section allow per time!!");
                    return false;
                }

                if (counter >1)
                {
                    var skill=$('#skill'+(counter-1)).val();
                    var myRange=$('#myRange'+(counter-1)).val();

                    if(skill==""){

                        var errorMsg='Please select a sill name first!!';
                        validationError(errorMsg);
                        return false;
                    }

                    if(myRange==""){

                        var errorMsg='Please select a myRange first!!';
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
                    '<select required name="skill[]" onchange="checkUnique(this);skillchange('+counter+')" class="form-control" id="skill'+counter+'"> ' +
                    '<option selected value="">Select Skill Type</option>'+
                    '@foreach($skills as $skill)'+
                    '<option value="{{$skill->id}}">{{$skill->skillName}}</option>'+
                    '@endforeach'+
                    '<option value="{{OTHERS}}" >{{OTHERS}}</option>'+
                    '</select> ' +
                    '</div>' +
                    '<div style="display: none" id="otherSkillNameDiv'+counter+'" class="form-group col-md-6">'+
                    '<label for="">Other skill name</label>'+
                    '<input type="text" maxlength="255" name="otherSkillName[]" class="form-control" id="otherSkillName'+counter+'"  placeholder="">'+

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
//                    document.getElementById("removeButton").style.display='block';
                    $("#removeButton").show();
                    $("#submitBtn").show();
                }

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

        function skillchange(x) {


            var skill =$('#skill'+x).val();
            if (skill == '{{OTHERS}}'){

                $("#otherSkillNameDiv"+x).show();
            }else {


                $("#otherSkillNameDiv"+x).hide();


            }

        }

    </script>



@endsection
