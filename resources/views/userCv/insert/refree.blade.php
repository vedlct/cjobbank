@extends('main')

@section('content')
    <style>
        .updateCard {
            height:2500px;
        }
    </style>
    <style>
        strong{
            color: red;
            font-style: italic;
        }
        #notice{
            color: blue;
            font-style: italic;
        }
        /*#imageMsg,#signMsg{*/
        /*display: none;*/
        /*}*/
    </style>
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
                            <a   href="{{route('candidate.membershipInSocialNetwork.index')}}">Certification of membership in professional network/ forum</a>
                            <a  class="activeNav"  href="{{route('refree.index')}}">Referee</a>
                            <a onclick="return false;" class="incomplete" href="{{route('relativeInCaritas.getRelationInfo')}}">Relatives working in Caritas Bangladesh</a>
                        </div>

                    </div>

                    <form class="col-md-9" id="regForm" action="{{route('submit.refree')}}" method="post">

                        {{csrf_field()}}

                        <div id="" class="tab">
                            <span id="notice"><span style="color: red">*</span><span style="color: red">*</span>Experienced candidate : referee should be present or previous organization/company.</span><span style="color: red">*</span><span style="color: red">*</span><br>
                            <span id="notice"><span style="color: red">*</span><span style="color: red">*</span>Freshers : referee can be from his/her own preference.</span><span style="color: red">*</span><span style="color: red">*</span>

                            <h2 style="margin-bottom: 30px;">Referee - 1</h2>
                            <div id="TextBoxesGroup1">

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Name<span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="firstName[]" id="firstName" placeholder="Name" required>
                                    </div>



{{--                                    <div class="form-group col-md-6">--}}
{{--                                        <label for="inputEmail4">Last name<span style="color: red">*</span></label>--}}
{{--                                        <input type="text" class="form-control" name="lastName[]" id="lastName" placeholder="last name" required>--}}
{{--                                    </div>--}}



                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Present position<span style="color: red"></span></label>
                                        <input type="text" class="form-control" name="presentposition[]" id="presentposition" placeholder="position" >
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Name of organization<span style="color: red"></span></label>
                                        <input type="text" class="form-control" name="organization[]" id="organization" placeholder="organization" >
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Email<span style="color: red"></span></label>
                                        <input type="email" class="form-control" name="email[]" id="email" placeholder="email" >
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Phone<span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="phone[]" id="phone" placeholder="Phone" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Relation<span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="relation[]" id="relation" placeholder="relation" required>
                                    </div>




                                </div>


                            </div>
<hr>
                            <h2 style="margin-bottom: 30px;">Referee - 2</h2>
                            <div id="TextBoxesGroup">

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Name<span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="firstName[]" id="firstName" placeholder="Name" required>
                                    </div>



                                    {{--<div class="form-group col-md-6">--}}
                                        {{--<label for="inputEmail4">Last name<span style="color: red">*</span></label>--}}
                                        {{--<input type="text" class="form-control" name="lastName[]" id="lastName" placeholder="last name" required>--}}
                                    {{--</div>--}}



                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Present position</label>
                                        <input type="text" class="form-control" name="presentposition[]" id="presentposition" placeholder="position" >
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Organization</label>
                                        <input type="text" class="form-control" name="organization[]" id="organization" placeholder="organization" >
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Email</label>
                                        <input type="email" class="form-control" name="email[]" id="email" placeholder="email">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Phone<span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="phone[]" id="phone" placeholder="Phone" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Relation<span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="relation[]" id="relation" placeholder="relation" required>
                                    </div>




                                </div>


                            </div>

                            <button type="button" id="addButton" class="btn btn-success">Add more</button>
                            <button type="button" id="removeButton" class="btn btn-success" >Remove</button>

                        </div>

                        <div style="overflow:auto;">
                            <div style="float:right;">
                                <a href="{{route('candidate.membershipInSocialNetwork.index')}}"><button type="button" id="btnPevious" >Back</button></a>
                                {{--<a id="btnPevious" class="btn btn-success" href="{{route('JobExperience.index')}}">Back</a>--}}
                                <button type="submit" id="submitBtn">Save</button>
                                <a href="{{route('relativeInCaritas.getRelationInfo')}}"><button type="button" id="btnNext" >Next</button></a>

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
                if((counter+2)>5){
                    alert("Only 5 section allow max!!");
                    return false;
                }
                $("#btnPevious").hide();

                if (counter == 1 ){

                    var firstName=$('#firstName').val();
//                    var lastName=$('#lastName').val();
                    var presentposition=$('#presentposition').val();
                    var organization=$('#organization').val();
                    var email=$('#email').val();
                    var phone=$('#phone').val();
                    var relation=$('#relation').val();

                    var chk=/^[0-9]*$/;
                    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;



                    if(firstName==""){

                        var errorMsg='Please type  Name first!!';
                        validationError(errorMsg);
                        return false;
                    }
                    if (firstName.length > 90){

                        var errorMsg='Name should not more than 90 character length!!';
                        validationError(errorMsg);
                        return false;

                    }
                    // if(lastName==""){
                    //
                    //     var errorMsg='Please type last name first!!'
                    //     validationError(errorMsg)
                    //     return false;
                    // }
                    // if (lastName.length > 45){
                    //
                    //     var errorMsg='Last name should not more than 45 charecter length!!'
                    //     validationError(errorMsg)
                    //     return false;
                    //
                    // }

                    // if(presentposition==""){
                    //
                    //     var errorMsg='Please Type Present Position First!!'
                    //     validationError(errorMsg)
                    //     return false;
                    //
                    // }
                    if (presentposition.length > 100){

                        var errorMsg='Present position should not more than 100 charecter length!!';
                        validationError(errorMsg);
                        return false;

                    }
                    // if(organization==""){
                    //
                    //     var errorMsg='Please Type Organization First!!'
                    //     validationError(errorMsg)
                    //     return false;
                    //
                    // }
                    if (organization.length > 100){

                        var errorMsg='Organization should not more than 100 charecter length!!';
                        validationError(errorMsg);
                        return false;

                    }
                    if(relation==""){

                        var errorMsg='Please type relation first!!'
                        validationError(errorMsg)
                        return false;

                    }
                    if (relation.length > 45){

                        var errorMsg='Relation should not more than 45 charecter length!!';
                        validationError(errorMsg);
                        return false;

                    }

                    if(phone==""){

                        var errorMsg='Please type a phone number first!!'
                        validationError(errorMsg)
                        return false;

                    }

                    if(!phone.match(chk)) {

                        var errorMsg='Please enter a valid phone number!!';
                        validationError(errorMsg);
                        return false;

                    }
                    if(phone.length >20) {

                        var errorMsg='Phone number must be less than 20 charecter!!';
                        validationError(errorMsg);
                        return false;

                    }

                    // if(email==""){
                    //
                    //     var errorMsg='Please Type a Email First!!'
                    //     validationError(errorMsg)
                    //     return false;
                    //
                    // }

                    if(email!="" && !email.match(mailformat))
                    {
                        var errorMsg='You have entered an invalid email address!';
                        validationError(errorMsg);
                        return false;
                    }



                }
                else {

                    var firstName=$('#firstName'+(counter-1)).val();
//                    var lastName=$('#lastName'+(counter-1)).val();
                    var presentposition=$('#presentposition'+(counter-1)).val();
                    var organization=$('#organization'+(counter-1)).val();
                    var email=$('#email'+(counter-1)).val();
                    var phone=$('#phone'+(counter-1)).val();
                    var relation=$('#relation'+(counter-1)).val();

                    var chk=/^[0-9]*$/;
                    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;



                    if(firstName==""){

                        var errorMsg='Please type Name first!!';
                        validationError(errorMsg);
                        return false;
                    }
                    if (firstName.length > 90){

                        var errorMsg='Name should not more than 90 character length!!';
                        validationError(errorMsg);
                        return false;

                    }
                    // if(lastName==""){
                    //
                    //     var errorMsg='Please type last name first!!'
                    //     validationError(errorMsg)
                    //     return false;
                    // }
                    // if (lastName.length > 45){
                    //
                    //     var errorMsg='Last name should not more than 45 charecter length!!'
                    //     validationError(errorMsg)
                    //     return false;
                    //
                    // }

//                    if(presentposition==""){
//
//                        var errorMsg='Please Type Present Position First!!'
//                        validationError(errorMsg)
//                        return false;
//
//                    }
                    if (presentposition.length > 100){

                        var errorMsg='Present position should not more than 100 charecter length!!';
                        validationError(errorMsg);
                        return false;

                    }
//                    if(organization==""){
//
//                        var errorMsg='Please Type Organization First!!'
//                        validationError(errorMsg)
//                        return false;
//
//                    }
                    if (organization.length > 100){

                        var errorMsg='Organization should not more than 100 charecter length!!';
                        validationError(errorMsg);
                        return false;

                    }
                    if(relation==""){

                        var errorMsg='Please type relation first!!'
                        validationError(errorMsg)
                        return false;

                    }
                    if (relation.length > 45){

                        var errorMsg='Relation should not more than 45 charecter length!!';
                        validationError(errorMsg);
                        return false;

                    }

                    if(phone==""){

                        var errorMsg='Please type a phone number first!!'
                        validationError(errorMsg)
                        return false;

                    }

                    if(!phone.match(chk)) {

                        var errorMsg='Please enter a valid phone number!!';
                        validationError(errorMsg);
                        return false;

                    }
                    if(phone.length >20) {

                        var errorMsg='Phone number must be less than 20 charecter!!';
                        validationError(errorMsg);
                        return false;

                    }

//                    if(email==""){
//
//                        var errorMsg='Please Type a Email First!!'
//                        validationError(errorMsg)
//                        return false;
//
//                    }

                    if(!email.match(mailformat))
                    {
                        var errorMsg='You have entered an invalid email address!';
                        validationError(errorMsg);
                        return false;
                    }


                }




                var newTextBoxDiv = $(document.createElement('div'))
                    .attr("id", 'TextBoxDiv' + counter).attr("class", 'row');
                newTextBoxDiv.after().html(
                    '<div class="col-md-12"><hr style="border-top:1px dotted #000;"></div>'+
                    '<h2 style="margin-bottom: 30px;">Referee - '+(counter+2)+'</h2>'+
                    '  <div class="row"> ' +
                    '<div class="form-group col-md-6"> ' +
                    '<label for="inputEmail4">Name<span style="color: red">*</span></label> ' +
                    '<input type="text" class="form-control" name="firstName[]" id="firstName'+counter+'" placeholder="Name" required> ' +
                    '</div> ' +
                    '<div class="form-group col-md-6"> ' +
                    '<label for="inputEmail4">Present position</label> ' +
                    '<input type="text" class="form-control" name="presentposition[]" id="presentposition'+counter+'" placeholder="position" > ' +
                    '</div> ' +
                    '<div class="form-group col-md-6"> ' +
                    '<label for="inputPassword4">Organization</label> ' +
                    '<input type="text" class="form-control" name="organization[]" id="organization'+counter+'" placeholder="organization" > ' +
                    '</div> ' +
                    '<div class="form-group col-md-6"> ' +
                    '<label for="inputPassword4">Email</label> ' +
                    '<input type="email" class="form-control" name="email[]" id="email'+counter+'" placeholder="email" > ' +
                    '</div> ' +
                    '<div class="form-group col-md-6"> ' +
                    '<label for="inputPassword4">Phone<span style="color: red">*</span></label> ' +
                    '<input type="text" class="form-control" name="phone[]" id="phone'+counter+'" placeholder="Phone" required> ' +
                    '</div> ' +
                    '<div class="form-group col-md-6"> ' +
                    '<label for="inputPassword4">Relation<span style="color: red">*</span></label> ' +
                    '<input type="text" class="form-control" name="relation[]" id="relation'+counter+'" placeholder="relation" required> ' +
                    '</div>'
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
