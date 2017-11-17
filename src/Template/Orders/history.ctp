<div class="panel panel-info" style="width: 872px;">
<h4 class="panel-heading"> <i class="fa fa-server"></i> Lịch sử mua hàng</h4>
	<?php if(!empty($orders)): ?>
	<h4>Dưới đây là toàn bộ thông tin mua hàng của bạn</h4>
	<hr>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>STT</th>
				<th>Thời gian</th>
				<th>Email</th>
				<th>Tiền thanh toán</th>
				<th>Tình trạng</th>
				<th>Chi tiết</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = 1; ?>
			<?php foreach ($orders as $order): ?>
				<tr>
					<td><?php echo $i++; ?></td>
					<td><?php echo $order['created']->format('d-m-Y H:i:s'); ?></td>
					<td><?php echo json_decode($order['customer_info'])->email; ?></td>
					<td><?php echo $this->Number->format(json_decode($order['payment_info'])->total,['places'=> 0,'after'=>'VNĐ']); ?></td>
					<td>
						<?php if($order['status'] == 0): ?>
							<span class="label label-info">Đang xử lí</span>
						<?php elseif($order['status'] == 1): ?>
							<span class="label label-success">Đã xử lí</span>
						<?php else: ?>
							<span class="label label-danger">Hủy</span>
						<?php endif ?>
					</td>
					<td><?php echo $this->Html->link('Xem','/don-hang/'.$order['id']); ?></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
	<?php else: ?>
		<h4>Bạn chưa có đơn hàng nào.</h4>
	<?php endif ?>
	<hr>
	<strong>Ghi chú tình trạng đơn hàng:</strong>
		<ul>
			<li>Đã xử lí: Đơn hàng đã được chấp nhận.</li>
			<li>Đang xử lí: Đơn hàng đang đợi xử lí, bạn vui lòng thanh toán cho đơn hàng này.</li>
			<li>Hủy: Đơn hàng đã bị hủy, vui lòng liên hệ tại <?php echo $this->Html->link('đây','/#'); ?> để biết thêm chi tiết.</li>
		</ul>	
</div>