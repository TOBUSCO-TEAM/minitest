<?php
echo $this->Form->create(array('controller' => 'tasks', 'action' => 'searchfunctionstasks', 'type' => 'post'));
echo $this->Form->input('buscador', array('placeholder' => 'insert function', 'label' => false));
echo $this->Form->end('Buscar');
?>
		<div class="col-md-9">
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<thead>
					<tr>
						<th>Title</th>
                                                <th>Description</th>
                                                <th>Member</th>
					</tr>
				</thead>
				<tbody>
                                    
				<?php foreach ($result as $task): ?>
					<tr>
						<td><?php echo h($task['Task']['title']); ?>&nbsp;</td>
						<td><?php echo h($task['Task']['description']); ?>&nbsp;</td>
						<td><?php echo h($task['Member']['name']); ?>&nbsp;</td>
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

</div><!-- end containing of content -->