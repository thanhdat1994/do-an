<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Category[]|\Cake\Collection\CollectionInterface $categories
  */
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Category'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Books'), ['controller' => 'Books', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Book'), ['controller' => 'Books', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
<h3><i class="fa fa-server"></i>&nbsp;&nbsp;Quản lý danh mục sách</h3>
<div class="col-xs-12" style="font-size: 16px;">
    <div class="products index"> 
        <div class="box-body table-responsive">
             <div class="col-xs-12 ">
                <div class="pull-left">
                    <a class="btn btn-primary" href="<?php echo $this->Url->build(
                        array('action' => "add",)); ?>"><span aria-hidden="true" class="fa fa-plus"></span> <?php echo __(' Thêm danh mục') ?></a>
                </div>
                <div class="pull-right">
                    <div class="input-group">
                        <div class="col-sm-10 pull-left">
                            <?php echo $this->Form->create('Categories',['url'=>['action'=>'index']]); ?>
                            <?php echo $this->Form->input('name',['label'=>'','placeholder'=>'Tìm kiếm danh mục sách','error'=>false,'style' => 'height:30px; margin-top:-4px;']); ?>
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
                        <th scope="col"><?= $this->Paginator->sort('ID') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('Danh mục') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('Slug') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('Mô tả') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('Ngày tạo') ?></th>
                        <th scope="col" class="actions" style="width: 158px;"><?= __('') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categories as $category): ?>
                    <tr>
                        <td><?= $this->Number->format($category->id) ?></td>
                        <td><?= h($category->name) ?></td>
                        <td><?= h($category->slug) ?></td>
                        <td><?= h($category->description) ?></td>
                        <td><?= h($category->created) ?></td>
                        <td class="actions">
                            <!-- <?= $this->Html->link(__('View'), ['action' => 'view', $category->id]) ?> -->
                            <?= $this->Html->link(__('Chỉnh sửa'), [ 'action' => 'edit', $category->id], ['class' => 'btn btn-success']) ?>
                            <?= $this->Form->postLink(__('Xóa'), ['action' => 'delete', $category->id], ['class' => 'btn btn-danger', 'confirm' => __('Bạn có chắc muốn xóa danh mục {0}?', $category->name)]) ?>
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
