<?php
   use yii\helpers\Html;
   use yii\widgets\ActiveForm;


 $form = ActiveForm::begin([
    'id' => 'register-form',
    'options' => ['class' => 'form-horizontal'],
]) ?>
    <?= $form->field($model, 'username'); ?>
    <?= $form->field($model, 'password')->passwordInput(); ?>
    <?= $form->field($model, 'repassword')->passwordInput()->label('Retype Password'); ?>
<?= $form->field($model, 'email') ?>
    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Register!', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
<?php  ActiveForm::end() ?>