<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transaction[]|\Cake\Collection\CollectionInterface $transactions
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Transaction'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ref Fuel Types'), ['controller' => 'RefFuelTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ref Fuel Type'), ['controller' => 'RefFuelTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ref Transaction Types'), ['controller' => 'RefTransactionTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ref Transaction Type'), ['controller' => 'RefTransactionTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Places'), ['controller' => 'Places', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Place'), ['controller' => 'Places', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="transactions index large-9 medium-8 columns content">
    <h3><?= __('Transactions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
<!--                <th scope="col">--><?//= $this->Paginator->sort('id') ?><!--</th>-->
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('other_details') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fuel_type_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('transaction_type_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transactions as $transaction): ?>
            <tr>
<!--                <td>--><?//= $this->Number->format($transaction->id) ?><!--</td>-->
                <td><?= h($transaction->created) ?></td>
                <td><?= $this->Number->format($transaction->amount) ?></td>
                <td><?= h($transaction->other_details) ?></td>
                <td><?= h($transaction->modified) ?></td>
                <td><?= $transaction->has('user') ? $this->Html->link($transaction->user->username, ['controller' => 'Users', 'action' => 'view', $transaction->user->id]) : '' ?></td>
                <td><?= $transaction->has('ref_fuel_type') ? $this->Html->link($transaction->ref_fuel_type->description, ['controller' => 'RefFuelTypes', 'action' => 'view', $transaction->ref_fuel_type->id]) : '' ?></td>
                <td><?= $transaction->has('ref_transaction_type') ? $this->Html->link($transaction->ref_transaction_type->name, ['controller' => 'RefTransactionTypes', 'action' => 'view', $transaction->ref_transaction_type->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View (pdf)'), ['action' => 'view', $transaction->id . '.pdf']) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $transaction->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $transaction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transaction->id)]) ?>
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
