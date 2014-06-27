<?php
   use yii\helpers\Html;
   use yii\widgets\ActiveForm;


 $form = ActiveForm::begin([
    'id' => 'form',
    'options' => ['class' => 'form-vertical'],
]) ?>
<div class="col-lg-4 col-lg-offset-4">
    <?= $form->field($model, 'title'); ?>
    <?= $form->field($model, 'content')->textArea(['rows' => 6]); ?>
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
        <div class=" col-lg-11">
            <?= Html::submitButton('Update', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
</div>
<?php  ActiveForm::end() ?>