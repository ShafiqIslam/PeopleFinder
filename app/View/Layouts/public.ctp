<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot;?>font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto:500,400" />
        <title><?php echo __("FaceFinder");?></title>

        <?php
            echo $this->Html->meta('icon');
            //echo $this->Html->css('cake.generic');
            echo $this->Html->css(array('bootstrap', 'bootstrap-datetimepicker', 'jquery-ui', 'bootstrap-formhelpers.min','bootstrapValidator.min','magnific-popup.css', 'fileinput', 'custom'));

            echo $this->Html->script(array('jquery-1.11.3', 'bootstrap.min', 'fileinput', 'jquery-ui', 'bootstrap-formhelpers.min','jquery.popupoverlay', 'bootstrap-formhelpers-countries', 'validator.min', 'bootstrapValidator.min','count','jquery.slimscroll.min','jquery.magnific-popup.min', 'jquery.messagebox'));
        ?>
        
        <?php
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
        <!-- <div class="loader"></div> -->

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
                            <a href="<?php echo $this->webroot;?>home"><img class="logo" src="<?php echo $this->webroot;?>img/logo_3.png"/></a>
                    </div>
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="<?php if($page=='home') echo 'active';?>"><a href="<?php echo $this->webroot;?>home"><?php echo __("Home");?></a></li>
                            <li class="<?php if($page=='search') echo 'active';?>"><a class="" href="<?php echo $this->webroot;?>search"><?php echo __("Search");?></a></li>
                            <li class="dropdown <?php if($page=='report') echo 'active';?>">
                                <a class="dropdown-toggle" data-toggle="dropdown" role="button" href="#">Report<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li style="margin-top: 0px;"><a href="<?php echo $this->webroot;?>report_found"><?php echo __("Report Found");?></a></li>
                                    <li style="margin-top: 0px;"><a href="<?php echo $this->webroot;?>report_missing"><?php echo __("Report Missing");?></a></li>
                                </ul>
                            </li>
                            <?php if(!empty($logged)) { ?>
                                <li class="dropdown <?php if($page=='my_account') echo '';?>">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo __("My Account");?></a>
                                    <ul class="dropdown-menu dropdown_menu_modal my_account_modal">
                                        <span class="glyphicon glyphicon-triangle-top"></span>
                                        <li>
                                            <div class="main_account_body row">
                                                <div class="account_title">
                                                    <h4><?php echo $logged['name'];?></h4>
                                                    <?php if($logged['is_admin']) { ?>
                                                        <a href="<?php echo $this->webroot;?>admin/users/dashboard" class="btn btn_myaccount btn_myaccount_original"><span><i class="fa fa-external-link-square"></i></span><?php echo __("Back To Admin Panel");?></a>
                                                    <?php } else { ?>
                                                        <a href="<?php echo $this->webroot;?>my_reports" class="btn btn_myaccount btn_myaccount_original"><span><i class="fa fa-bell"></i></span><?php echo __("My Reports");?></a>
                                                    <?php } ?>
                                                </div>
                                                <div class="my_account_options">
                                                    <?php if(!$logged['is_admin']) { ?>
                                                        <a href="<?php echo $this->webroot;?>myaccount" class="btn btn_myaccount"><span><i class="fa fa-server"></i></span><?php echo __("My Account");?></a>
                                                    <?php } ?>
                                                    <a href="<?php echo $this->webroot;?>reporters/logout" class="btn btn_sign_out"><span><i class="fa fa-sign-out fa-lg"></i></span><?php echo __("Signout");?></a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            <?php } else { ?>
                                <li class="<?php if($page=='signup') echo 'active';?>">
                                    <a class="" href="<?php echo $this->webroot;?>signup"><?php echo __("Sign up");?></a>
                                </li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo __("Login");?></a>
                                    <ul class="dropdown-menu dropdown_menu_modal">
                                        <span class="glyphicon glyphicon-triangle-top"></span>
                                        <li>
                                            <form role="form" data-toggle="validator" novalidate="novalidate" name="login_form" method="post" action="<?php echo $this->webroot;?>reporters/login" class="form-horizontal">
                                                <div class="form-group">
                                                    <label for="inputEmail" class="col-sm-12 control-label"><?php echo __("Email");?></label>
                                                    <div class="col-sm-12">
                                                        <input type="email" name="data[Reporter][email]" class="form-control" id="" placeholder="<?php echo __('Email');?>" required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="inputPassword" class="col-sm-12 control-label"><?php echo __("Password");?></label>
                                                    <div class="col-sm-12">
                                                        <input type="password" class="form-control" id="inputPassword3" name="data[Reporter][password]" placeholder="<?php echo __('Password');?>" required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-sm-offset-6 col-sm-6">
                                                        <button type="submit" class="btn btn-primary btn_search"><?php echo __("Login");?></button>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12 forget_pass">
                                                        <p><a href="<?php echo $this->webroot;?>reporters/forgot_password"><?php echo __("Forgot your password?");?></a></p>
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
                <div style="clear: both;"></div>
                <div class="multi_lg">
                    <div class="pull-right"><a class="basic_open" href="#basic"><span><?php echo __("CHANGE LANGUAGE");?></span><img src="<?php echo $this->webroot; ?>img/globe.gif"></a></div>
                </div>
                <!-- Add content to the popup -->
                

                <div id="basic" class="well">
                    <button class="basic_close btn btn-default pull-right"><i class="fa fa-times fa-2x" aria-hidden="true"></i></button>
                    <h3><?php echo __("Change To Your Preferred Language");?></h3>
                    <div class="popup_body">
                        <ul>
                            <?php foreach($availableLanguages as $key => $value) { ?>
                            <?php $link = $this->webroot . 'pages/change_language/' . $key; ?>
                            <li class="<?php if($key==$language)echo "selected_lang";?>" >
                                <a href="<?php echo $link?>">
                                    <i class="fa fa-language" aria-hidden="true"></i><?php echo $value?>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <p><i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i><?php echo __("This feature uses Cookie. By clicking on these links, you agree on our cookie terms. And we'll assume that you are happy to receive all cookies from this website.");?></p>
                    
                </div>
  
            </nav>
           <!-- <div class="container-fluid bdr_btm_header"></div>-->
        </header><!--Menubar End-->

        <?php $flash = $this->Session->flash('flash'); ?>
        <?php if(!empty($flash)) { ?>
            <div class="container flash_message">
                <?php echo $flash;?>
                <button class="flash_close_btn"><span><i class="fa fa-times fa-2x"></i></span></button>
            </div>
        <?php } ?>

        <!--Calling the content of the body  -->
        <?php echo $this->fetch('content'); ?>

       
        <!--footer section-->
        <footer class="container-fluid footer_wrapper">
            <h2><?php echo __("Follow Us on Social Links");?></h2>
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
                    <?php $copyright_year = auto_copyright('2016');?>
                    <p><?php echo __("&copy; %s Face Finder. All Rights Reserved.", $copyright_year);?></p>
                </div>

                <?php function auto_copyright($year = 'auto'){ ?>
                    <?php if(intval($year) == 'auto'){ $year = date('Y'); } ?>
                    <?php if(intval($year) == date('Y')){ return intval($year); } ?>
                    <?php if(intval($year) < date('Y')){ return intval($year) . ' - ' . date('Y'); } ?>
                    <?php if(intval($year) > date('Y')){ return date('Y'); } ?>
                <?php } ?>

                <div class="col-sm-4 pull-right">
                    <p class="pull-right"><?php echo __("Design & Developed by ");?> <a href="http://www.xorcoder.com" target="_blank">www.xorcoder.com</a></p>
                </div>
            </div>
        </footer>

        <?php echo $this->Html->script(array('custom')); ?>
    </body>
</html>