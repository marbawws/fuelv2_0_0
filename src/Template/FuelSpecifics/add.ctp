<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FuelSpecific $fuelSpecific
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Fuel Specifics'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Ref Fuel Types'), ['controller' => 'RefFuelTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ref Fuel Type'), ['controller' => 'RefFuelTypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="fuelSpecifics form large-9 medium-8 columns content">
    <?= $this->Form->create($fuelSpecific) ?>
    <fieldset>
        <legend><?= __('Add Fuel Specific') ?></legend>
        <?php
            echo $this->Form->control('quantity_in_stock');
            echo $this->Form->control('unit_buying_price');
            echo $this->Form->control('unit_sales_price');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
