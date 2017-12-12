<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
  */
?>
<h3><i class="fa fa-server"></i>&nbsp;&nbsp;Quản lý người dùng</h3>
<div class="col-xs-12" style="font-size: 16px;">
    <div class="products index"> 
        <div class="box-body table-responsive">
             <div class="col-xs-12 ">
                <div class="pull-left">
                    <a class="btn btn-primary" href="<?php echo $this->Url->build(
                        array('action' => "add",)); ?>"><span aria-hidden="true" class="fa fa-plus"></span> <?php echo __(' Thêm người dùng') ?></a>
                </div>
                <div class="pull-right">
                    <div class="input-group">
                        <div class="col-sm-10 pull-left">
                            <?php echo $this->Form->create('Users',['url'=>['action'=>'index']]); ?>
                            <?php echo $this->Form->input('name',['label'=>'','placeholder'=>'Tìm kiếm theo tên người dùng','error'=>false,'style' => 'height:30px;margin-top:-4px;']); ?>
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
                        <th scope="col"><?= $this->Paginator->sort('Tên nhóm') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('Tên đăng nhập') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('Họ và tên người dùng') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('Email') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('Địa chỉ') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('SĐT') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('Active') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('Ngày tạo') ?></th>      
                        <th scope="col" class="actions" style="width: 158px;"><?= __('') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $stt = 1; ?>
                    <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo $stt++; ?></td>
                        <td><?= h($user->group['name']) ?></td>
                        <td><?= h($user->username) ?></td>
                        <td><?= h($user->firstname." ".$user->lastname) ?></td>
                        <td><?= h($user->email) ?></td>
                        <td><?= h($user->address) ?></td>
                        <td><?= h($user->phone_number) ?></td>
                        <td>
                            <?php if ($user->active == 1): ?>
                                <?= $this->Form->postLink(__('Disable'), [ 'action' => 'active', $user->id], ['class' => 'btn btn-success']) ?>
                            <?php else: ?>
                                 <?= $this->Form->postLink(__('Active Now'), [ 'action' => 'active', $user->id], ['class' => 'btn btn-success']) 
                                 ?>
                             <?php endif ?>
                        </td>
                        <td><?= h($user->created) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('Chỉnh sửa'), [ 'action' => 'edit', $user->id], ['class' => 'btn btn-success']) ?>
                            <?= $this->Form->postLink(__('Xóa'), ['action' => 'delete', $user->id], ['class' => 'btn btn-danger', 'confirm' => __('Bạn có chắc muốn xóa comment {0}?', $user->firstname." ".$user->lastname)]) ?>
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
