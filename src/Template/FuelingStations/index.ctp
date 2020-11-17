<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FuelingStation[]|\Cake\Collection\CollectionInterface $fuelingStations
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Fueling Station'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Brands'), ['controller' => 'Brands', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Brand'), ['controller' => 'Brands', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fuels'), ['controller' => 'Fuels', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fuel'), ['controller' => 'Fuels', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="fuelingStations index large-9 medium-8 columns content">
    <h3><?= __('Fueling Stations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('brand_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($fuelingStations as $fuelingStation): ?>
            <tr>
                <td><?= $this->Number->format($fuelingStation->id) ?></td>
                <td><?= $fuelingStation->has('brand') ? $this->Html->link($fuelingStation->brand->name, ['controller' => 'Brands', 'action' => 'view', $fuelingStation->brand->id]) : '' ?></td>
                <td><?= h($fuelingStation->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $fuelingStation->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $fuelingStation->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $fuelingStation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fuelingStation->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
