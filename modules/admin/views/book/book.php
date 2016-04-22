<?php use yii\helpers\Html; ?>

<?php
$this->title = 'All book';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php echo Html::a('Create New Book', array('book/create'), array('class' => 'btn btn-primary pull-left')); ?>
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
        <td>#</td>
        <td>Title</td>
        <td>Year</td>
        <td>Name author</td>
        <td>Actions</td>
    </tr>
    <?php foreach ($data as $book): ?>
        <tr>
            <td>
                <?php echo Html::a($book['id'], array('book/read', 'id'=>$book['id'])); ?>
            </td>
            <td><?php echo Html::a($book['title'], array('book/read', 'id'=>$book['id'])); ?></td>
            <td><?php echo $book['year']; ?></td>
            <td><?php echo $book['firstname']." \" ".$book['pseudonym']." \" ".$book['lastName']; ?></td>
            <td>
                <?php echo Html::a('Edit', array('book/update', 'id'=>$book['id']), array('class'=>'icon icon-edit')); ?>
                <?php echo Html::a('Delete', array('book/delete', 'id'=>$book['id']), array('class'=>'icon icon-trash')); ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>