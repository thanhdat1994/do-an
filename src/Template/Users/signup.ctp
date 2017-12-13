<div class="col-md-offset-4 col-md-8 formlogin" style="margin-top: 50px; font-size: 16px;">
    <div class="panel panel-primary">
        <div class="panel-heading"> <h3 class="panel-title text-center">Đăng kí tài khoản người dùng</h3></div>
        <?php //echo $this->Session->Flash('auth'); ?>
        <div class="panel-body">
            <?php if (!empty($user_info)): ?>
                Bạn đã đăng nhập, click vào đây để quay về <?php echo $this->Html->link('trang chủ','/'); ?>
            <?php else: ?>
                <?php echo $this->Form->create('Users', array('class'=>"form-horizontal",'inputDefaults'=>['label'=>false]))?>
                <div class="control-group">
                    <div class="col-sm-4 col-xs-3 pull-left" title="Họ">
                        Họ
                    </div>
                    <div class="col-sm-8">
                        <?php echo $this->Form->input('firstname', array('type' => 'text', 'label' => false, 'div' => false, "placeholder" => "Họ", 'style' => 'height:30px;margin-top:-4px;'));?>
                    </div>
                </div>
                <div class="control-group">
                    <div class="col-sm-4 col-xs-3 pull-left" title="Tên">
                        Tên
                    </div>
                    <div class="col-sm-8">
                        <?php echo $this->Form->input('lastname', array('type' => 'text', 'label' => false, 'div' => false, "placeholder" => "Tên", 'style' => 'height:30px;margin-top:-4px;'));?>
                    </div>
                </div>
                <div class="control-group">
                    <div class="col-sm-4 col-xs-3 pull-left" title="Email">
                        Email
                    </div>
                    <div class="col-sm-8">
                        <?php echo $this->Form->input('email', array('type' => 'text', 'label' => false, 'div' => false, "placeholder" => "Email", 'style' => 'height:30px;margin-top:-4px;'));?>
                    </div>
                </div>
                <div class="control-group">
                    <div class="col-sm-4 col-xs-3 pull-left" title="Tài khoản">
                        Tài khoản
                    </div>
                    <div class="col-sm-8">
                        <?php echo $this->Form->input('username', array('type' => 'text', 'label' => false, 'div' => false, "placeholder" => "Tên", 'style' => 'height:30px;margin-top:-4px;'));?>
                    </div>
                </div>
                <div class="control-group">
                    <div class="col-sm-4 col-xs-3 pull-left" title="Mật khẩu">
                        Mật khẩu
                    </div>
                    <div class="col-sm-8">
                        <?php echo $this->Form->input('password', array("placeholder" => "Mật khẩu", 'error' => false, 'label' => false, 'style' => 'height:30px;margin-top:-4px;'));?>
                    </div>
                </div>
                <div class="control-group">
                    <div class="col-sm-4 col-xs-3 pull-left" title="Xác nhận mật khẩu">
                        Xác nhận mật khẩu
                    </div>
                    <div class="col-sm-8">
                        <?php echo $this->Form->input('confirm_password', array('type' => 'password', 'error' => false, "placeholder" => "Xác nhận mật khẩu", 'label' => false, 'style' => 'height:30px;margin-top:-4px;'));?>
                    </div>
                </div>
                <div class="control-group">
                    <div class="col-sm-4 col-xs-3 pull-left" title="Địa chỉ">
                        Địa chỉ
                    </div>
                    <div class="col-sm-8">
                        <?php echo $this->Form->input('address', array('type' => 'text', 'label' => false, 'div' => false, "placeholder" => "Địa chỉ", 'style' => 'height:30px;margin-top:-4px;'));?>
                    </div>
                </div>
                <div class="control-group">
                    <div class="col-sm-4 col-xs-3 pull-left" title="Số điện thoại">
                        Số điện thoại
                    </div>
                    <div class="col-sm-8">
                        <?php echo $this->Form->input('phone_number', array('type' => 'text', 'label' => false, 'div' => false, "placeholder" => "Số điện thoại", 'style' => 'height:30px;margin-top:-4px;'));?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12" style="text-align: center;">
                        <button type="submit" class="btn btn btn-primary">Đăng kí</button>
                    </div>
                </div>
                <div>
                    Bạn đã có tài khoản, click vào <?php echo $this->Html->link('đây','/dang-nhap'); ?> để đăng nhập
                </div>
                <?php echo $this->Form->end(); ?>
            <?php endif ?>
        </div>
    </div>
</div>