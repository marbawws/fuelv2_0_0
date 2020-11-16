<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RefTransactionType $refTransactionType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ref Transaction Type'), ['action' => 'edit', $refTransactionType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ref Transaction Type'), ['action' => 'delete', $refTransactionType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $refTransactionType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ref Transaction Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ref Transaction Type'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="refTransactionTypes view large-9 medium-8 columns content">
    <h3><?= h($refTransactionType->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($refTransactionType->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($refTransactionType->id) ?></td>
        </tr>
    </table>
</div>
