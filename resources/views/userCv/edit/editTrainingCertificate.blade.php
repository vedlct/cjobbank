<div class="row">
    <div class="form-group col-md-10">

        <label for="inputEmail4">Name Of The Training</label>
        <input type="text" class="form-control" name="trainingName" value="{{$training->trainingName}}" id="inputEmail4" placeholder="training name" required>
    </div>
    <div class="form-group col-md-2 ">
        <button type="button" class="btn btn-info btn-sm " onclick="editInfo({{$training->traningId}})"><i class="fa fa-edit"></i></button>
        <button type="button" class="btn btn-danger btn-sm " onclick="deleteTraining({{$training->traningId}})"><i class="fa fa-trash"></i></button>

    </div>
</div>

<div class="row">
    <div class="form-group col-md-8">
        <label for="inputEmail4">Vanue </label>
        <input type="text" class="form-control" name="vanue" value="{{$training->vanue}}" id="inputEmail4" placeholder="vanue" required>
    </div>
    <div class="form-group col-md-4">
        <label for="inputPassword4">country</label>
        {{--<input type="text" class="form-control"  id="inputPassword4" placeholder="">--}}
        <select class="form-control" name="countryId">
            @foreach($countries as $country)
                <option value="{{$country->countryId}}" @if($training->countryId == $country->countryId) selected @endif>{{$country->countryName}}</option>

            @endforeach
        </select>
    </div>

    <div class="form-group col-md-4">
        <label for="inputPassword4">Start Date</label>
        <input type="text" class="form-control date" name="startDate" value="{{$training->startDate}}" id="start" placeholder="date" required>
    </div>
    <div class="form-group col-md-4">
        <label for="inputPassword4">End Date</label>
        <input type="text" class="form-control date" name="endDate"  value="{{$training->endDate}}" id="end" placeholder="date">
    </div>

