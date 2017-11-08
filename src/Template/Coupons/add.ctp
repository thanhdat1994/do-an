<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Coupons'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="coupons form large-9 medium-8 columns content">
    <?= $this->Form->create($coupon) ?>
    <fieldset>
        <legend><?= __('Add Coupon') ?></legend>
        <?php
            echo $this->Form->control('code');
            echo $this->Form->control('percent');
            echo $this->Form->control('description');
            echo $this->Form->control('time_start');
            echo $this->Form->control('time_end');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
