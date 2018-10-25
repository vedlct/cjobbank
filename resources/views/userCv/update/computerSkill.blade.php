@extends('main')

@section('content')

    <div class="row ">

        <div class="col-12 ">
            <div class="card">
                <div style="background-color: #F1F1F1" class="card-body">

                    <form id="regForm" action="{{route('candidate.computerSkill.submit')}}" method="post">
                        <!-- One "tab" for each step in the form: -->
                        {{csrf_field()}}

                        <div id="" class="tab">

                            <h2 style="margin-bottom: 30px;">Computer-Skill</h2>

                            @foreach($empComputerSkills as $skills)
                                <div class="row">
                                    <div class="form-group col-md-5">
                                        <label for="inputEmail4">Skill<span style="color: red">*</span></label>
                                        <select name="computerSkillId" id="" class="form-control" required>
                                            <option value="">Select Skill</option>
                                            @foreach($computerSkills as $skill)
                                                <option value="{{$skill->id}}" @if($skill->id==$skills->computerSkillId) selected @endif>{{$skill->computerSkillName}}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="form-group col-md-5">

                                        <label for="inputEmail4">Skill-Level<span style="color: red">*</span></label>
                                        <select name="SkillAchievement[]" id="" class="form-control" required>
                                            <option value="">Select Level</option>
                                            @foreach(ComputerSkillAchievement as $key=>$value)
                                                <option value="{{$value}}" @if($value==$skills->SkillAchievement) selected @endif>{{$key}}</option>
                                            @endforeach

                                        </select>

                                    </div>
                                    <div class="form-group col-md-2">

                                        <button class="btn btn-info btn-sm"><i class="fa fa-edit"></i></button>

                                    </div>



                                </div>

                            @endforeach

                            <div id="TextBoxesGroup">

                                <div class="row">

                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Skill<span style="color: red">*</span></label>
                                        <select name="computerSkillId[]" id="" class="form-control" required>
                                            <option value="">Select Skill</option>
                                            @foreach($computerSkills as $skill)
                                                <option value="{{$skill->id}}">{{$skill->computerSkillName}}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="form-group col-md-6">

                                        <label for="inputEmail4">Skill-Level<span style="color: red">*</span></label>
                                        <select name="SkillAchievement[]" id="" class="form-control" required>
                                            <option value="">Select Level</option>
                                            @foreach(ComputerSkillAchievement as $key=>$value)
                                                <option value="{{$value}}">{{$key}}</option>
                                            @endforeach

                                        </select>

                                    </div>




                                </div>


                            </div>

                            <button type="button" id="addButton" class="btn btn-success">Add More</button>
                            <button type="button" id="removeButton" class="btn btn-success" >remove</button>

                        </div>

                        <div style="overflow:auto;">
                            <div style="float:right;">
                                <a href="{{route('JobExperience.index')}}"><button type="button" id="btnPevious" >Back</button></a>
                                {{--<a id="btnPevious" class="btn btn-success" href="{{route('JobExperience.index')}}">Back</a>--}}
                                <button type="submit" id="submitBtn">Save</button>

                                <a href="{{route('candidate.previousWorkInCB.index')}}"><button type="button" id="btnNext" >Next</button></a>

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

        $(document).ready(function(){

            var counter = 1;
            $("#removeButton").hide();


            $("#addButton").click(function () {
                if(counter>10){
                    alert("Only 10 Section allow per Time!!");
                    return false;
                }
                $("#btnPevious").hide();




                var newTextBoxDiv = $(document.createElement('div'))
                    .attr("id", 'TextBoxDiv' + counter).attr("class", 'row');
                newTextBoxDiv.after().html(

                    '                                    <div class="form-group col-md-6">\n' +
                    '                                        <label for="inputEmail4">Skill<span style="color: red">*</span></label>\n' +
                    '                                        <select name="computerSkillId[]" id="" class="form-control" required>\n' +
                    '                                            <option value="">Select Skill</option>\n' +
                    '                                            @foreach($computerSkills as $skill)\n' +
                    '                                                <option value="{{$skill->id}}">{{$skill->computerSkillName}}</option>\n' +
                    '                                            @endforeach\n' +
                    '                                        </select>\n' +
                    '                                    </div>\n' +
                    '\n' +
                    '\n' +
                    '                                    <div class="form-group col-md-6">\n' +
                    '\n' +
                    '                                        <label for="inputEmail4">Skill-Level<span style="color: red">*</span></label>\n' +
                    '                                        <select name="SkillAchievement[]" id="" class="form-control" required>\n' +
                    '                                            <option value="">Select Level</option>\n' +
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
                    alert("Atleast One Course Section is needed!!");
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
