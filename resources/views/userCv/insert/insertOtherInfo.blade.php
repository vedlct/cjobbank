@extends('main')

@section('content')

    <div class="row">

        <div class="col-12 ">
            <div style="background-color: #F1F1F1" class="card">
                <div class="card-body">

                    <form id="regForm" method="post" action="{{route('insert.OthersInfo')}}">
                        <!-- One "tab" for each step in the form: -->

                        {{csrf_field()}}
                        <div class="tab">

                            <h2 style="margin-bottom: 40px; text-align: center;">Employee Other Info</h2>


                            <div class="form-group">
                                <label for="">Extra Curricular Activities</label>
                                <textarea type="text" name="extraCurricularActivities" maxlength="200"  rows="2"
                                          class="form-control{{ $errors->has('extraCurricularActivities') ? ' is-invalid' : '' }}"
                                          id="objective" placeholder="Extra Curricular Activities">{{ old('extraCurricularActivities') }}</textarea>
                                @if ($errors->has('extraCurricularActivities'))

                                    <span class="">
                                        <strong>{{ $errors->first('extraCurricularActivities') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Interests</label>
                                <textarea type="text" name="interests" maxlength="200"  rows="3"
                                          class="form-control {{ $errors->has('interests') ? ' is-invalid' : '' }}"
                                          id="interests" placeholder="Interests">{{ old('interests') }}</textarea>
                                @if ($errors->has('interests'))

                                    <span class="">
                                        <strong>{{ $errors->first('interests') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Award Received</label>
                                <textarea type="text" name="awardReceived" maxlength="200"  rows="3"
                                          class="form-control {{ $errors->has('awardReceived') ? ' is-invalid' : '' }}"
                                          id="awardReceived" placeholder="Award Received">{{ old('awardReceived') }}</textarea>
                                @if ($errors->has('awardReceived'))

                                    <span class="">
                                        <strong>{{ $errors->first('awardReceived') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Research Publication</label>
                                <textarea type="text" name="researchPublication" maxlength="200"
                                           rows="3" class="form-control {{ $errors->has('researchPublication') ? ' is-invalid' : '' }}"
                                          id="researchPublication" placeholder="Research Publication">{{ old('researchPublication') }}</textarea>
                                @if ($errors->has('researchPublication'))

                                    <span class="">
                                        <strong>{{ $errors->first('researchPublication') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>

                        <div style="overflow:auto;">
                            <div style="float:right;">

                                <a href="{{route('candidate.cvPersonalInfo')}}"><button type="button" id="btnPevious">Back</button></a>

                                <button type="submit" id="submitBtn">Save</button>

                                <a href="{{route('candidate.cvEducation')}}"><button type="button" id="nextBtn" >Next</button></a>
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



@endsection