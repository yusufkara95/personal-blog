<?php include("../database.php"); ?>
<?php include("elements/header.php"); ?>

    <h1>Hello, world!</h1>
    <p class="lead">Das hier ist die Startseite des Blogs.</p>

    <?php
        $res = fetch_posts();
    ?>

    <ul>
        <?php foreach ($res AS $row): ?>
        <li>
            <a href="post.php?title=<?php echo $row["title"]; ?>">

            <?php echo $row["title"]; ?>
            </a>
        </li>
        <?php endforeach; ?>
    </ul>

<?php include("elements/footer.php"); ?>
