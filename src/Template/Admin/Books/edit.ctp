<?php
/**
  * @var \App\View\AppView $this
  */
?>
<!-- 
<div class="books form large-9 medium-8 columns content">
    <?= $this->Form->create($book) ?>
    <fieldset>
        <legend><?= __('Edit Book') ?></legend>
        <?php
            echo $this->Form->control('category_id', ['options' => $categories, 'empty' => true]);
            echo $this->Form->control('title');
            echo $this->Form->control('slug');
            echo $this->Form->control('image');
            echo $this->Form->control('info');
            echo $this->Form->control('price');
            echo $this->Form->control('sale_price');
            echo $this->Form->control('publisher');
            echo $this->Form->control('publish_date');
            echo $this->Form->control('link_download');
            echo $this->Form->control('published');
            echo $this->Form->control('writers._ids', ['options' => $writers]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div> -->

<h3><i class="fa fa-server"></i>&nbsp;&nbsp;Chỉnh sửa sách</h3>
<hr>
<div class="col-md-offset-3 col-md-6">
    <?= $this->Form->create($book) ?>
    <div class="form-group">
        <label class="col-sm-3 control-label">Tên danh mục:</label>
        <div class="col-sm-9">
            <?php echo $this->Form->input('name', array( 'class' => 'form-control',
            'type' => 'text', 'label' => false, 'div' => false, "placeholder" => "Tên danh mục"));?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Slug:</label>
        <div class="col-sm-9">
            <?php echo $this->Form->input('slug', array( 'class' => 'form-control',
            'type' => 'text', 'label' => false, 'div' => false, "placeholder" => "Slug"));?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Mô tả:</label>
        <div class="col-sm-9">
            <?php echo $this->Form->input(' description', array( 'class' => 'form-control',
            'type' => 'text', 'label' => false, 'div' => false, "placeholder" => "Mô tả"));?>
        </div>
    </div>
    <div class="form-group" style="text-align: center;">
        <?= $this->Form->button(__('Cập nhật'), ['class'=>'btn btn-success']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>
