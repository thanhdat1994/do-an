<!-- update 05/10 không cần thiết khi default.ctp có form tìm kiếm rồi -->
<!--
<?php echo $this->Form->create('Books',['url'=>['action'=>'get_keyword'],'novalidator'=>true]); ?>
<fieldset>
	<?php echo $this->Form->input('keyword',['label'=>'','placeholder'=>'Gõ vào từ khóa để tìm kiếm...','error'=>false]); ?>
	<button type="submit" class="btn btn-danger">Tìm kiếm</button>
</fieldset>
<?php echo $this->Form->end(); ?>
-->
<!-- Hiển thị thông báo lỗi -->
<?php if (isset($errors)) {
	foreach ($errors as $error) {
		echo $error[0];
	}
} ?>


<!-- Hiển thị kết quả tìm kiếm -->
<?php if($notfound == false && isset($results)): ?>
	Kết quả tìm kiếm của từ khóa <strong><?php echo $keyword ?></strong><br>
	<?php echo $this->element('books',['books'=>$results]); ?>
	<?php echo $this->element('pagination',['object'=>'quyển sách']); ?>
<?php elseif($notfound): ?>
	Không tìm thấy quyển sách này!
<?php endif ?>