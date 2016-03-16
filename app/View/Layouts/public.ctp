<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot;?>font-awesome/css/font-awesome.min.css">
        <title>FaceFinder</title>

        <?php
            echo $this->Html->meta('icon');
            //echo $this->Html->css('cake.generic');
            echo $this->Html->css(array('bootstrap', 'bootstrap-datetimepicker', 'jquery-ui', 'bootstrap-formhelpers.min', 'custom'));
            echo $this->Html->script(array('jquery-1.11.3', 'bootstrap.min', 'jquery-ui', 'bootstrap-formhelpers.min', 'bootstrap-formhelpers-countries', 'validator.min', 'count'));

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

        <header class="large">
            <!--<div class="container-fluid header_top"></div>-->

            <nav class="navbar navbar-inverse navbar-fixed-top">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span> 
                                </button>
                                <img class="logo" src="<?php echo $this->webroot;?>img/logo_2.png"/>
                            </div>  
                        </div>
                        <div class="collapse navbar-collapse" id="myNavbar">
                            <ul class="col-sm-6 nav navbar-nav navbar-right">
                                <li class="<?php if($page=='home') echo 'active';?>"><a href="<?php echo $this->webroot;?>home">Home</a></li>
                                <li class="<?php if($page=='search') echo 'active';?>"><a class="btn btn-primary" href="<?php echo $this->webroot;?>search">Search</a></li>
                                <li class="<?php if($page=='report') echo 'active';?>"><a class="btn btn-primary" href="<?php echo $this->webroot;?>report">Report</a></li> 
                                <li class="<?php if($page=='signup') echo 'active';?>"><a class="btn btn-primary" href="<?php echo $this->webroot;?>signup">Sign up</a></li> 
                                <li class=""><a class="btn btn-primary" href="#" data-toggle="modal" data-target="#myModal">Login</a></li> 
                            </ul>
                        </div>   
                    </div>
                </div>
            </nav>

            <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content col-sm-8">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3 class="modal-title">Login</h3>
                        </div>
                        <!--Modal Body Start-->
                        <div class="modal-body">
                            <form name="login_form" id="login_form" method="post" action="<?php $this->webroot;?>reporters/login" class="form-horizontal">
                                <div class="form-group">
                                    <label for="" class="col-sm-4 control-label">Email</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="data[Reporter][email]" class="form-control" id="" placeholder="First Name">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-sm-4 control-label">Password</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" id="inputPassword3" name="data[Reporter][password]" placeholder="passward">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-4 col-sm-8">
                                        <button type="submit" class="btn btn-primary btn_search">Login</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--Modal Body End-->
                    </div>
                </div>
            </div><!-- Modal End-->

           <!-- <div class="container-fluid bdr_btm_header"></div>-->
        </header><!--Menubar End-->

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
                    <p>&copy; 2016 People Finder. All Rights Reserved.</p>
                </div>
                <div class="col-sm-4 pull-right">
                    <p class="pull-right"><a href="http//:www.xorcoder.com" target="_blank">Design&developed by www.xorcoder.com</a></p>
                </div>
            </div>
        </footer>

        <?php echo $this->Html->script(array('custom')); ?>
    </body>
</html>