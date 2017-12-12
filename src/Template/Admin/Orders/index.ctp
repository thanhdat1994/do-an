<h3><i class="fa fa-server"></i>&nbsp;&nbsp;Quản lý đơn hàng</h3>
<div class="col-xs-12" style="font-size: 16px;">
    <div class="products index"> 
        <div class="box-body table-responsive">
             <div class="col-xs-12 ">
                <div class="pull-left">
                    
                </div>
                <div class="pull-right">
                    <div class="input-group">
                        <div class="col-sm-10 pull-left">
                            <?php echo $this->Form->create('Orders',['url'=>['action'=>'index']]); ?>
                            <?php echo $this->Form->input('name',['label'=>'','placeholder'=>'Tìm kiếm tên khách hàng','error'=>false, 'style' => 'height:30px; margin-top:-4px;']); ?>
                        </div>
                        <div class="input-btn pull-right">
                            <button type="submit" id="submitButton" class="btn btn-primary"><i class="fa fa-search"></i></button>
                        </div>
                        <?php echo $this->Form->end(); ?>
                    </div>
                </div>
             </div>
             <hr>
             <hr>
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('Mã đơn hàng') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('Thời gian') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('Tên tài khoản') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('Tên khách hàng') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('Tổng tiền') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('Tình trạng') ?></th>
                        <th scope="col" class="actions" style="width: 158px;"><?= __('') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><?= $this->Number->format($order->id) ?></td>
                        <td><?php echo $order['created']->format('d-m-Y H:i:s'); ?></td>
                        <td><?php echo $order['user']['username']; ?></td>
                        <td><?php echo json_decode($order['customer_info'])->name; ?></td>
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
                        <td class="actions">
                            <?= $this->Html->link(__('Chi tiết'), ['action' => 'view', $order->id], ['class' => 'btn btn-success']) ?>
                            <!-- <?= $this->Html->link(__('Chỉnh sửa'), [ 'action' => 'edit', $order->id], ['class' => 'btn btn-success']) ?> -->
                            <!-- <?= $this->Form->postLink(__('Xóa'), ['action' => 'delete', $order->id], ['class' => 'btn btn-danger', 'confirm' => __('Bạn có chắc muốn xóa danh mục {0}?', $order->name)]) ?> -->
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>




<div class="text-center" style="font-size: 17px;">
    <ul class="pagination">
        <?= $this->Paginator->first('<< ' . __('Đầu')) ?>
        <?= $this->Paginator->prev('< ' . __('Quay lại')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('Kế tiếp') . ' >') ?>
        <?= $this->Paginator->last(__('Cuối') . ' >>') ?>
    </ul>
    <p><?= $this->Paginator->counter(['format' => __('Trang {{page}}/{{pages}}, hiển thị {{current}} trong tổng số {{count}} kết quả')]) ?></p>
</div>
