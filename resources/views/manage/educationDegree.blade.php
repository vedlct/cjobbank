@extends('main')
@section('content')

    <!-- Modal -->
    <div class="modal fade" id="NewEducationDegreeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <b><h4 class="modal-title dark profile-title" id="myModalLabel">Create Education Degree</h4></b>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

                </div>

                <div class="modal-body">

                    <form action="">


                        <div class="form-group">

                            <label for="">Education Level<span style="color: red">*</span></label>
                            <select name="educationLevel" class="form-control" required="" id="educationLevel">
                                <option value="">Select Education Level</option>

                                    <option >HSC</option>
                                    <option >BSC</option>
                                    <option >MSC</option>
                                    <option >PHD</option>

                            </select>

                        </div>
                        <div class="form-group">

                            <label for="">Degree<span style="color: red">*</span></label>
                            <select  name="degree" class="form-control" required id="degree">
                                <option value="">Select Degree</option>
                                <option value="">BSc in CSE</option>
                                <option value="">BSC in EEE</option>
                                <option value="">MSc in CSE</option>

                            </select>

                        </div>
                        <div class="form-group">

                            <button type="button" class="btn btn-success">Submit</button>
                        </div>

                    </form>

                </div>



            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">


                <div class="card-body">
                    <div class="card-header-tabs">
                        <h4>Manage Education</h4>
                    </div>

                    <div align="right">
                        <a onclick="addnewEducation()" href="#"> <button class="btn btn-info">Add New</button></a>
                    </div>
                    <br>


                    <table id="managecv" class="table table-striped table-bordered" style="width:100%" >
                        <thead>
                        <tr>


                            <th>Education Level Name</th>
                            <th>Education Degree Name</th>
                            <th width="8%">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr>


                            <td>HSC</td>
                            <td></td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>


                            <td>SSC</td>
                            <td></td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>


                            <td>BSc</td>
                            <td>BSc in CSE</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>

                            <td>BSc</td>
                            <td>BSC in EEE</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>

                            <td>MSc</td>
                            <td>MSc in CSE</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>


                            <td>PhD</td>
                            <td></td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>



                        </tbody>

                    </table>
                    <br>


                </div>

            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->



@endsection
@section('foot-js')

    <script>
        function addnewEducation() {


            $('#NewEducationDegreeModal').modal({show:true});

        }
    </script>


@endsection