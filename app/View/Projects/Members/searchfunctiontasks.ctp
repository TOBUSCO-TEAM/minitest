
<div class="members index">
<!-- end row -->

<?php
echo $this->Form->create(array('controller' => 'members', 'action' => 'searchfunctiontasks', 'type' => 'post'));
echo $this->Form->input('buscador', array('placeholder' => 'insert function', 'label' => false));
echo $this->Form->input('opcoes',array('type'=>'select','options'=>array('Nao possuem tarefa','Possuem Tarefa')));
echo $this->Form->end('Buscar');
?>


	<div class="row">

		<div class="col-md-9">
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<thead>
					<tr>
						<th> Name </th>
						<th>Function</th>
						<th>Number of Tasks</th>
						<th class="actions"></th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($result as $member): ?>
					<tr>
						<td><?php echo h($member['Member']['name']); ?>&nbsp;</td>
						<td><?php echo h($member['Member']['function']); ?>&nbsp;</td>
                                                <td><?php if(h($member['Member']['task_count'])===null || h($member['Member']['task_count'])==0){
                                                    echo '0';
                                                } else {
                                                    echo h($member['Member']['task_count']);
                                                }
                                                     //um campo a echo h($member['Member']mais na tabela members, para ser usada a propriedade counterCache(vide modelo Task) ?>&nbsp;</td>
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


</div><!-- end containing of content -->