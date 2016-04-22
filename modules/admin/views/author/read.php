<?php use yii\helpers\Html; ?>

<?php
$this->title = 'Read author';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="pull-left btn-group">
    <?php echo Html::a('Edit', array('author/update', 'id' => $data->id), array('class' => 'btn btn-primary')); ?>
    <?php echo Html::a('Delete', array('author/delete', 'id' => $data->id), array('class' => 'btn btn-danger')); ?>
</div>

<div class="clearfix"></div>

<h1><?php echo $data->firstName . " " . $data->lastname; ?></h1>

<hr />

<p><?php echo "Pseudonym: " . $data->pseudonym; ?></p>