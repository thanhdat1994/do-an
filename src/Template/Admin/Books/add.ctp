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
    <div class="form-group">
        <label class="col-sm-3 control-label">Slug:</label>
        <div class="col-sm-9">
            <?php echo $this->Form->input('slug', array( 'class' => 'form-control',
            'type' => 'text', 'label' => false, 'div' => false, "placeholder" => "link thân thiện"));?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Image:</label>
        <div class="col-sm-9">
            <?php echo $this->Form->input('image', array( 'class' => 'form-control',
            'type' => 'text', 'label' => false, 'div' => false, "placeholder" => "link tới hình ảnh..."));?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Giá nhập:</label>
        <div class="col-sm-9">
            <?php echo $this->Form->input('price', array( 'class' => 'form-control',
            'type' => 'text', 'label' => false, 'div' => false, "placeholder" => "giá nhập sách"));?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Giá bán:</label>
        <div class="col-sm-9">
            <?php echo $this->Form->input('sale_price', array( 'class' => 'form-control',
            'type' => 'text', 'label' => false, 'div' => false, "placeholder" => "giá bán"));?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Nhà xuất bản:</label>
        <div class="col-sm-9">
            <?php echo $this->Form->input('publisher', array( 'class' => 'form-control',
            'type' => 'text', 'label' => false, 'div' => false, "placeholder" => "nhà xuất bản"));?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Ngày xuất bản:</label>
        <div class="col-sm-9">
            <?php echo $this->Form->input('publish_date', array( 'class' => 'form-control',
            'type' => 'text', 'label' => false, 'div' => false, "placeholder" => "ngày xuất bản"));?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Link download:</label>
        <div class="col-sm-9">
            <?php echo $this->Form->input('link_download', array( 'class' => 'form-control',
            'type' => 'text', 'label' => false, 'div' => false, "placeholder" => "link download"));?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Đã xuất bản?:</label>
        <div class="col-sm-9">
            <?php echo $this->Form->input('slug', array( 'class' => 'form-control',
            'type' => 'text', 'label' => false, 'div' => false, "placeholder" => "1 hoặc 0"));?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Tác giả:</label>
        <div class="col-sm-9">
            <?php echo $this->Form->input('writers', array( 'class' => 'form-control',
            'type' => 'text', 'label' => false, 'div' => false, "placeholder" => "mã tác giả"));?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Thể loại sách:</label>
        <div class="col-sm-9">
            <?php echo $this->Form->input('categories_id', array( 'class' => 'form-control',
            'type' => 'text', 'label' => false, 'div' => false, "placeholder" => "Mã loại sách"));?>
        </div>
    </div>
    <div class="form-group" style="text-align: center;">
        <?= $this->Form->button(__('Thêm mới'), ['class'=>'btn btn-primary']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>

