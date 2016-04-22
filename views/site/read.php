<?php use yii\helpers\Html; ?>

<?php
$this->title = 'Read book';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="pull-left btn-group">
    <?php echo Html::a('Edit', array('book/update', 'id' => $data->id), array('class' => 'btn btn-primary')); ?>
    <?php echo Html::a('Delete', array('book/delete', 'id' => $data->id), array('class' => 'btn btn-danger')); ?>
</div>

<div class="clearfix"></div>

<h1><?php echo $data->title . " (" . $data->year . ")"; ?></h1>

<hr />

<p><?php echo $data->text; ?></p>