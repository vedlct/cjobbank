
<html>

<?php include ('head.php')?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />

<body>

<!-- Loader -->
<!--<div id="preloader"><div id="status"><div class="spinner"></div></div></div>-->

<!-- Navigation Bar-->
<?php include ('menu.php') ?>
<!-- End Navigation Bar-->


<div class="wrapper">
    <div class="container-fluid">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group pull-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="#">Upcube</a></li>
                            <li class="breadcrumb-item"><a href="#">Forms</a></li>
                            <li class="breadcrumb-item active">Form Elements</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Home</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">


                    <div class="card-body">


                        <div align="right">
                            <a href="user.php"> <button class="btn btn-info">Add New</button></a>
                        </div>
                        <br>
                        <div class="row">
                            <div class=" form-group col-lg-3">
                                <label>Zone</label>
                                <select class="form-control">
                                    <option>Select a Zone</option>
                                    <option>Dhaka</option>
                                    <option>Khulna</option>
                                    <option>Barishal</option>
                                    <option>Rangpur</option>

                                </select>
                            </div>

                            <div class=" form-group col-lg-2">
                                <label>Degisnation</label>
                                <select class="form-control">
                                    <option>Select a Degisnation</option>
                                    <option>Excutive</option>
                                    <option>Senior Excutive</option>

                                </select>
                            </div>
                        </div>

                        <table id="managecv" class="table table-striped table-bordered" style="width:100%" >
                            <thead>
                            <tr>
                                <th width="4%">Select</th>
                                <th>Name</th>
                                <th>Degisnation</th>
                                <th>Gender</th>
                                <th>Email</th>
                                <th>Zone</th>
                                <th width="8%">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr>
                                <td><input type="checkbox"></td>
                                <td> Sakib Rahman</td>
                                <td>Executive</td>
                                <td>Male</td>
                                <td>sakib@gmail.com</td>
                                <td>Dhaka</td>
                                <td><button class="btn btn-sm btn-success">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td> Forhad Uddin</td>
                                <td>Senior Executive</td>
                                <td>Male</td>
                                <td>forhad@gmail.com</td>
                                <td>Brisal</td>
                                <td><button class="btn btn-sm btn-success">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td> Farzad Rahman</td>
                                <td>Executive</td>
                                <td>Male</td>
                                <td>farzad@gmail.com</td>
                                <td>Dhaka</td>
                                <td><button class="btn btn-sm btn-success">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td> Mujtaba Rumi</td>
                                <td>Executive</td>
                                <td>Male</td>
                                <td>sakib@gmail.com</td>
                                <td>Dhaka</td>
                                <td><button class="btn btn-sm btn-success">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td> Sakib Rahman</td>
                                <td>Executive</td>
                                <td>Male</td>
                                <td>sakib@gmail.com</td>
                                <td>Khulna</td>
                                <td><button class="btn btn-sm btn-success">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td> Forhad Uddin</td>
                                <td>Executive</td>
                                <td>Male</td>
                                <td>forhad@gmail.com</td>
                                <td>Khulna</td>
                                <td><button class="btn btn-sm btn-success">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td> Farzad Rahman</td>
                                <td>Senior Executive</td>
                                <td>Male</td>
                                <td>farzad@gmail.com</td>
                                <td>Dhaka</td>
                                <td><button class="btn btn-sm btn-success">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td> Mujtaba Rumi</td>
                                <td>Senior Executive</td>
                                <td>Male</td>
                                <td>sakib@gmail.com</td>
                                <td>Dhaka</td>
                                <td><button class="btn btn-sm btn-success">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td> Sakib Rahman</td>
                                <td>Senior Executive</td>
                                <td>Male</td>
                                <td>sakib@gmail.com</td>
                                <td>Khulna</td>
                                <td><button class="btn btn-sm btn-success">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td> Sakib Rahman</td>
                                <td>Executive</td>
                                <td>Male</td>
                                <td>sakib@gmail.com</td>
                                <td>Dhaka</td>
                                <td><button class="btn btn-sm btn-success">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td> Sakib Rahman</td>
                                <td>Senior Executive</td>
                                <td>Male</td>
                                <td>sakib@gmail.com</td>
                                <td>Khulna</td>
                                <td><button class="btn btn-sm btn-success">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td> Sakib Rahman</td>
                                <td>Executive</td>
                                <td>Male</td>
                                <td>sakib@gmail.com</td>
                                <td>Dhaka</td>
                                <td><button class="btn btn-sm btn-success">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td> Sakib Rahman</td>
                                <td>Senior Executive</td>
                                <td>Male</td>
                                <td>sakib@gmail.com</td>
                                <td>Khulna</td>
                                <td><button class="btn btn-sm btn-success">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td> Sakib Rahman</td>
                                <td>Executive</td>
                                <td>Male</td>
                                <td>sakib@gmail.com</td>
                                <td>Dhaka</td>
                                <td><button class="btn btn-sm btn-success">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td> Sakib Rahman</td>
                                <td>Senior Executive</td>
                                <td>Male</td>
                                <td>sakib@gmail.com</td>
                                <td>Khulna</td>
                                <td><button class="btn btn-sm btn-success">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td> Forhad Uddin</td>
                                <td>Senior Executive</td>
                                <td>Male</td>
                                <td>forhad@gmail.com</td>
                                <td>Dhaka</td>
                                <td><button class="btn btn-sm btn-success">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td> Farzad Rahman</td>
                                <td>Executive</td>
                                <td>Male</td>
                                <td>farzad@gmail.com</td>
                                <td>Khulna</td>
                                <td><button class="btn btn-sm btn-success">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td> Mujtaba Rumi</td>
                                <td>Senior Executive</td>
                                <td>Male</td>
                                <td>sakib@gmail.com</td>
                                <td>Dhaka</td>
                                <td><button class="btn btn-sm btn-success">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td> Sakib Rahman</td>
                                <td>Executive</td>
                                <td>Male</td>
                                <td>sakib@gmail.com</td>
                                <td>Khulna</td>
                                <td><button class="btn btn-sm btn-success">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td> Sakib Rahman</td>
                                <td>Senior Executive</td>
                                <td>Male</td>
                                <td>sakib@gmail.com</td>
                                <td>Dhaka</td>
                                <td><button class="btn btn-sm btn-success">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td> Forhad Uddin</td>
                                <td>Executive</td>
                                <td>Male</td>
                                <td>forhad@gmail.com</td>
                                <td>Khulna</td>
                                <td><button class="btn btn-sm btn-success">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td> Farzad Rahman</td>
                                <td>Senior Executive</td>
                                <td>Male</td>
                                <td>farzad@gmail.com</td>
                                <td>Dhaka</td>
                                <td><button class="btn btn-sm btn-success">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td> Mujtaba Rumi</td>
                                <td>Executive</td>
                                <td>Male</td>
                                <td>sakib@gmail.com</td>
                                <td>Khulna</td>
                                <td><button class="btn btn-sm btn-success">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>

                            </tbody>

                        </table>
                        <br>

                        <div><label>Select All</label>
                            <input type="checkbox"></div>
                        <button class="btn btn-danger">Export CV</button>

                    </div>

                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div> <!-- end container -->

</div>
<!-- end wrapper -->
<?php include ('footer.php') ?>

<!--    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>-->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>


<script>
    $(document).ready(function() {
        $('#managecv').DataTable(

            {
                "columnDefs": [
                    {
                        "targets": [0,6], //first column / numbering column
                        "orderable": false, //set not orderable
                        "sorting":false,
                    },

                ]
            }
        );
    } );
</script>



</body>

<!-- Mirrored from themesdesign.in/upcube/layouts/horizontal/form-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 07 May 2018 07:46:42 GMT -->
</html>