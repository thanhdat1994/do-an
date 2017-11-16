<div class="col-md-offset-2 col-md-7 formlogin" style="margin-top: 50px; font-size: 16px;">
    <div class="panel panel-primary">
        <div class="panel-heading"> <h3 class="panel-title text-center">Đăng nhập vào hệ thống</h3></div>
        <?php //echo $this->Session->Flash('auth'); ?>
        <div class="panel-body">
            <?php if (!empty($user_info)): ?>
                Bạn đã đăng nhập, click vào đây để quay về <?php echo $this->Html->link('trang chủ','/'); ?>
            <?php else: ?>
                <?php echo $this->Form->create('Users', array('class'=>"form-horizontal",'inputDefaults'=>['label'=>false]))?>
                <div class="control-group">
                    <div class="col-sm-4 col-xs-3 pull-left" title="Tên đăng nhập">
                        Tên đăng nhập
                    </div>
                    <div class="col-sm-8">
                        <?php echo $this->Form->input('username', array('type' => 'text', 'label' => false, 'div' => false, "placeholder" => "Tên đăng nhập"));?>
                    </div>
                </div>
                <div class="control-group">
                    <div class="col-sm-4 col-xs-3 pull-left" title="Mật khẩu">
                        Mật khẩu
                    </div>
                    <div class="col-sm-8">
                        <?php echo $this->Form->input('password', array('type' => 'password', 'label' => false, 'div' => false, "placeholder" => "Mật khẩu"));?>
                    </div>
                </div>
                <div class="control-group">
                    <small>* <?php echo $this->Html->link("Quên mật khẩu?", '/quen-mat-khau');  ?></small>
                </div>
                <div class="form-group">
                    <div class="col-sm-12" style="text-align: center;">
                        <button type="submit" class="btn btn btn-primary">Đăng nhập</button>
                    </div>
                </div>
                <div>
                    Bạn chưa có tài khoản, click vào đây để <?php echo $this->Html->link('đăng kí','/dang-ki'); ?>
                </div>
                <?php echo $this->Form->end(); ?>
            <?php endif ?>
        </div>
    </div>
</div>