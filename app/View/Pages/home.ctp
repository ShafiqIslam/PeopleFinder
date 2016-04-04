<script type="text/javascript" src="https://maps.google.com/maps/api/js?libraries=drawing"
        xmlns="http://www.w3.org/1999/html"></script>
<?php
    echo $this->Html->script(array('app'));
?>

<div class="container-fluid banner_wrapper parallax">
    <!--Nav Tab/ Nav Pill-->
    <div class="container">
        <div class="col-sm-8 search_pill">
            <h2>Search Here</h2>
            <div class="col-sm-12">
                <ul id="myTab" class="nav nav-pills">
                    <li class="active"><a data-toggle="tab" href="#name">Name</a></li>
                    <li><a id="" data-toggle="tab" href="#photos">Photos</a></li>
                    <li><a data-toggle="tab" href="#country">Country</a></li>
                    <li><a id="map_reload" data-toggle="tab" href="#map">Map</a></li>
                    <li><a data-toggle="tab" href="#id_search">ID</a></li>
                </ul>
            </div>

            <div class="tab-content">

                <div id="name" class="tab-pane fade in active">
                    <h3>Search By Name</h3>
                    <form role="form" method="post" data-toggle="validator" novalidate="true" class="form-horizontal" action="<?php echo $this->webroot?>profiles/search">
                        <div class="form-group">
                            <label for="" class="col-sm-offset-2 col-sm-3 control-label">First Name</label>
                            <div class="col-sm-4">
                                <input type="text" name="first_name" class="form-control" id="" placeholder="First Name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-offset-2 col-sm-3 control-label">Second Name</label>
                            <div class="col-sm-4">
                                <input type="text" name="second_name" class="form-control" id="" placeholder="Second Name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-offset-2 col-sm-3 control-label">Last Name</label>
                            <div class="col-sm-4">
                                <input type="text" name="last_name" class="form-control" id="" placeholder="Last Name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-offset-2 col-sm-3 control-label">Gender</label>
                            <div class="col-sm-4">
                                <select name="gender" class="form-control">
                                    <option value="">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-5 adv_search_link">
                                <p><a href="<?php echo $this->webroot;?>search">For Advance Search Click Here...<i class="fa fa-external-link"></i></a></p>
                            </div>
                            <div class="col-sm-7">
                                <button type="submit" class="btn btn-primary btn_search">Search</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div id="photos" class="tab-pane fade">
                    <!--<h3>Search By Photos</h3>-->
                    <form role="form" method="post" data-toggle="validator" novalidate="true" class="form-horizontal" action="<?php echo $this->webroot?>profiles/search" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input id="adv_search_img" name="data[Profile][images]" type="file" multiple class="file" data-overwrite-initial="false" data-upload-url="<?php echo $this->webroot;?>profiles/upload_image" data-max-file-count="1">
                                <input type="hidden" name="search_image">
                            </div>
                        </div>
                        <script>
                            $('#adv_search_img').on('fileuploaded', function(event, data, previewId, index) {
                                var response = data.response.response;
                                var filename = data.response.filename;
                                $("input[name=search_image]").val(filename);
                            });
                        </script>

                        <div class="form-group">
                            <label for="" class="col-sm-offset-3 col-sm-2 control-label">Gender</label>
                            <div class="col-sm-4">
                                <select name="gender" class="form-control">
                                    <option value="">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-9 adv_search_link">
                                <p><a href="<?php echo $this->webroot;?>search">For Advance Search Click Here...<i class="fa fa-external-link"></i></a></p>
                            </div>
                            <div class="col-sm-3">
                                <button type="submit" class="btn btn-primary btn_search">Search</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div id="country" class="tab-pane fade">
                    <h3>Search By Country</h3>
                    <form class="form-horizontal"  action="<?php echo $this->webroot?>profiles/search" method="post">
                        <div class="form-group">
                            <label for="" class="col-sm-offset-3 col-sm-2 control-label">Country</label>
                            <div class="col-sm-4 country_selection_box">
                                <div class="bfh-selectbox bfh-countries" data-name="missing_country" data-country="BD" data-flags="true">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-offset-3 col-sm-2 control-label">City</label>
                            <div class="col-sm-4">
                                <input type="text" name="missing_city" class="form-control" id="" placeholder="City">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-5 adv_search_link">
                                <p><a href="<?php echo $this->webroot;?>search">For Advance Search Click Here...<i class="fa fa-external-link"></i></a></p>
                            </div>
                            <div class="col-sm-7">
                                <button type="submit" class="btn btn-primary btn_search">Search</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div id="map" class="tab-pane fade">
                    <!--<h3>Search By Photos</h3>-->
                    <form class="form-horizontal"  action="<?php echo $this->webroot?>profiles/search" method="post">
                        <div class="form-group">
                            <div class="draw_map">
                                <div id="map-canvas"></div><!-- Drag on google map-->
                                <p>Draw a circle on the map.</p>
                            </div>
                        </div>

                        <input type="hidden" name="search_lat" value="">
                        <input type="hidden" name="search_lng" value="">
                        <input type="hidden" name="search_radius" value="">

                        <div class="form-group">
                            <div class="col-sm-9 adv_search_link">
                                <p><a href="<?php echo $this->webroot;?>search">For Advance Search Click Here...<i class="fa fa-external-link"></i></a></p>
                            </div>
                            <div class="col-sm-3">
                                <button type="submit" class="btn btn-primary btn_search">Search</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div id="id_search" class="tab-pane fade">
                    <h3>Search By ID</h3>
                    <form class="form-horizontal"  action="<?php echo $this->webroot?>profiles/search" method="post">
                        <div class="form-group">
                            <label for="" class="col-sm-offset-2 col-sm-3 control-label">Profile ID No.</label>
                            <div class="col-sm-4">
                                <input name="id" type="text" class="form-control" id="" placeholder="Profile id">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-5 adv_search_link">
                                <p><a href="<?php echo $this->webroot;?>search">For Advance Search Click Here...<i class="fa fa-external-link"></i></a></p>
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
        <div class="row">
            <div class="col-sm-4 pull-left service_option">
                <p><span><i class="fa fa-check-square"></i></span>Searching missed persons.</p>
                <p><span><i class="fa fa-check-square"></i></span>Finding missed persons.</p>
            </div>
            <div class="col-sm-4 col-sm-offset-4 pull-right service_option">
                <p><span><i class="fa fa-check-square"></i></span>Reporting missed persons.</p>
                <p><span><i class="fa fa-check-square"></i></span>Reporting found persons.</p>
            </div>
        </div>
    </div>
    <div class="col-sm-8 col-sm-offset-2">
        <div class="row">
            <a class="btn btn  btn_service pull-left col-sm-4" href="<?php echo $this->webroot;?>report_found">Report Found</a>
            <a class="btn btn btn_service pull-right col-smoffset-4 col-sm-4" href="<?php echo $this->webroot;?>report_missing">Report Missing</a>
        </div>
    </div>
</div>

        <!--===========Counter Section=============-->
<div id="first_result" class="container-fluid count_wrapper parallax">
    <div class="container count_wrapper_body">
        <div class="col-sm-4 counter_bg pull-left">
            <h3>Found People</h3>
            <h2 class="timer count-title" id="count-number" data-to="<?php echo $profile_count['found'];?>" data-speed="1500"></h2>
        </div>
        <div class="col-sm-offset-4 col-sm-4 counter_bg pull-right">
            <h3>Added Profile</h3>
            <h2 class="timer count-title" id="count-number" data-to="<?php echo $profile_count['total'];?>" data-speed="1500"></h2>
        </div>
    </div>
</div>

<!--Carousel-->
<!--<div class="container-fluid slider_wrapper">-->

<?php if(!empty($testimonials)) { ?>
<div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <?php foreach($testimonials as $key => $item): ?>
        <li data-target="#myCarousel" data-slide-to="<?php echo $key;?>" class="<?php if(!$key) echo 'active';?>"></li>
        <?php endforeach; ?>
    </ol>
    <h2>User's Testimonial</h2>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <?php foreach($testimonials as $key => $item): ?>
        <div class="item <?php if(!$key) echo 'active';?>">
            <div class="row">
                <div class="col-sm-offset-5 col-sm-2">
                    <!--<img src="img/01.jpg" class="img-responsive img-circle" alt="New York">-->
                    <?php
                        $initials = "";
                        $initials .= !empty($item['Reporter']['first_name']) ? $item['Reporter']['first_name'][0] : "";
                        $initials .= !empty($item['Reporter']['second_name']) ? $item['Reporter']['second_name'][0] : "";
                        $initials .= !empty($item['Reporter']['last_name']) ? $item['Reporter']['last_name'][0] : "";

                        $first_name = !empty($item['Reporter']['first_name']) ? $item['Reporter']['first_name'] : "";
                        $second_name = !empty($item['Reporter']['second_name']) ? $item['Reporter']['second_name'] : "";
                        $last_name = !empty($item['Reporter']['last_name']) ? $item['Reporter']['last_name'] : "";
                        $name = $first_name . " " . $second_name . " " . $last_name;
                    ?>
                    <div class="client_testi_circle"><h1><?php echo $initials;?></h1></div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-offset-2 col-sm-8">
                    <h4><q><blockquote><?php echo $item['Testimonial']['testimonial'];?></blockquote></q></h4>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
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
<?php } else { ?>
    No testimonials are available yet to show.
<?php } ?>
        <!--</div>-->

<!--Contact Section-->
<div class="container-fluid contact_wrapper">
    <div class="container">
        <h1>Contact Us</h1>
        <div class="row contact_body">
            <div class="col-sm-5 contact_address slideanim slide">
                <address>
                    <strong style="font-size:18px;">Face Finder</strong><br>
                    ABC Road, CDEF City<br>
                    CDEF City-123456, XYZ Country<br>
                    <p><span><i class="fa fa-phone"></i></span> : <a>456-7890</a></p>
                    <p><span><i class="fa fa-envelope-o"></i></span> : <a href="mailto:#">mailus@peoplefinder.com</a></p>
                </address>    
            </div>
            <div class="col-sm-1 contact_devide"></div>
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