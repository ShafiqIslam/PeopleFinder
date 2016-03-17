<div class="actions col-md-2 col-sm-2">
	<h5 id="menu"><?php echo $this->Html->link(__('Dashboard'), array('controller' => 'users' ,'action' => 'dashboard', 'admin' => true)); ?></h5>
    <?php
        $controller = $this->params['controller'];
        $action = $this->params['action'];
        //$method = $this->params['pass'][0];
    ?>
    <ul class="nav-menu">
		<li  class="node <?php if($controller == 'profiles') echo 'selected';?>"><?php echo $this->Html->link(__('Profiles'), array('controller' => 'profiles' ,'action' => 'index', 'admin' => true)); ?></li>
        <li  class="node <?php if($controller == 'reporters') echo 'selected';?>"><?php echo $this->Html->link(__('Reporters'), array('controller' => 'reporters' ,'action' => 'index', 'admin' => true)); ?></li>
        <li  class="node <?php if($controller == 'logs') echo 'selected';?>"><?php echo $this->Html->link(__('Logs'), array('controller' => 'logs' ,'action' => 'index', 'admin' => true)); ?></li>

        <li class="node <?php if($controller == 'users') echo 'selected';?>"><?php echo $this->Html->link(__('CMS Users'), array('controller' => 'users', 'action' => 'index')); ?>
        </li>
        <?php if($controller == 'users') { ?>
            <li class="add a-s <?php if($controller == 'users' && $action == 'admin_add') echo 'selected';?>"><?php echo $this->Html->link(__('Add New Cms User'), array('controller' => 'users', 'action' => 'add', 'admin' => true)); ?></li>
        <?php } ?>

        <li class="logout"><?php echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout')); ?>
		</li>
    </ul>
</div>