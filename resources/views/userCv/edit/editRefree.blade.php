<form method="post" action="{{route('update.refree')}}">
    {{csrf_field()}}
    <input type="hidden" name="refereeId" value="{{$refree->refereeId}}">
<div class="row">
    <div class="form-group col-md-6">
        <label for="inputEmail4">First Name</label>
        <input type="text" class="form-control" name="firstName" value="{{$refree->firstName}}" id="inputEmail4" placeholder="first name" required>
    </div>



    <div class="form-group col-md-6">
        <label for="inputEmail4">Last Name</label>
        <input type="text" class="form-control" name="lastName" value="{{$refree->lastName}}" id="inputEmail4" placeholder="last name" required>
    </div>



    <div class="form-group col-md-6">
        <label for="inputEmail4">Present position</label>
        <input type="text" class="form-control" name="presentposition" value="{{$refree->presentposition}}" id="inputEmail4" placeholder="position" required>
    </div>

    <div class="form-group col-md-6">
        <label for="inputPassword4">Organization</label>
        <input type="text" class="form-control" name="organization" value="{{$refree->organization}}" id="inputPassword4" placeholder="organization" required>
    </div>

    <div class="form-group col-md-6">
        <label for="inputPassword4">Email</label>
        <input type="email" class="form-control" name="email" value="{{$refree->email}}" id="inputPassword4" placeholder="email" required>
    </div>

    <div class="form-group col-md-6">
        <label for="inputPassword4">phone</label>
        <input type="text" class="form-control" name="phone" value="{{$refree->phone}}" id="inputPassword4" placeholder="email" required>
    </div>

    <div class="form-group col-md-6">
        <label for="inputPassword4">relation</label>
        <input type="text" class="form-control" name="relation" value="{{$refree->relation}}" id="inputPassword4" placeholder="relation" required>
    </div>

    <div class="form-group col-md-12">
        <button  class="btn btn-info pull-right">Update</button>
    </div>




</div>

</form>