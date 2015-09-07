<?php 
echo $this->Html->css(‘jquery-ui-1.9.2.custom’); 
echo $this->Html->script(‘jquery-1.9.2.min’); 
echo $this->Html->script(‘jquery-ui-1.9.22.custom.min’); 
?>
<?php
echo $this->Form->create(array('controller' => 'tasks', 'action' => 'searchperdate', 'type' => 'post'));
echo $this->form->input('date',array('class'=>'datepicker','type'=>'text'));
echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default'));
echo $this->Form->end();
?>

<?php foreach ($datesearch as $dates): ?>
		<div><?php echo h($dates['Task']['id']); ?>&nbsp;</div>
		<div><?php echo h($dates['Task']['title']); ?>&nbsp;</div>
		
<?php endforeach; ?>