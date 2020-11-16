<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transaction $transaction
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Transaction'), ['action' => 'edit', $transaction->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Transaction'), ['action' => 'delete', $transaction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transaction->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Transactions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transaction'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ref Fuel Types'), ['controller' => 'RefFuelTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ref Fuel Type'), ['controller' => 'RefFuelTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ref Transaction Types'), ['controller' => 'RefTransactionTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ref Transaction Type'), ['controller' => 'RefTransactionTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Places'), ['controller' => 'Places', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Place'), ['controller' => 'Places', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="transactions view large-9 medium-8 columns content">
    <h3><?= h($transaction->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Other Details') ?></th>
            <td><?= h($transaction->other_details) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $transaction->has('user') ? $this->Html->link($transaction->user->username, ['controller' => 'Users', 'action' => 'view', $transaction->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ref Fuel Type') ?></th>
            <td><?= $transaction->has('ref_fuel_type') ? $this->Html->link($transaction->ref_fuel_type->name, ['controller' => 'RefFuelTypes', 'action' => 'view', $transaction->ref_fuel_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ref Transaction Type') ?></th>
            <td><?= $transaction->has('ref_transaction_type') ? $this->Html->link($transaction->ref_transaction_type->name, ['controller' => 'RefTransactionTypes', 'action' => 'view', $transaction->ref_transaction_type->id]) : '' ?></td>
        </tr>
<!--        <tr>-->
<!--            <th scope="row">--><?//= __('Id') ?><!--</th>-->
<!--            <td>--><?//= $this->Number->format($transaction->id) ?><!--</td>-->
<!--        </tr>-->
        <tr>
            <th scope="row"><?= __('Amount') ?></th>
            <td><?= $this->Number->format($transaction->amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($transaction->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($transaction->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Places') ?></h4>
        <?php if (!empty($transaction->places)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Details') ?></th>
                <th scope="col"><?= __('Photo Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($transaction->places as $places): ?>
            <tr>
                <td><?= h($places->id) ?></td>
                <td><?= h($places->name) ?></td>
                <td><?= h($places->description) ?></td>
                <td><?= h($places->details) ?></td>
                <td><?= h($places->photo_id) ?></td>
                <td><?= h($places->created) ?></td>
                <td><?= h($places->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Places', 'action' => 'view', $places->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Places', 'action' => 'edit', $places->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Places', 'action' => 'delete', $places->id], ['confirm' => __('Are you sure you want to delete # {0}?', $places->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
