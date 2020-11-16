<h1>
    Transactions placed with
    <?= $this->Text->toList(h($places), 'or') ?>
</h1>

<section>
    <?php foreach ($transactions as $transaction): ?>
        <article>
            <!-- Use the HtmlHelper to create a link -->
            <h4><?= $this->Html->link(
                    $transaction->created,
                    ['controller' => 'Transactions', 'action' => 'view', $transaction->id]
                ) ?></h4>
            <span><?= h($transaction->other_details) ?></span>
        </article>
    <?php endforeach; ?>
</section>
