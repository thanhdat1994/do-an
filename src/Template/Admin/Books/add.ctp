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
  });
</script>
<h3><i class="fa fa-server"></i>&nbsp;&nbsp;Thêm sách mới</h3>
<hr>
<div class="col-md-offset-3 col-md-6">
    <?= $this->Form->create($book, ['novalidator'=>true, 'type'=>'file']) ?>
    <div class="form-group">
        <label class="col-sm-3 control-label">Tên Sách:</label>
        <div class="col-sm-9">
            <?php echo $this->Form->input('title', array( 'class' => 'form-control',
            'type' => 'text', 'label' => false, 'div' => false, "placeholder" => "Tên sách"));?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Slug:</label>
        <div class="col-sm-9">
            <?php echo $this->Form->input('slug', array( 'class' => 'form-control',
            'type' => 'text', 'label' => false, 'div' => false, "placeholder" => "Slug", 'required'=>false));?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Hình ảnh:</label>
        <div class="col-sm-9">
            <input type="file" name="data[image]" accept="image/*" id="SalonImage" required="">
        </div>
    </div>    
    <div class="form-group">
        <label class="col-sm-3 control-label">Giá nhập:</label>
        <div class="col-sm-9">
            <?php echo $this->Form->input('price', array( 'class' => 'form-control',
            'type' => 'text', 'label' => false, 'div' => false, "placeholder" => "Giá nhập sách"));?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Giá bán:</label>
        <div class="col-sm-9">
            <?php echo $this->Form->input('sale_price', array( 'class' => 'form-control',
            'type' => 'text', 'label' => false, 'div' => false, "placeholder" => "Giá bán"));?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Nhà xuất bản:</label>
        <div class="col-sm-9">
            <?php echo $this->Form->input('publisher', array( 'class' => 'form-control',
            'type' => 'text', 'label' => false, 'div' => false, "placeholder" => "Nhà xuất bản"));?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Ngày xuất bản:</label>
        <div class="col-sm-9">
            <?php echo $this->Form->input('publish_date', array( 'class' => 'form-control datepicker',
            'type' => 'text', 'label' => false, 'div' => false, "placeholder" => "Ngày xuất bản", 'id'=>'datepicker'));?>
        </div>
    </div>
    <!-- <div class="form-group">
        <label class="col-sm-3 control-label">Đã xuất bản:</label>
        <div class="col-sm-9">
            <?php echo $this->Form->input('slug', array( 'class' => 'form-control',
            'type' => 'text', 'label' => false, 'div' => false, "placeholder" => "chọn select"));?>
        </div>
    </div> -->
    <!-- <div class="form-group">
        <label class="col-sm-3 control-label">Tác giả:</label>
        <div class="col-sm-9">
            <?php echo $this->Form->input('writers', array( 'class' => 'form-control',
            'type' => 'text', 'label' => false, 'div' => false, "placeholder" => "mã tác giả"));?>
        </div>
    </div> -->
    <div class="form-group">
        <label class="col-sm-3 control-label">Nội dung:</label>
        <div class="col-sm-9">
            <?php echo $this->Form->input('info', array( 'class' => 'ckeditor', 'label' => false, 'div' => false, "placeholder" => "Nội dung"));?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Danh mục sách:</label>
        <div class="col-sm-9">
            <?php echo $this->Form->input('categories_id', array( 'class' => 'form-control',
            'options' => $categories, 'label' => false, 'div' => false, "placeholder" => "Danh mục sách"));?>
        </div>
    </div>
    <div class="form-group" style="text-align: center;">
        <?= $this->Form->button(__('Thêm mới'), ['class'=>'btn btn-primary']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>

