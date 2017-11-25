<?php
/**
  * @var \App\View\AppView $this
  */
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
  
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->control('group_id', ['options' => $groups]);
            echo $this->Form->control('username');
            echo $this->Form->control('password');
            echo $this->Form->control('email');
            echo $this->Form->control('firstname');
            echo $this->Form->control('lastname');
            echo $this->Form->control('address');
            echo $this->Form->control('phone_number');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div> -->
<h3><i class="fa fa-server"></i>&nbsp;&nbsp;Thêm người dùng</h3>
<hr>
<div class="col-md-offset-3 col-md-6">
    <?= $this->Form->create($user) ?>
    <div class="form-group">
        <label class="col-sm-3 control-label">Nhóm người dùng: </label>
        <!-- <div class="col-sm-9">
            <?php echo $this->Form->input('group_id', array( 'class' => 'form-control',
            'type' => 'text', 'label' => false, 'div' => false));?>
        </div> -->
        <?php  echo $this->Form->control('group_id', ['options' => $groups]); ?>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Tên đăng nhập:</label>
        <div class="col-sm-9">
            <?php echo $this->Form->input('username', array( 'class' => 'form-control',
            'type' => 'text', 'label' => false, 'div' => false, "placeholder" => "nhập tên đăng nhập"));?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Password:</label>
        <div class="col-sm-9">
            <?php echo $this->Form->input('password', array( 'class' => 'form-control',
            'type' => 'password', 'label' => false, 'div' => false));?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Nhập lại password:</label>
        <div class="col-sm-9">
            <?php echo $this->Form->input('confirm_password', array( 'class' => 'form-control',
            'type' => 'password', 'label' => false, 'div' => false));?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Email:</label>
        <div class="col-sm-9">
            <?php echo $this->Form->input('email', array( 'class' => 'form-control',
            'type' => 'text', 'label' => false, 'div' => false, "placeholder" => "Nhập địa chỉ email..."));?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Tên người dùng:</label>
        <div class="col-sm-9">
            <?php echo $this->Form->input('firstname', array( 'class' => 'form-control',
            'type' => 'text', 'label' => false, 'div' => false, "placeholder" => "nhập tên người dùng"));?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Họ người dùng:</label>
        <div class="col-sm-9">
            <?php echo $this->Form->input('lastname', array( 'class' => 'form-control',
            'type' => 'text', 'label' => false, 'div' => false, "placeholder" => "nhập họ người dùng"));?>
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
