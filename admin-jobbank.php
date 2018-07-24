
<html>

<!-- Mirrored from themesdesign.in/upcube/layouts/horizontal/form-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 07 May 2018 07:46:42 GMT -->
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
                    <h4 class="page-title">Job Bank</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="card-header-tabs">
                            <h4>Job Bank</h4>
                        </div>

                        <div align="right">
                            <button class="btn btn-info">Add New</button>
                        </div>
                        <br>
                        <div class="row">
                        <div class=" form-group col-lg-4">
                            <label>Zone</label>
                            <select class="form-control">
                                <option>Select a Zone</option>
                                <option>Dhaka</option>
                                <option>Khulna</option>
                                <option>Barishal</option>
                                <option>Rangpur</option>

                            </select>
                        </div>
                        <div class=" form-group col-lg-4">
                            <label>Post Date</label>
                            <input class="form-control" type="date">
                        </div>
                        <div class=" form-group col-lg-4">
                            <label>Deadline</label>
                            <input class="form-control" type="date">
                        </div>
                        </div>
                        <table id="adminjobbank" class="table table-striped table-bordered" style="width:100%" >
                            <thead>
                            <tr>
                                <th width="5%">SL</th>
                                <th>Job Title</th>
                                <th>Zone</th>
                                <th>Post Date</th>
                                <th>Deadline</th>
                                <th width="10%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>System Architect</td>
                                <td>Dhaka</td>
                                <td>2009/09/15</td>
                                <td>2011/04/25</td>
                                <td><button class="btn btn-sm btn-success">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Integration Specialist</td>
                                <td>Rajshahi</td>
                                <td>2011/04/25</td>
                                <td>2011/07/25</td>
                                <td><button class="btn btn-sm btn-success">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Junior Technical Author</td>
                                <td>Khulna</td>
                                <td>2009/09/15</td>
                                <td>2009/01/12</td>
                                <td><button class="btn btn-sm btn-success">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Senior Javascript Developer</td>
                                <td>Barisal</td>
                                <td>2011/04/25</td>
                                <td>2012/03/29</td>
                                <td><button class="btn btn-sm btn-success">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Accountant</td>
                                <td>Panchagare</td>
                                <td>2011/04/25</td>
                                <td>2008/11/28</td>
                                <td><button class="btn btn-sm btn-success">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Integration Specialist</td>
                                <td>Rangpur</td>
                                <td>2011/04/25</td>
                                <td>2012/12/02</td>
                                <td><button class="btn btn-sm btn-success">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>Sales Assistant</td>
                                <td>Noyakhali</td>
                                <td>2011/04/25</td>
                                <td>2012/08/06</td>
                                <td><button class="btn btn-sm btn-success">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td>Integration Specialist</td>
                                <td>Barisal</td>
                                <td>2009/09/15</td>
                                <td>2010/10/14</td>
                                <td><button class="btn btn-sm btn-success">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td>Javascript Developer</td>
                                <td>Barisal</td>
                                <td>2009/09/15</td>
                                <td>2009/09/15</td>
                                <td><button class="btn btn-sm btn-success">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>11</td>
                                <td>Software Engineer</td>
                                <td>Barisal</td>
                                <td>2009/09/15</td>
                                <td>2008/12/13</td>
                                <td><button class="btn btn-sm btn-success">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>12</td>
                                <td>Office Manager</td>
                                <td>Barisal</td>
                                <td>2009/09/15</td>
                                <td>2008/12/19</td>
                                <td><button class="btn btn-sm btn-success">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>13</td>
                                <td>Support Lead</td>
                                <td>Panchagare</td>
                                <td>2009/09/15</td>
                                <td>2013/03/03</td>
                                <td><button class="btn btn-sm btn-success">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>14</td>
                                <td>Regional Director</td>
                                <td>San Francisco</td>
                                <td>2009/09/15</td>
                                <td>2008/10/16</td>
                                <td><button class="btn btn-sm btn-success">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>15</td>
                                <td>Senior Marketing Designer</td>
                                <td>Khulna</td>
                                <td>2009/09/15</td>
                                <td>2012/12/18</td>
                                <td><button class="btn btn-sm btn-success">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>16</td>
                                <td>Panchagare</td>
                                <td>Khulna</td>
                                <td>2009/04/10</td>
                                <td>2010/03/17</td>
                                <td><button class="btn btn-sm btn-success">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>17</td>
                                <td>Marketing Designer</td>
                                <td>Rajshahi</td>
                                <td>2009/04/10</td>
                                <td>2012/11/27</td>
                                <td><button class="btn btn-sm btn-success">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>18</td>
                                <td>Chief Financial Officer (CFO)</td>
                                <td>Rajshahi</td>
                                <td>2009/04/10</td>
                                <td>2010/06/09</td>
                                <td><button class="btn btn-sm btn-success">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>19</td>
                                <td>Systems Administrator</td>
                                <td>Dhaka</td>
                                <td>2009/04/10</td>
                                <td>2009/04/10</td>
                                <td><button class="btn btn-sm btn-success">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>20</td>
                                <td>Software Engineer</td>
                                <td>Panchagare</td>
                                <td>2009/04/10</td>
                                <td>2012/10/13</td>
                                <td><button class="btn btn-sm btn-success">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
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

<!--    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>-->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>


<script>
    $(document).ready(function() {
        $('#adminjobbank').DataTable(

            {
                columnDefs : [ {
                    "targets": 5,
                    "sortable"  : false
                } ]
            }
        );
    } );
</script>



</body>

<!-- Mirrored from themesdesign.in/upcube/layouts/horizontal/form-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 07 May 2018 07:46:42 GMT -->
</html>