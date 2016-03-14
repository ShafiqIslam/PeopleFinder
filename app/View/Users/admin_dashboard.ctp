<?php echo $this->element('menu'); ?>

<div class="index col-md-10 col-sm-10">
    <div class="white">
        <div class="row dashbrd">
            <div class="col-md-3 col-sm-3">
                <a href="<?php echo $this->Html->url(array('controller' => 'profiles', 'action' => 'index')) ?>">
                    <div class="realtime t-color">
                        <span>Profiles</span>

                        <div class="all-desc">
                            <div class="pull-right">
                                <span><i class="fa fa-users fa-5x"></i></span>
                            </div>
                            <p class="count-num"><?php //echo $players;?></p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3 col-sm-3">
                <a href="<?php echo $this->Html->url(array('controller' => 'reporters', 'action' => 'index')) ?>">
                    <div class="realtime t-color">
                        <span>Reporters</span>

                        <div class="all-desc">
                            <div class="pull-right">
                                <span><i class="fa fa-user-plus fa-5x"></i></span>
                            </div>
                            <p class="count-num"><?php //echo $players;?></p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3 col-sm-3">
                <a href="<?php echo $this->Html->url(array('controller' => 'logs', 'action' => 'index')) ?>">
                    <div class="realtime t-color">
                        <span>Logs</span>

                        <div class="all-desc">
                            <div class="pull-right">
                                <span><i class="fa fa-sign-in fa-5x"></i></span>
                            </div>
                            <p class="count-num"><?php //echo $players;?></p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3 col-sm-3">
                <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'index', 'admin' => true, 'settings')) ?>">
                    <div class="realtime t-color">
                        <span>Admin Settings</span>

                        <div class="all-desc">
                            <div class="pull-right">
                                <span><i class="fa fa-wrench fa-5x"></i></span>
                            </div>
                            <p class="count-num"><?php //echo $cms_user; ?></p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>