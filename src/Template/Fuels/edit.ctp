<?php
$urlToLinkedListFilter = $this->Url->build([
    "controller" => "FuelingStations",
    "action" => "getByBrand",
    "_ext" => "json"
]);
echo $this->Html->scriptBlock('var urlToLinkedListFilter = "' . $urlToLinkedListFilter . '";', ['block' => true]);
echo $this->Html->script('Fuels/add_edit', ['block' => 'scriptBottom']);
?><?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fuel $fuel
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $fuel->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $fuel->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Fuels'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Brands'), ['controller' => 'Brands', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Brand'), ['controller' => 'Brands', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fueling Stations'), ['controller' => 'FuelingStations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fueling Station'), ['controller' => 'FuelingStations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ref Fuel Types'), ['controller' => 'RefFuelTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ref Fuel Type'), ['controller' => 'RefFuelTypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="fuels form large-9 medium-8 columns content">
    <?= $this->Form->create($fuel) ?>
    <fieldset>
        <legend><?= __('Edit Fuel') ?></legend>
        <?php
        echo $this->Form->control('name');
        echo $this->Form->control('brand_id', ['options' => $brands, 'empty' => true]);
        //            echo $this->Form->control('fueling_station_id', ['options' => $fuelingStations]);
        echo $this->Form->control('fueling_station_id', ['options' => [__('Please select a Brand first')]]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
