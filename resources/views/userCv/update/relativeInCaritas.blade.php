@extends('main')
@section('header')
    <style>
        .card-body {
            -webkit-box-flex: 1;
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            padding: 1.25rem;
            height: 1500px !important;
        }

        .updateCard {
            height: 1500px;
        }
    </style>

@endsection
@section('content')


    <div class="row ">

        <div class="col-12 ">
            <div style="display: unset;" class="card updateCard">
                <div style="background-color: #F1F1F1; " class="card-body">



                    <div class="col-md-3">

                        <div class="sidenav">
                            <a href="{{route('candidate.cvPersonalInfo')}}">Personal details</a>
                            <a href="{{route('candidate.cvQuesObj')}}">Career objective and application information</a>
                            <a href="{{route('candidate.cvEducation')}}">Education</a>
                            <a href="{{route('candidate.language.index')}}" >Language</a>
                            <a href="{{route('candidate.computerSkill.index')}}" >Computer-skill</a>
                            {{--<a href="{{route('candidate.skill.index')}}" >Other Skill Information</a>--}}
                            <a href="{{route('cv.OthersInfo')}}" >Other information</a>
                            <a href="{{route('candidate.cvTrainingCertificate')}}">Training certification</a>
                            <a href="{{route('candidate.cvProfessionalCertificate')}}">Professional certification</a>
                            <a href="{{route('JobExperience.index')}}">Job experience</a>
                            <a href="{{route('candidate.previousWorkInCB.index')}}">Previous work information in Caritas Bangladesh</a>
                            <a href="{{route('candidate.membershipInSocialNetwork.index')}}">Certification of membership in professional network/ forum</a>
                            <a href="{{route('refree.index')}}">Referee</a>
                            <a class="activeNav" href="{{route('relativeInCaritas.getRelationInfo')}}">Relatives working in Caritas Bangladesh</a>
                        </div>

                    </div>

                    <div class="col-md-9" id="regForm">



                        <div id="" class="tab">

                            <h2 style="margin-bottom: 30px;">Do you have any relatives working in Caritas Bangladesh?</h2>
                            @php($tempHr=0)

                            @foreach($relativeInCaritas as $relative)
                                @if($tempHr>0)
                                    <div class="col-md-12"><hr style="border-top:1px dotted #000;"></div>
                                @endif
                                <div id="edit{{$relative->relativeId}}">
                                    <div class="row">
                                        <div class="form-group col-md-5">
                                            <label for="inputEmail4">First name: </label>
                                            {{$relative->firstName}}
                                            {{--<input type="text" class="form-control" name="firstName[]" id="inputEmail4" placeholder="first name" required>--}}
                                        </div>



                                        <div class="form-group col-md-5">
                                            <label for="inputEmail4">Last name: </label>
                                            {{$relative->lastName}}
                                            {{--<input type="text" class="form-control" name="lastName[]" id="inputEmail4" placeholder="last name" required>--}}
                                        </div>
                                        <div class="form-group col-md-2 ">
                                            <button type="button" class="btn btn-info btn-sm " onclick="editInfo({{$relative->relativeId}})"><i class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-danger btn-sm " onclick="deleteRelative({{$relative->relativeId}})"><i class="fa fa-trash"></i></button>

                                        </div>



                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Designation: </label>
                                            {{$relative->degisnation}}
                                            {{--<input type="text" class="form-control" name="degisnation[]" id="degisnation" placeholder="degisnation" required>--}}
                                        </div>


                                    </div>
                                </div>
                                @php($tempHr++)
                            @endforeach


                            <form  action="{{route('submit.relative')}}" method="post">
                                <!-- One "tab" for each step in the form: -->
                                {{csrf_field()}}

                                <div id="TextBoxesGroup">

                                </div>



                                {{--</div>--}}

                                <button type="button" id="addButton" class="btn btn-success">Add more</button>
                                <button type="button" id="removeButton" class="btn btn-success" >Remove</button>



                                <div style="overflow:auto;">
                                    <div style="float:right;">
                                        <a href="{{route('refree.index')}}"><button type="button" id="btnPevious" >Back</button></a>
                                        <a href="{{route('candidate.viewUserCv')}}"><button type="button" id="btnPevious" >Done</button></a>
                                        <button type="submit" id="submitBtn">Save</button>
                                        {{--<a href="{{route('refree.index')}}"><button type="button" id="nextBtn" >Next</button></a>--}}
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
                url: "{!! route('relative.edit') !!}",
                cache: false,
                data: {_token: "{{csrf_token()}}",'relativeId': x},
                success: function (data) {
//                    $("#btnPevious").hide();
                    $('#edit'+x).html(data);

                }
            });
        }
        function deleteRelative(x) {
            $.confirm({
                title: 'Delete!',
                content: 'Are you sure ?',
                buttons: {
                    confirm: function () {
                        $.ajax({
                            type: 'POST',
                            url: "{!! route('relative.delete') !!}",
                            cache: false,
                            data: {_token: "{{csrf_token()}}",'relativeId': x},
                            success: function (data) {
                                location.reload();
                            }
                        });
                    },
                    cancel: function () {

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
            x[(n+6)].className += " active";
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
            @if(Session::has('CVcomplete'))
            @if(Session::get('CVcomplete')=='done' && $employee->cvStatus == 1)

                $.alert({
                title: 'Congratulation',
                type: 'green',
                content: '{{CV_COMPLITING_MSG}}',
                buttons: {
                    tryAgain: {
                        text: 'Ok',
                        btnClass: 'btn-green',
                        action: function () {

                        }
                    }
                }
            });

            @endif
            @endif
        });

        $(document).ready(function(){

            var counter = 1;
            $("#removeButton").hide();
            $("#submitBtn").hide();


            $("#addButton").click(function () {
//                $("#btnPevious").hide();
                if(counter>10){
                    alert("Only 10 section allow per time!!");
                    return false;
                }

                if (counter >1 ){

                    var firstName=$('#firstName'+(counter-1)).val();
                    var lastName=$('#lastName'+(counter-1)).val();
                    var degisnation=$('#degisnation'+(counter-1)).val();

                    var chk=/^[0-9]*$/;
                    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;



                    if(firstName==""){

                        var errorMsg='Please type first name first!!';
                        validationError(errorMsg);
                        return false;
                    }
                    if (firstName.length > 45){

                        var errorMsg='First name should not more than 45 charecter length!!';
                        validationError(errorMsg);
                        return false;

                    }
                    if(lastName==""){

                        var errorMsg='Please type last name first!!'
                        validationError(errorMsg)
                        return false;
                    }
                    if (lastName.length > 45){

                        var errorMsg='Last name should not more than 45 charecter length!!'
                        validationError(errorMsg)
                        return false;

                    }

                    if(degisnation==""){

                        var errorMsg='Please type present position first!!'
                        validationError(errorMsg)
                        return false;

                    }
                    if (degisnation.length > 100){

                        var errorMsg='Present Position Should not more than 100 Charecter Length!!';
                        validationError(errorMsg);
                        return false;

                    }

                }




                var newTextBoxDiv = $(document.createElement('div'))
                        .attr("id", 'TextBoxDiv' + counter).attr("class", 'row');
                newTextBoxDiv.after().html(
                        '<div class="col-md-12"><hr style="border-top:1px dotted #000;"></div>'+
                        '  <div class="row"> ' +
                        '<div class="form-group col-md-6"> ' +
                        '<label for="inputEmail4">First name<span style="color: red">*</span></label> ' +
                        '<input type="text" class="form-control" name="firstName[]" id="firstName'+counter+'" placeholder="first name" required> ' +
                        '</div> ' +
                        '<div class="form-group col-md-6"> ' +
                        '<label for="inputEmail4">Last name<span style="color: red">*</span></label> ' +
                        '<input type="text" class="form-control" name="lastName[]" id="lastName'+counter+'" placeholder="last name" required> ' +
                        '</div> ' +
                        '<div class="form-group col-md-6"> ' +
                        '<label for="inputEmail4">Present position<span style="color: red">*</span></label> ' +
                        '<input type="text" class="form-control" name="degisnation[]" id="degisnation'+counter+'" placeholder="degisnation" required> ' +
                        '</div> '

                );
                newTextBoxDiv.appendTo("#TextBoxesGroup");

                counter++;
                if(counter>1){
                    $("#removeButton").show();
                    $("#submitBtn").show();
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

    </script>



@endsection
