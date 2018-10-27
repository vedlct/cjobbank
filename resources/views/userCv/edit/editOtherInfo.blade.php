
<div class="col-md-12">


    <form method="post" action="{{route('update.OthersInfo')}}">
        {{csrf_field()}}
        <input type="hidden" name="empQuesObjId" value="{{$empOtherInfo->id}}">

        <div class="form-group">
            <label for="">extraCurricularActivities</label>
            <textarea type="text" name="extraCurricularActivities" maxlength="200"  rows="2"
                      class="form-control{{ $errors->has('extraCurricularActivities') ? ' is-invalid' : '' }}"
                      id="extraCurricularActivities" placeholder="Career Objective">{{$empOtherInfo->extraCurricularActivities}}</textarea>
            @if ($errors->has('extraCurricularActivities'))

                <span class="">
                                        <strong>{{ $errors->first('extraCurricularActivities') }}</strong>
                                    </span>
            @endif
        </div>
        <div class="form-group">
            <label for="">interests</label>
            <textarea type="text" name="interests" maxlength="200"  rows="3" class="form-control
{{ $errors->has('interests') ? ' is-invalid' : '' }}" id="interests"
                      placeholder="interests">{{$empOtherInfo->interests}}</textarea>
            @if ($errors->has('interests'))

                <span class="">
                                        <strong>{{ $errors->first('interests') }}</strong>
                                    </span>
            @endif
        </div>
        <div class="form-group">
            <label for="">awardReceived </label>
            <textarea type="text" name="awardReceived" maxlength="200"  rows="3"
                      class="form-control {{ $errors->has('awardReceived') ? ' is-invalid' : '' }}"
                      id="awardReceived" placeholder="awardReceived">{{$empOtherInfo->awardReceived}}</textarea>
            @if ($errors->has('awardReceived'))

                <span class="">
                                        <strong>{{ $errors->first('awardReceived') }}</strong>
                                    </span>
            @endif
        </div>
        <div class="form-group">
            <label for="">researchPublication </label>
            <textarea type="text" name="researchPublication" maxlength="200"  rows="3"
                      class="form-control {{ $errors->has('researchPublication') ? ' is-invalid' : '' }}"
                      id="researchPublication" placeholder="researchPublication">{{$empOtherInfo->researchPublication}}</textarea>
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