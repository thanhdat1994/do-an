<?php
/**
  * @var \App\View\AppView $this
  */
?>
<h3><i class="fa fa-server"></i>&nbsp;&nbsp;Thêm sách mới</h3>
<hr>
<div class="col-md-offset-3 col-md-6">
    <?= $this->Form->create($book) ?>
    <div class="form-group">
        <label class="col-sm-3 control-label">Tên Sách:</label>
        <div class="col-sm-9">
            <?php echo $this->Form->input('title', array( 'class' => 'form-control',
            'type' => 'text', 'label' => false, 'div' => false, "placeholder" => "Tên sách"));?>
        </div>
    </div>
    <!-- <div class="form-group">
        <label class="col-sm-3 control-label">Slug:</label>
        <div class="col-sm-9">
            <?php echo $this->Form->input('slug', array( 'class' => 'form-control',
            'type' => 'text', 'label' => false, 'div' => false, "placeholder" => "Slug"));?>
        </div>
    </div> -->
    <div class="form-group">
        <label class="col-sm-3 control-label">Hình ảnh:</label>
        <div class="col-sm-9">
            <?php echo $this->Form->input('image', array( 'class' => 'form-control',
            'type' => 'text', 'label' => false, 'div' => false, "placeholder" => "chọn input file tới hình ảnh"));?>
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
            <?php echo $this->Form->input('publish_date', array( 'class' => 'form-control',
            'type' => 'text', 'label' => false, 'div' => false, "placeholder" => "chọn datetimepicker"));?>
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
        <label class="col-sm-3 control-label">Thể loại sách:</label>
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

