<?php use yii\helpers\Html; ?>

<?php
$this->title = 'All book and authors';
$this->params['breadcrumbs'][] = $this->title;
?>

<h2>All books and authors</h2>
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
        <td>Title</td>
        <td>Year</td>
        <td>Name author</td>
    </tr>
    <?php foreach ($data as $book): ?>
        <tr>
            <td><?php echo $book['title']; ?></td>
            <td><?php echo $book['year']; ?></td>
            <td><?php echo $book['firstname']." \" ".$book['pseudonym']." \" ".$book['lastName']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>