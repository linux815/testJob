<?php use yii\helpers\Html; ?>
<?php use yii\helpers\ArrayHelper; ?>
<?php use yii\bootstrap\ActiveForm; ?>
<?php use yii\helpers\Url; ?>

<?php
$this->title = 'Create new author';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-contact">
<div class="row">
    <div class="col-lg-5">

<?php $form = ActiveForm::begin(['id' => 'add-form']); ?>
    <?php echo $form->field($model, 'firstName')->textInput(); ?>
    <?php echo $form->field($model, 'lastname')->textArea(); ?>
    <?php echo $form->field($model, 'pseudonym')->textInput(); ?>
    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'add-button']) ?>
    </div>
<?php ActiveForm::end(); ?>

    </div>
</div>
</div>