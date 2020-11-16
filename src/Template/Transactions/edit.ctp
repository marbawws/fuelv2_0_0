<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transaction $transaction
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $transaction->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $transaction->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Transactions'), ['action' => 'index']) ?></li>
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
<div class="transactions form large-9 medium-8 columns content">
    <?= $this->Form->create($transaction) ?>
    <fieldset>
        <legend><?= __('Edit Transaction') ?></legend>
        <?php
            echo $this->Form->control('amount');
            echo $this->Form->control('other_details');
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('fuel_type_id', ['options' => $refFuelTypes]);
            echo $this->Form->control('transaction_type_id', ['options' => $refTransactionTypes]);
            echo $this->Form->control('places._ids', ['options' => $places]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
