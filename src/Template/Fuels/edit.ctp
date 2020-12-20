<?php
echo $this->Html->script([
    'https://ajax.googleapis.com/ajax/libs/angularjs/1.6.6/angular.js'
], ['block' => 'scriptLibraries']
);
$urlToLinkedListFilter = $this->Url->build([
    "controller" => "Brands",
    "action" => "getBrands",
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
<div class="fuels form large-9 medium-8 columns content" ng-app="linkedlists" ng-controller="brandsController">
    <?= $this->Form->create($fuel) ?>
    <fieldset>
        <legend><?= __('Edit Fuel') ?></legend>
        <div>
            <?= __('Brands') . ' ' . '(Brand)' ?> :
            <select
                name="brand_id"
                id="brand-id"
                ng-model="brand"
                ng-options="brand.name for brand in brands track by brand.id"
            >
                <option value=''>Select</option>
            </select>
        </div>
        <div>
            <?= __('Fueling Stations') . ' ' . '(fueling_station)' ?> :
            <!--            <pre ng-show='brands'>{{ brands | json }}></pre>-->
            <select
                name="fueling_station_id"
                id="fueling-station-id"
                ng-disabled="!brand"
                ng-model="fuelingStation"
                ng-options="fuelingStation.name for fuelingStation in brand.fueling_stations track by fuelingStation.id"
            >
                <option value=''>Select</option>
            </select>
        </div>
        <?php
        echo $this->Form->control('name');
        //            echo $this->Form->control('brand_id', ['options' => $brands, 'empty' => true]);
        ////            echo $this->Form->control('fueling_station_id', ['options' => $fuelingStations]);
        //            echo $this->Form->control('fueling_station_id', ['options' => [__('Please select a Brand first')]]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
