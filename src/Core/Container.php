<?php

namespace App\Core;

use PDO;
use Exception;
use PDOException;
use App\Post\PostsController;
use App\Post\PostsRepository;

class Container
{

    private $receipts = [];
    private $instances = [];

    public function __construct() {
        $this->receipts = [
            'postsController' => function() {
                return new PostsController(
                    $this->make("postsRepository")
                );
            },
            'postsRepository' => function() {
                return new PostsRepository(
                    $this->make("pdo")
                );
            },
            'pdo' => function() {
                try {
                    $pdo = new PDO(
                        'mysql:host=localhost;dbname=blog;charset=utf8',
                        'root',
                        'root');
                } catch (PDOException $e) {
                    echo "Verbindung zur Datenbank ist fehlgeschlagen!";
                    die();
                }

                $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                return $pdo;
            }
        ];
    }

    public function make($name)
    {
        if (!empty($this->instances[$name]))
        {
            return $this->instances[$name];
        }

        if (isset($this->receipts[$name]))
        {
            $this->instances[$name] = $this->receipts[$name]();
        }

        return $this->instances[$name];
    }
    /*
    private $pdo;
    private $postsRepository;

    public function getPdo()
    {
        if (!empty($this->pdo)) {
            return $this->pdo;
        }
        $this->pdo = new PDO(
            'mysql:host=localhost;dbname=blog;charset=utf8',
            'root',
            'root');

        $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        return $this->pdo;
    }

    public function getPostsRepository()
    {
        if (!empty($this->getPostsRepository)) {
            return $this->getPostsRepository;
        }
        return new PostsRepository($this->getPdo());
    }
    */
}



?>