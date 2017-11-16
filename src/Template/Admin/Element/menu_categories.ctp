
<?php
	//$categories = $this->requestAction(['controller'=>'categories','action'=>'menu']);
	//debug($categories);
?>
<div class="col-sm-12">
	<ul id="sideManu" class="nav nav-tabs nav-stacked">
	<?php foreach ($categories as $category): ?>
		<!--category-productsr-->		
		<li ><?php echo $this->Html->link($category['name'], '/danh-muc/'.$category['slug'],['class'=>'active']) ?></li>			
	<?php endforeach ?>
	</ul>
</div>
							