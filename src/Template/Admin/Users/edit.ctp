<?php
/**
  * @var \App\View\AppView $this
  */
?>
<!-- 
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
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
<h3><i class="fa fa-server"></i>&nbsp;&nbsp;Chỉnh sửa Người dùng</h3>
<hr>
<div class="col-md-offset-3 col-md-6">
    <?= $this->Form->create($user) ?>
        <div class="form-group">
            <label class="col-sm-3 control-label">Tên nhóm:</label>
            <div class="col-sm-9">
                <?php echo $this->Form->control('group_id', ['options' => $groups,'label' =>false]); ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Tên:</label>
            <div class="col-sm-9">
                <?php echo $this->Form->input('firstname', array( 'class' => 'form-control',
                'type' => 'text', 'label' => false, 'div' => false, "placeholder" => $user['firstname']));?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Họ:</label>
            <div class="col-sm-9">
                <?php echo $this->Form->input('lastname', array( 'class' => 'form-control',
                'type' => 'text', 'label' => false, 'div' => false, "placeholder" => $user['lastname']));?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Email:</label>
            <div class="col-sm-9">
                <?php echo $this->Form->input('email', array( 'class' => 'form-control',
                'type' => 'text', 'label' => false, 'div' => false, "placeholder" => $user['email']));?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Địa chỉ:</label>
            <div class="col-sm-9">
                <?php echo $this->Form->input('address', array( 'class' => 'form-control',
                'type' => 'text', 'label' => false, 'div' => false, "placeholder" => $user['address']));?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">SĐT:</label>
            <div class="col-sm-9">
                <?php echo $this->Form->input('phone_number', array( 'class' => 'form-control',
                'type' => 'text', 'label' => false, 'div' => false, "placeholder" => $user['phone_number']));?>
            </div>
        </div>
        <!-- active user -->
       <!--  <div class="form-group">
            <label class="col-sm-3 control-label">Active:</label>
            <div class="col-sm-9">
                <?php if ($user->active == 1): ?>
                    <?= $this->Form->postLink(__('Disable'), [ 'action' => 'active', $user->id], ['class' => 'btn btn-success']) ?>
                <?php else: ?>
                    <?= $this->Form->postLink(__('Active Now'), [ 'action' => 'active', $user->id], ['class' => 'btn btn-success']) ?>
                <?php endif ?>
            </div>
        </div> -->
        <div class="form-group" style="text-align: center;">
            <?= $this->Form->button(__('Cập nhật'), ['class'=>'btn btn-success']) ?>
        </div>
    <?= $this->Form->end() ?>
</div>