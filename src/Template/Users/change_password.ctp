<div class="col-md-offset-5 col-md-7 formlogin" style="margin-top: 50px; font-size: 16px;">
    <div class="panel panel-primary">
        <div class="panel-heading"> <h3 class="panel-title text-center">Đổi mật khẩu</h3></div>
        <?php //echo $this->Session->Flash('auth'); ?>
        <div class="panel-body">
            <?php if (empty($user_info)): ?>
                <?php //echo $this->Session->Flash('auth'); ?>
                <?php //echo $this->element('error'); ?>
                Bạn chưa đăng nhập, click vào đây để <?php echo $this->Html->link('đăng nhập','/dang-nhap'); ?>
            <?php else: ?>
                <?php echo $this->Form->create('Users', array('class'=>"form-horizontal",'inputDefaults'=>['label'=>false]))?>
                <div class="control-group">
                    <div class="col-sm-4 col-xs-3 pull-left" title="Mật khẩu hiện tại">
                        Mật khẩu tại
                    </div>
                    <div class="col-sm-8">
                        <?php echo $this->Form->input('password_current', array("placeholder" => "Mật khẩu hiện tại", 'error' => false, 'label' => false, 'type' => 'password'));?>
                    </div>
                </div>
                <div class="control-group">
                    <div class="col-sm-4 col-xs-3 pull-left" title="Mật khẩu mới">
                        Mật khẩu mới
                    </div>
                    <div class="col-sm-8">
                        <?php echo $this->Form->input('password', array("placeholder" => "Mật khẩu mới", 'error' => false, 'label' => false));?>
                    </div>
                </div>
                <div class="control-group">
                    <div class="col-sm-4 col-xs-3 pull-left" title="Xác nhận mật khẩu">
                        Xác nhận mật khẩu
                    </div>
                    <div class="col-sm-8">
                        <?php echo $this->Form->input('confirm_password', array('type' => 'password', 'error' => false, "placeholder" => "Xác nhận mật khẩu", 'label' => false));?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12" style="text-align: center;">
                        <button type="submit" class="btn btn btn-primary">Đổi mật khẩu</button>
                    </div>
                </div>
                <?php echo $this->Form->end(); ?>
            <?php endif ?>
        </div>
    </div>
</div>
