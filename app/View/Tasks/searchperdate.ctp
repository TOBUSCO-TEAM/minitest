 <div class="row"> 
<div class="col-md-3">
            <div class="actions">
                <div class="panel panel-default">
                    <div class="panel-heading">Actions</div>
                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked">
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Task'), array('action' => 'add'), array('escape' => false)); ?></li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Members'), array('controller' => 'members', 'action' => 'index'), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>&nbsp;&nbsp;Members Per Functions'), array('controller' => 'members', 'action' => 'searchfunctiontasks'), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>&nbsp;&nbsp;Tasks Per Member'), array('controller' => 'tasks', 'action' => 'searchmembertasks'), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>&nbsp;&nbsp;Tasks Per Deadline'), array('controller' => 'tasks', 'action' => 'searchperdate'), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>&nbsp;&nbsp;Search Per Date Gap'), array('controller' => 'tasks', 'action' => 'betweendatas'), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>&nbsp;&nbsp;Search Per Member in Date Gap'), array('controller' => 'tasks', 'action' => 'memberbetweendatas'), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>&nbsp;&nbsp;Search Tasks Per Function'), array('controller' => 'tasks', 'action' => 'searchfunctionstasks'), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Number of Tasks per Member'), array('controller' => 'members', 'action' => 'viewnrtasks'), array('escape' => false)); ?> </li>
                        </ul>
                    </div><!-- end body -->
                </div><!-- end panel -->
            </div><!-- end actions -->
        </div><!-- end col md 3 -->
       
		<div class="col-md-9">
                     <?php echo $this->Session->flash('auth'); ?>
<?php
echo $this->Form->create(array('controller' => 'tasks', 'action' => 'searchperdate', 'type' => 'post'));
echo $this->Form->input('buscador', array('class' => 'form-control','placeholder' => 'insert date yyyy-mm-dd', 'label' => false));
echo $this->Form->submit('Search', array('class'=>'btn btn-default'));
echo $this->Form->end();
?>
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<thead>
					<tr>
						<th>Title</th>
						<th>Deadline</th>
                                                <th>Member</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($result as $task): ?>
					<tr>
						<td><?php echo h($task['Task']['title']); ?>&nbsp;</td>
						<td><?php echo h($task['Task']['deadline']); ?>&nbsp;</td>
								<td>
			<?php echo $this->Html->link($task['Member']['name'], array('controller' => 'members', 'action' => 'view', $task['Member']['id'])); ?>
		</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>

			<p>
				<small><?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?></small>
			</p>

			<?php
			$params = $this->Paginator->params();
			if ($params['pageCount'] > 1) {
			?>
			<ul class="pagination pagination-sm">
				<?php
					echo $this->Paginator->prev('&larr; Previous', array('class' => 'prev','tag' => 'li','escape' => false), '<a onclick="return false;">&larr; Previous</a>', array('class' => 'prev disabled','tag' => 'li','escape' => false));
					echo $this->Paginator->numbers(array('separator' => '','tag' => 'li','currentClass' => 'active','currentTag' => 'a'));
					echo $this->Paginator->next('Next &rarr;', array('class' => 'next','tag' => 'li','escape' => false), '<a onclick="return false;">Next &rarr;</a>', array('class' => 'next disabled','tag' => 'li','escape' => false));
				?>
			</ul>
			<?php } ?>

		</div> <!-- end col md 9 -->
	</div><!-- end row -->
<?php
                            
?>

!-- end containing of content -->