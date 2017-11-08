<div class="thumbnails">
<?php foreach($books as $book): ?>
<li class="span3">
	<div class="thumbnail">		
		<?php echo $this->Html->image($book['image'],['class'=>'img img-responsive', 'style'=>'width:200px;height:200px;']); ?>
		<div class="caption">
			<div class="latest-product-name">
				<h4><span><?php echo $this->Html->link($book['title'],'/'.$book['slug']); ?></span></h4>
			</div>
			<div class="writer">
				<h5><?php
				foreach ($book['writers'] as $writer) {
					echo $this->Html->link($writer['name'],'/tac-gia/'.$writer['slug'])."&nbsp;&nbsp;";
				}  ?></h5>				
			</div>
			<h5><span>Giá: <?php echo $this->Number->format($book['sale_price'],['places'=> 0,'after'=>'VNĐ']); ?></h5>
			<!-- Thêm giỏ hàng -->
             <?php echo $this->Form->postLink('Thêm vào <i class="fa fa-shopping-cart"></i>','/books/add_to_cart/'.$book['id'],['class'=>'btn btn-primary','escape'=>false]); 
             ?>
		</div>
	
	</div>
	
</li>
<?php endforeach; ?>
</div>
