@extends('main')
@section('content')

<div class="card container">
    <div class="card-body ">
        <h3 align="center">Add User</h3>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="post" action="{{route('admin.manageUser.insert')}}">
            {{csrf_field()}}
            <div class="row">
                <div class="form-group col-md-4">
                </div>
                <div class="form-group col-md-4">
                    <label>User Type<span style="color: red">*</span></label>
                    <select class="form-control" name="userType" required>
                        <option value="">Select</option>
                        @foreach(USER_TYPE as $key=>$value)
                            @if($value != 'user' )
                            <option @if(old('userType') == $value) selected @endif value="{{$value}}">{{$key}}</option>
                            @endif
                        @endforeach

                    </select>
                </div>

                <div class="form-group col-md-4">
                </div>

                <div class="form-group col-md-6">
                    <label>First Name<span style="color: red">*</span></label>
                    <input required type="text" class="form-control" placeholder="first name" value="{{old('firstName')}}" name="firstName">
                </div>
                <div class="form-group col-md-6">
                    <label>Last Name<span style="color: red">*</span></label>
                    <input required type="text" class="form-control" placeholder="last name" value="{{old('lastName')}}" name="lastName">
                </div>
                <div class="form-group col-md-6">
                    <label>Email<span style="color: red">*</span></label>
                    <input required type="email" class="form-control" placeholder="email" value="{{old('email')}}" name="email">
                </div>

                <div class="form-group col-md-6">
                    <label>Phone<span style="color: red">*</span></label>
                    <input required type="text" class="form-control" placeholder="phone" value="{{old('phone')}}" name="phone">
                </div>

                <div class="form-group col-md-6">
                    <label>Designation<span style="color: red">*</span></label>
                    <select class="form-control" name="designationId" required>
                        <option value="">Select Designation</option>
                        @foreach($designations as $designation)
                            <option value="{{$designation->designationId}}" {{ old('designationId') == $designation->designationId ? 'selected' : '' }}>{{$designation->designationName}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Zone<span style="color: red">*</span></label>
                    <select class="form-control" name="zoneId" required>
                        <option value="">Select Zone</option>
                        @foreach($zones as $zone)
                            <option value="{{$zone->zoneId}}" {{ old('zoneId') == $zone->zoneId ? 'selected' : '' }}>{{$zone->zoneName}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label>Gender<span style="color: red">*</span></label>
                    <select class="form-control" name="gender" required>
                        <option value="">Select</option>
                        @foreach(GENDER as $key=>$value)
                            <option @if(old('gender')==$value) selected @endif value="{{$value}}">{{$key}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label>Password<span style="color: red">*</span></label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                <div class="form-group col-md-4">
                    <label>Confirm Password<span style="color: red">*</span></label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                </div>
                <div class="form-group col-md-12">
                    <label>Address<span style="color: red">*</span></label>
                    <textarea name="address" placeholder="address" class="form-control" required>{{old('address')}}</textarea>
                </div>
            </div>
            <button class="btn btn-success">Insert</button>
        </form>

    </div>
</div>



@endsection