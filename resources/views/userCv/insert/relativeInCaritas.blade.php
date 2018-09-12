@extends('main')

@section('content')

    <div class="row ">

        <div class="col-12 ">
            <div class="card">
                <div style="background-color: #F1F1F1" class="card-body">

                    <form id="regForm" action="{{route('submit.relatiive')}}" method="post">
                        <!-- One "tab" for each step in the form: -->
                        {{csrf_field()}}

                        <div id="" class="tab">

                            <h2 style="margin-bottom: 30px;">Relative in CB</h2>
                            <div id="TextBoxesGroup">

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">First Name<span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="firstName[]" id="firstName" placeholder="first name" required>
                                    </div>



                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Last Name<span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="lastName[]" id="lastName" placeholder="last name" required>
                                    </div>



                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Degisnation<span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="degisnation[]" id="degisnation" placeholder="degisnation" required>
                                    </div>







                                </div>


                            </div>



                            <button type="button" id="addButton" class="btn btn-success">Add More</button>
                            <button type="button" id="removeButton" class="btn btn-success" >remove</button>

                        </div>

                        <div style="overflow:auto;">
                            <div style="float:right;">
                                <a href="{{route('refree.index')}}"><button type="button" id="btnPevious" >Back</button></a>
                                {{--<a id="btnPevious" class="btn btn-success" href="{{route('JobExperience.index')}}">Back</a>--}}
                                <button type="submit" id="submitBtn">Save</button>

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
                if(counter>10){
                    alert("Only 10 Section allow per Time!!");
                    return false;
                }
                $("#btnPevious").hide();

                if (counter == 1 ){

                    var firstName=$('#firstName').val();
                    var lastName=$('#lastName').val();
                    var degisnation=$('#degisnation').val();


                    var chk=/^[0-9]*$/;
                    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;



                    if(firstName==""){

                        var errorMsg='Please Type First Name First!!';
                        validationError(errorMsg);
                        return false;
                    }
                    if (firstName.length > 45){

                        var errorMsg='First Name Should not more than 45 Charecter Length!!';
                        validationError(errorMsg);
                        return false;

                    }
                    if(lastName==""){

                        var errorMsg='Please Type Last Name First!!'
                        validationError(errorMsg)
                        return false;
                    }
                    if (lastName.length > 45){

                        var errorMsg='Last Name Should not more than 45 Charecter Length!!'
                        validationError(errorMsg)
                        return false;

                    }

                    if(degisnation==""){

                        var errorMsg='Please Type Present Position First!!'
                        validationError(errorMsg)
                        return false;

                    }
                    if (degisnation.length > 100){

                        var errorMsg='Present Position Should not more than 100 Charecter Length!!';
                        validationError(errorMsg);
                        return false;

                    }




                }
                else {

                    var firstName=$('#firstName'+(counter-1)).val();
                    var lastName=$('#lastName'+(counter-1)).val();
                    var degisnation=$('#degisnation'+(counter-1)).val();

                    var chk=/^[0-9]*$/;
                    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;



                    if(firstName==""){

                        var errorMsg='Please Type First Name First!!';
                        validationError(errorMsg);
                        return false;
                    }
                    if (firstName.length > 45){

                        var errorMsg='First Name Should not more than 45 Charecter Length!!';
                        validationError(errorMsg);
                        return false;

                    }
                    if(lastName==""){

                        var errorMsg='Please Type Last Name First!!'
                        validationError(errorMsg)
                        return false;
                    }
                    if (lastName.length > 45){

                        var errorMsg='Last Name Should not more than 45 Charecter Length!!'
                        validationError(errorMsg)
                        return false;

                    }

                    if(degisnation==""){

                        var errorMsg='Please Type Present Position First!!'
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
                        '<label for="inputEmail4">First Name<span style="color: red">*</span></label> ' +
                        '<input type="text" class="form-control" name="firstName[]" id="firstName'+counter+'" placeholder="first name" required> ' +
                        '</div> ' +
                        '<div class="form-group col-md-6"> ' +
                        '<label for="inputEmail4">Last Name<span style="color: red">*</span></label> ' +
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
//                    document.getElementById("removeButton").style.display='block';
                    $("#removeButton").show();
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
