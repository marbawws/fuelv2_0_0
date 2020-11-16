<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RefFuelType[]|\Cake\Collection\CollectionInterface $refFuelTypes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ref Fuel Type'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fuels'), ['controller' => 'Fuels', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fuel'), ['controller' => 'Fuels', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fuel Specifics'), ['controller' => 'FuelSpecifics', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fuel Specific'), ['controller' => 'FuelSpecifics', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="refFuelTypes index large-9 medium-8 columns content">
    <h3><?= __('Ref Fuel Types') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
<!--                <th scope="col">--><?//= $this->Paginator->sort('id') ?><!--</th>-->
                <th scope="col"><?= $this->Paginator->sort('fuel_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fuel_specific_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($refFuelTypes as $refFuelType): ?>
            <tr>
<!--                <td>--><?//= $this->Number->format($refFuelType->id) ?><!--</td>-->
                <td><?= $refFuelType->has('fuel') ? $this->Html->link($refFuelType->fuel->name, ['controller' => 'Fuels', 'action' => 'view', $refFuelType->fuel->id]) : '' ?></td>
                <td><?= h($refFuelType->description) ?></td>
                <td><?= $refFuelType->has('fuel_specific') ? $this->Html->link($refFuelType->fuel_specific->id, ['controller' => 'FuelSpecifics', 'action' => 'view', $refFuelType->fuel_specific->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $refFuelType->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $refFuelType->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $refFuelType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $refFuelType->id)]) ?>
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
