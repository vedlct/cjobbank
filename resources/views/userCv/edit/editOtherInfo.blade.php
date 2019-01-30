
<div class="col-md-12">


    <form method="post" action="{{route('update.OthersInfo')}}">
        {{csrf_field()}}
        <input type="hidden" name="empQuesObjId" value="{{$empOtherInfo->id}}">

        <div class="form-group">
            <label for="">Extra curricular activities</label>
            <textarea type="text" name="extraCurricularActivities"   rows="2" maxlength="300"ww
                      class="form-control{{ $errors->has('extraCurricularActivities') ? ' is-invalid' : '' }}"
                      id="extraCurricularActivities" placeholder="Extra Curricular Activitiese">{{$empOtherInfo->extraCurricularActivities}}</textarea>
            @if ($errors->has('extraCurricularActivities'))

                <span class="">
                                        <strong>{{ $errors->first('extraCurricularActivities') }}</strong>
                                    </span>

            @endif
            <span class="error" style="visibility: hidden;">Max word limit exceed</span>
        </div>
        <div class="form-group">
            <label for="">Interests</label>
            <textarea type="text" name="interests" maxlength="300"  rows="3" class="form-control
{{ $errors->has('interests') ? ' is-invalid' : '' }}" id="interests"
                      placeholder="Interests">{{$empOtherInfo->interests}}</textarea>
            @if ($errors->has('interests'))

                <span class="">
                                        <strong>{{ $errors->first('interests') }}</strong>
                                    </span>
            @endif
        </div>
        <div class="form-group">
            <label for="">Awards received </label>
            <textarea type="text" name="awardReceived" maxlength="300"  rows="3"
                      class="form-control {{ $errors->has('awardReceived') ? ' is-invalid' : '' }}"
                      id="awardReceived" placeholder="Awards received">{{$empOtherInfo->awardReceived}}</textarea>
            @if ($errors->has('awardReceived'))

                <span class="">
                                        <strong>{{ $errors->first('awardReceived') }}</strong>
                                    </span>
            @endif
        </div>
        <div class="form-group">
            <label for="">Research / Publication </label>
            <textarea type="text" name="researchPublication" maxlength="300"  rows="3"
                      class="form-control {{ $errors->has('researchPublication') ? ' is-invalid' : '' }}"
                      id="researchPublication" placeholder="Research / Publciation">{{$empOtherInfo->researchPublication}}</textarea>
            @if ($errors->has('researchPublication'))

                <span class="">
                                        <strong>{{ $errors->first('researchPublication') }}</strong>
                                    </span>
            @endif
        </div>

        <div style="overflow:auto;">
            <div style="float:right;">

                <a class="btn btn-danger pull-left" href="{{route('cv.OthersInfo')}}">Cancel</a>&nbsp;&nbsp;
                <button type="submit" id="submitBtn">Save</button>


            </div>
        </div>

    </form>

</div>


