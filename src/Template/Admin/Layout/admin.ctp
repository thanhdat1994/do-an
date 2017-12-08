<?php
    $cakeDescription = 'Books Store';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
  </title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <?= $this->Html->meta('icon') ?>
    
    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('bootstrap-responsive.min.css') ?>
    <?= $this->Html->css('font-awesome/css/font-awesome.css') ?>
    <?= $this->Html->css('AdminLTE.min.css') ?>
    <?= $this->Html->css('skin-blue.min.css') ?>
    
    <!-- <?= $this->Html->css('home.css') ?> -->
    <?= $this->Html->css('common.css') ?>
<?= $this->Html->script('jquery.min.js') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600&amp;subset=vietnamese" rel="stylesheet">
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <!-- Main Header -->
    <?php if ($user_info['group_id'] == 1): ?>
    <header class="main-header">

      <a href="<?php echo $this->Url->build(array('controller' => "Books", 'action' => "index", 'prefix' => false)); ?>" class="logo">
        <span class="logo-lg"><b>Trang chủ</b></span>
      </a>

      <!-- Header Navbar -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?php echo $this->Html->image('menu_nhanvien1.jpg', ['class'=>"user-image", 'alt'=>"User Image"]); ?> 
                <span class="hidden-xs"><strong> <?php echo $user_info['firstname']." ".$user_info['lastname']; ?></strong></span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <?php echo $this->Html->image('menu_nhanvien1.jpg', ['class'=>"img-circle", 'alt'=>"User Image"]); ?>
                  <p>
                    Tài Khoản: <span><strong> <?php echo $user_info['firstname']." ".$user_info['lastname']; ?></strong></span>
                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="<?php echo $this->Url->build(
          array('controller' => "Users", 'action' => "changePassword",)); ?>" class="btn btn-default btn-flat">Đổi mật khẩu</a>
                  </div>
                  <div class="pull-right">
                    <a href="<?php echo $this->Url->build(
          array('controller' => "Users", 'action' => "logout",)); ?>" class="btn btn-default btn-flat">Đăng xuất</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Tìm kiếm...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"></li>
        <!-- Optionally, you can add icons to the links -->
        <li><a href="<?php echo $this->Url->build(array('controller' => "Books", 'action' => "index", 'prefix' => false)); ?>"><i class="fa fa-dashboard"></i> <span>Trang chủ</span></a></li>

        <li><a href="<?php echo $this->Url->build(array('controller' => "Categories", 'action' => "index")); ?>"><i class="fa fa-server"></i> <span>Danh mục sách</span></a></li>

        <li><a href="<?php echo $this->Url->build(array('controller' => "Books", 'action' => "index")); ?>"><i class="fa fa-book"></i> <span>Sách</span></a></li>

        <li><a href="<?php echo $this->Url->build(array('controller' => "Writers", 'action' => "index")); ?>"><i class="fa fa-address-card"></i> <span>Tác giả</span></a></li>

        <li><a href="<?php echo $this->Url->build(array('controller' => "Orders", 'action' => "index")); ?>"><i class="fa fa-clipboard"></i> <span>Đơn hàng</span></a></li>

        <li><a href="<?php echo $this->Url->build(array('controller' => "Comments", 'action' => "index")); ?>"><i class="fa fa-comments"></i> <span>Bình luận</span></a></li>

        <li><a href="<?php echo $this->Url->build(array('controller' => "Coupons", 'action' => "index")); ?>"><i class="fa fa-ticket"></i> <span>Mã giảm giá</span></a></li>

        <li><a href="<?php echo $this->Url->build(array('controller' => "Groups", 'action' => "index")); ?>"><i class="fa fa-cog"></i> <span>Phân quyền</span></a></li>

        <li><a href="<?php echo $this->Url->build(array('controller' => "Users", 'action' => "index")); ?>"><i class="fa fa-user"></i> <span>Users</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header"></section>

    <!-- Main content -->
    <section class="content container-fluid">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">

  </footer>
   
  <?php else : ?>
      <div class="thumbnail" style="text-align: center;">
      <h5 > &nbsp; &nbsp; &nbsp;Bạn chưa được cấp quyền vào trang này! Vui lòng liên hệ ban quản trị để được hỗ trợ!</h5>
        <p><?php echo $this->Html->link('Về trang chủ','/',['class'=>"btn btn-primary"]); ?></p>
    </div>
  <?php endif; ?>

</div>
<!-- ./wrapper -->
    
  <?= $this->Html->script('bootstrap.min.js') ?>
    <?= $this->Html->script('adminlte.min.js') ?>
    <?= $this->Html->script('/plugin/ckeditor/ckeditor.js') ?>

</body>
</html>
