<?php
/**
  * @var \App\View\AppView $this
  */
?>
<h3><i class="fa fa-ticket"></i>&nbsp;&nbsp;Thêm mới mã giảm giá</h3>
<hr>
<div class="col-md-offset-3 col-md-6">
    <?= $this->Form->create($coupon) ?>
    <div class="form-group">
        <label class="col-sm-3 control-label">Mã giảm giá:</label>
        <div class="col-sm-9">
            <?php echo $this->Form->input('code', array( 'class' => 'form-control',
            'type' => 'text', 'label' => false, 'div' => false, "placeholder" => "Tên mã giảm giá"));?>
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
    <div class="form-group">
        <label class="col-sm-3 control-label">Ngày bắt đầu:</label>
        <div class="col-sm-9">
            <?php echo $this->Form->input('time_start', array( 'class' => 'form-control',
            'type' => 'datetime', 'label' => false, 'div' => false));?>
            <!--
            <div class="form-group">
                <div class = 'input-group date' id = 'datetimepicker'>
                    <?php echo $this->Form->input('time_start', ['type' => 'text', 'class'=>'form-control','label'=>false]) ?>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(function (){
            $('#datetimepicker').datetimepicker({
                locale:'ru'
            });
        });
    </script>
-->
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Ngày kết thúc:</label>
        <div class="col-sm-9">
            <?php echo $this->Form->input('time_end', array( 'class' => 'form-control',
            'type' => 'datetime', 'label' => false, 'div' => false));?>
        </div>
    </div>
    <div class="form-group" style="text-align: center;">
        <?= $this->Form->button(__('Thêm mới'), ['class'=>'btn btn-primary']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>
<?= $this->Html->script('bootstrap-datetimepicker.js') ?>
<?= $this->fetch('script') ?>