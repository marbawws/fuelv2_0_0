<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fuel[]|\Cake\Collection\CollectionInterface $fuels
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Fuel'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Brands'), ['controller' => 'Brands', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Brand'), ['controller' => 'Brands', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fueling Stations'), ['controller' => 'FuelingStations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fueling Station'), ['controller' => 'FuelingStations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ref Fuel Types'), ['controller' => 'RefFuelTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ref Fuel Type'), ['controller' => 'RefFuelTypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="fuels index large-9 medium-8 columns content">
    <h3><?= __('Fuels') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('brand_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fueling_station_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($fuels as $fuel): ?>
            <tr>
                <td><?= $this->Number->format($fuel->id) ?></td>
                <td><?= h($fuel->name) ?></td>
                <td><?= $fuel->has('brand') ? $this->Html->link($fuel->brand->name, ['controller' => 'Brands', 'action' => 'view', $fuel->brand->id]) : '' ?></td>
                <td><?= $fuel->has('fueling_station') ? $this->Html->link($fuel->fueling_station->name, ['controller' => 'FuelingStations', 'action' => 'view', $fuel->fueling_station->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $fuel->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $fuel->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $fuel->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fuel->id)]) ?>
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
