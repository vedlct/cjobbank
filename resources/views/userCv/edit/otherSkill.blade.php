

<form onsubmit="return chkOtherSkill()" action="{{route('candidate.skill.update')}}" method="post">
    <!-- One "tab" for each step in the form: -->
    {{csrf_field()}}
    <input type="hidden" name="skillId" value="{{$empSkills->id}}">


            <div class="row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Skill<span style="color: red">*</span></label>
                    <select required name="skill" class="form-control" id="skill1">
                        <option selected value="">Select skill type</option>
                        @foreach($skills as $skill)
                            <option @if($skill->id==$empSkills->otherSkillId) selected @endif value="{{$skill->id}}">{{$skill->skillName}}</option>
                        @endforeach
                        <option value="{{OTHERS}}" >{{OTHERS}}</option>
                    </select>

                </div>
                <div style="display: none" id="otherSkillNameDiv" class="form-group col-md-6">
                    <label for="">Other skill name</label>
                    <input type="text" maxlength="255" name="otherSkillName" class="form-control" id="otherSkillName"  placeholder="">

                </div>
                <div class="form-group col-md-6">
                    <label>Percentage of skill (out of 100)</label>
                    <div class="slidecontainer">
                        <input type="range" min="1" max="100" value="{{$empSkills->ratiing}}" class="slider" name="skillPercentage" id="myRange1" required>
                        <p>Value: <span id="demo1">{{$empSkills->ratiing}}</span> %</p>
                        <input type="hidden" id="skillPercentage1"  class="form-control" required />
                    </div>
                </div>

            </div>


            <div class="form-group col-md-12">
                <button class="btn-danger pull-left" onclick="{{route('candidate.skill.index')}}">Cancel</button>&nbsp;&nbsp;
                <button  class=" btn-info">Update</button>
            </div>


</form>
<br>

<div class="col-md-12"><hr style="border-top:1px dotted #000;"></div>

<script>
    var slider = document.getElementById("myRange1");
    var output = document.getElementById("demo1");
    output.innerHTML = slider.value;

    slider.oninput = function() {
        output.innerHTML = this.value;
        $("#skillPercentage1").val(this.value);
    }

    $('#skill1').on('change', function() {

        var skill =$('#skill1').val();
        if (skill == "{{OTHERS}}"){

            $("#otherSkillNameDiv").show();
        }else {


            $("#otherSkillNameDiv").hide();


        }



    });

</script>