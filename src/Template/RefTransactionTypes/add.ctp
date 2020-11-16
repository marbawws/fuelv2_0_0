<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RefTransactionType $refTransactionType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Ref Transaction Types'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="refTransactionTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($refTransactionType) ?>
    <fieldset>
        <legend><?= __('Add Ref Transaction Type') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
