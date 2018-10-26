@extends('main')

@section('content')

    <div class="row ">

        <div class="col-12 ">
            <div class="card">
                <div style="background-color: #F1F1F1" class="card-body">

                    <form id="regForm" onsubmit="return chkSocialMemberShip()" action="{{route('candidate.membershipInSocialNetwork.insert')}}" method="post">
                        <!-- One "tab" for each step in the form: -->
                        {{csrf_field()}}

                        <div id="" class="tab">

                            <h2 style="margin-bottom: 30px;">Membership in Social Networks</h2>
                            <div id="TextBoxesGroup">

                                <div class="row">

                                    <div class="form-group col-md-12">
                                        <label for="inputEmail4">Name of Network<span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="networkName[]" id="networkName" placeholder="networkName" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Type of Membership<span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="membershipType[]" id="membershipType" placeholder="membership Type" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Duration<span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="duration[]" id="duration" placeholder="duration" required>
                                    </div>

                                </div>


                            </div>

                            <button type="button" id="addButton" class="btn btn-success">Add More</button>
                            <button type="button" id="removeButton" class="btn btn-success" >remove</button>

                        </div>

                        <div style="overflow:auto;">
                            <div style="float:right;">
                                <a href="{{route('candidate.previousWorkInCB.index')}}"><button type="button" id="btnPevious" >Back</button></a>
                                <button type="submit" id="submitBtn">Save</button>
                                <a href="{{route('relativeInCaritas.getRelationInfo')}}"><button type="button" id="nextBtn" >Next</button></a>
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
            x[(n+4)].className += " active";
        }

        function chkSocialMemberShip() {

            if ($("input[name=hasOtherSkill]:checked").val()=="1") {

                var networkName=document.getElementsByName('networkName[]');
                var membershipType=document.getElementsByName('membershipType[]');
                var duration=document.getElementsByName('duration[]');


                for (i=0;i<networkName.length;i++){

                    if(networkName[i].value==""){

                        var errorMsg='Please Type a Network First!!';
                        validationError(errorMsg);
                        return false;
                    }

                    if(membershipType[i].value==""){

                        var errorMsg='Please Type Membership Type First!!';
                        validationError(errorMsg);
                        return false;
                    }
                    if(duration[i].value==""){

                        var errorMsg='Please Type Membership Duration First!!';
                        validationError(errorMsg);
                        return false;
                    }


                }


            }
            else {
                return true;

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
                    alert("Only 10 Section allow per Time!!");
                    return false;
                }

                if (counter == 1 ){

                    var networkName=$('#networkName').val();

                    var membershipType=$('#membershipType').val();
                    var duration=$('#duration').val();



                    if(networkName==""){

                        var errorMsg='Please Type Network Name First!!';
                        validationError(errorMsg);
                        return false;
                    }
                    if (networkName.length > 255){

                        var errorMsg='Network Name Should not more than 255 Charecter Length!!';
                        validationError(errorMsg);
                        return false;

                    }
                    if(membershipType==""){

                        var errorMsg='Please Type Membership-Type First!!'
                        validationError(errorMsg)
                        return false;

                    }
                    if (membershipType.length > 255){

                        var errorMsg='Membership-Type Should not more than 255 Charecter Length!!';
                        validationError(errorMsg);
                        return false;

                    }
                    if(duration==""){

                        var errorMsg='Please Duration First!!';
                        validationError(errorMsg);
                        return false;

                    }
                    if (duration.length > 10){

                        var errorMsg='Duration Should not more than 10 Charecter Length!!';
                        validationError(errorMsg);
                        return false;

                    }



                }
                else {

                    var networkName=$('#networkName'+counter).val();

                    var membershipType=$('#membershipType'+counter).val();
                    var duration=$('#duration'+counter).val();



                    if(networkName==""){

                        var errorMsg='Please Type Network Name First!!';
                        validationError(errorMsg);
                        return false;
                    }
                    if (networkName.length > 255){

                        var errorMsg='Network Name Should not more than 255 Charecter Length!!';
                        validationError(errorMsg);
                        return false;

                    }
                    if(membershipType==""){

                        var errorMsg='Please Type Membership-Type First!!'
                        validationError(errorMsg)
                        return false;

                    }
                    if (membershipType.length > 255){

                        var errorMsg='Membership-Type Should not more than 255 Charecter Length!!';
                        validationError(errorMsg);
                        return false;

                    }
                    if(duration==""){

                        var errorMsg='Please Duration First!!';
                        validationError(errorMsg);
                        return false;

                    }
                    if (duration.length > 10){

                        var errorMsg='Duration Should not more than 10 Charecter Length!!';
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
                    '<label for="inputEmail4">Name of Network<span style="color: red">*</span></label>'+
                    '<input type="text" class="form-control" name="networkName[]" id="networkName'+counter+'" placeholder="networkName" required>'+
                    '</div>'+

                '<div class="form-group col-md-6">'+
                    '<label for="inputEmail4">Type of Membership<span style="color: red">*</span></label>'+
                    '<input type="text" class="form-control" name="membershipType[]" id="membershipType'+counter+'" placeholder="membership Type" required>'+
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
                    alert("Atleast One Course Section is needed!!");
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
