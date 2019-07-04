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
                            <a href="{{route('candidate.language.index')}}" >Language</a>
                            <a href="{{route('candidate.computerSkill.index')}}" class="activeNav">Computer-skill</a>
                            {{--<a onclick="return false;" class="incomplete" href="{{route('candidate.skill.index')}}">Other Skill Information</a>--}}
                            <a onclick="return false;" class="incomplete" href="{{route('cv.OthersInfo')}}">Other information</a>
                            <a onclick="return false;" class="incomplete" href="{{route('candidate.cvTrainingCertificate')}}">Training certification</a>
                            <a onclick="return false;" class="incomplete" href="{{route('candidate.cvProfessionalCertificate')}}">Professional certification</a>
                            <a onclick="return false;" class="incomplete" href="{{route('JobExperience.index')}}">Job experience</a>
                            <a onclick="return false;" class="incomplete" href="{{route('candidate.previousWorkInCB.index')}}">Previous work information in caritas bangladesh</a>
                            <a onclick="return false;" class="incomplete" href="{{route('candidate.membershipInSocialNetwork.index')}}">Certification of membership in professional network/ forum</a>
                            <a onclick="return false;" class="incomplete" href="{{route('refree.index')}}">Referee</a>
                            <a onclick="return false;" class="incomplete" href="{{route('relativeInCaritas.getRelationInfo')}}">Relatives working in caritas bangladesh</a>
                        </div>

                    </div>

                    <form class="col-md-9" onsubmit=" return chkComputerSkill()" id="regForm" action="{{route('candidate.computerSkill.submit')}}" method="post">
                        <!-- One "tab" for each step in the form: -->
                        {{csrf_field()}}

                        <div id="" class="tab">

                            <h2 style="margin-bottom: 30px;">Computer-skill</h2>


                            <div id="TextBoxesGroup">

                                <div class="row">

                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Skill<span style="color: red">*</span></label>
                                        <select name="computerSkillId[]" id="skill" class="form-control req" onchange="checkUnique(this)" required>
                                            <option value="">Select skill</option>
                                            @foreach($computerSkills as $skill)
                                                <option value="{{$skill->id}}">{{$skill->computerSkillName}}</option>
                                            @endforeach
                                            <option value="{{OTHERS}}" >{{OTHERS}}</option>
                                        </select>
                                    </div>

                                    <div style="display: none" id="computerSkillNameDiv" class="form-group col-md-6">
                                        <label for="">Skill name</label>
                                        <input type="text" maxlength="255" name="computerSkillName[]" class="form-control" id="computerSkillName"  placeholder="skill name">

                                    </div>


                                    <div class="form-group col-md-6">

                                        <label for="inputEmail4">Skill-level<span style="color: red">*</span></label>
                                        <select name="SkillAchievement[]" id="" class="form-control" required>
                                            <option value="">Select level</option>
                                            @foreach(ComputerSkillAchievement as $key=>$value)
                                                <option value="{{$value}}">{{$key}}</option>
                                            @endforeach

                                        </select>

                                    </div>




                                </div>


                            </div>

                            <button type="button" id="addButton" class="btn btn-success">Add more</button>
                            <button type="button" id="removeButton" class="btn btn-success" >Remove</button>

                        </div>

                        <div style="overflow:auto;">
                            <div style="float:right;">
                                <a href="{{route('candidate.language.index')}}"><button type="button" id="btnPevious" >Back</button></a>
                                {{--<a id="btnPevious" class="btn btn-success" href="{{route('JobExperience.index')}}">Back</a>--}}
                                <button type="submit" id="submitBtn">Save</button>

{{--                                <a href="{{route('candidate.previousWorkInCB.index')}}"><button type="button" id="btnNext" >Next</button></a>--}}

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
            x[(n+5)].className += " active";
        }
    </script>



    <script type="text/javascript">
        $(function () {
//            $('.date').datepicker({
//                format: 'yyyy-m-d'
//            });
////            $('#end').datepicker({
//                format: 'yyyy-m-d'
//            });
        });

        $('#skill').on('change', function() {

            var skill =$('#skill').val();
            if (skill == "{{OTHERS}}"){

                $("#computerSkillNameDiv").show();
              //  $("#computerSkillName").attr("required", "true");
            }else {


                $("#computerSkillNameDiv").hide();
               // $("#computerSkillName").attr("required", "false");


            }



        });
        function skillchange(x) {


            var skill =$('#skill'+x).val();
            if (skill == "{{OTHERS}}"){

                $("#computerSkillNameDiv"+x).show();
              //  $("#computerSkillName"+x).attr("required", "true");
            }else {


                $("#computerSkillNameDiv"+x).hide();
              //  $("#computerSkillName"+x).attr("required", "false");


            }

        }

        function  checkUnique(x) {


            var values =  $('select[name="computerSkillId[]"]').map(function () {
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

        function chkComputerSkill() {


                var computerSkillId=document.getElementsByName('computerSkillId[]');
                var SkillAchievement=document.getElementsByName('SkillAchievement[]');

                var computerSkillName=document.getElementsByName('computerSkillName[]');


                for (i=0;i<computerSkillId.length;i++){

                    if(computerSkillId[i].value==""){

                        var errorMsg='Please select a computer skill first!!';
                        validationError(errorMsg);
                        return false;
                    }

                    if(SkillAchievement[i].value==""){

                        var errorMsg='Please type skill achievement first!!';
                        validationError(errorMsg);
                        return false;
                    }

                    if(computerSkillId[i].value=='{{OTHERS}}' && computerSkillName[i].value==""){

                        var errorMsg='Please type computer skill name!!';
                        validationError(errorMsg);
                        return false;
                    }


                }





        }

        $(document).ready(function(){


            var counter = 1;
            $("#removeButton").hide();


            $("#addButton").click(function () {
                if(counter>10){
                    alert("Only 10 section allow per Time!!");
                    return false;
                }
                $("#btnPevious").hide();




                var newTextBoxDiv = $(document.createElement('div'))
                    .attr("id", 'TextBoxDiv' + counter).attr("class", 'row');
                newTextBoxDiv.after().html(

                    '                                    <div class="form-group col-md-6">\n' +
                    '                                        <label for="inputEmail4">Skill<span style="color: red">*</span></label>\n' +
                    '                                        <select name="computerSkillId[]" id="skill'+counter+'" class="form-control" onchange="checkUnique(this);skillchange('+counter+')" required>\n' +
                    '                                            <option value="">Select skill</option>\n' +
                    '                                            @foreach($computerSkills as $skill)\n' +
                    '                                                <option value="{{$skill->id}}">{{$skill->computerSkillName}}</option>\n' +
                    '                                            @endforeach\n' +
                    '<option value="{{OTHERS}}" >{{OTHERS}}</option>'+
                    '                                        </select>\n' +
                    '                                    </div>\n' +
                    '<div style="display: none" id="computerSkillNameDiv'+counter+'" class="form-group col-md-6">'+
                    '<label for="">Skill name</label>'+
                    '<input type="text" maxlength="255" name="computerSkillName[]" class="form-control" id="computerSkillName'+counter+'"  placeholder="skill name">'+

                    '</div>'+
                    '\n' +
                    '\n' +
                    '                                    <div class="form-group col-md-6">\n' +
                    '\n' +
                    '                                        <label for="inputEmail4">Skill-level<span style="color: red">*</span></label>\n' +
                    '                                        <select name="SkillAchievement[]" id="" class="form-control" required>\n' +
                    '                                            <option value="">Select level</option>\n' +
                    '                                            @foreach(ComputerSkillAchievement as $key=>$value)\n' +
                    '                                                <option value="{{$value}}">{{$key}}</option>\n' +
                    '                                            @endforeach\n' +
                    '\n' +
                    '                                        </select>\n' +
                    '\n' +
                    '                                    </div>\n'
                );
                newTextBoxDiv.appendTo("#TextBoxesGroup");

                counter++;
                if(counter>1){
//                    document.getElementById("removeButton").style.display='block';
                    $("#removeButton").show();
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
