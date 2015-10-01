<div class="membros index">
	<h2><?php echo __('Membros'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nome'); ?></th>
			<th><?php echo $this->Paginator->sort('username'); ?></th>
			<th><?php echo $this->Paginator->sort('password'); ?></th>
			<th><?php echo $this->Paginator->sort('cargo'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($membros as $membro): ?>
	<tr>
		<td><?php echo h($membro['Membro']['id']); ?>&nbsp;</td>
		<td><?php echo h($membro['Membro']['nome']); ?>&nbsp;</td>
		<td><?php echo h($membro['Membro']['username']); ?>&nbsp;</td>
		<td><?php echo h($membro['Membro']['password']); ?>&nbsp;</td>
		<td><?php echo h($membro['Membro']['cargo']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $membro['Membro']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $membro['Membro']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $membro['Membro']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $membro['Membro']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	