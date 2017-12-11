<div class="panel panel-info" style="width: 872px;">	
<h4 class="panel-heading"> <i class="fa fa-server"></i> Chi tiết đơn hàng
</h4>
	<hr>
	<?php if(isset($order)): ?>
		<?php 
			$customer_info = json_decode($order['customer_info']);
			$payment_info = json_decode($order['payment_info']);
			$order_info = json_decode($order['orders_info']);
		 ?>
		 <div class="content">
		 	<div class="col col-lg-6">
		 		<p><strong>Họ tên người mua hàng: </strong><span><?php echo $customer_info->name; ?></span></p>
		 		<p><strong>Email: </strong><span><?php echo $customer_info->email; ?></span></p>
		 		<p><strong>Số điện thoại: </strong><span><?php echo $customer_info->phone; ?></span></p>
		 		<p><strong>Địa chỉ: </strong><span><?php echo $customer_info->address; ?></span></p>
		 	</div>
		 	<div class="col col-lg-6">
		 		<p><strong>Mã đơn hàng: </strong><span><?php echo $order['id']; ?></span></p>
		 		<p><strong>Tổng cộng: </strong><span><?php echo $this->Number->format($payment_info->total,['places'=> 0,'after'=>'VNĐ']); ?></span></p>
		 		<?php if(isset($payment_info->coupon)): ?>
		 			<p><strong>Mã giảm giá: </strong>
		 				<span>
		 					<?php echo $payment_info->coupon; ?>
		 					<strong>Giảm: </strong><?php echo $payment_info->discount; ?>		
		 				</span>
		 			</p>
		 			<?php endif ?>
		 			<p><strong>Tiền phải trả: </strong><span><?php echo $this->Number->format($payment_info->pay,['places'=> 0,'after'=>'VNĐ']); ?></span></p>
		 		<?php else: ?>
		 			<p><strong>Tổng cộng: </strong><span><?php echo $this->Number->format($payment_info->total,['places'=> 0,'after'=>'VNĐ']); ?></span></p>
		 			<p><strong>Tình trạng đơn hàng: </strong><span>
		 				<?php if($order['status'] == 0): ?>
		 					<span class="label label-info">Đang xử lí</span>
		 				<?php elseif($order['status'] == 1): ?>
		 					<span class="label label-success">Đã xử lí</span>
		 				<?php else: ?>
		 					<span class="label label-danger">Hủy</span>
		 				<?php endif ?>
		 		
		 	</div>		
	<hr>
	<h4>Sách đã mua</h4>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>STT</th>
					<th>Tên sách</th>
					<th>Số lượng</th>
					<th>Đơn giá</th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 1; ?>
				<?php foreach ($order_info as $book): ?>
					<tr>
						<td><?php echo $i++; ?></td>
						<td><?php echo $book->title; ?></td>
						<td><?php echo $book->quantity; ?></td>
						<td><?php echo $this->Number->format($book->sale_price,['places'=> 0,'after'=>'VNĐ']); ?></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>		 
	<?php  else: ?>
		Đơn hàng này không tồn tại
	<?php endif ?>	
	</div>
</div>