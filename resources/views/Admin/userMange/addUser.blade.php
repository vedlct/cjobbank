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
                <div class="form-group col-md-6">
                    <label>First Name</label>
                    <input type="text" class="form-control" placeholder="first name" value="{{old('firstName')}}" name="firstName">
                </div>
                <div class="form-group col-md-6">
                    <label>Last Name</label>
                    <input type="text" class="form-control" placeholder="last name" value="{{old('lastName')}}" name="lastName">
                </div>
                <div class="form-group col-md-6">
                    <label>Email</label>
                    <input type="email" class="form-control" placeholder="email" value="{{old('email')}}" name="email">
                </div>

                <div class="form-group col-md-6">
                    <label>Phone</label>
                    <input type="text" class="form-control" placeholder="phone" value="{{old('phone')}}" name="phone">
                </div>

                <div class="form-group col-md-6">
                    <label>Designation</label>
                    <select class="form-control" name="designationId" required>
                        <option>Select Designation</option>
                        @foreach($designations as $designation)
                            <option value="{{$designation->designationId}}" {{ old('designationId') == $designation->designationId ? 'selected' : '' }}>{{$designation->designationName}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Zone</label>
                    <select class="form-control" name="zoneId" required>
                        <option value="">Select Zone</option>
                        @foreach($zones as $zone)
                            <option value="{{$zone->zoneId}}" {{ old('zoneId') == $zone->zoneId ? 'selected' : '' }}>{{$zone->zoneName}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label>Gender</label>
                    <select class="form-control" name="gender" required>
                        <option value="">Select</option>
                        <option value="m">Male</option>
                        <option value="f">Female</option>
                    </select>
                </div>
                <div class="form-group col-md-8">
                    <label>Address</label>
                    <textarea name="address" placeholder="address" class="form-control" required>{{old('address')}}</textarea>
                </div>
            </div>
            <button class="btn btn-success">Insert</button>
        </form>

    </div>
</div>



@endsection