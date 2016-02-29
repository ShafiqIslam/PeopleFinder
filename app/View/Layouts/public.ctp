<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>People Finder</title>

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-formhelpers.min.css">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/custom.css">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <header>
            <!--<div class="container-fluid header_top"></div>-->

            <nav class="navbar navbar-inverse navbar-fixed-top">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="navbar-header">
                                <a class="navbar-brand" href="index.html">WebSiteName</a>
                            </div>  
                        </div>
                        <div class="col-sm-9 col-sm-offset-1">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="index.html">Home</a></li>
                                <li><a href="search.html">Search</a></li>
                                <li><a href="report.html">Report</a></li> 
                                <li><a href="signup.html" class="btn btn-primary">Sign up</a></li> 
                                <li><a href="#" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Login</a></li> 
                            </ul>
                        </div>   
                    </div>
                </div>
            </nav>

            <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Login</h4>
                        </div>
                        <!--Modal Body Start-->
                        <div class="modal-body">
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label for="" class="col-sm-3 control-label">User Name/Mail</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="" placeholder="First Name">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-sm-3 control-label">Passward</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" id="inputPassword3" placeholder="passward">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-10">
                                        <button type="submit" class="btn btn-default">Sign in</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--Modal Body End-->
                    </div>
                </div>
            </div><!-- Modal End-->

           <!-- <div class="container-fluid bdr_btm_header"></div>-->
        </header>

        <div class="container-fluid banner_wrapper">
                <!--Nav Tab/ Nav Pill-->
                <div class="container">
                    <div class="col-sm-8 search_pill">
                        <h2>Search Here</h2>
                        <hprimaryr>
                        <div class="col-sm-12">
                            <ul class="nav nav-pills">
                                <li class="active"><a class="btn btn-primary" data-toggle="pill" href="#name">Name</a></li>
                                <li><a class="btn btn-primary" data-toggle="pill" href="#photos">Photos</a></li>
                                <li><a class="btn btn-primary" data-toggle="pill" href="#country">Country</a></li>
                                <li><a class="btn btn-primary" data-toggle="pill" href="#id_search">ID</a></li>
                            </ul>
                        </div>

                        <div class="tab-content">

                            <div id="name" class="tab-pane fade in active">
                                <h3>Search By Name</h3>
                                <form class="form-horizontal">
                                    <div class="form-group">
                                        <label for="" class="col-sm-offset-3 col-sm-2 control-label">First Name</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="" placeholder="First Name">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="col-sm-offset-2 col-sm-3 control-label"><p>Second Name</p></label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="" placeholder="Second Name">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="col-sm-offset-3 col-sm-2 control-label">Last Name</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="" placeholder="Last Name">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-5 col-sm-8">
                                            <button type="submit" class="btn btn-primary">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div id="photos" class="tab-pane fade">
                                <h3>Search By Photos</h3>
                                <form class="form-horizontal">
                                    <div class="form-group">
                                        <label for="" class="col-sm-offset-3 col-sm-2 control-label lable_text">Photos</label>
                                        <div class="col-sm-4">
                                            <input type="file" class="form-control" id="" formenctype="multipart/form-data">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-5 col-sm-8">
                                            <button type="submit" class="btn btn-primary">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div id="country" class="tab-pane fade">
                                <h3>Search By Country</h3>
                                <form class="form-horizontal">
                                    <div class="form-group">
                                        <label for="" class="col-sm-offset-3 col-sm-2 control-label lable_text">Country</label>
                                        <div class="col-sm-4">
                                            <!--<select class="input-medium bfh-countries" data-country="BD"></select>-->
                                
                                            <div class="bfh-selectbox bfh-countries" data-country="BD" data-flags="true">
                                                <input type="hidden" value="">
                                                <a class="bfh-selectbox-toggle" role="button" data-toggle="bfh-selectbox" href="#">
                                                    <span class="bfh-selectbox-option input-medium" data-option=""></span>
                                                    <b class="caret"></b>
                                                </a>
                                                <div class="bfh-selectbox-options">
                                                    <input type="text" class="bfh-selectbox-filter">
                                                    <div role="listbox">
                                                        <ul role="option"></ul>
                                                    </div>
                                                </div>
                                            </div>
                             
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-offset-3 col-sm-2 control-label lable_text">City</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="" placeholder="City">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-offset-3 col-sm-2 control-label lable_text">Street</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="" placeholder="Street">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-5 col-sm-8">
                                            <button type="submit" class="btn btn-primary">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div id="id_search" class="tab-pane fade">
                                <h3>Search By ID</h3>
                                <form class="form-horizontal">
                                    <div class="form-group">
                                        <label for="" class="col-sm-offset-3 col-sm-2 control-label lable_text">ID No.</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="" placeholder="id">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-5 col-sm-8">
                                            <button type="submit" class="btn btn-primary">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Nav Tab/ Nav Pill End-->
        </div>

        <div id="first_result" class="container-fluid result_wrapper">
            <div class="container">
                <h1>Your Search Result Here</h1>
                <ul class="col-sm-offset-2 col-sm-8">
                    <li class="col-sm-12">
                        <div class="col-sm-4 img_secton">
                            <img class="img-thumbnail" src="img/01.jpg">
                        </div>
                        <div class="col-sm-6 img_desc">
                            <h3>Name</h3>
                            <span>Country</span>
                            <span>Nationality</span>
                            <span>Designation</span>
                            <span>Age</span>
                            <span>Blood Group</span>
                            <span>Email</span>
                            <span>Phone</span>
                            <p><a href="#">Click</a>Here to know more about this person</p>
                        </div>
                    </li>
                     <li class="col-sm-12">
                        <div class="col-sm-4 img_secton">
                            <img class="img-thumbnail" src="img/01.jpg">
                        </div>
                        <div class="col-sm-6 img_desc">
                            <h3>Name</h3>
                            <span>Country</span>
                            <span>Nationality</span>
                            <span>Designation</span>
                            <span>Age</span>
                            <span>Blood Group</span>
                            <span>Email</span>
                            <span>Phone</span>
                            <p><a href="#">Click</a>Here to know more about this person</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!--Pagination-->
        <div class="container">                 
            <ul class="pager">
                <li class="previous active"><a href="#first_result"><span><i class="fa fa-arrow-left fa-2x"></i></span></a></li>
                <li class="next"><a href="#second_result"><span><i class="fa fa-arrow-right fa-2x"></i></span></a></li>
            </ul>
        </div>

        <!--About Section-->
        <div class="container-fluid about_wrapper slideanim slide">
            <div class="container">
                <h1>What we serve/Our Service</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <h2><q>Here may use Image instead of Text</q></h2>
            </div>
        </div>

        <!--Contact Section-->
        <div class="container-fluid contact_wrapper">
            <div class="container">
                <h1>Contact Us</h1>
                <div class="row">
                    <div class="col-sm-4 contact_address slideanim slide">
                        <address>
                            <strong style="font-size:18px;">XorCoder Software Ltd.</strong><br>
                            Lower Jessore Road, Daulatpur<br>
                            Bangladesh, Khulna-9000<br>
                            <p><span><i class="fa fa-phone"></i></span> : <a>456-7890</a></p>
                            <p><span><i class="fa fa-envelope-o"></i></span> : <a href="mailto:#">mailus@xorcoder.com</a></p>
                        </address>    
                    </div>
                    <div class="col-sm-offset-3 col-sm-5 Contact_mail slideanim slide">
                        <form class="form-horizontal" role="form">
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="email">Name:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="name" placeholder="Enter email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="email">Email:</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="email" placeholder="Enter email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3" for="email">Comment:</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="form-group"> 
                            <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" class="btn btn-default">Submit</button>
                            </div>
                            </div>
                        </form>    
                    </div>
                </div>
            </div>
        </div>


        <!--footer section-->
        <div class="container-fluid footer_wrapper">
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
                <div class="col-sm-2 pull-right">
                    <p><a href="http//:www.xorcoder.com" target="_blank">www.xorcoder.com</a></p>
                </div>
            </div>
        </div>
        


        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery-1.11.3.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui.js"></script>
        <script type="text/javascript" src="js/bootstrap-formhelpers.min.js"></script>
        <script type="text/javascript" src="js/bootstrap-formhelpers-countries.js"></script>
        <script type="text/javascript">

        </script>
    </body>
</html>