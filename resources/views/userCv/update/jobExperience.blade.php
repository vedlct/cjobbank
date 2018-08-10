@extends('main')

@section('content')

    <div class="row ">

        <div class="col-12 ">
            <div class="card">
                <div style="background-color: #F1F1F1" class="card-body">
                    <div id="regForm">


                        <div id="" class="tab">

                            <h2 style="margin-bottom: 30px;">Job Experience</h2>
                            @php($tempHr=0)
                            @foreach($experiences as $experience)
                                @if($tempHr>0)
                                    <div class="col-md-12"><hr style="border-top:1px dotted #000;"></div>
                                @endif
                                    <div id="edit{{$experience->jobExperienceId}}">
                                        <div class="row">
                                            <div class="form-group col-md-10">
                                                <label for="inputEmail4">Company Name :</label>
                                              {{$experience->organization}}
                                                {{--<input type="text" class="form-control" name="organization[]" id="inputEmail4" placeholder="organization" required>--}}
                                            </div>

                                            <div class="form-group col-md-2 ">
                                                <button type="button" class="btn btn-info btn-sm " onclick="editInfo({{$experience->jobExperienceId}})"><i class="fa fa-edit"></i></button>
                                                <button type="button" class="btn btn-danger btn-sm " onclick="deleteExperience({{$experience->jobExperienceId}})"><i class="fa fa-trash"></i></button>

                                            </div>


                                            <div class="form-group col-md-4">
                                                <label for="inputEmail4">Designation :</label>
                                                {{$experience->degisnation}}
                                                {{--<input type="text" class="form-control" name="degisnation[]" id="inputEmail4" placeholder="designation" required>--}}
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputPassword4">Start Date :</label>
                                                {{$experience->startDate}}
                                                {{--<input type="text" class="form-control date" name="startDate[]" id="start" placeholder="date" required>--}}
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputPassword4">End Date :</label>
                                                @if($experience->endDate==null)
                                                    Running
                                                @else
                                                {{$experience->endDate}}
                                                @endif
                                            </div>
                                            <div class="form-group col-md-8">
                                                <label for="inputPassword4">Address :</label>
                                                {{$experience->address}}
                                                {{--<textarea class="form-control" name="address[]" placeholder="address"></textarea>--}}
                                            </div>
                                        </div>
                                    </div>
                                    @php($tempHr++)
                            @endforeach

                            <form  action="{{route('submit.jobExperience')}}" method="post">
                                <!-- One "tab" for each step in the form: -->
                                {{csrf_field()}}
                                <div id="TextBoxesGroup">
                                </div>



                            <button type="button" id="addButton" class="btn btn-success">Add More</button>
                            <button type="button" id="removeButton" class="btn btn-success" >remove</button>

                        </div>

                        <div style="overflow:auto;">
                            <div style="float:right;">

                                <button type="submit" id="submitBtn">Save</button>
                                <a href="{{route('refree.index')}}"><button type="button" id="nextBtn" >Next</button></a>
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

        function editInfo(x){

            $.ajax({
                type: 'POST',
                url: "{!! route('JobExperience.edit') !!}",
                cache: false,
                data: {_token: "{{csrf_token()}}",'jobExperienceId': x},
                success: function (data) {
//                    console.log(data);
                    $('#edit'+x).html(data);

                }
            });
        }
        function deleteExperience(x){
            $.confirm({
                title: 'Delete!',
                content: 'Are you sure ?',
                buttons: {
                    confirm: function () {
                        $.ajax({
                            type: 'POST',
                            url: "{!! route('JobExperience.delete') !!}",
                            cache: false,
                            data: {_token: "{{csrf_token()}}",'jobExperienceId': x},
                            success: function (data) {
//                                console.log(data);
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
            x[(n+4)].className += " active";
        }
    </script>



    <script type="text/javascript">
        $(function () {
            $('.date').datepicker({
                format: 'yyyy-m-d'
            });

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




                var newTextBoxDiv = $(document.createElement('div'))
                    .attr("id", 'TextBoxDiv' + counter).attr("class", 'row');
                newTextBoxDiv.after().html(
                    '<div class="col-md-12"><hr style="border-top:1px dotted #000;"></div>' +
                    '<div class="row"> ' +
                    '<div class="form-group col-md-12"> ' +
                    '<label for="inputEmail4">Company Name</label> ' +
                    '<input type="text" class="form-control" name="organization[]" id="inputEmail4" placeholder="organization" required> ' +
                    '</div> ' +
                    '<div class="form-group col-md-4"> ' +
                    '<label for="inputEmail4">Designation</label> ' +
                    '<input type="text" class="form-control" name="degisnation[]" id="inputEmail4" placeholder="designation" required> ' +
                    '</div> ' +
                    '<div class="form-group col-md-4"> ' +
                    '<label for="inputPassword4">Start Date</label> ' +
                    '<input type="text" class="form-control date" name="startDate[]" id="start" placeholder="date" required> ' +
                    '</div> ' +
                    '<div class="form-group col-md-4"> ' +
                    '<label for="inputPassword4">End Date</label> ' +
                    '<input type="text" class="form-control date" name="endDate[]" id="end" placeholder="date"> ' +
                    '</div> ' +
                    '<div class="form-group col-md-8"> ' +
                    '<label for="inputPassword4">Address</label> ' +
                    '<textarea class="form-control" name="address[]" placeholder="address"></textarea> ' +
                    '</div> ' +
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

    </script>



@endsection
