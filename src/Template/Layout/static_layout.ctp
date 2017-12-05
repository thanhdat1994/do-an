 <?php
    $cakeDescription = 'Books Store';
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSS -->
        <?= $this->Html->css('bootstrap.min.css') ?>
        <?= $this->Html->css('bootstrap-responsive.min.css') ?>
        <?= $this->Html->css('font-awesome/css/font-awesome.css') ?>
        <?= $this->Html->css('prettify.css') ?>
        <?= $this->Html->css('home.css') ?>
        <?= $this->Html->css('common.css') ?>
<!--         <?= $this->Html->css('contact/form-elements.css') ?>
        <?= $this->Html->css('contact/style.css') ?> -->
        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>

    </head>

    <body>
        <div id="header">
        <div class="container-header">
            <?php echo $this->element('header'); ?>
        </div>
        <div class="wrap-box"></div>        
    </div>
        <!-- Top content -->
        <div class="top-content">
           <div class="content">
                <?= $this->Flash->render() ?>
                <?= $this->fetch('content') ?>
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

        <!-- Javascript -->
        
        <?= $this->Html->script('jquery-3.2.1.min.js') ?>
        <?= $this->Html->script('prettify.js') ?>
        <?= $this->Html->script('common.js') ?>
        <?= $this->Html->script('bootstrap.min.js') ?>
        <?= $this->Html->script('owl.carousel.js') ?>
        <?= $this->Html->script('bootshop.js') ?>
<!--         <?= $this->Html->script('jquery-1.11.1.min.js') ?>
        <?= $this->Html->script('jquery.backstretch.min.js') ?>
        <?= $this->Html->script('retina-1.1.0.min.js') ?>
        <?= $this->Html->script('scripts.js') ?> -->

    </body>

</html>
