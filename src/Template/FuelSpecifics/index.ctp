<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FuelSpecific[]|\Cake\Collection\CollectionInterface $fuelSpecifics
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Fuel Specific'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ref Fuel Types'), ['controller' => 'RefFuelTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ref Fuel Type'), ['controller' => 'RefFuelTypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="fuelSpecifics index large-9 medium-8 columns content">
    <h3><?= __('Fuel Specifics') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
<!--                <th scope="col">--><?//= $this->Paginator->sort('id') ?><!--</th>-->
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity_in_stock') ?></th>
                <th scope="col"><?= $this->Paginator->sort('unit_buying_price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('unit_sales_price') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($fuelSpecifics as $fuelSpecific): ?>
            <tr>
<!--                <td>--><?//= $this->Number->format($fuelSpecific->id) ?><!--</td>-->
                <td><?= h($fuelSpecific->created) ?></td>
                <td><?= h($fuelSpecific->modified) ?></td>
                <td><?= $this->Number->format($fuelSpecific->quantity_in_stock) ?></td>
                <td><?= $this->Number->format($fuelSpecific->unit_buying_price) ?></td>
                <td><?= $this->Number->format($fuelSpecific->unit_sales_price) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $fuelSpecific->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $fuelSpecific->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $fuelSpecific->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fuelSpecific->id)]) ?>
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
