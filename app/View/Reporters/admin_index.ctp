<script type="text/javascript">
    $(function () {
        $("#go").on('click', function () {
            var keyword = $.trim($('#keyword').val());
            location.href = ROOT+ 'admin/reporters/index/keyword:' + keyword;
        })
    });
</script>

<?php echo $this->element('menu');?>
<div class="cmsUsers col-md-10 col-sm-10 index">
    <div class="white">
        <div class="paging pull-right">
            <ul class="pagination pull-right">
                <?php
                $this->Paginator->options(array(
                    'url' => array(
                        'keyword' => $keyword
                    )
                ));
                echo $this->Paginator->prev(' < ', array('tag' => 'li', 'disabledTag' => 'li', 'escape' => false), '<a href="#"> < </a>', array('class' => 'prev disabled', 'tag' => 'li', 'disabledTag' => 'li', 'escape' => false));
                echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentTag' => 'a'));
                echo $this->Paginator->next(' > ', array('tag' => 'li', 'disabledTag' => 'li', 'escape' => false), '<a href="#"> > </a>', array('class' => 'next disabled', 'tag' => 'li', 'disabledTag' => 'li', 'escape' => false));
                ?>
            </ul>
            <p class="text-right">
                <?php
                echo $this->Paginator->counter(array(
                    'format' => __('Showing {:start} to {:end} of {:count} entries')
                ));
                ?>
            </p>
        </div>
	    <h2><?php echo __('Reporters'); ?></h2>

        <div class="form-horizontal">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-1 control-label"><?php echo __("Keyword"); ?></label>
                <div class="col-sm-3">
                    <?php echo $this->Form->input('titlex', array('id' => 'keyword', 'label' => false,'class'=>'form-control')); ?>
                </div>
                <div class="col-sm-1">
                    <?php
                    echo $this->Form->input('Go', array('id' => 'go','class'=>'btn btn-info', 'type' => 'button', 'label' => false));
                    ?>
                </div>
            </div>
        </div>

        <table cellpadding="0" cellspacing="0" class="table">
            <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('Reporter.first_name', 'Name');?></th>
				<th><?php echo $this->Paginator->sort('gender'); ?></th>
				<th><?php echo $this->Paginator->sort('resident_country'); ?></th>
				<th><?php echo $this->Paginator->sort('email'); ?></th>
				<th><?php echo $this->Paginator->sort('account_type'); ?></th>
				<th><?php echo $this->Paginator->sort('created'); ?></th>
				<th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($reporters as $reporter): ?>
            	<?php
            	$first_name = !empty($reporter['Reporter']['first_name']) ? $reporter['Reporter']['first_name'] : "";
				$second_name = !empty($reporter['Reporter']['second_name']) ? $reporter['Reporter']['second_name'] : "";
				$last_name = !empty($reporter['Reporter']['last_name']) ? $reporter['Reporter']['last_name'] : "";
				$name = $first_name . " " . $second_name . " " . $last_name;

                if( !empty($reporter['Reporter']['id_image_link_1']) || !empty($reporter['Reporter']['id_image_link_2']) || !empty($reporter['Reporter']['id_image_link_3']) ) {
                    $has_id = true;
                } else {
                    $has_id = false;
                }

                if($has_id && $reporter['Reporter']['account_type'] == 'Normal') {
                    $tr_style = "background: rgba(169, 142, 66, 0.65);border-bottom:1px solid #000";
                    $td_style = "color: #000; font-weight: bold;";
                } else {
                    $tr_style = "";
                    $td_style = "";
                }
                ?>
				<tr style="<?php echo $tr_style;?>">
					<td style="<?php echo $td_style;?>"><?php echo h($name);?></td>
					<td style="<?php echo $td_style;?>"><?php echo h($reporter['Reporter']['gender']); ?>&nbsp;</td>
					<td style="<?php echo $td_style;?>"><?php echo h($reporter['Reporter']['resident_country']); ?>&nbsp;</td>
					<td style="<?php echo $td_style;?>"><?php echo h($reporter['Reporter']['email']); ?>&nbsp;</td>
					<td style="<?php echo $td_style;?>"><?php echo h($reporter['Reporter']['account_type']); if(!empty($reporter['Reporter']['id_image_link_1']) && $reporter['Reporter']['account_type'] == 'Normal') echo " (new ID)";?>&nbsp;</td>
					<td style="<?php echo $td_style;?>"><?php echo date_format(date_create($reporter['Reporter']['created']),'d M Y'); ?>&nbsp;</td>
					<td class="actions" style="<?php echo $td_style;?>">
						<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $reporter['Reporter']['id']), array( 'class' => 'btn btn-info')); ?>
						<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $reporter['Reporter']['id']), array( 'class' => 'btn btn-info'), __('Are you sure you want to delete # %s?', $name)); ?>
					</td>
				</tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>