@extends('main')

@section('content')

    <div class="row ">

        <div class="col-12 ">
            <div style="background-color: #F1F1F1" class="card updateCard">
                <div class="card-body">

                    <div class="col-md-3">

                        <div class="sidenav">
                            <a href="{{route('candidate.cvPersonalInfo')}}">Personal details</a>
                            <a href="{{route('candidate.cvQuesObj')}}" class="activeNav">Career objective and application information</a>
                            <a href="{{route('candidate.cvEducation')}}">Education</a>
                            <a  href="{{route('candidate.language.index')}}">Language</a>
                            <a  href="{{route('candidate.computerSkill.index')}}">Computer-skill</a>
                            {{--<a  href="{{route('candidate.skill.index')}}">Other Skill Information</a>--}}
                            <a  href="{{route('cv.OthersInfo')}}">Other information</a>
                            <a  href="{{route('candidate.cvTrainingCertificate')}}">Training certification</a>
                            <a  href="{{route('candidate.cvProfessionalCertificate')}}">Professional certification</a>
                            <a  href="{{route('JobExperience.index')}}">Job experience</a>
                            <a  href="{{route('candidate.previousWorkInCB.index')}}">Previous work information in Caritas Bangladesh</a>
                            <a  href="{{route('candidate.membershipInSocialNetwork.index')}}">Certification of membership in professional network/ forum</a>
                            <a  href="{{route('refree.index')}}">Referee</a>
                            <a  href="{{route('relativeInCaritas.getRelationInfo')}}">Relatives working in Caritas Bangladesh</a>
                        </div>

                    </div>

                    <div class="col-md-9" id="regForm" >
                        <!-- One "tab" for each step in the form: -->




                        <div class="tab">

                            <h2 style="margin-bottom: 30px; text-align:center">Career objective and application information</h2>




                                <div id="edit{{$employeeCvQuesObjInfo->id}}" class="row">


                                    <div class="form-group col-md-10">

                                        <label for="">#Objective :</label><br>
                                        {{$employeeCvQuesObjInfo->objective}}
                                    </div>

                                    @if($employeeCvQuesObjQuesAns->isEmpty())

                                        <div class="form-group col-md-2">
                                            <button type="button" class="btn btn-info btn-sm " onclick="editInfo({{$employeeCvQuesObjInfo->id}})"><i class="fa fa-edit"></i></button>
                                            {{--<button type="button" class="btn btn-danger btn-sm " onclick="deleteProfession({{$employeeCvQuesObjInfo->id}})"><i class="fa fa-trash"></i></button>--}}

                                        </div>
                                    @endif


                                    @if(!$employeeCvQuesObjQuesAns->isEmpty())


                                        <div class="form-group col-md-2">
                                            <button type="button" class="btn btn-info btn-sm " onclick="editInfo({{$employeeCvQuesObjInfo->id}})"><i class="fa fa-edit"></i></button>
                                            {{--<button type="button" class="btn btn-danger btn-sm " onclick="deleteProfession({{$employeeCvQuesObjInfo->id}})"><i class="fa fa-trash"></i></button>--}}

                                        </div>




                                        @php
                                            $st=1;

                                        @endphp


                                        @foreach($employeeCvQuesObjQuesAns as $empCvObjQues)

                                            <div class="form-group col-md-12">
                                                <label for="">Ques-{{$st}}: {{$empCvObjQues->ques}}<span style="color: red">*</span></label><br>
                                                {{$empCvObjQues->ans}}

                                            </div>

                                            @php
                                                $st++;
                                            @endphp

                                        @endforeach



                                        {{--<div class="form-group col-md-12">--}}

                                            {{--<label for="">#Ques-1: {{CAREER_QUES['Ques1']}}</label><br>--}}
                                            {{--{{$employeeCvQuesObjInfo->ques_1}}--}}

                                        {{--</div>--}}

                                        {{--<div class="form-group col-md-12">--}}

                                            {{--<label for="">#Ques-2: {{CAREER_QUES['Ques2']}}</label><br>--}}
                                            {{--{{$employeeCvQuesObjInfo->ques_2}}--}}

                                        {{--</div>--}}


                                        {{--<div class="form-group col-md-6">--}}
                                            {{--<label>Current Salary :</label>--}}
                                            {{--{{$employeeCvQuesObjInfo->currentSalary}}--}}
                                        {{--</div>--}}

                                    @endif



                                        <div class="form-group col-md-5">
                                            <label>Expected salary :</label>
                                            {{$employeeCvQuesObjInfo->expectedSalary}}
                                        </div>





                                        <div class="form-group col-md-5">
                                            <label>Possible joining date :</label>
                                            {{$employeeCvQuesObjInfo->readyToJoinAfter}}
                                        </div>








                                    <div class="form-group col-md-12" style="overflow:auto;">
                                        <div style="float:right;">
                                            <a href="{{route('candidate.cvPersonalInfo')}}"><button type="button" id="btnPevious">Back</button></a>

                                            <a href="{{route('candidate.cvEducation')}}"><button type="button" id="nextBtn" >Next</button></a>
                                        </div>
                                    </div>




                                    <div class="form-group col-md-12">
                                        <!-- Circles which indicates the steps of the form: -->
                                        <div style="text-align:center;margin-top:40px;">
                                            <span class="step"></span>
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
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div> <!-- end container -->
    </div>
    <!-- end wrapper -->


    <meta name="csrf-token" content="{{ csrf_token() }}" />
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
            x[(n+1)].className += " active";
        }

        function editInfo(x) {
            $.ajax({
                type: 'POST',
                url: "{!! route('cv.careerEdit') !!}",
                cache: false,
                data: {_token: "{{csrf_token()}}",'id': x},
                success: function (data) {


                    $("#nextBtn").hide();
                    $("#btnPevious").hide();

                    $('#edit'+x).html(data);


                }
            });
        }

        function isNumberKey(evt)
        {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;

            return true;
        }

</script>

@endsection