<?php
/**
* @var \App\View\AppView $this
* @var \App\Model\Entity\Writer[]|\Cake\Collection\CollectionInterface $writers
*/
?>

<h3><i class="fa fa-server"></i>&nbsp;&nbsp;Quản lý Tác giả</h3>
<div class="col-xs-12" style="font-size: 16px;">
    <div class="products index"> 
        <div class="box-body table-responsive">
             <div class="col-xs-12 ">
                <div class="pull-left">
                    <a class="btn btn-primary" href="<?php echo $this->Url->build(
                        array('action' => "add",)); ?>"><span aria-hidden="true" class="fa fa-plus"></span> <?php echo __(' Thêm tác giả') ?></a>
                </div>
                <div class="pull-right">
                    <div class="input-group">
                        <div class="col-sm-10 pull-left">
                            <?php echo $this->Form->create('Comments',['url'=>['action'=>'index']]); ?>
                            <?php echo $this->Form->input('name',['label'=>'','placeholder'=>'Tìm kiếm theo tên tác giả','error'=>false]); ?>
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
                        <th scope="col"><?= $this->Paginator->sort('Tên tác giả') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('Slug') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('Tiểu sử') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('Ngày tạo') ?></th>      
                        <th scope="col" class="actions" style="width: 158px;"><?= __('') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $stt = 1; ?>
                    <?php foreach ($writers as $writer): ?>
                    <tr>
                        <td><?php echo $stt++; ?></td>
                        <td><?= h($writer->name) ?></td>
                        <td><?= h($writer->slug) ?></td>
                        <td><?= h($writer->biography) ?></td>
                        <td><?= h($writer->created) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('Chỉnh sửa'), [ 'action' => 'edit', $writer->id], ['class' => 'btn btn-success']) ?>
                            <?= $this->Form->postLink(__('Xóa'), ['action' => 'delete', $writer->id], ['class' => 'btn btn-danger', 'confirm' => __('Bạn có chắc muốn xóa comment {0}?', $writer->content)]) ?>
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

