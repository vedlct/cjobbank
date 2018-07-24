<!DOCTYPE html>
<html>


<?php include ('head.php') ?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />


<body>

<!-- Loader -->
<!--        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>-->

<!-- Navigation Bar-->
<?php include ('usermenu.php') ?>
<!-- End Navigation Bar-->


<div class="wrapper">
    <div class="container-fluid">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group pull-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
<!--                            <li class="breadcrumb-item"><a href="#">Upcube</a></li>-->
<!--                            <li class="breadcrumb-item"><a href="#">Forms</a></li>-->
<!--                            <li class="breadcrumb-item active">Form Elements</li>-->
                        </ol>
                    </div>
                    <h4 class="page-title">Manage Application</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">

                        <div class="card-header-tabs">
                            <h4>Manage Application</h4>
                        </div>

                        <!--                        <div align="right">-->
                        <!--                            <a href="cvform.php"> <button class="btn btn-info">Add New</button></a>-->
                        <!--                        </div>-->
                        <br>


                        <table id="manageapplication" class="table table-striped table-bordered" style="width:100%" >
                            <thead>
                            <tr>

                                <th>Job Title</th>
                                <th>Zone</th>
                                <th>Apply Date</th>

                                <th width="8%">Status</th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr>

                                <td>Manager</td>
                                <td>Dhaka</td>
                                <td>2018/04/10</td>
                                <td>Pending
                                </td>
                            </tr>
                            <tr>

                                <td>HR</td>
                                <td>Rangpur</td>

                                <td>2018/06/12</td>
                                <td>Approved
                                </td>
                            </tr>
                            <tr>

                                <td>Web Developer</td>
                                <td>Barishal</td>

                                <td>2018/05/12</td>
                                <td>Rejected
                                </td>
                            </tr>
                            <tr>

                                <td>Software Engineer</td>
                                <td>Khulna</td>
                                <td>2018/02/15</td>
                                <td>Pending
                                </td>
                            </tr>
                            <tr>

                                <td>Jr. Software Engineer </td>
                                <td>Khulna</td>
                                <td>2018/04/10</td>
                                <td>Pending
                                </td>
                            </tr>
                            <tr>

                                <td>Office Assistant</td>
                                <td>Dhaka</td>

                                <td>2018/06/12</td>
                                <td>Rejected
                                </td>
                            </tr>
                            <tr>

                                <td>Jr. Software Engineer </td>
                                <td>Barishal</td>

                                <td>2018/05/12</td>
                                <td>Rejected
                                </td>
                            </tr>
                            <tr>

                                <td>Web Developer</td>
                                <td>Dhaka</td>

                                <td>2018/02/15</td>
                                <td>Rejected
                                </td>
                            </tr>
                            <tr>

                                <td>Manager</td>
                                <td>Barishal</td>
                                <td>2011/04/25</td>
                                <td>Rejected
                                </td>
                            </tr>
                            <tr>

                                <td>Sr. Manager</td>
                                <td>Dhaka</td>

                                <td>2018/04/25</td>
                                <td>Rejected
                                </td>
                            </tr>
                            <tr>

                                <td>Manager</td>
                                <td>Dhaka</td>

                                <td>2011/04/25</td>
                                <td>Rejected
                                </td>
                            </tr>





                            <tr>

                                <td>Manager</td>
                                <td>Khulna</td>
                                <td>2011/04/25</td>
                                <td>Rejected
                                </td>
                            </tr>
                            <tr>

                                <td>HR</td>
                                <td>Barishal</td>
                                <td>2018/04/10</td>
                                <td>Approved
                                </td>
                            </tr>
                            <tr>

                                <td>Software Engineer</td>
                                <td>Dhaka</td>

                                <td>2018/06/12</td>
                                <td>Approved
                                </td>
                            </tr>
                            <tr>

                                <td>Manager</td>
                                <td>Dhaka</td>

                                <td>2018/05/12</td>
                                <td>Rejected
                                </td>
                            </tr>
                            <tr>
                                
                                <td>Web Developer</td>
                                <td>Khulna</td>
                                <td>2018/02/15</td>
                                <td>Rejected
                                </td>
                            </tr>

                            </tbody>

                        </table>
                        


                    </div>

                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div> <!-- end container -->
</div>
<!-- end wrapper -->


<?php include ('footer.php') ?>

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>


<script>
    $(document).ready(function() {
        $('#manageapplication').DataTable(

            {
                "columnDefs": [
                    {
                        "targets": [0,1,3], //first column / numbering column
                        "orderable": false, //set not orderable

                    },

                ]
            }
        );
    } );
</script>

</body>

<!-- Mirrored from themesdesign.in/upcube/layouts/horizontal/form-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 07 May 2018 07:46:42 GMT -->
</html>