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
            <div class="card">
                <div style="background-color: #F1F1F1" class="card-body">

                        <div id="regForm">

                        <div id="" class="tab">

                            <h2 style="margin-bottom: 30px; text-align: center">Language</h2>

                            @foreach($empLanguageGroup as $languageHead)
                                <div id="language{{$languageHead->fklanguageHead}}">
                                <div class="form-group pull-right">
                                    <button class="btn btn-sm btn-info" data-panel-id="{{$languageHead->fklanguageHead}}" onclick="editLanguage(this)"><i class="fa fa-edit"></i></button>
                                    <button class="btn btn-sm btn-danger" data-panel-id="{{$languageHead->fklanguageHead}}" onclick="deleteLanguage(this)"><i class="fa fa-trash"></i></button>
                                </div>
                                <h5>{{$languageHead->languagename}}</h5>

                                <table class="table table-striped">
                                    <thead>
                                        <th>Language Skill Name</th>
                                        <th>Percentage</th>
                                    </thead>



                                @foreach($empLanguage as $language)
                                        <tr>
                                    @if($languageHead->fklanguageHead== $language->fklanguageHead)


                                        <td>{{$language->languageSkillName}}</td>
                                        <td>{{$language->rate}}</td>


                                    @endif
                                        </tr>

                                @endforeach
                                </table>
                                </div>
                                <hr>

                            @endforeach

                            <form  name="skillForm" action="{{route('candidate.language.insert')}}"  method="post">
                                <!-- One "tab" for each step in the form: -->
                                {{csrf_field()}}


                            <div style="display: block" id="otherSkillDiv">
                                <div id="TextBoxesGroup">




                                </div>

                                <button type="button" id="addButton" class="btn btn-success">Add More</button>
                                <button type="button" id="removeButton" class="btn btn-success" >remove</button>

                            </div>


                        {{--</div>--}}

                        <div style="overflow:auto;">
                            <div style="float:right;">
                                <a href="{{route('candidate.cvEducation')}}"><button type="button" id="btnPevious" >Back</button></a>
                                <button type="submit" id="submitBtn">Save</button>
                                <a href="{{route('candidate.computerSkill.index')}}"><button type="button" id="nextBtn" >Next</button></a>

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


        function editLanguage(x) {
            var id=$(x).data('panel-id');
            // alert(id);


            $.ajax({
                type: 'POST',
                url: "{!! route('candidate.language.edit') !!}",
                cache: false,
                data: {_token: "{{csrf_token()}}",'id': id},
                success: function (data) {

                    $('#language'+id).html(data);
                    // console.log(data);

                }
            });
        }


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


        function deleteLanguage(x){
            var id=$(x).data('panel-id');
            $.confirm({
                title: 'Delete!',
                content: 'Are you sure ?',
                buttons: {
                    confirm: function () {
                        $.ajax({
                            type: 'POST',
                            url: "{!! route('candidate.language.delete') !!}",
                            cache: false,
                            data: {_token: "{{csrf_token()}}",'id': id},
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


        $("input[name=hasOtherSkill]").click( function () {

            if ($(this).val()=='1'){
                $('#otherSkillDiv').show();
            }else {
                $('#otherSkillDiv').hide();
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
    </script>



    <script type="text/javascript">


        $(document).ready(function(){

            var counter = 1;
            var limit = '<?php echo count($languagehead)?>';
            $("#removeButton").hide();


            $("#addButton").click(function () {


                if (counter == 1 ) {

                    var skill = $('#skill').val();
                    var myRange = $('#myRange').val();


                    if (skill == "") {

                        var errorMsg = 'Please Select a Skill First!!';
                        validationError(errorMsg);
                        return false;
                    }
                    if (myRange == "") {

                        var errorMsg = 'Please Select Skill Level First!!';
                        validationError(errorMsg);
                        return false;
                    }
                }else {

                    var skill = $('#skill'+counter).val();
                    var myRange = $('#myRange'+counter).val();


                    if (skill == "") {

                        var errorMsg = 'Please Select a Skill First!!';
                        validationError(errorMsg);
                        return false;
                    }
                    if (myRange == "") {

                        var errorMsg = 'Please Select Skill Level First!!';
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
                    '<option selected value="">Select Language</option>'+
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
                    '<label>Percentage of Skill (out of 100)</label>'+
                    '<div class="slidecontainer">'+
                    '<input type="range" min="0" max="100" value="0" class="slider" onchange="myRangeChanged3('+'{{$ls->id}}'+')" name="languageskill[]" id="myRange1'+'<?php echo $ls->id?>'+'" >'+
                    '<p>Value: <span id="demo1'+'<?php echo $ls->id?>'+'"></span> %</p>'+
                    '<input type="hidden" id="skillPercentage" name="langskillid" value="{{$ls->id}}" class="form-control"  />'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                    '@endforeach'

                );

                newTextBoxDiv.appendTo("#TextBoxesGroup");

                counter++;
                if(counter>1){
                    $("#removeButton").show();
                }

            });

            $("#removeButton").click(function () {


                if(counter=='1'){
                    alert("Atleast One Language is needed!!");
                    return false;
                }
                counter--;
                if(counter<2){
                    $("#removeButton").hide();
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

        function myRangeChanged3(x){

            //alert(x);
            // alert(y);


            var slider = document.getElementById("myRange1"+x);

            var output = document.getElementById("demo1"+x);
            output.innerHTML = slider.value;

            slider.oninput = function() {
                output.innerHTML = this.value;
                $("#skillPercentage"+x).val(this.value);
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
        //        function checkSkill() {
        //
        //            var skill = document.skillForm.elements["skill[]"];
        //            var skillLevel = document.skillForm.elements["skillPercentage[]"];
        //
        //            alert(skillLevel.length);
        //
        ////            for(i=0;i<skill.length;i++)
        ////            {
        ////                if (skill[i].value != '' && skillLevel[i].value=='') {
        ////                    var errorMsg = 'Please Select a Skill '+ (i + 1)+'First!!';
        ////                    validationError(errorMsg);
        ////                    return false;
        ////                }
        ////                if (skill[i].value == '' && skillLevel[i].value != '')
        ////                {
        ////                    var errorMsg = 'Please Select a Skill Level '+ (i + 1)+'First!!';
        ////                    validationError(errorMsg);
        ////                    return false;
        ////                }
        ////            }
        //
        //            return false;
        //
        //
        //        }

    </script>



@endsection