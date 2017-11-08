<?php
/**
* @var \App\View\AppView $this
* @var \App\Model\Entity\Writer[]|\Cake\Collection\CollectionInterface $writers
*/
?>

<h2><?php echo __('Các tác giả'); ?></h2>
<p>
<?php echo $this->Paginator->sort('name','Sắp xếp theo tên'); ?>
</p>
<p>
<?php foreach($writers as $writer):
    echo $writer['name'];
    echo "<br>";
    endforeach; 
?>
</p>

<?php echo $this->element('pagination',['object'=>'tác giả']); ?>
