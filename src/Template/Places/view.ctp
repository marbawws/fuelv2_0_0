<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Place $place
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Place'), ['action' => 'edit', $place->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Place'), ['action' => 'delete', $place->id], ['confirm' => __('Are you sure you want to delete # {0}?', $place->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Places'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Place'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Photos'), ['controller' => 'Photos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Photo'), ['controller' => 'Photos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Transactions'), ['controller' => 'Transactions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transaction'), ['controller' => 'Transactions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="places view large-9 medium-8 columns content">
    <h3><?= h($place->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($place->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($place->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Details') ?></th>
            <td><?= h($place->details) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Photo') ?></th>
            <td><?= $place->has('photo') ? $this->Html->link($place->photo->name, ['controller' => 'Photos', 'action' => 'view', $place->photo->id]) : '' ?></td>
        </tr>
<!--        <tr>-->
<!--            <th scope="row">--><?//= __('Id') ?><!--</th>-->
<!--            <td>--><?//= $this->Number->format($place->id) ?><!--</td>-->
<!--        </tr>-->
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($place->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($place->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Transactions') ?></h4>
        <?php if (!empty($place->transactions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Amount') ?></th>
                <th scope="col"><?= __('Other Details') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Fuel Type Id') ?></th>
                <th scope="col"><?= __('Transaction Type Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($place->transactions as $transactions): ?>
            <tr>
                <td><?= h($transactions->id) ?></td>
                <td><?= h($transactions->created) ?></td>
                <td><?= h($transactions->amount) ?></td>
                <td><?= h($transactions->other_details) ?></td>
                <td><?= h($transactions->modified) ?></td>
                <td><?= h($transactions->user_id) ?></td>
                <td><?= h($transactions->fuel_type_id) ?></td>
                <td><?= h($transactions->transaction_type_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Transactions', 'action' => 'view', $transactions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Transactions', 'action' => 'edit', $transactions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Transactions', 'action' => 'delete', $transactions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transactions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
