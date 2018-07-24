<!DOCTYPE html>
<html>


<?php include ('head.php') ?>


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
                            <li class="breadcrumb-item"><a href="#">Upcube</a></li>
                            <li class="breadcrumb-item"><a href="#">Forms</a></li>
                            <li class="breadcrumb-item active">Form Elements</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Form Elements</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">

                        <form id="regForm" action="/action_page.php">
                            <!-- One "tab" for each step in the form: -->
                            <div class="tab">

                                <h2 style="margin-bottom: 40px; text-align: center;">Personal Details </h2>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">First Name</label>
                                        <input type="text" class="form-control" id="" placeholder="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Last Name</label>
                                        <input type="text" class="form-control" id="" placeholder="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Fathers Name</label>
                                        <input type="text" class="form-control" id="" placeholder="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Mothers Name</label>
                                        <input type="text" class="form-control" id="" placeholder="">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Gender</label>
                                        <select class="form-control" id="sel1">
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Religion</label>
                                        <select class="form-control" id="sel1">
                                            <option>Muslim</option>
                                            <option>Hindu</option>
                                            <option>Christian</option>
                                            <option>Buddhist</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Ethnicity</label>
                                        <select class="form-control" id="sel1">
                                            <option>Bangali</option>
                                            <option>Adibashi</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Disability</label>
                                        <select class="form-control" id="sel1">
                                            <option>Yes</option>
                                            <option>No</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Date of Birth</label>
                                        <input type="text" class="form-control" id="" placeholder="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Skype</label>
                                        <input type="text" class="form-control" id="" placeholder="">
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Nationality</label>
                                        <select class="form-control" id="sel1">
                                            <option>Bangladeshi</option>
                                            <option>Others</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="">NID </label>
                                        <input type="text" class="form-control" id="" placeholder="">
                                    </div>

                                </div>



                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Contact No.</label>
                                        <input type="text" class="form-control" id="" placeholder="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Email</label>
                                        <input type="text" class="form-control" id="" placeholder="">
                                    </div>
                                </div>




                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="">Current Address</label>
                                        <input type="text" class="form-control" id="" placeholder="">
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="form-group col-md-12">
                                        <label for="">Permanent Address</label>
                                        <input type="text" class="form-control" id="" placeholder="">
                                    </div>

                                </div>

                            </div>


                            <div class="tab">

                                <h2 style="margin-bottom: 40px; text-align: center;">Career Objective </h2>

                                <div class="row">

                                    <div class="form-group col-md-12">
                                        <textarea class="form-control" rows="5" id=""></textarea>
                                    </div>

                                </div>

                            </div>


                            <div class="tab">

                                <h2 style="margin-bottom: 30px; text-align:center">Education </h2>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <h4>SSC</h4>
                                        <hr>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-5">
                                        <label for="">Institute Name</label>
                                        <input type="text" class="form-control" id="" placeholder="">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Group</label>
                                        <select class="form-control" id="sel1">
                                            <option>Science</option>
                                            <option>Arts</option>
                                            <option>Commerce</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="">Year</label>
                                        <input type="text" class="form-control" id="" placeholder="">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="">CGPA</label>
                                        <input type="text" class="form-control" id="" placeholder="">
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <h4 style="margin-top:30px; ">HSC</h4>
                                        <hr>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-5">
                                        <label for="">Institute Name</label>
                                        <input type="text" class="form-control" id="" placeholder="">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Group</label>
                                        <select class="form-control" id="">
                                            <option>Science</option>
                                            <option>Arts</option>
                                            <option>Commerce</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="">Year</label>
                                        <input type="text" class="form-control" id="" placeholder="">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="">CGPA</label>
                                        <input type="text" class="form-control" id="" placeholder="">
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <h4 style="margin-top:30px; ">Undergrade</h4>
                                        <hr>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-5">
                                        <label for="">Institute Name</label>
                                        <input type="text" class="form-control" id="" placeholder="">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Department</label>
                                        <select class="form-control" id="">
                                            <option>Science</option>
                                            <option>Arts</option>
                                            <option>Commerce</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="">Year</label>
                                        <input type="text" class="form-control" id="" placeholder="">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="">CGPA</label>
                                        <input type="text" class="form-control" id="" placeholder="">
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <h4 style="margin-top:30px; ">Masters</h4>
                                        <hr>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-5">
                                        <label for="">Institute Name</label>
                                        <input type="text" class="form-control" id="" placeholder="">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Department</label>
                                        <select class="form-control" id="">
                                            <option>Science</option>
                                            <option>Arts</option>
                                            <option>Commerce</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="">Year</label>
                                        <input type="text" class="form-control" id="" placeholder="">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="">CGPA</label>
                                        <input type="text" class="form-control" id="" placeholder="">
                                    </div>

                                </div>

                                <button type="button" class="btn btn-success">Add More</button>
                            </div>






                            <div class="tab">

                                <h2 style="margin-bottom: 30px;">Professional Certification </h2>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="inputEmail4">Exam Name</label>
                                        <input type="email" class="form-control" id="inputEmail4" placeholder="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-8">
                                        <label for="inputEmail4">Institute Name</label>
                                        <input type="email" class="form-control" id="inputEmail4" placeholder="">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4">Passing Year</label>
                                        <input type="password" class="form-control" id="inputPassword4" placeholder="">
                                    </div>
                                </div>

                                <button type="button" class="btn btn-success">Add More</button>

                            </div>




                            <div class="tab">Birthday:
                                <p><input placeholder="dd" oninput="this.className = ''" name="dd"></p>
                                <p><input placeholder="mm" oninput="this.className = ''" name="nn"></p>
                                <p><input placeholder="yyyy" oninput="this.className = ''" name="yyyy"></p>
                            </div>

                            <div class="tab">Login Info:
                                <p><input placeholder="Username..." oninput="this.className = ''" name="uname"></p>
                                <p><input placeholder="Password..." oninput="this.className = ''" name="pword" type="password"></p>
                            </div>

                            <div style="overflow:auto;">
                                <div style="float:right;">
                                    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                                    <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                                </div>
                            </div>
                            <!-- Circles which indicates the steps of the form: -->
                            <div style="text-align:center;margin-top:40px;">
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                            </div>
                        </form>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div> <!-- end container -->
</div>
<!-- end wrapper -->


<?php include ('footer.php') ?>

</body>

<!-- Mirrored from themesdesign.in/upcube/layouts/horizontal/form-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 07 May 2018 07:46:42 GMT -->
</html>