
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">    
</head>
<div class="container animated fadeIn">

  <div class="row">
    <h1 class="header-title"> Liên hệ BookStore </h1>
    <hr>
    <div class="col-sm-12" id="parent">
        <div class="col-sm-6">
        <iframe width="100%" height="320px;" frameborder="0" style="border:0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4641.806278988405!2d108.44184211986534!3d11.955226321168604!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317112d959f88991%3A0x9c66baf1767356fa!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyDEkMOgIEzhuqF0!5e0!3m2!1sen!2sus!4v1512463120180" allowfullscreen></iframe>
        </div>

        <div class="col-sm-6">
            <?= $this->Form->create('Pages',['class' => 'contact-form']) ?>
            <br/><br/>
                <div class="form-group">
                    <?php echo $this->Form->input('fullname', array( 'class' => 'form-control','type' => 'text', 
                        'label' => false, 'div' => false,'id' => "fullname", "placeholder" => "Họ và tên",'autofocus' => ""));?>
                </div>
                <div class="form-group form_left">
                   <?php echo $this->Form->input('email', array( 'class' => 'form-control','type' => 'email', 'label' => false, 'div' => false, "placeholder" => "Nhập email",'id' => "email"));?>
                </div>
              <div class="form-group">
              <textarea class="form-control textarea-contact" rows="5" id="comment" name="FB" placeholder="Nhập nội dung liên hệ tại đây..." required=""></textarea>
              <br>
              <button class="btn btn-default btn-send" type="submit"> <span class="fa fa-send"></span> Send </button>
              </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
  </div>

  <div class="container second-portion">
    <div class="row">
        <!-- Boxes de Acoes -->
        <div class="col-xs-12 col-sm-6 col-lg-4">
            <div class="box">                           
                <div class="icon">
                    <div class="image"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                    <div class="info">
                        <h3 class="title">MAIL</h3>
                        <p>
                            <i class="fa fa-envelope" aria-hidden="true"></i> &nbsp info.bs@bookstore.com
                            <br>
                        </p>
                    </div>
                </div>
                <div class="space"></div>
            </div> 
        </div>
            
        <div class="col-xs-12 col-sm-6 col-lg-4">
            <div class="box">                           
                <div class="icon">
                    <div class="image"><i class="fa fa-mobile" aria-hidden="true"></i></div>
                    <div class="info">
                        <h3 class="title">Số điện thoại</h3>
                        <p>
                            <i class="fa fa-mobile" aria-hidden="true"></i> &nbsp (+84)-1684 669 005
                            <br>
                            <br>
                            <i class="fa fa-mobile" aria-hidden="true"></i> &nbsp  (+84)-7567065254 
                        </p>
                    </div>
                </div>
                <div class="space"></div>
            </div> 
        </div>
            
        <div class="col-xs-12 col-sm-6 col-lg-4">
            <div class="box">                           
                <div class="icon">
                    <div class="image"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                    <div class="info">
                        <h3 class="title">Địa chỉ</h3>
                        <p>
                             <i class="fa fa-map-marker" aria-hidden="true"></i> &nbsp 1, Phù Đổng Thiên Vương, P.8, TP Đà Lạt, Lâm Đồng
                        </p>
                    </div>
                </div>
                <div class="space"></div>
            </div> 
        </div>          
        <!-- /Boxes de Acoes -->
        
    </div>
</div>
