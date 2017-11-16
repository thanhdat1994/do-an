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
		</div>
	</div>
</li>
<?php endforeach; ?>
</div>
<!-- <li class="span3">
	<div class="thumbnail">
		<i class="tag"></i>
		<a href="anh-sang-vo-hinh"><img src="webroot/img/home/anh-sang-vo-hinh.jpg" alt=""></a>
		<div class="caption">
			<div class="product-name"><p><h4>Ánh sáng vô hình</h4></p>
			<h5><span>Anthony Doerr</span></h5>
		</div>
	</div>
</li> -->