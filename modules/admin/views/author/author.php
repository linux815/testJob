<?php use yii\helpers\Html; ?>

<?php
$this->title = 'All authors';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php echo Html::a('Create New Author', array('author/create'), array('class' => 'btn btn-primary pull-left')); ?>
<div class="clearfix"></div>
<hr />

<?php if(Yii::$app->session->hasFlash('DeletedError')): ?>
<div class="alert alert-error">
    There was an error deleting your post!
</div>
<?php endif; ?>

<?php if(Yii::$app->session->hasFlash('DeletedDone')): ?>
<div class="alert alert-success">
    Your post has successfully been deleted!
</div>
<?php endif; ?>

<table class="table table-striped table-hover">
    <tr>
        <td>Count book</td>
        <td>FirstName</td>
        <td>LastName</td>
        <td>Pseudonym</td>
        <td>Actions</td>
    </tr>
    <?php foreach ($data as $author): ?>
        <tr>
            <td>
                <?php echo Html::a($author['count'], array('author/read', 'id'=>$author['id'])); ?>
            </td>
            <td><?php echo Html::a($author['firstname'], array('author/read', 'id'=>$author['id'])); ?></td>
            <td><?php echo $author['lastName']; ?></td>
            <td><?php echo $author['pseudonym']; ?></td>
            <td>
                <?php echo Html::a('Edit', array('author/update', 'id'=>$author['id']), array('class'=>'icon icon-edit')); ?>
                <?php echo Html::a('Delete', array('author/delete', 'id'=>$author['id']), array('class'=>'icon icon-trash')); ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>