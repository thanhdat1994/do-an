<h3><i class="fa fa-server"></i>&nbsp;&nbsp;Chỉnh sửa sách</h3>
<hr>
<div class="col-md-offset-3 col-md-6">
    <?= $this->Form->create($book) ?>
    <div class="form-group">
        <label class="col-sm-3 control-label">Tên danh mục:</label>
        <div class="col-sm-9">
            <?php echo $this->Form->control('name',['options' => $categories, 'label'=>false,'style' => 'margin-top:-4px;']) ?>

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
        <label class="col-sm-3 control-label">Nội dung:</label>
        <div class="col-sm-9">
            <?php echo $this->Form->input('info', array('class' => 'ckeditor', 'label' => false, 'div' => false, "placeholder" => "Nội dung"));?>
        </div>
    </div>
    <div class="form-group" style="text-align: center;">
        <?= $this->Form->button(__('Cập nhật'), ['class'=>'btn btn-success']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>
