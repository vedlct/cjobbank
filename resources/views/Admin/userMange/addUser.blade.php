@extends('main')
@section('content')

<div class="card container">
    <div class="card-body ">
        <div class="row">
            <div class="form-group col-md-6">
                <label>First Name</label>
                <input type="text" class="form-control" placeholder="first name" name="firstName">
            </div>
            <div class="form-group col-md-6">
                <label>Last Name</label>
                <input type="text" class="form-control" placeholder="last name" name="lastName">
            </div>
            <div class="form-group col-md-6">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="email" name="email">
            </div>

            <div class="form-group col-md-6">
                <label>Phone</label>
                <input type="text" class="form-control" placeholder="phone" name="phone">
            </div>

            <div class="form-group col-md-6">
                <label>Designation</label>
                <select class="form-control">
                    <option>Select Designation</option>
                    <option>Designation1</option>
                    <option>Designation2</option>
                    <option>Designation3</option>

                </select>
            </div>
            <div class="form-group col-md-6">
                <label>Address</label>
                <textarea name="address" placeholder="address" class="form-control"></textarea>
            </div>
        </div>
    </div>
</div>



@endsection