<?php $this->extend('../../Layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<li><?= $this->Html->link(__('Edit Brand'), ['action' => 'edit', $brand->id], ['class' => 'nav-link']) ?></li>
<li><?= $this->Form->postLink( __('Delete Brand'), ['action' => 'delete', $brand->id], ['confirm' => __('Are you sure you want to delete # {0}?', $brand->id), 'class' => 'nav-link'] ) ?></li>
<li><?= $this->Html->link(__('List Brands'), ['action' => 'index'], ['class' => 'nav-link']) ?> </li>
<li><?= $this->Html->link(__('New Brand'), ['action' => 'add'], ['class' => 'nav-link']) ?> </li>
<li><?= $this->Html->link(__('List Fueling Stations'), ['controller' => 'FuelingStations', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Fueling Station'), ['controller' => 'FuelingStations', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Fuels'), ['controller' => 'Fuels', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Fuel'), ['controller' => 'Fuels', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>

<div class="brands view large-9 medium-8 columns content">
    <h3><?= h($brand->name) ?></h3>
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th scope="row"><?= __('Name') ?></th>
                <td><?= h($brand->name) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Id') ?></th>
                <td><?= $this->Number->format($brand->id) ?></td>
            </tr>
        </table>
    </div>
    <div class="related">
        <h4><?= __('Related Fueling Stations') ?></h4>
        <?php if (!empty($brand->fueling_stations)): ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Brand Id') ?></th>
                    <th scope="col"><?= __('Name') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($brand->fueling_stations as $fuelingStations): ?>
                <tr>
                    <td><?= h($fuelingStations->id) ?></td>
                    <td><?= h($fuelingStations->brand_id) ?></td>
                    <td><?= h($fuelingStations->name) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'FuelingStations', 'action' => 'view', $fuelingStations->id], ['class' => 'btn btn-secondary']) ?>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'FuelingStations', 'action' => 'edit', $fuelingStations->id], ['class' => 'btn btn-secondary']) ?>
                        <?= $this->Form->postLink( __('Delete'), ['controller' => 'FuelingStations', 'action' => 'delete', $fuelingStations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fuelingStations->id), 'class' => 'btn btn-danger']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Fuels') ?></h4>
        <?php if (!empty($brand->fuels)): ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Name') ?></th>
                    <th scope="col"><?= __('Brand Id') ?></th>
                    <th scope="col"><?= __('Fueling Station Id') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($brand->fuels as $fuels): ?>
                <tr>
                    <td><?= h($fuels->id) ?></td>
                    <td><?= h($fuels->name) ?></td>
                    <td><?= h($fuels->brand_id) ?></td>
                    <td><?= h($fuels->fueling_station_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'Fuels', 'action' => 'view', $fuels->id], ['class' => 'btn btn-secondary']) ?>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'Fuels', 'action' => 'edit', $fuels->id], ['class' => 'btn btn-secondary']) ?>
                        <?= $this->Form->postLink( __('Delete'), ['controller' => 'Fuels', 'action' => 'delete', $fuels->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fuels->id), 'class' => 'btn btn-danger']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <?php endif; ?>
    </div>
</div>
