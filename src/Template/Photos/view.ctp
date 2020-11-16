<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Photo $photo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Photo'), ['action' => 'edit', $photo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Photo'), ['action' => 'delete', $photo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $photo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Photos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Photo'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Places'), ['controller' => 'Places', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Place'), ['controller' => 'Places', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="photos view large-9 medium-8 columns content">
    <h3><?= h($photo->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($photo->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Path') ?></th>
            <td><?= h($photo->path) ?></td>
        </tr>
<!--        <tr>-->
<!--            <th scope="row">--><?//= __('Id') ?><!--</th>-->
<!--            <td>--><?//= $this->Number->format($photo->id) ?><!--</td>-->
<!--        </tr>-->
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($photo->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($photo->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $photo->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Places') ?></h4>
        <?php if (!empty($photo->places)): ?>
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
            <?php foreach ($photo->places as $places): ?>
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
