<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Writer $writer
  */
?>
<div class="writers view large-9 medium-8 columns content">
    
    <div class="panel panel-default" style="width: 872px;">
        <div>
            <h4 class="panel-heading" style="border-color: #ddd;">
                <i class="fa fa-user"></i> &nbsp;<?= h($writer->name) ?>
            </h4>
            <div class="content-writer">
                <strong>Tên đầy đủ của tác giả: </strong><?= h($writer->name) ?></br>
                <strong>Tiểu sử: </strong></br>
                <p><?php echo $writer->biography; ?></p>
            </div>
        </div>
    </div>

    <div class="panel panel-default" style="width: 872px;">
        <div>
            <h4 class="panel-heading" style="border-color: #ddd;"> <i class="fa fa-server"></i>&nbsp;&nbsp; Sách của <?php echo $writer['name']; ?>
                </h4>
            <?php if (!empty($books)): ?>
                <?php echo $this->element('books',['books'=>$books]); ?>
                <?php echo $this->element('pagination',['object'=>'quyển sách']); ?>
            <?php endif; ?>
        </div>
    </div>
</div>
