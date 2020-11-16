<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RefFuelType $refFuelType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ref Fuel Type'), ['action' => 'edit', $refFuelType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ref Fuel Type'), ['action' => 'delete', $refFuelType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $refFuelType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ref Fuel Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ref Fuel Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Fuels'), ['controller' => 'Fuels', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fuel'), ['controller' => 'Fuels', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Fuel Specifics'), ['controller' => 'FuelSpecifics', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fuel Specific'), ['controller' => 'FuelSpecifics', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="refFuelTypes view large-9 medium-8 columns content">
    <h3><?= h($refFuelType->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Fuel') ?></th>
            <td><?= $refFuelType->has('fuel') ? $this->Html->link($refFuelType->fuel->name, ['controller' => 'Fuels', 'action' => 'view', $refFuelType->fuel->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($refFuelType->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fuel Specific') ?></th>
            <td><?= $refFuelType->has('fuel_specific') ? $this->Html->link($refFuelType->fuel_specific->id, ['controller' => 'FuelSpecifics', 'action' => 'view', $refFuelType->fuel_specific->id]) : '' ?></td>
        </tr>
<!--        <tr>-->
<!--            <th scope="row">--><?//= __('Id') ?><!--</th>-->
<!--            <td>--><?//= $this->Number->format($refFuelType->id) ?><!--</td>-->
<!--        </tr>-->
    </table>
</div>
