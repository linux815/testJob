<?php use yii\helpers\Html; ?>
<?php use yii\helpers\ArrayHelper; ?>
<?php use yii\bootstrap\ActiveForm; ?>
<?php use yii\helpers\Url; ?>
<?php use app\modules\admin\models\Author; ?>

<?php
$this->title = 'Create new book';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-contact">
<div class="row">
    <div class="col-lg-5">

<?php $form = ActiveForm::begin(['id' => 'add-form']); ?>
    <?php echo $form->field($model, 'title')->textInput(); ?>
    <?php echo $form->field($model, 'text')->textArea(); ?>
    <?php echo $form->field($model, 'year')->textInput(); ?>
    <?php echo $form->field($model, 'author_id')->dropDownList(ArrayHelper::map(Author::find()->all(), 'id', 'lastname')) ?>
    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'add-button']) ?>
    </div>
<?php ActiveForm::end(); ?>

    </div>
</div>
</div>