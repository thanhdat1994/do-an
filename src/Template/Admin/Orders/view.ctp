<h3><i class="fa fa-server"></i>&nbsp;&nbsp;Chi tiết đơn hàng</h3>
<div class="col-xs-12" style="font-size: 16px;">
    <div class="products index"> 
        <div class="box-body table-responsive">
             <div class="col-xs-12 ">
                <?php 
                    $customer_info = json_decode($order['customer_info']);
                    $payment_info = json_decode($order['payment_info']);
                    $order_info = json_decode($order['orders_info']);
                ?>
                <div class="col col-lg-6">
                    <p><strong>Họ tên người mua hàng: </strong><span>&nbsp;&nbsp;<?php echo $customer_info->name; ?></span></p>
                    <p><strong>Email: </strong><span>&nbsp;&nbsp;<?php echo $customer_info->email; ?></span></p>
                    <p><strong>Số điện thoại: </strong><span>&nbsp;&nbsp;<?php echo $customer_info->phone; ?></span></p>
                    <p><strong>Địa chỉ: </strong><span>&nbsp;&nbsp;<?php echo $customer_info->address; ?></span></p>
                </div>
                <div class="col col-lg-6">
                    <p><strong>Mã đơn hàng: </strong><span>&nbsp;&nbsp;<?php echo $order['id']; ?></span></p>
                    <p><strong>Tổng cộng: </strong><span>&nbsp;&nbsp;<?php echo $this->Number->format($payment_info->total,['places'=> 0,'after'=>'VNĐ']); ?></span></p>
                    <?php if(isset($payment_info->coupon)): ?>
                        <p><strong>Mã giảm giá: </strong>&nbsp;&nbsp;
                            <span>
                                <?php echo $payment_info->coupon; ?>&nbsp;&nbsp;&nbsp;&nbsp;
                                <strong>Giảm: </strong>&nbsp;&nbsp;<?php echo $payment_info->discount; ?>%       
                            </span>
                        </p>
                        <p><strong>Tiền phải trả: </strong><span>&nbsp;&nbsp;<?php echo $this->Number->format($payment_info->pay,['places'=> 0,'after'=>'VNĐ']); ?></span></p>
                    <?php else: ?>
                        <p><strong>Mã giảm giá: </strong>&nbsp;&nbsp;<span>Không</span>
                        </p>
                        <p><strong>Tiền phải trả: </strong><span>&nbsp;&nbsp;<?php echo $this->Number->format($payment_info->total,['places'=> 0,'after'=>'VNĐ']); ?></span></p>
                    <?php endif ?>   
                        <p><strong>Tình trạng đơn hàng: </strong><span>
                        <?php if($order['status'] == 0): ?>
                            <span class="label label-info">Đang xử lí</span>
                        <?php elseif($order['status'] == 1): ?>
                            <span class="label label-success">Đã xử lí</span>
                        <?php elseif($order['status'] == 2): ?>
                            <span class="label label-warning">Đang tạm ngưng</span>
                        <?php else: ?>
                            <span class="label label-danger">Đã hủy</span>  
                        <?php endif ?>              
                </div>
             </div>
             <hr>
             <hr>
             <?php echo $this->Form->create("Orders",['url' => ['action' => 'xuly']]); ?>
            <table class="table table-hover table-bordered">
                <thead>
                    <h4>Chi tiết đơn hàng</h4>
                    <tr>
                        <th>STT</th>
                        <th width="540px">Tên sách</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($order_info as $book): ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <?php echo $this->Form->input('id', ['type' => 'hidden', 'value' => $order['id']]); ?>
                            <td><?php echo $book->title; ?></td>
                            <td><?php echo $book->quantity; ?></td>
                            <td><?php echo $this->Number->format($book->sale_price,['places'=> 0,'after'=>'VNĐ']); ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <?php echo $this->Form->select('select_action',['1' => 'Chấp nhận đơn hàng','2' => 'Tạm ngưng đơn hàng', '3' => 'Hủy đơn hàng'],['empty' => false]); ?>
            <?php echo $this->Form->button("Submit",['class'=>"btn btn-success", 'type' => 'submit']) ?>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
</div>