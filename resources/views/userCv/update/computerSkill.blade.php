@extends('main')

@section('content')

    <div class="row ">

        <div class="col-12 ">
            <div class="card">
                <div style="background-color: #F1F1F1" class="card-body">



                    <div id="regForm" class="tab">
                        <h2 style="margin-bottom: 30px;">Computer-Skill</h2>

                            @foreach($empComputerSkills as $skills)
                                <div id="edit{{$skills->id}}">
                                <div id="" class="row">
                                    <div class="form-group col-md-5">
                                        <label for="inputEmail4">Skill : </label>


                                            {{--@foreach($computerSkills as $skill)--}}
                                            {{--@if($skill->id==$skills->computerSkillId)--}}
                                                {{$skills->computerSkillName}}
                                            {{--@endif--}}

                                                {{--@php--}}
                                                    {{--array_push($skillId,$skill->id);--}}
                                                    {{--array_push($skillTitle,$skill->computerSkillName );--}}
                                                {{--@endphp--}}

                                            {{--@endforeach--}}

                                    </div>


                                    <div class="form-group col-md-5">

                                        <label for="inputEmail4">Skill-level : </label>

                                            @foreach(ComputerSkillAchievement as $key=>$value)
                                             @if($value==$skills->SkillAchievement)
                                            {{$key}}
                                            @endif
                                                    @endforeach


                                    </div>
                                    <div class="form-group col-md-2">

                                        <button class="btn btn-info btn-sm" onclick="editInfo({{$skills->id}})"><i class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm " onclick="deleteSkill({{$skills->id}})"><i class="fa fa-trash"></i></button>


                                    </div>



                                </div>
                                </div>
                                <hr>
                            @endforeach

                                <form id="" action="{{route('candidate.computerSkill.submit')}}" method="post">
                                    <!-- One "tab" for each step in the form: -->
                                    {{csrf_field()}}

                            <div id="TextBoxesGroup">




                            </div>

                            <button type="button" id="addButton" class="btn btn-success">Add more</button>
                            <button type="button" id="removeButton" class="btn btn-success" >Remove</button>



                        <div style="overflow:auto;">
                            <div style="float:right;">
                                <a href="{{route('candidate.language.index')}}"><button type="button" id="btnPevious" >Back</button></a>
                                {{--<a id="btnPevious" class="btn btn-success" href="{{route('JobExperience.index')}}">Back</a>--}}
                                <button type="submit" id="submitBtn1">Save</button>

                                <a href="{{route('candidate.skill.index')}}"><button type="button" id="btnNext" >Next</button></a>

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



        function  checkUnique(x) {


            var values =  $('select[name="computerSkillId[]"]').map(function () {
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
        $(document).ready(function(){

            var counter = 1;
            $("#removeButton").hide();

            $("#submitBtn1").hide();
            $("#addButton").click(function () {



                if(counter>10){
                    alert("Only 10 section allow per time!!");
                    return false;
                }



                $("#btnPevious").hide();




                var newTextBoxDiv = $(document.createElement('div'))
                    .attr("id", 'TextBoxDiv' + counter).attr("class", 'row');
                newTextBoxDiv.after().html(

                    '                                    <div class="form-group col-md-6">\n' +
                    '                                        <label for="inputEmail4">Skill<span style="color: red">*</span></label>\n' +
                    '                                        <select name="computerSkillId[]" onchange="checkUnique(this)" id="" class="form-control" required>\n' +
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
                    '                                        <label for="inputEmail4">Skill-level<span style="color: red">*</span></label>\n' +
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
                    $("#submitBtn1").show();
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
                    $("#submitBtn1").hide();
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

        function  checkUnique(x) {


            var values =  $('select[name="computerSkillId[]"]').map(function () {
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



        function deleteSkill(x) {

            $.confirm({
                title: 'Confirm!',
                content: 'Are you sure to delete this computer skill?',
                icon: 'fa fa-warning',
                type: 'red',
                typeAnimated: true,
                buttons: {
                    tryAgain: {
                        text: 'Yes',
                        btnClass: 'btn-red',
                        action: function(){

                            $.ajax({
                                type: "POST",
                                url: '{{route('candidate.computerSkill.delete')}}',

                                data: {_token:"{{csrf_token()}}",id: x},
                                success: function (data) {
                                    $.alert({
                                        title: 'Success!',
                                        type: 'green',
                                        content: 'Computer skill deleted successfully',
                                        buttons: {
                                            tryAgain: {
                                                text: 'Ok',
                                                btnClass: 'btn-green',
                                                action: function () {
                                                    location.reload();
                                                }
                                            }
                                        }
                                    });
                                },
                            });
                        }
                    },
                    No: function () {
                    },
                }
            });



        }

        function editInfo(x){

            $.ajax({
                type: 'POST',
                url: "{!! route('candidate.computerSkill.edit') !!}",
                cache: false,
                data: {_token: "{{csrf_token()}}",'id': x},
                success: function (data) {
//                    console.log(data);
                    $('#edit'+x).html(data);
                    $("#addButton").hide();
                    $("#btnPevious").hide();
                    $("#btnNext").hide();
                    $("#submitBtn1").hide();

                }
            });
        }

    </script>



@endsection

