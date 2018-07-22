<?php
namespace Bookstore\Utils;

trait Unique {
    private static $lastId = 0;
    protected $id;

    public function setId(int $id) {
        if (empty($id)) {
            $this->id = ++self::$lastId;
        } else {
            $this->id = $id;
            if($id > self::$lastId) {
                self::$lastId = $id;
            }
        }
    }

    public function getLastId(): int {
        return self::$lastId;
    }

    public function getId(): int {
        return $this->id;
    }
    
}