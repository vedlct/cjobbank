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
                        <input type="text" class="form-control" placeholder="first name" value="{{$hr->firstName}}" name="firstName">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Last Name</label>
                        <input type="text" class="form-control" placeholder="last name" value="{{$hr->lastName}}" name="lastName">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Email</label>
                        <input type="email" class="form-control" placeholder="email" value="{{$hr->email}}" name="email">
                    </div>

                    <div class="form-group col-md-6">
                        <label>Phone</label>
                        <input type="text" class="form-control" placeholder="phone" value="{{$hr->phone}}" name="phone">
                    </div>

                    <div class="form-group col-md-6">
                        <label>Designation</label>
                        <select class="form-control" name="designationId" required>
                            <option>Select Designation</option>
                            @foreach($designations as $designation)
                                <option value="{{$designation->designationId}}" {{ $hr->fkdesignationId == $designation->designationId ? 'selected' : '' }}>{{$designation->designationName}}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Zone</label>
                        <select class="form-control" name="zoneId" required>
                            <option value="">Select Zone</option>
                            @foreach($zones as $zone)
                                <option value="{{$zone->zoneId}}" {{ $hr->fkzoneId == $zone->zoneId ? 'selected' : '' }}>{{$zone->zoneName}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Gender</label>
                        <select class="form-control" name="gender" required>
                            <option value="">Select</option>
                            <option value="m" {{ $hr->gender == 'm' ? 'selected' : '' }}>Male</option>
                            <option value="f" {{ $hr->gender == 'f' ? 'selected' : '' }}>Female</option>
                            <option value="o" {{ $hr->gender == 'o' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>
                    <div class="form-group col-md-8">
                        <label>Address</label>
                        <textarea name="address" placeholder="address" class="form-control" required>{{$hr->address}}</textarea>
                    </div>
                </div>
                <button class="btn btn-success">Update</button>
            </form>

        </div>
    </div>



@endsection