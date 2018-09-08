@extends('main')
@section('content')

    <!-- Modal -->
    <div class="modal fade" id="NewZoneModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <b><h4 class="modal-title dark profile-title" id="myModalLabel">Create Zone</h4></b>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

                </div>

                <div class="modal-body">

                    <form action="">


                            <div class="form-group">
                                <label for="">Zone Name</label>
                                <input type="text" class="form-control" id="" placeholder="">
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
                        <h4>Manage Zone</h4>
                    </div>

                    <div align="right">
                        <a onclick="addZone()" href="#"> <button class="btn btn-info">Add New</button></a>
                    </div>
                    <br>


                    <table id="managecv" class="table table-striped table-bordered" style="width:100%" >
                        <thead>
                        <tr>


                            <th>Zone Name</th>
                            <th width="8%">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr>


                            <td>Dhaka</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>


                            <td>Brisal</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>


                            <td>Dhaka</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>


                            <td>Dhaka</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>


                            <td>Khulna</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>


                            <td>Khulna</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>


                            <td>Dhaka</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>


                            <td>Dhaka</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>


                            <td>Khulna</td>
                            <td><button class="btn btn-sm btn-success">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>


                            <td>Dhaka</td>
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
        function addZone() {


            $('#NewZoneModal').modal({show:true});

        }
    </script>


@endsection