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
                            <a  href="{{route('refree.index')}}">Referee</a>
                            <a  href="{{route('relativeInCaritas.getRelationInfo')}}">Relatives working in Caritas Bangladesh</a>
                        </div>

                    </div>
                    <div class="col-md-9" id="regForm">


                        <div id="" class="tab">

                            <h2 style="margin-bottom: 30px;">Certification of membership in professional network/ forum</h2>
                            @php($tempHr=0)
                            @foreach($socialMembership as $socialMembership)
                                @if($tempHr>0)
                                    <div class="col-md-12"><hr style="border-top:1px dotted #000;"></div>
                                @endif
                                <div id="edit{{$socialMembership->membershipId}}">
                                    <div class="row">


                                        <div class="form-group col-md-10">
                                            <label for="inputEmail4">Name of network :</label>
                                            {{$socialMembership->networkName}}

                                        </div>

                                        <div class="form-group col-md-2 ">
                                            <button type="button" class="btn btn-info btn-sm " onclick="editInfo({{$socialMembership->membershipId}})"><i class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-danger btn-sm " onclick="deleteMembership({{$socialMembership->membershipId}})"><i class="fa fa-trash"></i></button>

                                        </div>


                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Type of membership :</label>
                                            {{$socialMembership->membershipType}}

                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Duration :</label>
                                            {{$socialMembership->duration}}

                                        </div>

                                    </div>
                                </div>
                                @php($tempHr++)
                            @endforeach

                            <form  action="{{route('candidate.membershipInSocialNetwork.insert')}}" method="post">
                                <!-- One "tab" for each step in the form: -->
                                {{csrf_field()}}
                                <div id="TextBoxesGroup">
                                </div>



                                <button type="button" id="addButton" class="btn btn-success">Add more</button>
                                <button type="button" id="removeButton" class="btn btn-success" >Remove</button>

                        </div>


                        <div style="overflow:auto;">
                            <div style="float:right;">
                                <a href="{{route('candidate.previousWorkInCB.index')}}"><button type="button" id="btnPevious" >Back</button></a>

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
                url: "{!! route('candidate.membershipInSocialNetwork.edit') !!}",
                cache: false,
                data: {_token: "{{csrf_token()}}",'id': x},
                success: function (data) {
//                    console.log(data);
                    $('#edit'+x).html(data);
                    $("#addButton").hide();
                    $("#btnPevious").hide();
                    $("#nextBtn").hide();

                }
            });
        }
        function deleteMembership(x){
            $.confirm({
                title: 'Delete!',
                content: 'Are you sure ?',
                buttons: {
                    confirm: function () {
                        $.ajax({
                            type: 'POST',
                            url: "{!! route('candidate.membershipInSocialNetwork.delete') !!}",
                            cache: false,
                            data: {_token: "{{csrf_token()}}",'id': x},
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

                if (counter > 1){

                    var networkName=$('#networkName'+(counter-1)).val();
                    var membershipType=$('#membershipType'+(counter-1)).val();
                    var duration=$('#duration'+(counter-1)).val();



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
                    '<input type="text" class="form-control" name="duration[]" id="duration'+counter+'" placeholder="duration" required>'+
                    '</div>'+
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
                    alert("Atleast one course section is needed!!");
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
