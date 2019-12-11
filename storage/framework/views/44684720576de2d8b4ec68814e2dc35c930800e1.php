<?php echo $__env->make('layouts/header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<style>
    .alert-feedback{
        color: red;
    }
    th{
        font-family: bold;
    }

</style>
<noscript>
<div  align="center" class="alert alert-danger">

    <span style="color: #f45e41"><strong style="color: red">Notice: </strong> &nbsp; JavaScript is not enabled. !! <br> <a style="color: green" target="_blank" href="http://enable-javascript.com/" class="alert-link">Please Enable JavaScript Safley.</a></span>
</div>
<style>form,header,section,.card,.card-body,footer { display:none; }</style>
</noscript>


<body>

<!-- Loader -->


<!-- Navigation Bar-->
<header id="topnav">
    <div class="topbar-main">
        <div class="container-fluid">

            <!-- Logo container-->
            <div class="logo">
                <!-- Image Logo -->
                <a href="#" class="logo">
                    <h3>CARITAS JOB BANK</h3>
                </a>

            </div>
            <!-- End Logo container-->


            <div class="menu-extras topbar-custom">

                <!-- Search input -->
                <div class="search-wrap" id="search-wrap">
                    <div class="search-bar">
                        <input class="search-input" type="search" placeholder="Search" />
                        <a href="#" class="close-search toggle-search" data-target="#search-wrap">
                            <i class="mdi mdi-close-circle"></i>
                        </a>
                    </div>
                </div>

                <ul class="list-inline float-right mb-0">
                    <!-- Search -->
                    
                        
                            
                        
                    
                    <!-- Messages-->
                    
                        
                           
                            
                            
                        
                        
                            
                            
                                
                            

                            
                            
                                
                                
                            

                            
                            
                                
                                
                            

                            
                            
                                
                                
                            

                            
                            
                                
                            

                        
                    
                    <!-- notification-->
                    
                        
                           
                            
                            
                        
                        
                            
                            
                                
                            

                            
                            
                                
                                
                            

                            
                            
                                
                                
                            

                            
                            
                                
                                
                            

                            
                            
                                
                            

                        
                    
                    <!-- User-->
                    <li class="list-inline-item dropdown notification-list">
                        <b style="color: white"><?php echo e(Auth::user()->name); ?></b>
                        <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                           aria-haspopup="false" aria-expanded="false">
                            <img src="<?php echo e(url('public/assets/images/users/avatar-1.png')); ?>" alt="user" class="rounded-circle">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            
                            
                            <a class="dropdown-item" href="<?php echo e(route('password')); ?>"><i class="dripicons-gear text-muted"></i>Change Password</a>

                            <div class="dropdown-divider"></div>
                            
                               
                                                     


                            
                            <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out"></i> <?php echo e(__('Logout')); ?>

                            </a>


                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                <?php echo e(csrf_field()); ?>

                            </form>
                        </div>
                    </li>
                    <li class="menu-item list-inline-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle nav-link">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </li>

                </ul>
            </div>
            <!-- end menu-extras -->

            <div class="clearfix"></div>

        </div> <!-- end container -->
    </div>
    <!-- end topbar-main -->

    <?php echo $__env->make('layouts/navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</header>
<!-- End Navigation Bar-->






<div class="wrapper">

    <div id="wait" style="display:none;position:absolute;top:20%;left:50%;padding:2px;z-index: 9999">
        <img src='<?php echo e(url('public/images/pleaseWait-1.gif')); ?>' />
    </div>

    <div class="container-fluid">



        <?php echo $__env->yieldContent('content'); ?>

    </div> <!-- end container -->

</div>
<!-- end wrapper -->




<?php echo $__env->make('layouts/footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>