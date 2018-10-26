@extends('main')

@section('content')

    <div class="row ">

        <div class="col-12 ">
            <div class="card">
                <div style="background-color: #F1F1F1" class="card-body">

                    <form id="regForm" onsubmit="return chkPreviousWork()" action="{{route('candidate.previousWorkInCB.insert')}}" method="post">
                        <!-- One "tab" for each step in the form: -->
                        {{csrf_field()}}

                        <div id="" class="tab">

                            <h2 style="margin-bottom: 30px;">Previous work information in Caritas Bangladesh</h2>

                            <div class="row">
                                <div class="form-group">
                                    <label class="control-label">Previouly work information in Caritas Bangladesh?<span style="color: red" class="required">*</span>:</label>
                                    <div class="col-md-10">
                                        <input type="radio" required <?php if ($hasWorkedInCB=='1'){?>checked<?php } ?> name="hasWorkedInCB" value="1"> Yes&nbsp;&nbsp;
                                        <input type="radio" required <?php if ($hasWorkedInCB=='0'){?>checked<?php } ?> name="hasWorkedInCB" value="0"> No&nbsp;&nbsp;
                                    </div>
                                </div>
                            </div>
                            <div style="display: none" id="PreviousWorkInCBDiv">
                            <div id="TextBoxesGroup">

                                <div class="row">


                                    <div class="form-group col-md-12">
                                        <label for="inputEmail4">Designation<span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="degisnation[]" id="degisnation" placeholder="designation" >
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Start Date<span style="color: red">*</span></label>
                                        <input type="text" class="form-control date" name="startDate[]" id="start" placeholder="date">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">End Date</label> /
                                        <input type="checkbox" id="currentlyRunning" name="currentlyRunning[]" value="1">Currenly Running
                                        <input type="text" class="form-control date" name="endDate[]" id="end" placeholder="date">

                                    </div>

                                </div>


                            </div>

                            <button type="button" id="addButton" class="btn btn-success">Add More</button>
                            <button type="button" id="removeButton" class="btn btn-success" >remove</button>

                        </div>
                        </div>

                        <div style="overflow:auto;">
                            <div style="float:right;">
                                <a href="{{route('refree.index')}}"><button type="button" id="btnPevious" >Back</button></a>
                                <button type="submit" id="submitBtn">Save</button>
                                @if($hasWorkedInCB == '1' || $hasWorkedInCB == '0')
                                <a href="{{route('candidate.membershipInSocialNetwork.index')}}"><button type="button" id="nextBtn" >Next</button></a>
                                @endif
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

        $("input[name=hasWorkedInCB]").click( function () {

            if ($(this).val()=='1'){
                $('#PreviousWorkInCBDiv').show();
            }else {
                $('#PreviousWorkInCBDiv').hide();
            }
        });

        $(document).ready(function(){
            if ('<?php echo $hasWorkedInCB?>'== '0'){

                $('#PreviousWorkInCBDiv').hide();

            }else if ('<?php echo $hasWorkedInCB?>'== '1'){
                $('#PreviousWorkInCBDiv').show();

            }
        });

        function chkPreviousWork() {

            if ($("input[name=hasOtherSkill]:checked").val()=="1") {

                var degisnation=document.getElementsByName('degisnation[]');
                var startDate=document.getElementsByName('startDate[]');


                for (i=0;i<degisnation.length;i++){

                    if(degisnation[i].value==""){

                        var errorMsg='Please Type a Designation First!!';
                        validationError(errorMsg);
                        return false;
                    }

                    if(startDate[i].value==""){

                        var errorMsg='Please Type Start Date First!!';
                        validationError(errorMsg);
                        return false;
                    }


                }


            }
            else {
                return true;

            }

        }

        $(document).ready(function(){

            var counter = 1;
            $("#removeButton").hide();


            $("#addButton").click(function () {
                if(counter>10){
                    alert("Only 10 Section allow per Time!!");
                    return false;
                }

                if (counter == 1 ){


                    var degisnation=$('#degisnation').val();
                    var start=$('#start').val();
                    var end=$('#end').val();



                    if(degisnation==""){

                        var errorMsg='Please Type Designation First!!'
                        validationError(errorMsg)
                        return false;

                    }
                    if (degisnation.length > 255){

                        var errorMsg='Designation Should not more than 255 Charecter Length!!';
                        validationError(errorMsg);
                        return false;

                    }
                    if(start==""){

                        var errorMsg='Please Select a Start Date First!!';
                        validationError(errorMsg);
                        return false;

                    }
                    if(end != "") {


                        if (Date.parse(end) < Date.parse(start)) {

                            var errorMsg = 'End date should after Start Date!!';
                            validationError(errorMsg);
                            return false;

                        }
                    }
                    else {
                        if ($("#currentlyRunning").prop('checked') != true){

                            var errorMsg = 'Either End date or Currently Running Should be Selected!!';
                            validationError(errorMsg);
                            return false;

                        }
                    }





                }
                else {


                    var degisnation=$('#degisnation'+(counter-1)).val();
                    var start=$('#start'+(counter-1)).val();
                    var end=$('#end'+(counter-1)).val();



                    if(degisnation==""){

                        var errorMsg='Please Type Designation First!!'
                        validationError(errorMsg)
                        return false;

                    }
                    if (degisnation.length > 255){

                        var errorMsg='Designation Should not more than 255 Charecter Length!!';
                        validationError(errorMsg);
                        return false;

                    }
                    if(start==""){

                        var errorMsg='Please Select a Start Date First!!';
                        validationError(errorMsg);
                        return false;

                    }
                    if(end != "") {


                        if (Date.parse(end) < Date.parse(start)) {

                            var errorMsg = 'End date should after Start Date!!';
                            validationError(errorMsg);
                            return false;

                        }
                    }
                    else {
                        if ($("#currentlyRunning"+(counter-1)).prop('checked') != true){

                            var errorMsg = 'Either End date or Currently Running Should be Selected!!';
                            validationError(errorMsg);
                            return false;

                        }
                    }



                }




                var newTextBoxDiv = $(document.createElement('div'))
                    .attr("id", 'TextBoxDiv' + counter).attr("class", 'row');
                newTextBoxDiv.after().html(

                    '<div class="col-md-12"><hr style="border-top:1px dotted #000;"></div>' +
                    '<div class="row"> ' +
                    '<div class="form-group col-md-4"> ' +
                    '<label for="inputEmail4">Designation</label> ' +
                    '<input type="text" class="form-control" name="degisnation[]" id="degisnation'+counter+'" placeholder="designation" > ' +
                    '</div> ' +
                    '<div class="form-group col-md-4"> ' +
                    '<label for="inputPassword4">Start Date</label> ' +
                    '<input type="text" class="form-control date" name="startDate[]" id="start'+counter+'" placeholder="date"> ' +
                    '</div> ' +
                    '<div class="form-group col-md-4"> ' +
                    '<label for="inputPassword4">End Date</label> ' +
                    '<input type="text" class="form-control date" name="endDate[]" id="end'+counter+'" placeholder="date"> ' +
                    '/ <input type="checkbox" id="currentlyRunning'+counter+'" name="currentlyRunning[]" value="1">Currenly Running'+
                '</div> ' +
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
