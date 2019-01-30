<form  name="skillForm" action="{{route('candidate.language.update')}}"  method="post">
    <!-- One "tab" for each step in the form: -->
    {{csrf_field()}}

    <div id="" class="">






            <div id="TextBoxesGroup">

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Language<span style="color: red">*</span></label>
                        <select name="languagehead" class="form-control" id="skill" required>
                            @foreach($languagehead as $languageheads)
                                <option value="{{$languageheads->id}}" @if($fklanguageHead==$languageheads->id)selected @endif>{{$languageheads->languagename}}</option>
                            @endforeach
                        </select>

                 </div>
                {{--{{$languageskill}}--}}
                    @foreach($languageskill as $ls)
                        @foreach($empLanguage as $lan)
                            @if($ls->id==$lan->fklanguageSkill)
                                {{--{{$lan->rate}}--}}
                                <div class="col-sm-12 row">

                                    <div class="form-group col-md-4" style="margin-top: 20px">
                                        <label>{{$ls->languageSkillName}}</label>

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Percentage of skill (out of 100)</label>
                                        <div class="slidecontainer">
                                            <input type="range" min="0" max="100" value="{{$lan->rate}}" class="slider" onchange="myRangeChanged2('{{$ls->id}}')" name="languageskill[]" id="myRange<?php echo $ls->id?>" >
                                            <p>Value: <span id="demo<?php echo $ls->id ?>">{{$lan->rate}}</span> %</p>
                                            <input type="hidden" id="skillPercentage" name="langskillid[]" value="{{$ls->id}}" class="form-control"  />
                                        </div>
                                    </div>
                                </div>


                            @endif
                         @endforeach

                    @endforeach


                </div>


            </div>



        </div>


    <div style="overflow:auto;">
        <div style="float:right;">

            <button type="button" onclick="cancel()" class="btn btn-sm btn-danger">Cancel</button>
            <button type="submit" id="submitBtn" class="btn btn-sm btn-success">Save</button>


        </div>
    </div>



</form>


<script>
    function myRangeChanged2(x){


        var slider = document.getElementById("myRange"+x);

        var output = document.getElementById("demo"+x);
        output.innerHTML = slider.value;

        slider.oninput = function() {
            output.innerHTML = this.value;
            $("#skillPercentage"+x).val(this.value);
        }

    }

    function cancel() {
        location.reload();

    }
</script>