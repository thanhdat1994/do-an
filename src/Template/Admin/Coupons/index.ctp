<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Coupon[]|\Cake\Collection\CollectionInterface $coupons
  */
?>
<h3><i class="fa fa-ticket"></i>&nbsp;&nbsp;Quản lý mã giảm giá</h3>
<div class="col-xs-12" style="font-size: 16px;">
    <div class="products index"> 
        <div class="box-body table-responsive">
             <div class="col-xs-12 ">
                <div class="pull-left">
                    <a class="btn btn-primary" href="<?php echo $this->Url->build(
                        array('action' => "add",)); ?>"><span aria-hidden="true" class="fa fa-plus"></span> <?php echo __(' Thêm mã giảm giá') ?></a>
                </div>
                <div class="pull-right">
                    <div class="input-group">
                        <div class="col-sm-10 pull-left">
                            <?php echo $this->Form->create('Coupons',['url'=>['action'=>'index']]); ?>
                            <?php echo $this->Form->input('code',['label'=>'','placeholder'=>'Tìm kiếm mã giảm giá','error'=>false,'style' => 'height:30px;margin-top:-4px;']); ?>
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
                        <th scope="col"><?= $this->Paginator->sort('STT') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('Code') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('percent') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('Mô tả') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('Ngày bắt đầu') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('Ngày kết thúc') ?></th>
                        <th scope="col" class="actions" style="width: 158px;"><?= __('') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $stt = 1; ?>
                    <?php foreach ($coupons as $coupon): ?>
                    <tr>
                        <td><?php echo $stt++; ?></td>
                        <td><?= h($coupon->code) ?></td>
                        <td><?= h($coupon->percent) ?></td>
                        <td><?= h($coupon->description) ?></td>
                        <td><?= h($coupon->time_start) ?></td>
                        <td><?= h($coupon->time_end) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('Chỉnh sửa'), [ 'action' => 'edit', $coupon->id], ['class' => 'btn btn-success']) ?>
                            <?= $this->Form->postLink(__('Xóa'), ['action' => 'delete', $coupon->id], ['class' => 'btn btn-danger', 'confirm' => __('Bạn có chắc muốn xóa mã {0}?', $coupon->code)]) ?>
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
