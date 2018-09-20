@extends('main')

@section('content')

    <div class="row ">

        <div class="col-12 ">
            <div class="card">
                <div style="background-color: #F1F1F1" class="card-body">

                    <div id="regForm" >


                        <div id="" class="tab">

                            <h2 style="margin-bottom: 30px;">Training Certification </h2>
                            @php($tempHr=0)
                            @foreach($trainings as $training)
                                @if($tempHr>0)
                                    <div class="col-md-12"><hr style="border-top:1px dotted #000;"></div>
                                @endif
                                <div id="edit{{$training->traningId}}">
                                    <div class="row">
                                        <div class="form-group col-md-10">

                                            <label for="inputEmail4">Name Of The Training :</label>
                                            <label for="inputEmail4">{{$training->trainingName}}</label>
                                        </div>

                                        <div class="form-group col-md-2 ">
                                            <button type="button" class="btn btn-info btn-sm " onclick="editInfo({{$training->traningId}})"><i class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-danger btn-sm " onclick="deleteTraining({{$training->traningId}})"><i class="fa fa-trash"></i></button>

                                        </div>

                                    </div>


                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label for="inputEmail4">Vanue :</label>
                                            <label for="inputEmail4">{{$training->vanue}} </label>
                                            {{--<input type="text" class="form-control" name="vanue[]" id="inputEmail4" placeholder="vanue" required>--}}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">country :</label>
                                            <label for="inputEmail4">{{$training->countryName}} </label>

                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Start Date :</label>
                                            <label for="inputEmail4">{{$training->startDate}} </label>
                                            {{--<input type="text" class="form-control date" name="startDate[]" id="start" placeholder="date" required>--}}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">End Date :</label>
                                            <label for="inputEmail4">{{$training->endDate}} </label>
                                            {{--<input type="text" class="form-control date" name="endDate[]" id="end" placeholder="date">--}}
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Staus :</label>
                                            <label for="inputPassword4">

                                                @foreach(COMPLETING_STATUS as $key=>$values)

                                                    @if($training->status == $values) {{$key}} @endif
                                                @endforeach

                                            </label>
                                            {{--<select class="form-control" name="status[]">--}}
                                            {{--<option value="1" @if($value->status == 1) selected @endif>On going</option>--}}
                                            {{--<option value="2" @if($value->status == 2) selected @endif>Completed</option>--}}
                                            {{--</select>--}}
                                        </div>
                                    </div>
                                    @php($tempHr++)
                                    @endforeach

                                </div>
                        </div>
                            <form action="{{route('insert.cvTrainingCertificate')}}" method="post">
                                <!-- One "tab" for each step in the form: -->
                                {{csrf_field()}}

                            <div id="TextBoxesGroup">


                            </div>


                            <button type="button" id="addButton" class="btn btn-success">Add More</button>
                            <button type="button" id="removeButton" class="btn btn-success" >remove</button>



                        <div style="overflow:auto;">
                            <div style="float:right;">
                                <a href="{{route('candidate.cvProfessionalCertificate')}}"><button type="button" id="btnPevious" >Back</button></a>
                                <button type="submit" id="submitBtn">Save</button>
                                <a href="{{route('JobExperience.index')}}"><button type="button" id="nextBtn" >Next</button></a>
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
                url: "{!! route('cvTrainingCertificate.edit') !!}",
                cache: false,
                data: {_token: "{{csrf_token()}}",'traningId': x},
                success: function (data) {

                    $('#edit'+x).html(data);

                }
            });
        }
        function deleteTraining(x) {


            $.confirm({
                title: 'Delete!',
                content: 'Are you sure ?',
                buttons: {
                    confirm: function () {
                        $.ajax({
                            type: 'POST',
                            url: "{!! route('cvTrainingCertificate.delete') !!}",
                            cache: false,
                            data: {_token: "{{csrf_token()}}",'traningId': x},
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



        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var x1 = document.getElementsByClassName("tab");
            x1[n].style.display = "block";
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class on the current step:
            x[(n+3)].className += " active";
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
            $("#submitBtn").hide();


            $("#addButton").click(function () {
                if(counter>10){
                    alert("Only 10 Section allow per Time!!");
                    return false;
                }

                if (counter >1)
                {
                    var trainingName=$('#trainingName'+(counter-1)).val();
                    var vanue=$('#vanue'+(counter-1)).val();
                    var country=$('#country'+(counter-1)).val();

                    var start=$('#start'+(counter-1)).val();
                    var end=$('#end'+(counter-1)).val();
                    var status=$('#trainingCertificateStatus'+(counter-1)).val();


                    if(trainingName==""){

                        var errorMsg='Please Type a Training Name First!!'
                        validationError(errorMsg)
                        return false;
                    }
                    if (trainingName.length > 100){

                        var errorMsg='Training Name Should not more than 100 Charecter Length!!'
                        validationError(errorMsg)
                        return false;

                    }
                    if(vanue==""){

                        var errorMsg='Please Type a Vanue First!!'
                        validationError(errorMsg)
                        return false;

                    }
                    if (vanue.length > 255){

                        var errorMsg='value Should not more than 255 Charecter Length!!';
                        validationError(errorMsg)
                        return false;

                    }
                    if(country==""){

                        var errorMsg='Please Select a Country First!!';
                        validationError(errorMsg)
                        return false;

                    }

                    if(start==""){
                        var errorMsg='Please Select a Strat Date First!!';
                        validationError(errorMsg)
                        return false;
                    }
                    if(status==""){
                        var errorMsg='Please Select a status First!!';
                        validationError(errorMsg)
                        return false;
                    }
//                    if(end==""){
//                        var errorMsg='Please Select a End Date First!!';
//                        validationError(errorMsg)
//                        return false;
//                    }

                    if(end != "") {


                        if (Date.parse(end) < Date.parse(start)) {
                            var errorMsg = 'End date should after Start Date!!';
                            validationError(errorMsg);
                            return false;
                        }
                    }

                }




                var newTextBoxDiv = $(document.createElement('div'))
                    .attr("id", 'TextBoxDiv' + counter).attr("class", 'row');
                newTextBoxDiv.after().html(
                    '<div class="col-md-12"><hr style="border-top:1px dotted #000;"></div>'+

                    '<div class="form-group col-md-12"> ' +
                    '<label for="inputEmail4">Name Of The Training<span style="color: red">*</span></label> ' +
                    '<input type="text" class="form-control" name="trainingName[]" id="trainingName'+counter+'" placeholder="training name" required> ' +
                    '</div> ' +

                    '<div class="form-group col-md-8"> ' +
                    '<label for="inputEmail4">Vanue <span style="color: red">*</span></label> ' +
                    '<input type="text" class="form-control" name="vanue[]" id="vanue'+counter+'" placeholder="vanue" required> ' +
                    '</div> ' +
                    '<div class="form-group col-md-4"> ' +
                    '<label for="inputPassword4">country<span style="color: red">*</span></label>' +
                    '<select required class="form-control" id="country'+counter+'" name="countryId[]">'+
                    '<option value="">Select country</option>'+
                    '@foreach($countries as $country)'+
                    '<option value="{{$country->countryId}}">{{$country->countryName}}</option>'+
                    '@endforeach'+
                    '</select>'+
                    '</div> ' +
                    '<div class="form-group col-md-4"> ' +
                    '<label for="inputPassword4">Start Date<span style="color: red">*</span></label> ' +
                    '<input type="text" class="form-control date" name="startDate[]" id="start'+counter+'" placeholder="date" required> ' +
                    '</div> ' +
                    '<div class="form-group col-md-4"> ' +
                    '<label for="inputPassword4">End Date</label> ' +
                    '<input type="text" class="form-control date" name="endDate[]" id="end'+counter+'" placeholder="date"> ' +
                    '</div>'+
                '<div class="form-group col-md-4">'+
                '<label for="inputPassword4">Staus<span style="color: red">*</span></label>'+
                '<select required class="form-control"id="trainingCertificateStatus" name="status[]">'+

                '<option value="">Select Status</option>'+
                @foreach(COMPLETING_STATUS as $key=>$value)
                    '<option value="{{$value}}">{{$key}}</option>'+
                @endforeach
                    '</select>'+
                '</div>'

                );
                newTextBoxDiv.appendTo("#TextBoxesGroup");

                counter++;
                if(counter>1){
//                    document.getElementById("removeButton").style.display='block';
                    $("#removeButton").show();
                    $("#submitBtn").show();
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
