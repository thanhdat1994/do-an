<?php 
	$session = $this->request->session();
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<?= $this->Html->script('jquery-1.6.3.min.js') ?>
<script type="text/javascript">
	$(document).ready(function(){
	    $("#quantity").click(function(){
	        var quantity = $("#quantity").val();
	    });
	    $("#name, #address,#phone,#email").keyup(function(e) {
                var ENTER_KEY = 13;
                var code = "";
                if (window.event) // IE
                {
                    code = e.keyCode;
                }
                else if (e.which) // Netscape/Firefox/Opera
                {
                    code = e.which;
                }

                if (code == ENTER_KEY) {
                    if (checkForm())
                        $("form").submit();
                }
            });

	});
	function checkForm(){
		/*if ($('#name').val() == '') {
			$('#name').focus();
			$('#Error').text('Vui lòng nhập họ và tên!');
			return false;
		}
		if ($('#email').val() == '') {
			$('#email').focus();
			$('#Error').html('Vui lòng nhập địa chỉ Email!');
			return false;
		}
		if ($('#address').val() == '') {
			$('#address').focus();
			$('#Error').html('Vui lòng nhập địa chỉ!');
			return false;
		}
		if ($('#phone').val() == '') {
			$('#phone').focus();
			$('#Error').html('Vui lòng nhập số điện thoại!');
			return false;
		}*/
		var name = document.getElementsById('name').value;
		var email = document.getElementsById('email').value;
		var address = document.getElementsById('address').value;
		var phone = document.getElementsById('phone').value;
		if (name.length == 0) {
			alert("Vui lòng nhập họ và tên! ");
			return false;
		}else if(email.length == 0){
			alert("vui lòng nhập địa chỉ email!");
			return false;
		}else if(address.length == 0){
			alert("Vui lòng nhập địa chỉ!");
			return false;
		}else if(phone.length == 0){
			alert("Vui lòng nhập số điện thoại!");
			return false;
		}
	}
	function validateCoupon(){
		var codecp = document.getElementsById('code').val();
		if (codecp.length == 0) {
			alert("Bạn chưa nhập mã giảm giá! Vui lòng nhập mã giảm giá trước khi click Nhập.");
			return false;
		}else{
			return true;
		}
	};

</script>
	<!-- $cart = $session->read('cart'); -->

<div class="panel panel-default" style="width: 872px; font-size: 11pt;">

	<?php if ($user_info['group_id'] == 1): ?>
		<?php $this->redirect(['action' => 'index']); ?>
	<?php else: ?>
	
<h4 class="panel-heading">
	 <i class="fa fa-shopping-cart"></i> Chi tiết Giỏ hàng
</h4>
<div>
	<?php if ($session->check('cart')): ?>
		<?php $cart = $session->read('cart'); ?>
		<?php $payment = $session->read('payment.total');
			$discount = $session->read('payment.discount');
			$pay = $payment - ($payment * $discount/ 100);
		 ?>
		<?php $stt = 1; ?>
		<!-- Hiển thị chi tiết giỏ hàng -->
		<div class="thumbnail">
			<div class="row">
				<!-- table -->
				<div>
					<table class="table table-hover table-striped body-table">
						<tbody class="body-table">
							<tr>
								<th>STT</th>
								<th>Tên Sách</th>
								<th width="100"> Số Lượng</th>
								<th></th>
								<th>Đơn Giá</th>
								<th>Thành Tiền</th>
								<th>Xóa</th>
							</tr>
							<?php foreach ($cart as $book): ?>
								<tr>
									<td>
										<?php
										echo $stt++; ?>
									</td>
									<td>
										<?php echo $this->Html->link($book['title'],'/'.$book['slug']); ?>
									</td>
									<td>
										<?php echo $this->Form->create('Books',['url' => ['controller' => 'books','action' => 'quantityUpdate']],['class'=>"form-inline"]); ?>
										<?php echo $this->Form->input('bookId', ['type' => 'hidden', 'value' => $book['id']]); ?>
							            <?php echo $this->Form->input('quantity', ['value' => $book['quantity'], 'class' => 'col col-lg-2', 'label' => false, 'div' => false,'id'=>'quantity', 'style' =>'width: 40px;']); ?>
							            </td><td>
							            <?php echo $this->Form->button('Cập nhật', ['class'=>"btn btn-primary", 'type' => 'submit']); ?>
							        </td>
							            <?php echo $this->Form->end(); ?>
									</td>
									<td>
										<?php echo $this->Number->format($book['sale_price'],['places'=>0,'after'=>' VNĐ']); ?>
									</td>
									<td>
										<?php echo $this->Number->format($book['sale_price']*$book['quantity'],['places'=>0,'after'=>' VNĐ']); ?>
									</td>
									<td>
										<?php echo $this->Form->postLink('<span class="fa fa-times"></span></a>','/books/delete_sp/'.$book['id'],['escape'=>false]); ?>
									</td>
								</tr>
							<?php endforeach ?>
							<tr>
								<td colspan="5">
									<p>Tổng tiền:</p>
								</td>
								<td colspan="2"><strong>
									<?php echo $this->Number->format($payment,['places'=>0,'after'=>' VNĐ']); ?>
								</strong></td>
							</tr>
							<tr>
								<?php if ($session->check('payment.coupon')): ?>
									<td colspan="5">
										<p>Đã giảm: (Coupon <?php echo $session->read('payment.coupon'); ?> - giảm <?php echo $session->read('payment.discount'); ?> %)</p>
									</td>
									<td colspan="2"><strong>
										<?php 
											echo $this->Number->format($payment * $discount / 100,['places'=>0,'after'=>' VNĐ']); 
										?>
									</strong></td>
								<?php else: ?>
									<td colspan="5">
										<p>Đã giảm:</p>
									</td>
									<td colspan="2"><strong>
										0 VNĐ
									</strong></td>
								<?php endif ?>
							</tr>
							<tr>
								<td colspan="5">
									<p>Thành tiền:</p>
								</td>
								<td colspan="2"><span class = "label label-danger">
									<?php 
										echo $this->Number->format($pay ,['places'=>0,'after'=>' VNĐ']); ?>
								</span></td>
							</tr>
						</tbody>
					</table>
					<div class="cart_link">
						<?php echo $this->Form->postLink('Làm rỗng giỏ hàng','/books/empty_cart',['class'=>"btn btn-primary",'style'=>"float:left; margin-left:150px;"]); ?>
						<?php echo $this->Html->link('Tiếp tục mua hàng','/',['class'=>"btn btn-primary",'style'=>'margin-left:150px;']); ?>
						
					</div>
				</div>

			</div>
		</div>
		<!-- coupon -->
		<div class="panel panel-success col col-lg-4" style="margin-top:10px;">
			<h4 class='panel-heading'><i class="fa fa-barcode"></i>&nbsp; &nbsp; Mã giảm giá</h4>
				<?php if ($session->check('payment.coupon')): ?>
				<?php pr($session->read('payment.coupon')); ?>
					 Bạn đã nhập mã giảm giá!
					<?php else: ?>
						<?php echo $this->Form->create('Coupons',['url'=>['controller'=>'coupons','action'=>'add'],'class'=>"form-inline",'onclick' => 'validateCoupon()']); ?>
						<?php echo $this->Form->input('code',['class'=>'input text','placeholder'=>"Nhập mã giảm giá",'label'=>false,'div'=>false,'id' => 'code']); ?>
						<?php echo $this->Form->button('Nhập',['type'=>"submit",'class'=>"btn btn-primary"]); ?>
						<?php echo $this->Form->end(); ?>
						<h4>Ghi chú</h4>
						<ul>
							<li>Mỗi mã giảm giá khác nhau và chỉ dùng trong khoảng thời gian quy định.</li>
							<li>Chỉ dùng 1 mã giảm giá khi thanh toán đơn hàng.</li>
							<li>Số tiền giảm giá dựa trên % giảm giá * tổng giá trị của đơn hàng.</li>
						</ul>
				<?php endif ?>
		</div>
		<!-- order -->
		<div class="panel panel-success col col-lg-7" style="margin-top:10px; float:right;">
			<h4 class='panel-heading'><i class="fa fa-user"></i>&nbsp; &nbsp; Thông tin đặt hàng</h4>
			<?php if ($user_info != null): ?>
				<?php echo $this->Form->create('Orders',['url'=>['controller'=>'orders','action'=>'checkout'], 'class'=>'form-horizontal']); ?>
					 <div class="col col-lg-10">
					 	<?php echo $this->Form->input('name',['placeholder'=>"Nhập tên",'label'=>"Tên: ",'id' => "name",'value'=> $user_info['firstname']." ".$user_info['lastname']]); ?>
					 </div>
					 <div class="col col-lg-10">
					 	<?php echo $this->Form->input('email',['id' => "email",'placeholder'=>"Nhập email",'value'=>$user_info['email']]); ?>
					 </div>
					 <div class="col col-lg-10">
					 	<?php echo $this->Form->input('address',['id' => "address",'placeholder'=>"Nhập địa chỉ",'label'=>"Địa chỉ: ",'value'=>$user_info['address']]); ?>
					 </div>
					 <div class="col col-lg-10">
					 	<?php echo $this->Form->input('phone',['id' => "phone",'placeholder'=>"Nhập số diện thoại",'label'=>"Số điện thoại: ",'value'=>$user_info['phone_number']]); ?>
					 </div>
					<div class="col col-lg-10">
						<?php echo $this->Form->button('Đặt hàng', ['class' => 'btn btn-primary', 'type' => 'submit','style' => 'margin: 10px 0px 10px 0px; float:right;','onclick' => "checkForm();"]); ?>
					</div>
				<?php echo $this->Form->end(); ?>
			<?php else: ?>
				Bạn phải <?php echo $this->Html->link('đăng nhập','/dang-nhap'); ?> trước khi đặt hàng!
			<?php endif ?>
			
		</div>
	<?php else: ?>
		<?php $session->delete('payment.coupon') ?>
	<div class="thumbnail">
		<h5> &nbsp; &nbsp; &nbsp;Chưa có sản phẩm nào trong giỏ hàng! Vui lòng thêm sản phẩm trước khi xem chi tiết giỏ hàng!</h5>
			<p><?php echo $this->Html->link('Về trang chủ','/',['class'=>"btn btn-primary"]); ?></p>
	</div>
	<?php endif ?>
</div>
</div>
<?= $this->fetch('script') ?>
<?php endif ?>