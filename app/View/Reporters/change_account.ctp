<!--==================Sign Up Section========================-->
<div class="container-fluid sign_up_page">
    <h1><?php echo __("Change Account Details");?></h1>
    <hr>
    <form role="form" data-toggle="validator" id="signup_form" novalidate="true" enctype="multipart/form-data" class="form-horizontal" method="post" action="">
        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label"><?php echo __("First Name");?></label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="" name="data[Reporter][first_name]" placeholder="<?php echo __("First Name");?>" required="" value="<?php echo $this->request->data['Reporter']['first_name']?>">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label"><?php echo __("Second Name");?></label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="" name="data[Reporter][second_name]" placeholder="<?php echo __("Second Name");?>" value="<?php echo $this->request->data['Reporter']['second_name']?>">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label"><?php echo __("Last Name");?></label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="" name="data[Reporter][last_name]" placeholder="<?php echo __("Last Name");?>" required="" value="<?php echo $this->request->data['Reporter']['last_name']?>">
            </div>
        </div>


        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label"><?php echo __("Nationality");?></label>
            <div class="col-sm-4">
                <div class="bfh-selectbox bfh-countries" data-name="data[Reporter][nationality]" data-country="<?php echo $this->request->data['Reporter']['nationality']?>" data-flags="true"></div>
            </div>
        </div>

        <div class="form-group">
            <label for="" class=" col-sm-offset-2 col-sm-3 control-label"><?php echo __("Gender");?></label>
            <div class="col-sm-4">
                <select name="data[Reporter][gender]" class="form-control gender" >
                    <option value=""><?php echo __("Select Gender");?></option>
                    <option value="Male" <?php if($this->request->data['Reporter']['gender']=='Male') echo 'selected';?>><?php echo __("Male");?></option>
                    <option value="Female" <?php if($this->request->data['Reporter']['gender']=='Female') echo 'selected';?>><?php echo __("Female");?></option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label"><?php echo __("Resident Country");?></label>
            <div class="col-sm-4">
                <div class="bfh-selectbox bfh-countries" data-name="data[Reporter][resident_country]" data-country="<?php echo $this->request->data['Reporter']['resident_country']?>" data-flags="true"></div>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label"><?php echo __("Currently Used ID");?></label>
            <div class="col-sm-4 edit_img admin_img_edit_section">
                <table class="table table-responsive">
                    <tr>
                    <?php $img_flag = 0; ?>
                    <?php if(!empty($this->request->data['Reporter']['id_image_link_1'])) { ?>
                    <td>
                        <a href="<?php echo $this->webroot."reporters/remove_image/".$this->request->data['Reporter']['id']."/1";?>">
                            <i class="fa fa-trash-o display_none"></i>
                        </a>
                        <a class="image-popup-no-margins admin_img_edit" href="<?php echo $this->request->data['Reporter']['id_image_link_1'];?>">
                            <img class="img-responsive" src="<?php echo $this->request->data['Reporter']['id_image_link_1'];?>">
                        </a>
                    </td>
                        <?php $img_flag = 1; ?>
                    <?php } ?>
                    <?php if(!empty($this->request->data['Reporter']['id_image_link_2'])) { ?>
                    <td>
                        <a href="<?php echo $this->webroot."reporters/remove_image/".$this->request->data['Reporter']['id']."/2";?>">
                            <i class="fa fa-trash-o display_none"></i>
                        </a>
                        <a class="image-popup-no-margins admin_img_edit" href="<?php echo $this->request->data['Reporter']['id_image_link_2'];?>">
                            <img class="img-responsive" src="<?php echo $this->request->data['Reporter']['id_image_link_2'];?>">
                        </a>
                    </td>
                        <?php $img_flag = 1; ?>
                    <?php } ?>
                    <?php if(!empty($this->request->data['Reporter']['id_image_link_3'])) { ?>
                    <td>
                        <a href="<?php echo $this->webroot."reporters/remove_image/".$this->request->data['Reporter']['id']."/3";?>">
                            <i class="fa fa-trash-o display_none"></i>
                        </a>
                        <a class="image-popup-no-margins admin_img_edit" href="<?php echo $this->request->data['Reporter']['id_image_link_3'];?>">
                            <img class="img-responsive" src="<?php echo $this->request->data['Reporter']['id_image_link_3'];?>">
                        </a>
                    </td>
                        <?php $img_flag = 1; ?>
                    <?php } ?>
                    </tr>
                </table>
                <?php if(!$img_flag) { ?>
                    <input type="text" class="form-control" disabled value="<?php echo __("You do not have any IDs uploaded.");?>">
                <?php } ?>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-4">
                <p style="font-size: 16px;color: #9E9E9E;margin-bottom: -7px;"><?php echo __("Insert the photos of your ID");?></p>
            </div>
            <div class="col-sm-offset-2 col-sm-7 upload_img">
                <input id="adv_search_img" name="data[Reporter][images]" type="file" multiple class="file" data-overwrite-initial="false" data-upload-url="<?php echo $this->webroot;?>reporters/upload_image" data-max-file-count="3" enctype="multipart/form-data">
                <p><?php echo __("You must upload the photos. Otherwise its will not be uploaded.");?></p>
            </div>
        </div>
        
        <script>
            $('#adv_search_img').on('fileuploaded', function(event, data, previewId, index) {
                var response = data.response.response;
                var filename = data.response.filename;

                if(!$("input[name='data[Reporter][image_links_1]']").val()) {
                    $("input[name='data[Reporter][image_links_1]']").val(filename);
                } else if(!$("input[name='data[Reporter][image_links_2]']").val()) {
                    $("input[name='data[Reporter][image_links_2]']").val(filename);
                } else if(!$("input[name='data[Reporter][image_links_3]']").val()) {
                    $("input[name='data[Reporter][image_links_3]']").val(filename);
                }
            });
        </script>

        <input type="hidden" name="data[Reporter][image_links_1]">
        <input type="hidden" name="data[Reporter][image_links_2]">
        <input type="hidden" name="data[Reporter][image_links_3]">

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label"><?php echo __("Email");?></label>
            <div class="col-sm-4">
                <input type="email" name="data[Reporter][email]" class="form-control" id="email_db_check" data-error="<?php echo __("Bruh, that email address is invalid");?>" required="" disabled value="<?php echo $this->request->data['Reporter']['email']?>">
                <div class="help-block with-errors"></div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-7 col-sm-5 report_found_submit">
                <button type="submit" class="btn btn-primary btn_search"><?php echo __("Submit");?></button>
            </div>
        </div>
    </form>       
</div>