<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?= $this->Html->css('bootstrap-datepicker.min.css') ?>
<?= $this->Html->script('bootstrap-datepicker.min.js') ?>

<script type="text/javascript">
    $(function(){    

        $.fn.datepicker.dates['vi'] = {
          days: [ "Chủ Nhật", "Thứ Hai", "Thứ Ba", "Thứ Tư", "Thứ Năm", "Thứ Sáu", "Thứ Bảy" ],
          daysShort: [ "CN", "T2", "T3", "T4", "T5", "T6", "T7" ],
          daysMin: [ "CN", "T2", "T3", "T4", "T5", "T6", "T7" ],
          months: [ "Tháng Một", "Tháng Hai", "Tháng Ba", "Tháng Tư", "Tháng Năm", "Tháng Sáu", "Tháng Bảy", "Tháng Tám", "Tháng Chín", "Tháng Mười", "Tháng Mười Một", "Tháng Mười Hai" ],
          monthsShort: [ "Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12" ],
          weekStart: 0
      };

      $('.datepicker').datepicker({
          format: 'dd/mm/yyyy',
          todayHighlight: true,
          language: 'vi',
          autoclose: true
      });
      $('.datepicker2').datepicker({
          format: 'dd/mm/yyyy',
          todayHighlight: true,
          language: 'vi',
          autoclose: true
      });
  });
</script>
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
            <?php echo $this->Form->input('time_start', array( 'class' => 'form-control datepicker',
            'type' => 'text', 'label' => false, 'div' => false, 'id'=>'datepicker'));?>
        </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Ngày kết thúc:</label>
        <div class="col-sm-9">
            <?php echo $this->Form->input('time_end', array( 'class' => 'form-control datepicker',
            'type' => 'text', 'label' => false, 'div' => false, 'id' => 'datepicker2'));?>
        </div>
    </div>
    <div class="form-group" style="text-align: center;">
        <?= $this->Form->button(__('Thêm mới'), ['class'=>'btn btn-primary']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>