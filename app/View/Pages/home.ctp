<script type="text/javascript" src="https://maps.google.com/maps/api/js?libraries=drawing"
        xmlns="http://www.w3.org/1999/html"></script>
<?php
    echo $this->Html->script(array('app'));
?>

<div class="container-fluid banner_wrapper parallax">
    <!--Nav Tab/ Nav Pill-->
    <div class="container">
        <div class="col-sm-8 search_pill">
            <h2><?php echo __("Search Here");?></h2>
            <div class="col-sm-12">
                <ul id="myTab" class="nav nav-pills">
                    <li class="active"><a data-toggle="tab" href="#name"><?php echo __("Name");?></a></li>
                    <li><a id="" data-toggle="tab" href="#photos"><?php echo __("Photos");?></a></li>
                    <li><a data-toggle="tab" href="#country"><?php echo __("Country");?></a></li>
                    <li><a id="map_reload" data-toggle="tab" href="#map"><?php echo __("Map");?></a></li>
                    <li><a data-toggle="tab" href="#id_search"><?php echo __("Profile ID");?></a></li>
                </ul>
            </div>

            <div class="tab-content">
                <div id="name" class="tab-pane fade in active">
                    <h3><?php echo __("Search By Name");?></h3>
                    <form role="form" method="post" class="form-horizontal by_name_search search_form" action="<?php echo $this->webroot?>profiles/search">
                        <div class="form-group">
                            <label for="" class="col-sm-offset-2 col-sm-3 control-label"><?php echo __("First Name");?></label>
                            <div class="col-sm-4">
                                <input type="text" name="first_name" class="form-control" id="" placeholder="<?php echo __("First Name");?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-offset-2 col-sm-3 control-label"><?php echo __("Second Name");?></label>
                            <div class="col-sm-4">
                                <input type="text" name="second_name" class="form-control" id="" placeholder="<?php echo __("Second Name");?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-offset-2 col-sm-3 control-label"><?php echo __("Last Name");?></label>
                            <div class="col-sm-4">
                                <input type="text" name="last_name" class="form-control" id="" placeholder="<?php echo __("Last Name");?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="gender" class="col-sm-offset-2 col-sm-3 control-label"><?php echo __("Gender");?></label>
                            <div class="col-sm-4">
                                <select name="gender" class="form-control gender">
                                    <option value=""><?php echo __("Select Gender");?></option>
                                    <option value="Male"><?php echo __("Male");?></option>
                                    <option value="Female"><?php echo __("Female");?></option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-5 adv_search_link">
                                <p><a href="<?php echo $this->webroot;?>search"><?php echo __("For Advance Search Click Here...");?><i class="fa fa-external-link"></i></a></p>
                            </div>
                            <div class="col-sm-7">
                                <button type="submit" name="submit" class="gen_btn btn btn-primary btn_search btn_valid"><?php echo __("Search");?></button>
                            </div>
                        </div>
                    </form>
                </div>

                <div id="photos" class="tab-pane fade">
                    <!--<h3>Search By Photos</h3>-->
                    <form role="form" method="post" data-toggle="validator" novalidate="novalidate" class="form-horizontal search_form" action="<?php echo $this->webroot?>profiles/search" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="col-sm-12 upload_img">
                                <input id="adv_search_img" name="data[Profile][images]" type="file" multiple class="file" data-overwrite-initial="false" data-upload-url="<?php echo $this->webroot;?>profiles/upload_image" data-max-file-count="3">
                                <input type="hidden" name="search_image">
                                <p><?php echo __("** NB: You must click 'Upload' before submitting after adding image.");?></p>
                            </div>
                        </div>
                        <script>
                            $('#adv_search_img').on('fileuploaded', function(event, data, previewId, index) {
                                var response = data.response.response;
                                var filename = data.response.filename;
                                $("input[name=search_image]").val(filename);
                            });
                        </script>
                        <div class="col-sm-12" id="gender">
                            <div class="col-sm-6">
                                <div class="form-group form-inline gender">
                                    <label for="" class="col-sm-4 control-label"><?php echo __("Gender");?></label>
                                    <select name="gender" class="form-control gender">
                                        <option value=""><?php echo __("Select Gender");?></option>
                                        <option value="Male"><?php echo __("Male");?></option>
                                        <option value="Female"><?php echo __("Female");?></option>
                                    </select>

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="faceplus_img col-sm-4">
                                    <img src="<?php echo $this->webroot;?>img/inside.png" alt="">
                                </div>
                                <div class="form-group photo_search">
                                    <div class="col-sm-8">
                                        <button type="submit" class="btn btn-primary btn_search btn_valid"><?php echo __("Search");?></button>
                                    </div>
                                </div>
                            </div>
                            <div class="adv_search_link">
                                <p><a href="<?php echo $this->webroot;?>search"><?php echo __("For Advance Search Click Here...");?><i class="fa fa-external-link"></i></a></p>
                        </div>
                        </div>
                    </form>
                </div>

                <div id="country" class="tab-pane fade">
                    <h3><?php echo __("Search By Country");?></h3>
                    <form class="form-horizontal country_search"  action="<?php echo $this->webroot?>profiles/search" method="post">
                        <div class="form-group">
                            <label for="" class="col-sm-offset-3 col-sm-2 control-label"><?php echo __("Country");?></label>
                            <div class="col-sm-4 country_selection_box">
                                <div class="bfh-selectbox bfh-countries" data-name="missing_country" data-country="EG" data-flags="true">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-offset-3 col-sm-2 control-label"><?php echo __("City");?></label>
                            <div class="col-sm-4">
                                <input type="text" name="missing_city" class="form-control" id="" placeholder="<?php echo __("City");?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-5 adv_search_link">
                                <p><a href="<?php echo $this->webroot;?>search"><?php echo __("For Advance Search Click Here...");?><i class="fa fa-external-link"></i></a></p>
                            </div>
                            <div class="col-sm-7">
                                <button type="submit" class="btn btn-primary btn_search"><?php echo __("Search");?></button>
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
                                <p><?php echo __("Draw a circle on the map.");?></p>
                            </div>
                        </div>

                        <input type="hidden" name="search_lat" value="">
                        <input type="hidden" name="search_lng" value="">
                        <input type="hidden" name="search_radius" value="">

                        <div class="form-group">
                            <div class="col-sm-9 adv_search_link">
                                <p><a href="<?php echo $this->webroot;?>search"><?php echo __("For Advance Search Click Here...");?><i class="fa fa-external-link"></i></a></p>
                            </div>
                            <div class="col-sm-3">
                                <button type="submit" class="btn btn-primary btn_search"><?php echo __("Search");?></button>
                            </div>
                        </div>
                    </form>
                </div>

                <div id="id_search" class="tab-pane fade">
                    <h3><?php echo __("Search By ID");?></h3>
                    <form class="form-horizontal id_search"  action="<?php echo $this->webroot?>profiles/search" method="post">
                        <div class="form-group">
                            <label for="" class="col-sm-offset-2 col-sm-3 control-label"><?php echo __("Profile ID No.");?></label>
                            <div class="col-sm-4">
                                <input name="id" type="text" class="form-control" id="" placeholder="<?php echo __("Profile ID No.");?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-5 adv_search_link">
                                <p><a href="<?php echo $this->webroot;?>search"><?php echo __("For Advance Search Click Here...");?><i class="fa fa-external-link"></i></a></p>
                            </div>
                            <div class="col-sm-7">
                                <button type="submit" class="btn btn-primary btn_search"><?php echo __("Search");?></button>
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
                <p><span><i class="fa fa-check-square"></i></span><?php echo __("Searching missed persons.");?></p>
                <p><span><i class="fa fa-check-square"></i></span><?php echo __("Finding missed persons.");?></p>
            </div>
            <div class="col-sm-4 col-sm-offset-4 pull-right service_option">
                <p><span><i class="fa fa-check-square"></i></span><?php echo __("Reporting missed persons.");?></p>
                <p><span><i class="fa fa-check-square"></i></span><?php echo __("Reporting found persons.");?></p>
            </div>
        </div>
    
        <div class="col-sm-8 col-sm-offset-2">
            <div class="row">
                <a class="btn btn  btn_service pull-left col-sm-4" href="<?php echo $this->webroot;?>report_found"><?php echo __("Report Found");?></a>
                <a class="btn btn btn_service pull-right col-smoffset-4 col-sm-4" href="<?php echo $this->webroot;?>report_missing"><?php echo __("Report Missing");?></a>
            </div>
        </div>
    </div>
</div>

        <!--===========Counter Section=============-->
<div class="count_wrapper parallax">
    <div id="first_result" class="container-fluid count_wrapper_bg">
        <div class="container count_wrapper_body container-fluid">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="counter_bg counter_found">
                    <div class="inner_counter">
                        <h2 class="timer count-title counter_found_text" id="count-number" data-to="<?php echo $profile_count['found'];?>" data-speed="1500"></h2>
                    </div>
                </div>
                <h3 class="found_h3_counter"><?php echo __("Found People");?></h3>
            </div>
            
            <div class="col-sm-offset-2 col-sm-4">
                <div class="counter_bg counter_add">
                <div class="inner_counter">
                    <h2 class="timer count-title counter_add_text" id="count-number" data-to="<?php echo $profile_count['total'];?>" data-speed="1500"></h2> 
                </div>
                </div>
                <h3 class="added_h3_counter"><?php echo __("Added Profile");?></h3>
            </div>
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
    <h2><?php echo __("User's Testimonial");?></h2>

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
                <div class="col-sm-offset-2 col-sm-8 testimonial_text">
                    <h4><blockquote>" <?php echo $item['Testimonial']['testimonial'];?> " <br>
                        <h5 class="pull-right"><span class="testi_arrow"><i class="fa fa-hand-o-right"></i><strong><i></span> <?php echo $name ?></i></strong>, <span class="bfh-countries" data-country="<?php echo $item['Reporter']['nationality'];?>" data-flags="true"></span></h5>
                    </blockquote></h4>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only"><?php echo __("Previous");?></span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only"><?php echo __("Next");?></span>
    </a>
</div>
<?php } else { ?>
    <?php echo __("No testimonials are available yet to show.");?>
<?php } ?>
        <!--</div>-->

<!--Contact Section-->
<div class="container-fluid contact_wrapper">
    <div class="container">
        <h1>Contact Us</h1>
        <div class="row contact_body">
            <div class="col-sm-5 contact_address slideanim slide">
                <address>
                    <strong style="font-size:18px;"><?php echo __("Face Finder");?></strong><br>
                    <?php echo __("ABC Road, CDEF City");?><br>
                    <?php echo __("CDEF City-123456, XYZ Country");?><br>
                    <p><span><i class="fa fa-phone"></i></span> : <a href="tel:456-7890">456-7890</a></p>
                    <p><span><i class="fa fa-envelope-o"></i></span> : <a href="mailto:mailus@gmail.com">mailus@gmail.com</a></p>
                </address>    
            </div>

            <div class="col-sm-1 contact_devide"></div>
            <div class="col-sm-6">
                <div class="msg_loading_bg">
                    <div class="msg_loading"></div>   
                </div>
                <div id="reply_msg"><p></p></div>

                <div class="col-sm-offset-2 col-sm-10 Contact_mail slideanim slide">
                <form id="sending_message" role="form" data-toggle="validator" method="post" class="form-horizontal" action="<?php echo $this->webroot;?>users/send_message">
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="email"><?php echo __("Name:");?></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control name" name="name" data-error="Please input your Name" id="name" placeholder="<?php echo __("Enter Name");?>" required="">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="email"><?php echo __("Email:");?></label>
                        <div class="col-sm-9">
                            <input type="email" name="email" data-error="<?php echo __('Bruh, that email address is invalid');?>" class="form-control email" id="email" placeholder="<?php echo __("Enter Email");?>" required="">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="email"><?php echo __("Message:");?></label>
                        <div class="col-sm-9">
                            <textarea class="form-control message" name="message" rows="4" data-error="<?php echo __("Please write a mesasage");?>" required=""></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-group"> 
                        <div class="col-sm-offset-3 col-sm-9 msg_submit">
                            <button type="submit" class="btn btn-primary btn_msg"><?php echo __("SEND");?><span class="glyphicon glyphicon-send"></span></button>
                        </div>
                    </div>
                </form>    
                </div> 
            </div>
        </div>
    </div>
</div>