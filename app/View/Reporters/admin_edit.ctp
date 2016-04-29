<?php echo $this->element('menu');?>
<div class="index col-md-10 col-sm-10">
    <div class="white">
        <?php echo $this->Form->create('Reporter',array('class'=>'form-horizontal col-md-6')); ?>
        <fieldset>
            <legend><?php echo __('Admin Edit Reporter'); ?></legend>
                     
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">First Name</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('first_name',array('label' => false, 'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Second Name</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('second_name',array('label' => false,'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Last Name</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('last_name',array('label' => false, 'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Nationality</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('nationality',array('label' => false,'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('gender',array('label' => false, 'class'=>'form-control', 'options'=>array('Male'=>'Male', 'Female'=>'Female'), 'default'=>$this->request->data['Reporter']['gender'])); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Resident Country</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('resident_country',array('label' => false,'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">ID Document</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('document_id',array('label' => false, 'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('email',array('label' => false,'class'=>'form-control')); ?>
                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Account Type</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('account_type',array('label' => false,'class'=>'form-control', 'disabled'=>true)); ?>
                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Currently Used Ids</label>
                <div class="col-sm-6 admin_img_edit_section">
                    <table class="table table-responsive">
                        <tr>
                        <?php $has_id = false;?>
                        <?php if(!empty($this->request->data['Reporter']['id_image_link_1'])) { ?>
                            <td>
                                <a href="<?php echo $this->webroot."admin/reporters/remove_image/".$this->request->data['Reporter']['id']."/1";?>">
                                    <i class="fa fa-trash-o display_none"></i>
                                </a>
                                <a class="image-popup-no-margins admin_img_edit" href="<?php echo $this->request->data['Reporter']['id_image_link_1'];?>">
                                    <img class="img-responsive fix_img" src="<?php echo $this->request->data['Reporter']['id_image_link_1'];?>">
                                </a>
                            </td>
                            <?php $has_id = true;?>
                        <?php } ?>
                        <?php if(!empty($this->request->data['Reporter']['id_image_link_2'])) { ?>
                            <td>
                                <a href="<?php echo $this->webroot."admin/reporters/remove_image/".$this->request->data['Reporter']['id']."/2";?>">
                                    <i class="fa fa-trash-o display_none"></i>
                                </a>
                                <a class="image-popup-no-margins admin_img_edit" href="<?php echo $this->request->data['Reporter']['id_image_link_2'];?>">
                                    <img class="img-responsive fix_img" src="<?php echo $this->request->data['Reporter']['id_image_link_2'];?>">
                                </a>
                            </td>
                            <?php $has_id = true;?>
                        <?php } ?>
                        <?php if(!empty($this->request->data['Reporter']['id_image_link_3'])) { ?>
                            <td>
                                <a href="<?php echo $this->webroot."admin/reporters/remove_image/".$this->request->data['Reporter']['id']."/3";?>">
                                    <i class="fa fa-trash-o display_none"></i>
                                </a>
                                <a class="image-popup-no-margins admin_img_edit" href="<?php echo $this->request->data['Reporter']['id_image_link_3'];?>">
                                    <img class="img-responsive fix_img" src="<?php echo $this->request->data['Reporter']['id_image_link_3'];?>">
                                </a>
                            </td>
                            <?php $has_id = true;?>
                        <?php } ?>
                        </tr>
                    </table>
                </div>
            </div>

            <?php if($has_id && $this->request->data['Reporter']['account_type'] == 'Normal') { ?>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label"></label>
                <div class="col-sm-9">
                	<input class="form-control" style="font-weight: bold" type="text" disabled="disabled" value="This user has submitted an new ID. And waiting for admin confirmation.">
                    <?php echo $this->Html->Link(__('Accept'), array('action' => 'accept_id_document', $this->request->data['Reporter']['id']), array('class' => 'btn btn-danger')); ?>
                    <?php echo $this->Html->Link(__('Reject'), array('action' => 'admin_revoke_type', $this->request->data['Reporter']['id']), array('class' => 'btn btn-danger')); ?>
                </div>
            </div>
            <?php } ?>

            <?php if($this->request->data['Reporter']['account_type'] == 'Rejected') { ?>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label"></label>
                    <div class="col-sm-9">
                        <input class="form-control" style="font-weight: bold" type="text" disabled="disabled" value="This user has submitted an new ID and was rejected.">
                        <?php echo $this->Html->Link(__('Make it Verified'), array('action' => 'accept_id_document', $this->request->data['Reporter']['id']), array('class' => 'btn btn-danger')); ?>
                        <?php echo $this->Html->Link(__('Make it Normal'), array('action' => 'accept_id_document', $this->request->data['Reporter']['id'], 0), array('class' => 'btn btn-danger')); ?>
                    </div>
                </div>
            <?php } ?>

            <?php if($has_id && $this->request->data['Reporter']['account_type'] == 'Verified') { ?>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label"></label>
                <div class="col-sm-9">
                    <?php echo $this->Html->Link(__('Revoke Account Type'), array('action' => 'revoke_type', $this->request->data['Reporter']['id']), array('class' => 'btn btn-danger')); ?>
                </div>
            </div>
            <?php } ?>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label"></label>
                <div class="col-sm-9">
                    <button type="submit" class="btn submit-green s-c">Submit</button>
                </div>
            </div>

        </fieldset>
        <?php echo $this->Form->end(); ?>
    </div>
</div>