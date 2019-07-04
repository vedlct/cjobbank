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
                            <a href="{{route('candidate.computerSkill.index')}}" >Computer-skill</a>
                            {{--<a href="{{route('candidate.skill.index')}}" >Other Skill Information</a>--}}
                            <a href="{{route('cv.OthersInfo')}}" >Other information</a>
                            <a href="{{route('candidate.cvTrainingCertificate')}}">Training certification</a>
                            <a href="{{route('candidate.cvProfessionalCertificate')}}">Professional certification</a>
                            <a  href="{{route('JobExperience.index')}}">Job experience</a>
                            <a  href="{{route('candidate.previousWorkInCB.index')}}">Previous work information in Caritas Bangladesh</a>
                            <a  class="activeNav" href="{{route('candidate.membershipInSocialNetwork.index')}}">Certification of membership in professional network/ forum</a>
                            <a  id="addfalse" href="{{route('refree.index')}}">Referee</a>
                            <a onclick="return false;" class="incomplete" href="{{route('relativeInCaritas.getRelationInfo')}}">Relatives working in Caritas Bangladesh</a>
                        </div>

                    </div>

                    <form class="col-md-9" id="regForm" onsubmit="return chkSocialMemberShip()" action="{{route('candidate.membershipInSocialNetwork.insert')}}" method="post">
                        <!-- One "tab" for each step in the form: -->
                        {{csrf_field()}}

                        <div id="" class="tab">

                            <h2 style="margin-bottom: 30px;">Certification of membership in professional network/ forum</h2>

                            <div class="row">
                                <div class="form-group">
                                    <label class="control-label">Do you have any certification of membership in professional network?<span style="color: red" class="required">*</span></label>
                                    <div class="col-md-10 mb-3">
                                        <input class="form-check-input" type="radio" required name="hasProfCertificate" value="1" onclick="sociaMemberDiv(this)"> Yes&nbsp;&nbsp;
                                    </div>
                                    <div class="col-md-10">
                                        <input class="form-check-input" type="radio" required name="hasProfCertificate" checked onclick="sociaMemberDiv(this)" value="0"> No&nbsp;&nbsp;
                                    </div>
                                </div>
                            </div>

                            <div id="sociaMemberDiv">
                            <div id="TextBoxesGroup">

                                <div class="row">

                                    <div class="form-group col-md-12">
                                        <label for="inputEmail4">Name of network<span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="networkName[]" id="networkName" placeholder="network name" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Type of membership<span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="membershipType[]" id="membershipType" placeholder="membership type" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Duration<span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="duration[]" id="duration" placeholder="duration" required>
                                    </div>

                                </div>


                            </div>

                            <button type="button" id="addButton" class="btn btn-success">Add more</button>
                            <button type="button" id="removeButton" class="btn btn-success" >Remove</button>

                            </div>

                        </div>

                        <div style="overflow:auto;">
                            <div style="float:right;">
                                <a href="{{route('candidate.previousWorkInCB.index')}}"><button type="button" id="btnPevious" >Back</button></a>
                                <button type="submit" id="submitBtn">Save</button>
                                <a href="{{route('refree.index')}}"><button type="button" id="nextBtn" >Next</button></a>
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

        $(function () {
            $('#sociaMemberDiv').hide();
            $('#submitBtn').hide();

//            var value=$('input[name=hasProfCertificate]:checked').val();;
//
//            console.log(value);
//            if(value ==1){
//                $('#sociaMemberDiv').show();
//                $('#submitBtn').show();
//            }
//            else if(value ==0){
//                $('#sociaMemberDiv').hide();
//                $('#submitBtn').hide();
//            }

        });

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

        function sociaMemberDiv(x) {
            var value=$(x).val();

            if(value ==1){
                $('#sociaMemberDiv').show();
                $('#submitBtn').show();
            }
            else if(value ==0){
                $('#sociaMemberDiv').hide();
                $('#submitBtn').hide();
            }

            // alert(value);

        }

        function chkSocialMemberShip() {



                var networkName=document.getElementsByName('networkName[]');
                var membershipType=document.getElementsByName('membershipType[]');
                var duration=document.getElementsByName('duration[]');


                for (i=0;i<networkName.length;i++){

                    if(networkName[i].value==""){

                        var errorMsg='Please type a network first!!';
                        validationError(errorMsg);
                        return false;
                    }

                    if(membershipType[i].value==""){

                        var errorMsg='Please type membership type first!!';
                        validationError(errorMsg);
                        return false;
                    }
                    if(duration[i].value==""){

                        var errorMsg='Please type membership duration first!!';
                        validationError(errorMsg);
                        return false;
                    }


                }


        }
    </script>



    <script type="text/javascript">
        $(function () {
            $('.date').datepicker({
                format: 'yyyy-m-d'
            });
//            $('#end').datepicker({
//                format: 'yyyy-m-d'
//            });
        });

        $(document).ready(function(){

            var counter = 1;
            $("#removeButton").hide();


            $("#addButton").click(function () {
                if(counter>10){
                    alert("Only 10 section allow per time!!");
                    return false;
                }

                if (counter == 1 ){

                    var networkName=$('#networkName').val();

                    var membershipType=$('#membershipType').val();
                    var duration=$('#duration').val();



                    if(networkName==""){

                        var errorMsg='Please type network name first!!';
                        validationError(errorMsg);
                        return false;
                    }
                    if (networkName.length > 255){

                        var errorMsg='Network name should not more than 255 charecter length!!';
                        validationError(errorMsg);
                        return false;

                    }
                    if(membershipType==""){

                        var errorMsg='Please type membership-type first!!'
                        validationError(errorMsg)
                        return false;

                    }
                    if (membershipType.length > 255){

                        var errorMsg='Membership-type should not more than 255 charecter length!!';
                        validationError(errorMsg);
                        return false;

                    }
                    if(duration==""){

                        var errorMsg='Please duration first!!';
                        validationError(errorMsg);
                        return false;

                    }
                    if (duration.length > 10){

                        var errorMsg='Duration should not more than 10 charecter length!!';
                        validationError(errorMsg);
                        return false;

                    }



                }
                else {

                    var networkName=$('#networkName'+counter).val();

                    var membershipType=$('#membershipType'+counter).val();
                    var duration=$('#duration'+counter).val();



                    if(networkName==""){

                        var errorMsg='Please type network name first!!';
                        validationError(errorMsg);
                        return false;
                    }
                    if (networkName.length > 255){

                        var errorMsg='Network name should not more than 255 charecter length!!';
                        validationError(errorMsg);
                        return false;

                    }
                    if(membershipType==""){

                        var errorMsg='Please type membership-type first!!'
                        validationError(errorMsg)
                        return false;

                    }
                    if (membershipType.length > 255){

                        var errorMsg='Membership-type should not more than 255 charecter length!!';
                        validationError(errorMsg);
                        return false;

                    }
                    if(duration==""){

                        var errorMsg='Please duration first!!';
                        validationError(errorMsg);
                        return false;

                    }
                    if (duration.length > 10){

                        var errorMsg='Duration should not more than 10 charecter length!!';
                        validationError(errorMsg);
                        return false;

                    }


                }

                var newTextBoxDiv = $(document.createElement('div'))
                    .attr("id", 'TextBoxDiv' + counter).attr("class", 'row');
                newTextBoxDiv.after().html(

                    '<div class="col-md-12"><hr style="border-top:1px dotted #000;"></div>' +
                    '<div class="row"> ' +
                    '<div class="form-group col-md-12">'+
                    '<label for="inputEmail4">Name of network<span style="color: red">*</span></label>'+
                    '<input type="text" class="form-control" name="networkName[]" id="networkName'+counter+'" placeholder="network name" required>'+
                    '</div>'+

                '<div class="form-group col-md-6">'+
                    '<label for="inputEmail4">Type of membership<span style="color: red">*</span></label>'+
                    '<input type="text" class="form-control" name="membershipType[]" id="membershipType'+counter+'" placeholder="membership type" required>'+
                '</div>'+
                '<div class="form-group col-md-6">'+
                    '<label for="inputPassword4">Duration<span style="color: red">*</span></label>'+
                    '<input type="text" class="form-control" name="duration[]" id="duration'+counter+'" placeholder="date" required>'+
                '</div>'+
                    '</div>'

                );
                newTextBoxDiv.appendTo("#TextBoxesGroup");

                counter++;
                if(counter>1){
//                    document.getElementById("removeButton").style.display='block';
                    $("#removeButton").show();
                }
                $('.date').datepicker({
                    format: 'yyyy-m-d'
                });
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
