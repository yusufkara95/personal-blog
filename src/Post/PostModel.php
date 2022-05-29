<?php

namespace App\Post;

use ArrayAccess;

class PostModel implements ArrayAccess
{
    public $id;
    public $title;
    public $content;

    public function offsetExists($offset): bool
    {
        return isset($this->$offset);
    }

    public function offsetGet(mixed $offset): mixed
    {
        return $this->$offset;
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        $this->$offset = $value;
    }

    public function offsetUnset(mixed $offset): void
    {
        unset($this->$offset);
    }
}

?>