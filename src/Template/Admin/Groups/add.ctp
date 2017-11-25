<?php
/**
  * @var \App\View\AppView $this
  */
?>
<h3><i class="fa fa-server"></i>&nbsp;&nbsp;Thêm mới danh mục sách</h3>
<hr>
<div class="col-md-offset-3 col-md-6">
    <?= $this->Form->create($group) ?>
    <div class="form-group">
        <label class="col-sm-3 control-label">Tên nhóm:</label>
        <div class="col-sm-9">
            <?php echo $this->Form->input('name', array( 'class' => 'form-control',
            'type' => 'text', 'label' => false, 'div' => false, "placeholder" => "Tên nhóm"));?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Percent:</label>
        <div class="col-sm-9">
            <?php echo $this->Form->input('percent', array( 'class' => 'form-control',
            'type' => 'text', 'label' => false, 'div' => false, "placeholder" => "percent"));?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Mô tả:</label>
        <div class="col-sm-9">
            <?php echo $this->Form->input('description', array( 'class' => 'form-control',
            'type' => 'text', 'label' => false, 'div' => false, "placeholder" => "Mô tả"));?>
        </div>
    </div>
    <div class="form-group" style="text-align: center;">
        <?= $this->Form->button(__('Thêm mới'), ['class'=>'btn btn-primary']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>