<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FuelingStation $fuelingStation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Fueling Station'), ['action' => 'edit', $fuelingStation->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Fueling Station'), ['action' => 'delete', $fuelingStation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fuelingStation->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Fueling Stations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fueling Station'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Brands'), ['controller' => 'Brands', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Brand'), ['controller' => 'Brands', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Fuels'), ['controller' => 'Fuels', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fuel'), ['controller' => 'Fuels', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="fuelingStations view large-9 medium-8 columns content">
    <h3><?= h($fuelingStation->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Brand') ?></th>
            <td><?= $fuelingStation->has('brand') ? $this->Html->link($fuelingStation->brand->name, ['controller' => 'Brands', 'action' => 'view', $fuelingStation->brand->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($fuelingStation->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($fuelingStation->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Fuels') ?></h4>
        <?php if (!empty($fuelingStation->fuels)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Brand Id') ?></th>
                <th scope="col"><?= __('Fueling Station Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($fuelingStation->fuels as $fuels): ?>
            <tr>
                <td><?= h($fuels->id) ?></td>
                <td><?= h($fuels->name) ?></td>
                <td><?= h($fuels->brand_id) ?></td>
                <td><?= h($fuels->fueling_station_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Fuels', 'action' => 'view', $fuels->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Fuels', 'action' => 'edit', $fuels->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Fuels', 'action' => 'delete', $fuels->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fuels->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
