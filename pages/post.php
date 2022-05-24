<?php include("../init.php"); ?>
<?php include("elements/header.php"); ?>

<?php
    $postsRepository = new App\Post\PostRepository();
    $id = $_GET['id'];
    $post = $postsRepository->fetchPost($id);
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $post["title"]; ?></h3>
    </div>
    <div class="panel-body">
        <?php echo $post["content"]; ?>
    </div>
</div>

<?php include("elements/footer.php"); ?>
