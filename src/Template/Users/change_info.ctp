<div class="col-md-offset-4 col-md-8 formlogin" style="margin-top: 50px; font-size: 16px;">
    <div class="panel panel-primary">
        <div class="panel-heading"> <h3 class="panel-title text-center">Cập nhật thông tin người dùng</h3></div>
        <?php //echo $this->Session->Flash('auth'); ?>
        <div class="panel-body">
            <?php echo $this->Form->create($user)?>
            <div class="control-group">
                <div class="col-sm-4 col-xs-3 pull-left" title="Họ">
                    Họ
                </div>
                <div class="col-sm-8">
                    <?php echo $this->Form->input('firstname', array('type' => 'text', 'label' => false, 'div' => false, "placeholder" => "Họ"));?>
                </div>
            </div>
            <div class="control-group">
                <div class="col-sm-4 col-xs-3 pull-left" title="Tên">
                    Tên
                </div>
                <div class="col-sm-8">
                    <?php echo $this->Form->input('lastname', array('type' => 'text', 'label' => false, 'div' => false, "placeholder" => "Tên"));?>
                </div>
            </div>
            <div class="control-group">
                <div class="col-sm-4 col-xs-3 pull-left" title="Email">
                    Email
                </div>
                <div class="col-sm-8">
                    <?php echo $this->Form->input('email', array('type' => 'text', 'label' => false, 'div' => false, "placeholder" => "Email", 'readonly' => true));?>
                </div>
            </div>            
            <div class="control-group">
                <div class="col-sm-4 col-xs-3 pull-left" title="Địa chỉ">
                    Địa chỉ
                </div>
                <div class="col-sm-8">
                    <?php echo $this->Form->input('address', array('type' => 'text', 'label' => false, 'div' => false, "placeholder" => "Địa chỉ"));?>
                </div>
            </div>
            <div class="control-group">
                <div class="col-sm-4 col-xs-3 pull-left" title="Số điện thoại">
                    Số điện thoại
                </div>
                <div class="col-sm-8">
                    <?php echo $this->Form->input('phone_number', array('type' => 'text', 'label' => false, 'div' => false, "placeholder" => "Số điện thoại"));?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12" style="text-align: center;">
                    <button type="submit" class="btn btn btn-primary">Cập nhật</button>
                </div>
            </div>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
</div>