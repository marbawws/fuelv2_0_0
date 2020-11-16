<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fuel $fuel
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Fuel'), ['action' => 'edit', $fuel->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Fuel'), ['action' => 'delete', $fuel->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fuel->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Fuels'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fuel'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ref Fuel Types'), ['controller' => 'RefFuelTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ref Fuel Type'), ['controller' => 'RefFuelTypes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="fuels view large-9 medium-8 columns content">
    <h3><?= h($fuel->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($fuel->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($fuel->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Ref Fuel Types') ?></h4>
        <?php if (!empty($fuel->ref_fuel_types)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Fuel Id') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Fuel Specific Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($fuel->ref_fuel_types as $refFuelTypes): ?>
            <tr>
                <td><?= h($refFuelTypes->id) ?></td>
                <td><?= h($refFuelTypes->fuel_id) ?></td>
                <td><?= h($refFuelTypes->description) ?></td>
                <td><?= h($refFuelTypes->fuel_specific_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'RefFuelTypes', 'action' => 'view', $refFuelTypes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'RefFuelTypes', 'action' => 'edit', $refFuelTypes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'RefFuelTypes', 'action' => 'delete', $refFuelTypes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $refFuelTypes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
