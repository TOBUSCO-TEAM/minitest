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

        
             <?php echo $this->Session->flash('auth'); ?>
<div class="members index">
<!-- end row -->




	

		<div class="col-md-9">
                    
                    <?php
echo $this->Form->create(array('controller' => 'members', 'action' => 'searchfunctiontasks', 'type' => 'post'));
echo $this->Form->input('buscador', array('class' => 'form-control','placeholder' => 'insert function', 'label' => false));
echo $this->Form->input('opcoes',array('class' => 'form-control','type'=>'select','options'=>array('Nao possuem tarefa','Possuem Tarefa')));
echo $this->Form->submit('Search', array('class'=>'btn btn-default'));
echo $this->Form->end();
?>
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