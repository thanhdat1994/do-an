<div class="col-md-offset-5 col-md-7 formlogin" style="margin-top: 50px; font-size: 16px;">
    <div class="panel panel-primary">
        <div class="panel-heading"> <h3 class="panel-title text-center">Nhập mã xác nhận</h3></div>
        <?php //echo $this->Session->Flash('auth'); ?>
        <div class="panel-body">
            <?php if (!empty($user_info)): ?>
                Bạn đã đăng nhập, click vào đây để quay về <?php echo $this->Html->link('trang chủ','/'); ?>
            <?php else: ?>
                <?php echo $this->Form->create('Users', array('class'=>"form-horizontal",'inputDefaults'=>['label'=>false]))?>
                <div>
                    <small>Chúng tôi đã gửi mã xác nhận vào hộp thư email của bạn. Vui lòng kiểm tra email và nhập mã xác nhận!</small>
                    <br><br>
                </div>
                <div class="control-group">
                    <div class="col-sm-4 col-xs-3 pull-left" title="nhập mã xác nhận">
                        Nhập mã xác nhận: 
                    </div>
                    <div class="col-sm-8">
                        <?php echo $this->Form->input('code', array('type' => 'text', 'label' => false, 'div' => false, "placeholder" => "Vui lòng nhập mã xác nhận"));?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12" style="text-align: center;">
                        <button type="submit" class="btn btn-primary">Xác nhận</button>
                    </div>
                </div>
                <div>
                    Click vào đây để <?php echo $this->Html->link('đăng nhập','/dang-nhap'); ?>
                </div>
                <?php echo $this->Form->end(); ?>
            <?php endif ?>
        </div>
    </div>
</div>