<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Group[]|\Cake\Collection\CollectionInterface $groups
  */
?>
<h3><i class="fa fa-server"></i>&nbsp;&nbsp;Quản lý nhóm người dùng</h3>
<div class="col-xs-12" style="font-size: 16px;">
    <div class="products index"> 
        <div class="box-body table-responsive">
             <div class="col-xs-12 ">
                <div class="pull-left">
                    <a class="btn btn-primary" href="<?php echo $this->Url->build(
                        array('action' => "add",)); ?>"><span aria-hidden="true" class="fa fa-plus"></span> <?php echo __(' Thêm nhóm') ?></a>
                </div>
                <div class="pull-right">
                    <div class="input-group">
                        <div class="col-sm-10 pull-left">
                            <?php echo $this->Form->create('Groups',['url'=>['action'=>'index']]); ?>
                            <?php echo $this->Form->input('name',['label'=>'','placeholder'=>'Tìm kiếm theo tên nhóm','error'=>false,'style' => 'height:30px;margin-top:-4px;']); ?>
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
                        <th scope="col"><?= $this->Paginator->sort('percent') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('Mô tả') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('Ngày tạo') ?></th>      
                        <th scope="col" class="actions" style="width: 158px;"><?= __('') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $stt = 1; ?>
                    <?php foreach ($groups as $group): ?>
                    <tr>
                        <td><?php echo $stt++; ?></td>
                        <td><?= h($group->name) ?></td>
                        <td><?= h($group->percent) ?></td>
                        <td><?= h($group->description) ?></td>
                        <td><?= h($group->created) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('Chỉnh sửa'), [ 'action' => 'edit', $group->id], ['class' => 'btn btn-success']) ?>
                            <?= $this->Form->postLink(__('Xóa'), ['action' => 'delete', $group->id], ['class' => 'btn btn-danger', 'confirm' => __('Bạn có chắc muốn xóa nhóm {0}?', $group->name)]) ?>
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
