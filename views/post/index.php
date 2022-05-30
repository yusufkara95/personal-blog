<?php include __DIR__ . "/../layout/header.php"; ?>
<br>
<br>

<ul>
    <?php foreach ($posts AS $row): ?>
        <li>
            <a href="post.php?id=<?php echo $row->id; ?>">

                <?php echo $row->title; ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>

<?php include __DIR__ . "/../layout/footer.php"; ?>
