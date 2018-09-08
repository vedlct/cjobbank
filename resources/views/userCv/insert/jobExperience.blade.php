@extends('main')

@section('content')

    <div class="row ">

        <div class="col-12 ">
            <div class="card">
                <div style="background-color: #F1F1F1" class="card-body">

                    <form id="regForm" action="{{route('submit.jobExperience')}}" method="post">
                        <!-- One "tab" for each step in the form: -->
                        {{csrf_field()}}

                        <div id="" class="tab">

                            <h2 style="margin-bottom: 30px;">Job Experience</h2>
                            <div id="TextBoxesGroup">

                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="inputEmail4">Company Name</label>
                                        <input type="text" class="form-control" name="organization[]" id="organization" placeholder="organization" required>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Designation</label>
                                        <input type="text" class="form-control" name="degisnation[]" id="degisnation" placeholder="designation" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4">Start Date</label>
                                        <input type="text" class="form-control date" name="startDate[]" id="start" placeholder="date" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4">End Date</label>
                                        <input type="text" class="form-control date" name="endDate[]" id="end" placeholder="date">
                                    </div>
                                    <div class="form-group col-md-8">
                                        <label for="inputPassword4">Address</label>
                                        <textarea class="form-control" name="address[]" id="address" placeholder="address"></textarea>
                                    </div>
                                </div>


                            </div>

                            <button type="button" id="addButton" class="btn btn-success">Add More</button>
                            <button type="button" id="removeButton" class="btn btn-success" >remove</button>

                        </div>

                        <div style="overflow:auto;">
                            <div style="float:right;">

                                <button type="submit" id="submitBtn">Save</button>
{{--                                <a href="{{route('refree.index')}}"><button type="button" id="nextBtn" >Next</button></a>--}}
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

        $(document).ready(function(){

            var counter = 1;
            $("#removeButton").hide();


            $("#addButton").click(function () {
                if(counter>10){
                    alert("Only 10 Section allow per Time!!");
                    return false;
                }

                if (counter == 1 ){

                    var organization=$('#organization').val();
                    var degisnation=$('#degisnation').val();
                    var start=$('#start').val();
                    var end=$('#end').val();
                    var address=$('#address').val();



                    if(organization==""){

                        var errorMsg='Please Type Organization Name First!!'
                        validationError(errorMsg)
                        return false;
                    }
                    if (organization.length > 100){

                        var errorMsg='Organization Name Should not more than 100 Charecter Length!!'
                        validationError(errorMsg)
                        return false;

                    }
                    if(degisnation==""){

                        var errorMsg='Please Type Designation First!!'
                        validationError(errorMsg)
                        return false;

                    }
                    if (degisnation.length > 100){

                        var errorMsg='Designation Should not more than 100 Charecter Length!!';
                        validationError(errorMsg);
                        return false;

                    }
                    if(start==""){

                        var errorMsg='Please Select a Strat Date First!!';
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

                    if($.trim(address)==""){

                        var errorMsg='Please Type address First!!';
                        validationError(errorMsg);
                        return false;

                    }



                }
                else {

                    var organization=$('#organization'+(counter-1)).val();
                    var degisnation=$('#degisnation'+(counter-1)).val();
                    var start=$('#start'+(counter-1)).val();
                    var end=$('#end'+(counter-1)).val();
                    var address=$('#address'+(counter-1)).val();



                    if(organization==""){

                        var errorMsg='Please Type Organization Name First!!'
                        validationError(errorMsg)
                        return false;
                    }
                    if (organization.length > 100){

                        var errorMsg='Organization Name Should not more than 100 Charecter Length!!'
                        validationError(errorMsg)
                        return false;

                    }
                    if(degisnation==""){

                        var errorMsg='Please Type Designation First!!'
                        validationError(errorMsg)
                        return false;

                    }
                    if (degisnation.length > 100){

                        var errorMsg='Designation Should not more than 100 Charecter Length!!';
                        validationError(errorMsg);
                        return false;

                    }
                    if(start==""){

                        var errorMsg='Please Select a Strat Date First!!';
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

                    if($.trim(address)==""){

                        var errorMsg='Please Type address First!!';
                        validationError(errorMsg);
                        return false;

                    }


                }




                var newTextBoxDiv = $(document.createElement('div'))
                    .attr("id", 'TextBoxDiv' + counter).attr("class", 'row');
                newTextBoxDiv.after().html(
                    '<div class="col-md-12"><hr style="border-top:1px dotted #000;"></div>' +
                    '<div class="row"> ' +
                    '<div class="form-group col-md-12"> ' +
                    '<label for="inputEmail4">Company Name</label> ' +
                    '<input type="text" class="form-control" name="organization[]" id="organization'+counter+'" placeholder="organization" required> ' +
                    '</div> ' +
                    '<div class="form-group col-md-4"> ' +
                    '<label for="inputEmail4">Designation</label> ' +
                    '<input type="text" class="form-control" name="degisnation[]" id="degisnation'+counter+'" placeholder="designation" required> ' +
                    '</div> ' +
                    '<div class="form-group col-md-4"> ' +
                    '<label for="inputPassword4">Start Date</label> ' +
                    '<input type="text" class="form-control date" name="startDate[]" id="start'+counter+'" placeholder="date" required> ' +
                    '</div> ' +
                    '<div class="form-group col-md-4"> ' +
                    '<label for="inputPassword4">End Date</label> ' +
                    '<input type="text" class="form-control date" name="endDate[]" id="end'+counter+'" placeholder="date"> ' +
                    '</div> ' +
                    '<div class="form-group col-md-8"> ' +
                    '<label for="inputPassword4">Address</label> ' +
                    '<textarea class="form-control" name="address[]" id="address'+counter+'" placeholder="address"></textarea> ' +
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
