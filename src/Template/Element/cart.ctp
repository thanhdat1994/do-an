<?php
	$session=$this->request->session();
 ?>
 <?php if ($session->check('cart')): ?>
 <?php $cart = $session->read('cart'); ?>
	<div style="text-align:center;">
		<?php echo $this->Html->link('Chi tiết giỏ hàng','/gio-hang',['class'=>"btn btn-primary"]); ?>
	</div>
	
<?php else: ?>
	Không có sản phẩm trong giỏ hàng!
<?php endif ?>