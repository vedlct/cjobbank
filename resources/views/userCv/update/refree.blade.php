@extends('main')

@section('content')

    <style>
        strong{
            color: red;
            font-style: italic;
        }
        /*#imageMsg,#signMsg{*/
        /*display: none;*/
        /*}*/
    </style>

    <div class="row ">

        <div class="col-12 ">
            <div class="card">
                <div style="background-color: #F1F1F1" class="card-body">
                    <div id="regForm">

                        <strong><span style="color: red">*</span><span style="color: red">*</span>Experience candidate : referee should be present or previous organization/company.</strong><span style="color: red">*</span><span style="color: red">*</span><br>
                        <strong><span style="color: red">*</span><span style="color: red">*</span>Freshers : referee can be from his/her own preference.</strong><span style="color: red">*</span><span style="color: red">*</span>

                        <div id="" class="tab">

                            @php($tempHr=0)

                                    @foreach($refrees as $refree)
                                        @if($tempHr>0)
                                            <div class="col-md-12"><hr style="border-top:1px dotted #000;"></div>
                                        @endif
                                <div id="edit{{$refree->refereeId}}">
                                    <h2 style="margin-bottom: 30px;">Referee - {{++$tempHr}} </h2>
                                    <div class="row">
                                        <div class="form-group offset-10 col-md-2 pull">
                                            <button type="button" class="btn btn-info btn-sm " onclick="editInfo({{$refree->refereeId}})"><i class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-danger btn-sm " onclick="deleteReferee({{$refree->refereeId}})"><i class="fa fa-trash"></i></button>

                                        </div>
                                    </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">First name</label>
                                                {{$refree->firstName}}
                                                {{--<input type="text" class="form-control" name="firstName[]" id="inputEmail4" placeholder="first name" required>--}}
                                            </div>



                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Last name</label>
                                                {{$refree->lastName}}
                                                {{--<input type="text" class="form-control" name="lastName[]" id="inputEmail4" placeholder="last name" required>--}}
                                            </div>




                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Present position</label>
                                                {{$refree->presentposition}}
                                                {{--<input type="text" class="form-control" name="presentposition[]" id="inputEmail4" placeholder="position" required>--}}
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4">Name of organization</label>
                                                {{$refree->organization}}
                                                {{--<input type="text" class="form-control" name="organization[]" id="inputPassword4" placeholder="organization" required>--}}
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4">Email</label>
                                                {{$refree->email}}
                                                {{--<input type="email" class="form-control" name="email[]" id="inputPassword4" placeholder="email" required>--}}
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4">Phone</label>
                                                {{$refree->phone}}
                                                {{--<input type="text" class="form-control" name="phone[]" id="inputPassword4" placeholder="email" required>--}}
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4">Relation</label>
                                                {{$refree->relation}}
                                                {{--<input type="text" class="form-control" name="relation[]" id="inputPassword4" placeholder="relation" required>--}}
                                            </div>
                                        </div>
                                </div>
                                            {{--@php($tempHr++)--}}
                                    @endforeach


                                    <form  action="{{route('submit.refree')}}" method="post">
                                        <!-- One "tab" for each step in the form: -->
                                        {{csrf_field()}}

                                        <div id="TextBoxesGroup">

                                        </div>



                                   {{--</div>--}}

                            <button type="button" id="addButton" class="btn btn-success">Add more</button>
                            <button type="button" id="removeButton" class="btn btn-success" >remove</button>



                        <div style="overflow:auto;">
                            <div style="float:right;">
                                <a href="{{route('candidate.membershipInSocialNetwork.index')}}"><button type="button" id="btnPevious" >Back</button></a>
                                <button type="submit" id="submitBtn">Save</button>
                                <a href="{{route('relativeInCaritas.getRelationInfo')}}"><button type="button" id="nextBtn" >Next</button></a>
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
                url: "{!! route('refree.edit') !!}",
                cache: false,
                data: {_token: "{{csrf_token()}}",'refereeId': x},
                success: function (data) {
//                    $("#btnPevious").hide();
                    $('#edit'+x).html(data);

                }
            });
        }
        function deleteReferee(x) {
            $.confirm({
                title: 'Delete!',
                content: 'Are you sure ?',
                buttons: {
                    confirm: function () {
                        $.ajax({
                            type: 'POST',
                            url: "{!! route('refree.delete') !!}",
                            cache: false,
                            data: {_token: "{{csrf_token()}}",'refereeId': x},
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
            $("#submitBtn").hide();


            $("#addButton").click(function () {
//                $("#btnPevious").hide();
                if(counter>10){
                    alert("Only 10 Section allow per Time!!");
                    return false;
                }

                if (counter >1 ){

                    var firstName=$('#firstName'+(counter-1)).val();
                    var lastName=$('#lastName'+(counter-1)).val();
                    var presentposition=$('#presentposition'+(counter-1)).val();
                    var organization=$('#organization'+(counter-1)).val();
                    var email=$('#email'+(counter-1)).val();
                    var phone=$('#phone'+(counter-1)).val();
                    var relation=$('#relation'+(counter-1)).val();

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

//                    if(presentposition==""){
//
//                        var errorMsg='Please Type Present Position First!!'
//                        validationError(errorMsg)
//                        return false;
//
//                    }
                    if (presentposition.length > 100){

                        var errorMsg='Present Position Should not more than 100 Charecter Length!!';
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

                        var errorMsg='Organization Should not more than 100 Charecter Length!!';
                        validationError(errorMsg);
                        return false;

                    }
                    if(relation==""){

                        var errorMsg='Please Type Relation First!!'
                        validationError(errorMsg)
                        return false;

                    }
                    if (relation.length > 45){

                        var errorMsg='Relation Should not more than 45 Charecter Length!!';
                        validationError(errorMsg);
                        return false;

                    }

                    if(phone==""){

                        var errorMsg='Please Type a Phone Number First!!'
                        validationError(errorMsg)
                        return false;

                    }

                    if(!phone.match(chk)) {

                        var errorMsg='Please enter a valid Phone number!!';
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
                    '<label for="inputEmail4">First Name<span style="color: red">*</span></label> ' +
                    '<input type="text" class="form-control" name="firstName[]" id="firstName'+counter+'" placeholder="first name" required> ' +
                    '</div> ' +
                    '<div class="form-group col-md-6"> ' +
                    '<label for="inputEmail4">Last Name<span style="color: red">*</span></label> ' +
                    '<input type="text" class="form-control" name="lastName[]" id="lastName'+counter+'" placeholder="last name" required> ' +
                    '</div> ' +
                    '<div class="form-group col-md-6"> ' +
                    '<label for="inputEmail4">Present Position</label> ' +
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
                    '<input type="text" class="form-control" name="phone[]" id="phone'+counter+'" placeholder="email" required> ' +
                    '</div> ' +
                    '<div class="form-group col-md-6"> ' +
                    '<label for="inputPassword4">relation<span style="color: red">*</span></label> ' +
                    '<input type="text" class="form-control" name="relation[]" id="relation'+counter+'" placeholder="relation" required> ' +
                    '</div>'
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
