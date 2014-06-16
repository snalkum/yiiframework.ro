<?php
/**
 * @var yii\web\View $this
 */

use app\models\User;
use yii\helpers\Url;
$this->title = 'YiiFrameWork.ro';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="news">
   <?php for($i=0; $i<count($news); ++$i):?>
    <div class="title"><?php echo $news[$i]['title']; ?> 
        <?php if( (!Yii::$app->user->isGuest) ): ?> 
        <a href="<?php echo Url::toRoute("/news/edit") . "&id=" . $news[$i]['id']; ?>"> Edit</a> 
        <?php endif; ?><br /></div>
    <div class="content"><?php echo $news[$i]['content']; ?></div>
   <?php endfor; ?>
</div>