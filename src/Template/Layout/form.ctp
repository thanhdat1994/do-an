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
    <?= $this->Html->script('jquery-3.2.1.min.js') ?>
    <?= $this->Html->script('prettify.js') ?>
    <?= $this->Html->script('common.js') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>
    <?= $this->Html->script('owl.carousel.js') ?>
    <?= $this->Html->script('bootshop.js') ?>
    <?= $this->Html->script('jquery.lightbox-0.5.js') ?>

</body>
</html>

