<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Place[]|\Cake\Collection\CollectionInterface $places
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Place'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Photos'), ['controller' => 'Photos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Photo'), ['controller' => 'Photos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Transactions'), ['controller' => 'Transactions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Transaction'), ['controller' => 'Transactions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="places index large-9 medium-8 columns content">
    <h3><?= __('Places') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
<!--                <th scope="col">--><?//= $this->Paginator->sort('id') ?><!--</th>-->
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('details') ?></th>
                <th scope="col"><?= $this->Paginator->sort('photo_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($places as $place): ?>
            <tr>
<!--                <td>--><?//= $this->Number->format($place->id) ?><!--</td>-->
                <td><?= h($place->name) ?></td>
                <td><?= h($place->description) ?></td>
                <td><?= h($place->details) ?></td>
                <td><?= $place->has('photo') ? $this->Html->link($place->photo->name, ['controller' => 'Photos', 'action' => 'view', $place->photo->id]) : '' ?></td>
                <td><?= h($place->created) ?></td>
                <td><?= h($place->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $place->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $place->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $place->id], ['confirm' => __('Are you sure you want to delete # {0}?', $place->id)]) ?>
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
