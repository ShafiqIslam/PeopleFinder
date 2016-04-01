<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot;?>font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto:500,400" />
        <title>FaceFinder</title>

        <?php
            echo $this->Html->meta('icon');
            //echo $this->Html->css('cake.generic');
            echo $this->Html->css(array('bootstrap', 'bootstrap-datetimepicker', 'jquery-ui', 'bootstrap-formhelpers.min','bootstrapValidator.min','fileinput', 'custom'));
            echo $this->Html->script(array('jquery-1.11.3', 'bootstrap.min', 'fileinput.js', 'jquery-ui', 'bootstrap-formhelpers.min', 'bootstrap-formhelpers-countries', 'validator.min', 'bootstrapValidator.min','count',));
        ?>
        <script type="text/javascript" src="https://maps.google.com/maps/api/js?libraries=drawing"></script>
        <?php
            echo $this->Html->script(array('app',));
            echo $this->fetch('meta');
            echo $this->fetch('css');
            echo $this->fetch('script');
        ?>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <?php $logged = $this->Session->read('logged_user'); ?>

        <header class="large">
            <!--<div class="container-fluid header_top"></div>-->

            <nav class="navbar  navbar-fixed-top">
                <div class="container-fluid">
                    <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span> 
                            </button>
                            <img class="logo" src="<?php echo $this->webroot;?>img/logo_2.png"/> 
                    </div>
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="<?php if($page=='home') echo 'active';?>"><a href="<?php echo $this->webroot;?>home">Home</a></li>
                            <li class="<?php if($page=='search') echo 'active';?>"><a class="" href="<?php echo $this->webroot;?>search">Search</a></li>
                            <li class="dropdown <?php if($page=='report') echo 'active';?>">
                                <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#">Report<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li style="margin-top: 0px;"><a href="<?php echo $this->webroot;?>report_found">Report Found</a></li>
                                    <li style="margin-top: 0px;"><a href="<?php echo $this->webroot;?>report_missing">Report Missing</a></li>
                                </ul>
                            </li>
                            <?php if(!empty($logged)) { ?>
                            <li class="dropdown <?php if($page=='my_account') echo '';?>">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">My Account</a>
                                <ul class="dropdown-menu dropdown_menu_modal my_account_modal">
                                    <span class="glyphicon glyphicon-triangle-top"></span>
                                    <li>
                                        <div class="main_account_body row">
                                            <div class="account_title">
                                                <h4>Shamim Forhad</h4>
                                                <a href="<?php echo $this->webroot;?>myaccount" class="btn btn_myaccount">My Account</a>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="my_account_options">
                                            <a href="<?php echo $this->webroot;?>my_reports" class="btn btn_myaccount pull-left"><span><i class="fa fa-bell"></i></span>Reports</a>
                                            <a href="<?php echo $this->webroot;?>reporters/logout" class="btn btn_myaccount pull-right"><span><i class="fa fa-sign-out fa-lg"></i></span>Signout</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <?php } else { ?>
                            <li class="<?php if($page=='signup') echo 'active';?>">
                                <a class="" href="<?php echo $this->webroot;?>signup">Sign up</a>
                            </li>
                           <!-- <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="modal" data-target="#login1">Login</a></li>-->
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Login</a>
                                <ul class="dropdown-menu dropdown_menu_modal">
                                    <span class="glyphicon glyphicon-triangle-top"></span>
                                    <li>
                                        <form  name="login_form" enctype="multipart/form-data" method="post" action="<?php echo $this->webroot;?>reporters/login" class="form-horizontal">
                                            <div class="form-group">
                                                <label for="inputEmail" class="col-sm-12 control-label">Email</label>
                                                <div class="col-sm-12">
                                                    <input type="email" name="data[Reporter][email]" class="form-control" id="" placeholder="Email" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="inputPassword" class="col-sm-12 control-label">Password</label>
                                                <div class="col-sm-12">
                                                    <input type="password" class="form-control" id="inputPassword3" name="data[Reporter][password]" placeholder="passward" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-offset-6 col-sm-6">
                                                    <button type="submit" class="btn btn-primary btn_search">Login</button>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12 forget_pass">
                                                    <p><a href="<?php echo $this->webroot;?>reporters/forgot_password">Forgot your password?</a></p>
                                                </div>
                                            </div>
                                        </form>
                                    </li>
                                </ul>
                            </li>

                            <?php } ?>

                        </ul>
                    </div>   
                </div>
            </nav>

            <?php if(empty($logged)) { ?>

            <!-- Modal login -->
            <div id="login1" class="modal fade" role="dialog">
                <div class="modal-dialog modal_login modal_large">
                    <!-- Modal content-->
                    <div class="modal-content col-sm-6">
                        <span><i class=" login1 fa fa-caret-up fa_large fa-3x"></i></span>
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <!--<h3 class="modal-title">Login</h3>-->
                        </div>
                        <!--Modal Body Start-->
                        <div class="modal-body">
                            <form  name="login_form" enctype="multipart/form-data" method="post" action="<?php echo $this->webroot;?>reporters/login" class="form-horizontal">
                                <div class="form-group">
                                    <label for="inputEmail" class="col-sm-12 control-label">Email</label>
                                    <div class="col-sm-12">
                                        <input type="email" name="data[Reporter][email]" class="form-control" id="" placeholder="Email" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputPassword" class="col-sm-12 control-label">Password</label>
                                    <div class="col-sm-12">
                                        <input type="password" class="form-control" id="inputPassword3" name="data[Reporter][password]" placeholder="passward" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-6 col-sm-6">
                                        <button type="submit" class="btn btn-primary btn_search">Login</button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12 forget_pass">
                                        <p><a href="<?php echo $this->webroot;?>reporters/forgot_password">Forgot your password?</a></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--Modal Body End-->
                    </div>
                </div>
            </div><!-- Modal End-->
            <?php } else { ?>
            <!-- Modal My Account -->
            <div id="myaccount" class="modal fade" role="dialog">
                
                <div class="modal-dialog my_account">
                    <!-- Modal content-->
                    <div class="modal-content col-sm-6">
                        <span><i class=" login1 fa fa-caret-up fa_large fa-3x"></i></span>
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <!--<h3 class="modal-title">My Account</h3>-->
                        </div>
                        <!--Modal Body Start-->
                        <div class="modal-body">
                            <div class="main_account_body row">
                                <div class="account_title">
                                    <h4>Shamim Forhad</h4>
                                    <a href="<?php echo $this->webroot;?>myaccount" class="btn btn_myaccount">My Account</a>
                                </div>
                            </div>
                            <hr>
                            <div class="my_account_options">
                                <a href="<?php echo $this->webroot;?>my_reports" class="btn btn_myaccount pull-left"><span><i class="fa fa-bell"></i></span>Reports</a>
                                <a href="<?php echo $this->webroot;?>reporters/logout" class="btn btn_myaccount pull-right"><span><i class="fa fa-sign-out fa-lg"></i></span>Signout</a>
                            </div>
                        </div>
                        <!--Modal Body End-->
                    </div>
                </div>
            </div><!-- Modal End-->
            <?php } ?>

           <!-- <div class="container-fluid bdr_btm_header"></div>-->
        </header><!--Menubar End-->


        <!--Calling the content of the body  -->
        <?php echo $this->fetch('content'); ?>

       
        <!--footer section-->
        <footer class="container-fluid footer_wrapper">
            <h2>Follow Us on Social Links</h2>
            <div class="container">
                <div class="row">
                <!-- start of footer Social link-->
                    <div class="col-sm-offset-4">
                        <div class="col-sm-offset-1 col-sm-6">
                            <div class="social-link2">
                                <ul>
                                    <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li class="google"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container developer_link">
                <div class="col-sm-4 pull-left">
                    <p>&copy; 2016 Face Finder. All Rights Reserved.</p>
                </div>
                <div class="col-sm-4 pull-right">
                    <p class="pull-right"><a href="http//:www.xorcoder.com" target="_blank">Design&developed by www.xorcoder.com</a></p>
                </div>
            </div>
        </footer>

        <?php echo $this->Html->script(array('custom')); ?>
    </body>
</html>