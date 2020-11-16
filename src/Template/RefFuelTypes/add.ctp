<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RefFuelType $refFuelType
 */
?>
<?php
$urlToFuelsAutocompletedemoJson = $this->Url->build([
    "controller" => "Fuels",
    "action" => "findFuels",
    "_ext" => "json"
]);
echo $this->Html->scriptBlock('var urlToAutocompleteAction = "' . $urlToFuelsAutocompletedemoJson . '";', ['block' => true]);
echo $this->Html->script('RefFuelTypes/add_edit/fuelAutocomplete', ['block' => 'scriptBottom']);
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Ref Fuel Types'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Fuels'), ['controller' => 'Fuels', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fuel'), ['controller' => 'Fuels', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fuel Specifics'), ['controller' => 'FuelSpecifics', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fuel Specific'), ['controller' => 'FuelSpecifics', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="refFuelTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($refFuelType) ?>
    <fieldset>
        <legend><?= __('Add Ref Fuel Type') ?></legend>
        <?php
//            echo $this->Form->control('fuel_id', ['options' => $fuels]);
            echo $this->Form->control('fuel_id', ['label' => __('fuel') . ' (' . __('Autocomplete demo') . ')', 'type' => 'text', 'id' => 'autocomplete']);
            echo $this->Form->control('description');
            echo $this->Form->control('fuel_specific_id', ['options' => $fuelSpecifics]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
