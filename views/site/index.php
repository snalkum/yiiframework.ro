<?php
/**
 * @var yii\web\View $this
 */
$this->title = 'YiiFrameWork.ro';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="news">
   <?php for($i=0; $i<count($news); ++$i):?>
    <div class="title"><?php echo $news[$i]['title']; ?><br /></div>
    <div class="content"><?php echo $news[$i]['content']; ?></div>
   <?php endfor; ?>
</div>