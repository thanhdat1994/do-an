<?php
/**
  * @var \App\View\AppView $this
  */
?>
<h3><i class="fa fa-server"></i>&nbsp;&nbsp;Chỉnh sửa danh mục sách</h3>
<hr>
<div class="col-md-offset-3 col-md-6">
    <?= $this->Form->create($category) ?>
    <div class="form-group">
        <label class="col-sm-3 control-label">Danh mục:</label>
        <div class="col-sm-9">
            <?php echo $this->Form->input('name', array( 'class' => 'form-control',
            'type' => 'text', 'label' => false, 'div' => false, "placeholder" => "Tên danh mục",'style' => 'height: 30px;margin-top:-4px; '));?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Slug:</label>
        <div class="col-sm-9">
            <?php echo $this->Form->input('slug', array( 'class' => 'form-control',
            'type' => 'text', 'label' => false, 'div' => false, "placeholder" => "Slug",'style' => 'height: 30px;margin-top:-4px; '));?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Mô tả:</label>
        <div class="col-sm-9">
            <?php echo $this->Form->input(' description', array( 'class' => 'form-control',
            'type' => 'textarea', 'label' => false, 'div' => false, "value" => $category['description']));?>
        </div>
    </div>
    <div class="form-group" style="text-align: center;">
        <?= $this->Form->button(__('Cập nhật'), ['class'=>'btn btn-success']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>
