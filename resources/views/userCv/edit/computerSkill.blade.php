<form action="{{route('candidate.computerSkill.update')}}" onsubmit="return chkComputerSkill1()" method="post">
    <!-- One "tab" for each step in the form: -->
    <input type="hidden" name="id" value="{{$computerSkill->id}}">
    {{csrf_field()}}

            <div class="row">

                <div class="form-group col-md-6">
                    <label for="inputEmail4">Skill<span style="color: red">*</span></label>
                    <?php $skillId= array();
                    $skillTitle=array();?>
                    <select name="computerSkillId" id="skill1" class="form-control" required>
                        <option value="">Select skill</option>
                        @foreach($allComputerSkills as $skill)
                            <option @if($skill->id==$computerSkill->computerSkillId)selected @endif value="{{$skill->id}}">{{$skill->computerSkillName}}</option>

                            {{--@php--}}
                            {{--array_push($skillId,$skill->id);--}}
                            {{--array_push($skillTitle,$skill->computerSkillName );--}}
                            {{--@endphp--}}
                        @endforeach
                        <option value="{{OTHERS}}" >{{OTHERS}}</option>
                    </select>
                </div>

                <div style="display: none" id="computerSkillNameDiv" class="form-group col-md-6">
                    <label for="">Skill name</label>
                    <input type="text" maxlength="255" name="computerSkillName" class="form-control" id="computerSkillName1"  placeholder="skill name">

                </div>


                <div class="form-group col-md-6">

                    <label for="inputEmail4">Skill-level<span style="color: red">*</span></label>
                    <select name="SkillAchievement" id="SkillAchievement1" class="form-control" required>
                        <option value="">Select level</option>
                        @foreach(ComputerSkillAchievement as $key=>$value)
                            <option @if($computerSkill->SkillAchievement== $value) selected @endif value="{{$value}}">{{$key}}</option>
                        @endforeach

                    </select>

                </div>

            </div>

    <div style="overflow:auto;">
        <div style="float:right;">
            <a class="pull-right" href="{{route('candidate.computerSkill.index')}}"><button type="button" class="btn btn-danger" >Cancel</button></a>
            {{--<a id="btnPevious" class="btn btn-success" href="{{route('JobExperience.index')}}">Back</a>--}}
            <button type="submit" class="mr-2 btn btn-success" id="submitBtn">Save</button>



        </div>
    </div>



</form>

<script>
    $('#skill1').on('change', function() {

        var skill =$('#skill1').val();
        if (skill == "{{OTHERS}}"){

            $("#computerSkillNameDiv").show();
          //  $("#computerSkillName1").attr("required", "true");
        }else {


            $("#computerSkillNameDiv").hide();
           // $("#computerSkillName1").attr("required", "false");


        }



    });

    function chkComputerSkill1() {


        var computerSkillId=document.getElementById('skill1').value;
        var SkillAchievement=document.getElementById('SkillAchievement1').value;

        var computerSkillName=document.getElementById('computerSkillName1').value;





            if(computerSkillId==""){

                var errorMsg='Please select a computer skill first!!';
                validationError(errorMsg);
                return false;
            }

            if(SkillAchievement==""){

                var errorMsg='Please type skill achievement first!!';
                validationError(errorMsg);
                return false;
            }

            if(computerSkillId=='{{OTHERS}}' && computerSkillName==""){

                var errorMsg='Please type computer skill name!!';
                validationError(errorMsg);
                return false;
            }








    }
</script>


