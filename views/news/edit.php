<?php
   use yii\helpers\Html;
   use yii\widgets\ActiveForm;


 $form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['class' => 'form-horizontal'],
]) ?>
    <?= $form->field($model, 'title'); ?>
    <?= $form->field($model, 'content'); ?>
    <?php 
        if(isset($validated)){
            if($validated){
                echo 'Saved news';
            } else{
                echo 'Problem saving the news content';
            }
            
        }
        
    ?>
    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Update', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
<?php  ActiveForm::end() ?>