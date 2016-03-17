<?php echo $this->element('menu');?>
<div class="index col-md-10 col-sm-10">
    <div class="white">
        <?php echo $this->Form->create('User',array('class'=>'form-horizontal col-md-6')); ?>
        <fieldset>
            <legend><?php echo __('Admin Edit CMS User'); ?></legend>
            
            <?php if($logged_user['id'] == $id) { ?>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('email',array('label' => false, 'class'=>'form-control')); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Password</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('simple_pwd',array('label' => false,'class'=>'form-control', 'type'=>'password')); ?>
                </div>
            </div>
            <?php } ?>

            <?php if($logged_user['role'] == 'admin') { ?>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Role</label>
                <div class="col-sm-9">
                    <?php echo $this->Form->input('role',array('label' => false,'class'=>'form-control', 'options'=>array('admin'=>'Admin', 'subadmin'=>'Sub Admin'), 'default'=>$this->request->data['User']['role'])); ?>
                </div>
            </div>
            <?php } ?>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label"></label>
                <div class="col-sm-9">
                    <button type="submit" class="btn submit-green s-c">Submit</button>
                    <?php if($logged_user['role'] == 'subadmin') { ?>
		            	<?php echo $this->Html->Link(__('Delete'), array('action' => 'delete', $this->request->data['User']['id']), array('class' => 'btn btn-danger', 'id'=>'account_del_btn')); ?>
		            	<script type="text/javascript">
		            	$(document).ready(function(){
		            		$('#account_del_btn').click(function(e){
		            			e.preventDefault();
		            			if (confirm("Are you sure you want to delete your account?") == true) {
							        window.location = "<?php echo $this->webroot.'admin/users/delete/'.$this->request->data['User']['id'];?>";
							    }
		            		});
		            	});
		            	</script>
		            <?php } ?>
                </div>
            </div>

        </fieldset>
        <?php echo $this->Form->end(); ?>
    </div>
</div>