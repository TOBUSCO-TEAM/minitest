<h2><?php echo __('Tasks'); ?></h2>
<table cellpadding="0" cellspacing="0" id="tabela">
    <thead>
        <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('title'); ?></th>
            <th><?php echo $this->Paginator->sort('description'); ?></th>
            <th><?php echo $this->Paginator->sort('deadline'); ?></th>
            <th><?php echo $this->Paginator->sort('member_id'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>

        
    </thead>
    <tbody>
        <?php foreach ($tarefas as $tarefa): ?>
            <tr>
                <td><?php echo h($tarefa['Task']['id']); ?>&nbsp;</td>
                <td><?php echo h($tarefa['Task']['title']); ?>&nbsp;</td>
                <td><?php echo h($tarefa['Task']['description']); ?>&nbsp;</td>
                <td><?php echo h($tarefa['Task']['deadline']); ?>&nbsp;</td>
                <td><?php echo h($tarefa['Member']['name']); ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $tarefa['Task']['id'])); ?>
                    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $tarefa['Task']['id'])); ?>
                    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $tarefa['Task']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $tarefa['Task']['id']))); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>