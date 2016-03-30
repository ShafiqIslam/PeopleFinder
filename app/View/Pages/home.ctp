<div class="container-fluid banner_wrapper parallax">
    <!--Nav Tab/ Nav Pill-->
    <div class="container">
        <div class="col-sm-8 search_pill">
            <h2>Search Here</h2>
            <div class="col-sm-12">
                <ul class="nav nav-pills">
                    <li class="active"><a data-toggle="pill" href="#name">Name</a></li>
                    <li><a data-toggle="pill" href="#photos">Photos</a></li>
                    <li><a data-toggle="pill" href="#country">Country</a></li>
                    <li><a data-toggle="pill" href="#map">Map</a></li>
                    <li><a data-toggle="pill" href="#id_search">ID</a></li>
                </ul>
            </div>

            <div class="tab-content">

                <div id="name" class="tab-pane fade in active">
                    <h3>Search By Name</h3>
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label for="" class="col-sm-offset-2 col-sm-3 control-label">First Name</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="" placeholder="First Name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-offset-2 col-sm-3 control-label">Second Name</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="" placeholder="Second Name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-offset-2 col-sm-3 control-label">Last Name</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="" placeholder="Last Name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-offset-2 col-sm-3 control-label">Gender</label>
                            <div class="col-sm-4">
                                <select class="form-control">
                                    <option>Select Gender</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-5 adv_search_link">
                                <p><a href="<?php echo $this->webroot;?>search">For Advance Search Click Here...</a></p>
                            </div>
                            <div class=" col-sm-7">
                                <button type="submit" class="btn btn-primary btn_search">Search</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div id="photos" class="tab-pane fade">
                    <!--<h3>Search By Photos</h3>-->
                    <form class="form-horizontal" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input id="search_img" type="file" multiple class="file" data-overwrite-initial="false" data-upload-url="#" data-max-file-count="1">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-offset-3 col-sm-2 control-label">Gender</label>
                            <div class="col-sm-4">
                                <select class="form-control">
                                    <option>Select Gender</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-9 adv_search_link">
                                <p><a href="<?php echo $this->webroot;?>search">For Advance Search Click Here...</a></p>
                            </div>
                            <div class="col-sm-3">
                                <button type="submit" class="btn btn-primary btn_search">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="country" class="tab-pane fade">
                    <h3>Search By Country</h3>
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label for="" class="col-sm-offset-3 col-sm-2 control-label">Country</label>
                            <div class="col-sm-4 country_selection_box">
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
                            <label for="" class="col-sm-offset-3 col-sm-2 control-label">City</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="" placeholder="City">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-offset-3 col-sm-2 control-label">Street</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="" placeholder="Street">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-5 adv_search_link">
                                <p><a href="<?php echo $this->webroot;?>search">For Advance Search Click Here...</a></p>
                            </div>
                            <div class="col-sm-7">
                                <button type="submit" class="btn btn-primary btn_search">Search</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div id="map" class="tab-pane fade">
                    <!--<h3>Search By Photos</h3>-->
                    <form class="form-horizontal">
                        <div class="form-group">
                            <div class="draw_map">
                                <div id="map-canvas"></div><!-- Drag on google map-->
                                <p>Draw a circle on the map.</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-9 adv_search_link">
                                <p><a href="<?php echo $this->webroot;?>search">For Advance Search Click Here...</a></p>
                            </div>
                            <div class="col-sm-3">
                                <button type="submit" class="btn btn-primary btn_search">Search</button>
                            </div>
                        </div>
                    </form>
                </div>


                <div id="id_search" class="tab-pane fade">
                    <h3>Search By ID</h3>
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label for="" class="col-sm-offset-2 col-sm-3 control-label">Profile ID No.</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="" placeholder="Profile id">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-5 adv_search_link">
                                <p><a href="<?php echo $this->webroot;?>search">For Advance Search Click Here...</a></p>
                            </div>
                            <div class="col-sm-7">
                                <button type="submit" class="btn btn-primary btn_search">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Nav Tab/ Nav Pill End-->
</div>
<div style="clear:both"></div>

<!--About Section-->
<div class="container-fluid about_wrapper slideanim slide">
    <div class="container">
        <h1>Our Services</h1>
        <p><span><i class="fa fa-check-square"></i></span>Searching a missed person.</p>
        <p><span><i class="fa fa-check-square"></i></span>Finding a missed person.</p>
        <p><span><i class="fa fa-check-square"></i></span>Reporting a missed person.</p>
        <p><span><i class="fa fa-check-square"></i></span>Reporting a found person.</p>
    </div>
    <a class="btn btn  btn_service pull-left" href="#">Report Found</a>
    <a class="btn btn btn_service pull-right" href="#">Report Missing</a>
</div>

        <!--===========Counter Section=============-->
<div id="first_result" class="container-fluid count_wrapper parallax">
    <div class="container count_wrapper_body">
        <div class="col-sm-4 counter_bg">
            <h3>Number of Found People</h3>
            <h2 class="timer count-title" id="count-number" data-to="1000" data-speed="1500"></h2>
        </div>
        <div class="col-sm-offset-4 col-sm-4 counter_bg">
            <h3>Number of added Profile</h3>
            <h2 class="timer count-title" id="count-number" data-to="1000" data-speed="1500"></h2>
        </div>
    </div>
</div>

<!--Carousel-->
<!--<div class="container-fluid slider_wrapper">-->

<div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
    
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
        <h2>User's Testimonial</h2>

    <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <div class="row">
                    <div class="col-sm-offset-5 col-sm-2">
                        <img src="img/01.jpg" class="img-responsive img-circle" alt="New York">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-offset-2 col-sm-8">
                        <h4>"I am very much satisfied with the service of People Finder. I think it will be helpful for others"</h4>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="row">
                    <div class="col-sm-offset-5 col-sm-2">
                        <img src="img/01.jpg" class="img-responsive img-circle" alt="New York">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-offset-2 col-sm-8">
                        <h4>"I am very much satisfied with the service of People Finder. I think it will be helpful for others"</h4>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="row">
                    <div class="col-sm-offset-5 col-sm-2">
                        <img src="img/01.jpg" class="img-responsive img-circle" alt="New York">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-offset-2 col-sm-8">
                        <h4>"I am very much satisfied with the service of People Finder. I think it will be helpful for others"</h4>
                    </div>
                </div>
            </div>
        </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
        <!--</div>-->

<!--Contact Section-->
<div class="container-fluid contact_wrapper">
    <div class="container">
        <h1>Contact Us</h1>
        <div class="row contact_body">
            <div class="col-sm-4 contact_address slideanim slide">
                <address>
                    <strong style="font-size:18px;">People Finder</strong><br>
                    Lower Jessore Road, Daulatpur<br>
                    Bangladesh, Khulna-9000<br>
                    <p><span><i class="fa fa-phone"></i></span> : <a>456-7890</a></p>
                    <p><span><i class="fa fa-envelope-o"></i></span> : <a href="mailto:#">mailus@peoplefinder.com</a></p>
                </address>    
            </div>
            <div class="col-sm-2 vdivide"></div>
            <div class="col-sm-offset-2 col-sm-4 Contact_mail slideanim slide">
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
                        <label class="control-label col-sm-3" for="email">Message:</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="form-group"> 
                    <div class="col-sm-offset-3 col-sm-9">
                    <button type="submit" class="btn btn-primary btn_search">Submit</button>
                    </div>
                    </div>
                </form>    
            </div>
        </div>
    </div>
</div>