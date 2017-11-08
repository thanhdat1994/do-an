 <?php
    $cakeDescription = 'Books Store';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    
    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('bootstrap-responsive.min.css') ?>
    <?= $this->Html->css('font-awesome/css/font-awesome.css') ?>
    <?= $this->Html->css('prettify.css') ?>
    <?= $this->Html->css('home.css') ?>
    <?= $this->Html->css('common.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>


    <link rel="shortcut icon" href="/themes/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/themes/images/ico/apple-touch-icon-57-precomposed.png">
    <style type="text/css" id="enject"></style>

</head>
<body>
    <div id="header">
        <div class="container-header">
            <?php echo $this->element('header'); ?>
        </div>
        <div class="wrap-box"></div>        
    </div>
<!-- Header End====================================================================== -->
<div id="mainBody">
    <div class="container">
        <div class="row">
            <!-- Sidebar ================================================== -->
            <div id="sidebar" class="span3 pull-right">
                <div class="form-inline">
                    <div class="input-search">
                        <?php echo $this->Form->create('Books',['url'=>['action'=>'get_keyword'],'novalidator'=>true]); ?>
                        <?php echo $this->Form->input('keyword',['label'=>'','placeholder'=>'Tìm kiếm sách...','error'=>false]); ?>
                    </div>
                    <div class="input-btn">
                        <button type="submit" id="submitButton" class="btn btn-primary"><i class="fa fa-search"></i></button>
                        <?php echo $this->Form->end(); ?>
                    </div>
                </div>
                <div id="sideManu" class="nav nav-tabs nav-stacked panel panel-default">
                    <h4 class="panel-heading"><i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;Giỏ Hàng</h4>
                    <?php echo $this->element('cart'); ?>
                </div>
                    <br/>
                <ul id="sideManu" class="nav nav-tabs nav-stacked panel panel-default">
                <h4 style="margin-left: 10px;"><i class="fa fa-navicon"></i>&nbsp;&nbsp;Danh mục sách</h4>
                <?php //echo $this->element('menu_categories'); ?>
                    <li><a href="danh-muc/ki-nang-song"> Kĩ Năng Sống</a></li>
                    <li><a href="danh-muc/kinh-te"> Kinh tế</a></li>
                    <li><a href="danh-muc/lich-su"> Lịch sử</a></li>
                    <li><a href="danh-muc/van-hoc"> Văn Học</a></li>
                    <li><a href="danh-muc/giao-khoa"> Giáo Khoa</a></li>
                </ul>
                <br/>
                
                <ul id="sideManu" class="nav nav-tabs nav-stacked panel panel-default"> 
                    <h4 style="margin-left: 10px;"><i class="fa fa-address-card-o"></i>&nbsp;&nbsp;Danh mục tác giả </h4>                  
                    <li><a href="tac-gia/philip-miller"> Philip Miller</a></li>
                    <li><a href="tac-gia/anđy-andrews"> Andy Andrews</a></li>
                    <li><a href="tac-gia/dat-lai-lat-ma"> Đạt Lai Lạt Ma</a></li>
                    <li><a href="tac-gia/anthony-doerr"> Anthony Doerr</a></li>
                    <li><a href="tac-gia/ernest-hemingway"> Ernest Hemingway</a></li>
                    <li><a href="tac-gia/do-huan"> Đỗ Huân</a></li>
                    <li><a href="tac-gia/hidehiko"> Hidehiko</a></li>
                    <li><a href="tac-gia/dave-trott"> Dave Trott</a></li>
                </ul>
                <br/>
            </div>
            <!-- Sidebar end=============================================== -->
            <div class="span9">                    
                <div class="content">
                    <?= $this->Flash->render() ?>
                    <?= $this->fetch('content') ?>
                </div>
            </div>  
        </div>
    </div>
</div>
<!-- Footer ================================================================== -->
<div  id="footerSection">
    <div class="container">
        <div class="row">
            <div class="span3">
                <h5>ACCOUNT</h5>
                <a href="login.html">YOUR ACCOUNT</a>
                <a href="login.html">PERSONAL INFORMATION</a> 
                <a href="login.html">ADDRESSES</a> 
                <a href="login.html">DISCOUNT</a>  
                <a href="login.html">ORDER HISTORY</a>
            </div>
            <div class="span3">
                <h5>INFORMATION</h5>
                <a href="contact.html">CONTACT</a>  
                <a href="register.html">REGISTRATION</a>  
                <a href="legal_notice.html">LEGAL NOTICE</a>  
                <a href="tac.html">TERMS AND CONDITIONS</a> 
                <a href="faq.html">FAQ</a>
            </div>
            <div class="span3">
                <h5>OUR OFFERS</h5>
                <a href="#">NEW PRODUCTS</a> 
                <a href="#">TOP SELLERS</a>  
                <a href="special_offer.html">SPECIAL OFFERS</a>  
                <a href="#">MANUFACTURERS</a> 
                <a href="#">SUPPLIERS</a> 
            </div>
            <div id="socialMedia" class="span3 pull-right">
                <h5>SOCIAL MEDIA </h5>
                <a href="#"><img width="60" height="60" src="themes/images/facebook.png" title="facebook" alt="facebook"/></a>
                <a href="#"><img width="60" height="60" src="themes/images/twitter.png" title="twitter" alt="twitter"/></a>
                <a href="#"><img width="60" height="60" src="themes/images/youtube.png" title="youtube" alt="youtube"/></a>
            </div> 
        </div>
        <p class="pull-right">&copy; Bootshop</p>
    </div><!-- Container End -->
</div>


    <?= $this->Html->script('jquery-3.2.1.min.js') ?>
    <?= $this->Html->script('prettify.js') ?>
    <?= $this->Html->script('common.js') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>
    <?= $this->Html->script('owl.carousel.js') ?>
    <?= $this->Html->script('bootshop.js') ?>
    <?= $this->Html->script('jquery.lightbox-0.5.js') ?>

</body>
</html>

