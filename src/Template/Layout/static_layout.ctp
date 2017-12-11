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
            <div id="socialMedia" class="span3 pull-right">
                <h5>SOCIAL MEDIA </h5>
                <a href="www.facebook.com"><img width="60" height="60" src="themes/images/facebook.png" title="facebook" alt="facebook"/></a>
                <a href="www.twitter.com"><img width="60" height="60" src="themes/images/twitter.png" title="twitter" alt="twitter"/></a>
                <a href="www.youtube.com"><img width="60" height="60" src="themes/images/youtube.png" title="youtube" alt="youtube"/></a>
            </div> 
        </div>
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
