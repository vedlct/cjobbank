@extends('main')

@section('content')

    <div class="row">

        <div class="col-12 ">
            <div style="background-color: #F1F1F1" class="card">
                <div class="card-body">

                    <form id="regForm" method="post" action="{{route('cv.insertQuesObj')}}" onsubmit="return submitForm()">
                        <!-- One "tab" for each step in the form: -->

                        {{csrf_field()}}


                        <div class="tab">

                            <h2 style="margin-bottom: 40px; text-align: center;">Career Objective and Application Information</h2>

                            <div class="form-group">
                                <label for="">Objective <span style="color: red">(Max Limit 300)</span><span style="color: red">*</span></label>
                                <textarea type="text" name="objective" maxlength="300"  rows="2" class="form-control{{ $errors->has('objective') ? ' is-invalid' : '' }}"  id="objective" placeholder="Career Objective">{{ old('objective') }}</textarea>
                                @if ($errors->has('objective'))

                                    <span class="">
                                        <strong>{{ $errors->first('objective') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="row">

                                <div class="form-group col-md-6">
                                    <label>Expected salary</label>
                                    <input type="text" onkeypress="return isNumberKey(event)" placeholder="expected salary" name="expectedSalary">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Possible joining date</label>
                                    <input type="text" class="date" onkeypress="return isNumberKey(event)" placeholder="Possible joining date" name="readyToJoinAfter">
                                </div>


                            </div>

                            <div class="form-group">
                                <label for="">{{CAREER_QUES['Ques0']}}<span style="color: red">*</span></label>
                                {{--<input type="checkbox" name="freshers" onclick="checkFreshers(this)">--}}
                                <div class="row">
                                    <div class="form-group col-md-12">

                                        <div class="col-md-10 mb-3">
                                            <input class="form-check-input" type="radio" required  name="hasOtherSkill" value="1"  onclick="checkFreshers(this)" > Yes&nbsp;&nbsp;
                                        </div>
                                        <div class="col-md-10">
                                            <input class="form-check-input" type="radio" required name="hasOtherSkill" value="0" onclick="hideFresher()"> No&nbsp;&nbsp;
                                        </div>
                                    </div>
                                </div>

                                {{--@if ($errors->has('CareerQues1'))--}}

                                {{--<span class="">--}}
                                {{--<strong>{{ $errors->first('CareerQues1') }}</strong>--}}
                                {{--</span>--}}
                                {{--@endif--}}
                            </div>



                            <div id="compulsoryQuestions">





                                @php
                                $st=1;

                                @endphp


                                @foreach($employeeCvQuesObjQues as $empCvObjQues)
                                    <input type="hidden" name="qesId{{$st}}" value="{{$empCvObjQues->id}}">
                                    <div class="form-group">
                                        <label for="">Ques-{{$st}}: {{$empCvObjQues->ques}}<span style="color: red">*</span></label>
                                        <textarea type="text" name="CareerQues{{$st}}" maxlength="300"  rows="3" class="form-control {{ $errors->has('CareerQues'.$st) ? ' is-invalid' : '' }}" id="CareerQues{{$st}}" placeholder="Career Question">{{ old('CareerQues'.$st) }}</textarea>
                                        @if ($errors->has('CareerQues'.$st))

                                            <span class="">
                                        <strong>{{ $errors->first('CareerQues'.$st) }}</strong>
                                    </span>
                                        @endif
                                    </div>

                                    @php
                                        $st++;
                                    @endphp

                                @endforeach



                                <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Current salary</label>
                                    <input type="text" onkeypress="return isNumberKey(event)" placeholder="current salary" name="currentSalary">
                                </div>
                                </div>

                            </div>





                        </div>

                        <div style="overflow:auto;">
                            <div style="float:right;">

                                <a href="{{route('candidate.cvPersonalInfo')}}"><button type="button" id="btnPevious">Back</button></a>

                                <button type="submit" id="submitBtn">Save</button>

                                {{--<a href="{{route('candidate.cvEducation')}}"><button type="button" id="nextBtn" >Next</button></a>--}}
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
            x[(n+1)].className += " active";
        }
    </script>

    <script type="text/javascript">
        $(function () {
            $('.date').datepicker({
                format: 'yyyy-m-d'
            });
            $('#compulsoryQuestions').hide();
        });


        function submitForm() {
            // objective
            var obj=$('#objective').val();
            // alert(obj.length);
            //
            // return false;
            if(obj.length>300){

                $.alert({
                    title: 'Error',
                    type: 'red',
                    content: "Objective should not exceed more than 300 character",
                    buttons: {
                        tryAgain: {
                            text: 'Ok',
                            btnClass: 'btn-green',
                            action: function () {

                            }
                        }
                    }
                });

                return false;
            }
            return true;
        }


        function isNumberKey(evt)
        {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;

            return true;
        }

        function checkFreshers(x) {
            // $('#compulsoryQuestions').show();
            // if($(x).prop("checked") == true){}

                $('#compulsoryQuestions').show();




        }

        function hideFresher() {
            $('#compulsoryQuestions').hide();
        }



    </script>
    @endsection