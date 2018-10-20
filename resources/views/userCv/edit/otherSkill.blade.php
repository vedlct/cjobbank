

<form  action="{{route('candidate.skill.update')}}" method="post">
    <!-- One "tab" for each step in the form: -->
    {{csrf_field()}}
    <input type="hidden" name="skillId" value="{{$empSkills->id}}">


            <div class="row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Skill<span style="color: red">*</span></label>
                    <select required name="skill" class="form-control" id="skill1">
                        <option selected value="">Select Skill Type</option>
                        @foreach($skills as $skill)
                            <option @if($skill->id==$empSkills->otherSkillId) selected @endif value="{{$skill->id}}">{{$skill->skillName}}</option>
                        @endforeach
                    </select>

                </div>
                <div class="form-group col-md-6">
                    <label>Percentage of Skill (out of 100)</label>
                    <div class="slidecontainer">
                        <input type="range" min="1" max="100" value="{{$empSkills->ratiing}}" class="slider" name="skillPercentage" id="myRange1" required>
                        <p>Value: <span id="demo1">{{$empSkills->ratiing}}</span> %</p>
                        <input type="hidden" id="skillPercentage1"  class="form-control" required />
                    </div>
                </div>

            </div>


            <div class="form-group col-md-12">
                <a class="btn btn-danger pull-right" href="{{route('candidate.skill.index')}}">Cancel</a>&nbsp;&nbsp;
                <button  class="btn btn-info pull-right">Update</button>
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

</script>