<form action="{{route('candidate.computerSkill.update')}}" method="post">
    <!-- One "tab" for each step in the form: -->
    <input type="hidden" name="id" value="{{$computerSkill->id}}">
    {{csrf_field()}}

            <div class="row">

                <div class="form-group col-md-6">
                    <label for="inputEmail4">Skill<span style="color: red">*</span></label>
                    <select name="computerSkillId" id="" class="form-control" required>
                        <option value="">Select Skill</option>
                        @foreach($allComputerSkills as $skill)
                            <option @if($skill->id==$computerSkill->computerSkillId)selected @endif value="{{$skill->id}}">{{$skill->computerSkillName}}</option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group col-md-6">

                    <label for="inputEmail4">Skill-Level<span style="color: red">*</span></label>
                    <select name="SkillAchievement" id="" class="form-control" required>
                        <option value="">Select Level</option>
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