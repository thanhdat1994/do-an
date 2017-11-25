<?php
/**
  * @var \App\View\AppView $this
  */
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $writer->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $writer->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Writers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Books'), ['controller' => 'Books', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Book'), ['controller' => 'Books', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="writers form large-9 medium-8 columns content">
    <?= $this->Form->create($writer) ?>
    <fieldset>
        <legend><?= __('Edit Writer') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('slug');
            echo $this->Form->control('biography');
            echo $this->Form->control('books._ids', ['options' => $books]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
 -->

 <h3><i class="fa fa-pencil-square-o"></i>&nbsp;&nbsp;Chỉnh sửa tác giả</h3>
<hr>
<div class="col-md-offset-3 col-md-6">
    <?= $this->Form->create($writer) ?>
    <div class="form-group">
        <label class="col-sm-3 control-label">Tên tác giả:</label>
        <div class="col-sm-9">
            <?php echo $this->Form->input('name', ['class' => 'form-control',
            'type' => 'text', 'label' => false, 'div' => false, "placeholder" => $writer.['name']]);?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Slug:</label>
        <div class="col-sm-9">
            <?php echo $this->Form->input('slug', ['class' => 'form-control',
            'type' => 'text', 'label' => false, 'div' => false, "placeholder" => $writer['slug']]);?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Tiểu sử:</label>
        <div class="col-sm-9">
            <?php echo $this->Form->input('biography', ['class' => 'form-control',
            'type' => 'text', 'label' => false, 'div' => false, "placeholder" => $writer.['biography']]);?>
        </div>
    </div>
    <div class="form-group" style="text-align: center;">
        <?= $this->Form->button(__('Cập nhật'), ['class'=>'btn btn-success']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>
