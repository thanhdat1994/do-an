<?php
/**
  * @var \App\View\AppView $this
  */
?>
<h3><i class="fa fa-server"></i>&nbsp;&nbsp;Chỉnh sửa Mã giảm giá</h3>
<hr>
<div class="col-md-offset-3 col-md-6">
    <?= $this->Form->create($coupon) ?>
    <div class="form-group">
        <label class="col-sm-3 control-label">Mã giảm giá:</label>
        <div class="col-sm-9">
            <?php echo $this->Form->control('code',['label'=>false,'class' => 'form-control','type' => 'text']);  ?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Percent:</label>
        <div class="col-sm-9">
            <?php echo $this->Form->control('percent', ['class' => 'form-control', 'label' =>false]);?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Mô tả:</label>
        <div class="col-sm-9">
            <?php echo $this->Form->control('description',['label'=>false,'class' => 'form-control']);?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Ngày bắt đầu:</label>
        <div class="col-sm-9">
            <?php echo $this->Form->control('time_start',['label'=>false,'class' => 'form-control']);?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Ngày kết thúc:</label>
        <div class="col-sm-9">
            <?php echo $this->Form->control('time_end',['label'=>false,'class' => 'form-control']);?>
        </div>
    </div>
    <div class="form-group" style="text-align: center;">
        <?= $this->Form->button(__('Cập nhật'), ['class'=>'btn btn-success']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>