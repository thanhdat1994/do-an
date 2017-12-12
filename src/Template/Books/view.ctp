<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Book $book
  */
?>
<div class="books view large-9 medium-8 columns content">
    <!-- update 10/10 -->
    <div class="panel panel-default" style="width: 872px;">
        <div class="related">
            <h4 class="panel-heading"><i class="fa fa-book"></i>&nbsp;&nbsp;<?= h($book->title) ?></h4>
            <!-- div image -->
            <div class="content-book">   
                <div class="detail">
                    <div class="image-book">
                        <?php echo $this->Html->image($book['image'],['class'=>'img img-responsive']); ?>
                    </div></br>
                    <div class="detail-child">
                        <div>
                            <h5><?= h($book->title) ?></td></strong></h5>
                        </div>
                        <div>
                            <strong>Publisher: </strong><?= h($book->publisher) ?></br>
                        </div>
                        <div>
                            <strong>Sale Price: </strong><?= $this->Number->format($book->sale_price,['places'=> 0,'after'=>' VNĐ']) ?></br>
                        </div>
                        <div>
                            <strong>Comments: </strong><?= $this->Number->format($book->comment_count,['places'=>0,'before'=>'(','after'=>') Comments'])?></br>
                        </div>
                        <!-- Thêm giỏ hàng -->
                        <?php if ($user_info['group_id'] == 1): ?>
                            
                        <?php else: ?>
                        <?php echo $this->Form->postLink('Thêm vào <i class="fa fa-shopping-cart"></i>','/books/add_to_cart/'.$book['id'],['class'=>'btn btn-primary','escape'=>false]); 
                        ?>
                        <?php endif ?>
                    </div>
                </div>
                <div>
                    <strong>Info: </strong></br>
                    <?= $this->Text->autoParagraph(h($book->info)); ?>
                </div>
            </div>
            <!-- Hiển thị tác giả -->
            <div class="content-book">
                <legend><i class="fa fa-user"></i>&nbsp;&nbsp;<?= __('Tác giả') ?></legend>
                <?php if (!empty($book->writers)): ?>
                    <?php foreach ($book['writers'] as $writer) {
                        echo $this->Html->link($writer['name'],'/tac-gia/'.$writer['slug']);echo "<br>";
                    }  ?>
                <?php endif; ?>
            </br>
            </div>
            <!-- Hiển thị comments -->
            <div class="content-book">
                <p><legend ><i class="fa fa-comments-o"></i>&nbsp;&nbsp;<?= __('Bình luận: ') ?></legend> Có tất cả <?php echo $book['comment_count'] ?> bình luận</p>
                <?php if (!empty($comments)){
                        foreach ($comments as $comment) {
                            echo $comment['user']['firstname']." ".$comment['user']['lastname']."  đã gửi: ";
                            echo $comment['content']."<br>";
                        }
                     } else{
                            echo "Chưa có nhận xét cho quyển sách này.";
                     }
                ?>        
            </div><br>
            <!-- Gởi comments -->
            <div class="comments form" style="margin-left:20px;">
                <?php if (isset($error)): ?>
                    <?php foreach ($errors as $error ): ?>
                        <?php echo $error[0]; ?>
                    <?php endforeach ?>
                <?php endif ?>
                
                <?php echo $this->Form->create('Comment',['url'=>['controller'=>'Comments','action'=>'add'],'novalidator'=>true]); ?>
                <fieldset>
                    <legend><i class="fa fa-comment-o"></i>&nbsp;&nbsp;<?php echo __('Thêm bình luận'); ?></legend>
                    <?php if (!empty($user_info)): ?>
                        <?php
                        echo $this->Form->input('user_id',['type'=>'hidden','value'=>$user_info['id']]);
                        echo $this->Form->input('book_id',['type'=>'hidden','value'=>$book['id']]);
                        echo $this->Form->input('content',['type'=>'textarea','label'=>'']);
                        ?>
                        <?php echo $this->Form->input('Gởi nhận xét',['type'=>'submit','class'=>'btn btn-info']); ?><?php echo $this->Form->end(); ?>
                    <?php else: ?>
                            Bạn phải <?php echo $this->Html->link('đăng nhập','/dang-nhap'); ?> trước khi gởi nhận xét
                    <?php endif ?>                    
                </fieldset>
            </div>
        </div>
    </div>
    <!-- end -->

    <!-- Hiển thị sách liên quan -->
    <!-- update 10/10 -->
    <div class="panel panel-default" style="width: 872px;">
        <div class="related">
            <h4 class="panel-heading"><i class="fa fa-address-book"></i>&nbsp;&nbsp;Sách cùng chuyên mục</h4>
            <?php if (!empty($related_books)): ?>
                <?php echo $this->element('books',['books'=>$related_books]); ?>
            <?php endif; ?>
        </div>
    </div>