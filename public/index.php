<?php
require __DIR__ . "/../init.php";

$pathInfo = $_SERVER['REQUEST_URI'];

var_dump($pathInfo);

if ($pathInfo == "/index") {
    $postsController = $container->make("postsController");
    $postsController->index();
} elseif ($pathInfo == "/post") {
    $postsController = $container->make("postsController");
    $postsController->show();
}

?>