<?php include __DIR__ . "/../layout/header.php"?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $post['title'] ?></h3>
    </div>
    <div class="panel-body">
        <?php echo nl2br($post['content']); ?>
    </div>
</div>

<?php include __DIR__ . "/../layout/footer.php"?>
