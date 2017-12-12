<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\book[]|\Cake\Collection\CollectionInterface $categories
  */
?>
<h3><i class="fa fa-server"></i>&nbsp;&nbsp;Quản lý sách</h3>
<div class="col-xs-12" style="font-size: 16px;">
    <div class="products index"> 
        <div class="box-body table-responsive">
             <div class="col-xs-12 ">
                <div class="pull-left">
                    <a class="btn btn-primary" href="<?php echo $this->Url->build(
                        array('action' => "add",)); ?>"><span aria-hidden="true" class="fa fa-plus"></span> <?php echo __(' Thêm sách mới') ?></a>
                </div>
                <div class="col-sm-8 pull-right">
                    <div class="input-group">
                        <div class="col-sm-10 pull-left">
                            <?php echo $this->Form->create('Books',['url'=>['action'=>'index']]); ?>
                            <div class="col-sm-7">
                                <?php echo $this->Form->control('category_id', ['options' => $categories, 'empty' => 'Danh mục sách', 'label' => false]); ?>
                            </div>
                            <div class="col-sm-5">
                                <?php echo $this->Form->input('name',['label'=>'','placeholder'=>'Tìm kiếm sách','error'=>false, 'style' => 'height:30px; margin-top:-4px;']); ?>
                            </div>
                            
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
                        <th scope="col"><?= $this->Paginator->sort('Tên sách') ?></th>
                        <!-- <th scope="col"><?= $this->Paginator->sort('Slug') ?></th> -->
                        <th scope="col"><?= $this->Paginator->sort('Ảnh bìa') ?></th>
						<th scope="col"><?= $this->Paginator->sort('Giá bán') ?></th>
						<th scope="col"><?= $this->Paginator->sort('Ngày xuất bản') ?></th>
						<!-- <th scope="col"><?= $this->Paginator->sort('Ngày tạo') ?></th> -->		
                        <th scope="col" class="actions" style="width: 158px;"><?= __('') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($books as $book): ?>
                    <tr>
                        <td><?= $this->Number->format($book->id) ?></td>
                        <td><?= h($book->category['name']) ?></td>
                        <td><?= h($book->title) ?></td>
                        <!-- <td><?= h($book->slug) ?></td> -->
                        <td><?php echo $this->Html->image($book['image'],['class'=>'img img-responsive', 'style'=>'width:100px;']); ?></td>
                        <td><?php echo $this->Number->format($book['sale_price'],['places'=> 0,'after'=>'VNĐ']); ?></td>
                        <td><?= h(date('d-m-Y', strtotime($book['publish_date']))) ?></td>
                        <!-- <td><?= h(date('d-m-Y', strtotime($book['created']))) ?></td> -->
                        <td class="actions">
                            <!-- <?= $this->Html->link(__('View'), ['action' => 'view', $book->id]) ?> -->
                            <?= $this->Html->link(__('Chỉnh sửa'), [ 'action' => 'edit', $book->id], ['class' => 'btn btn-success']) ?>
                            <?= $this->Form->postLink(__('Xóa'), ['action' => 'delete', $book->id], ['class' => 'btn btn-danger', 'confirm' => __('Bạn có chắc muốn xóa sách {0}?', $book['title'])]) ?>
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
