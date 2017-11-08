<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Book[]|\Cake\Collection\CollectionInterface $books
  */
?>
<div class="well well-small">
	<h4>Sách bán chạy nhất </h4>
	<div class="row-fluid">
		<div id="featured" class="carousel slide">
			<div class="carousel-inner">
				<div class="item active">
					<ul class="thumbnails">
						
						<li class="span3">
							<div class="thumbnail">
								<i class="tag"></i>
								<a href="anh-sang-vo-hinh"><img src="webroot/img/home/anh-sang-vo-hinh.jpg" alt=""></a>
								<div class="caption">
									<div class="product-name"><p><h4>Ánh sáng vô hình</h4></p>
									</div>
									<h5><span>Anthony Doerr</span></h5>
								</div>
							</div>
						</li>
						<li class="span3">
							<div class="thumbnail">
								<i class="tag"></i>
								<a href="bien-doi-thay"><img src="webroot/img/home/bien-doi-thay.jpg" alt=""></a>
								<div class="caption">
									<div class="product-name"><p><h4>Biển đổi thay</h4></p>
									</div>
									<h5><span>Ernest Hemingway</span></h5>
								</div>
							</div>
						</li>
						<li class="span3">
							<div class="thumbnail">
								<i class="tag"></i>
								<a href="chuong-nguyen-hon-ai"><img src="webroot/img/home/chuong-nguyen-hon-ai.jpg" alt=""></a>
								<div class="caption">
									<div class="product-name"><p><h4>Chuông nguyện hồn ai</h4></p>
									</div>          
									<h5><span>Ernest Hemingway</span></h5>
								</div>
							</div>
						</li>
						<li class="span3">
							<div class="thumbnail">
								<i class="tag"></i>
								<a href="ong-gia-va-bien-ca"><img src="webroot/img/home/ong-gia-va-bien-ca.jpg" alt=""></a>
								<div class="caption">
									<div class="product-name"><p><h4>Ông già và biển cả</h4></p>
									</div>
									<h5><span>Ernest Hemingway</span></h5>
								</div>
							</div>
						</li> 
					</ul>
				</div>
				<div class="item">
					<ul class="thumbnails">
						<li class="span3">
							<div class="thumbnail">
								<i class="tag"></i>
								<a href="mot-voi-mot-la-ba"><img src="webroot/img/home/mot-voi-mot-la-ba.jpg" alt=""></a>
								<div class="caption">
									<div class="product-name"><p><h4>Một với một là ba</h4></p>
									</div>
									<h5><span>Hidehiko - Dave Trott</span></h5>
								</div>
							</div>
						</li>
						<li class="span3">
							<div class="thumbnail">
								<i class="tag"></i>
								<a href="nguoi-thap-sang-tam-hon"><img src="webroot/img/home/nguoi-thap-sang-tam-hon.jpg" alt=""></a>
								<div class="caption">
									<div class="product-name"><p><h4>Người thắp sáng tâm hồn</h4></p>
									</div>
									<h5><span>Andy Andrews</span></h5>
								</div>
							</div>
						</li>
						<li class="span3">
							<div class="thumbnail">
								<i class="tag"></i>
								<a href="nha-dao-tao-sanh-soi"><img src="webroot/img/home/nha-dao-tao-sanh-soi.jpg" alt=""></a>
								<div class="caption">
									<div class="product-name"><p><h4>Nhà đào tạo sành sỏi</h4></p>
									</div>
									<h5><span>Đỗ Huân</span></h5>
								</div>
							</div>
						</li>
						<li class="span3">
							<div class="thumbnail">
								<i class="tag"></i>
								<a href="troi-xanh-cua-tao"><img src="webroot/img/home/troi-xanh-cua-tao.jpg" alt=""></a>
								<div class="caption">
									<div class="product-name"><p><h4>Trời xanh của táo</h4></p>
									</div>
									<h5><span>Anthony Doerr</span></h5>
								</div>
							</div>
						</li>
						
					</ul>
				</div>
			</div>
			<a class="left carousel-control" href="#featured" data-slide="prev">‹</a>
			<a class="right carousel-control" href="#featured" data-slide="next">›</a>
		</div>
	</div>
</div>
<h4 style="margin-left: 20px;">Sách mới nhất <small><?php echo $this->Html->link('Xem tất cả ->', '/sach-moi',['class'=>'pull-right']); ?></small></h4>
<?php echo $this->element('books',['books'=>$books]) ?>

<?php //echo $this->element('menu_categories') ?>