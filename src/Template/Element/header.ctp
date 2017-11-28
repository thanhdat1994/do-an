<div class="container"> 
	<a class="brand" href="<?php echo $this->Url->build(array('controller' => "Books", 'action' => "index")); ?>"><img src="<?php echo $this->Url->build('/'); ?>themes/images/newlogo.png" alt="BookStore"/></a>
	<?php if(!empty($user_info)) { ?>
		<?php if($user_info['group_id'] == 2){ ?>
			<div class="account_desc">
				<ul class="navbar-header">
					<li><a href="#">Giới Thiệu</a></li>
					<li><a href="#">Liên Hệ</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Xin chào <strong> <?php echo $user_info['firstname']." ".$user_info['lastname']; ?></strong><span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li>
								<?php echo $this->Html->link('Giỏ Hàng','/gio-hang'); ?>
							</li>
							<li>
								<?php echo $this->Html->link('Lịch sử mua hàng','/lich-su-mua-hang'); ?>
							</li>
							<li>
								<?php echo $this->Html->link('Cập nhật thông tin','/cap-nhat-thong-tin'); ?>
							</li>
							<li>
								<?php echo $this->Html->link('Đổi mật khẩu','/doi-mat-khau'); ?>
							</li>
							<li>
								<?php echo $this->Html->link('Đăng xuất','/dang-xuat'); ?>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		<?php } else if($user_info['group_id'] == 1) { ?>
			<div class="account_desc">
				<ul class="navbar-header">
					<li><a href="#">Giới Thiệu</a></li>
					<li><a href="#">Liên Hệ</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Xin chào <strong> <?php echo $user_info['firstname']." ".$user_info['lastname']; ?></strong><span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li>
								<?php echo $this->Html->link('Quản lý Admin','/admin/Books/index'); ?>
							</li>
							<li>
								<?php echo $this->Html->link('Đổi mật khẩu','/doi-mat-khau'); ?>
							</li>
							<li>
								<?php echo $this->Html->link('Đăng xuất','/dang-xuat'); ?>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		<?php } ?>
	<?php } else { ?>
		<div class="account_desc">
		<ul class="navbar-header">
			<li><a href="#">Giới Thiệu</a></li>
			<li><a href="#">Liên Hệ</a></li>
			<li>
				<?php echo $this->Html->link('Đăng kí','/dang-ki'); ?>
			</li>
			<li>
				<?php echo $this->Html->link('Đăng nhập','/dang-nhap'); ?>
			</li>						
		</ul>
	</div>
	<?php } ?>
</div>