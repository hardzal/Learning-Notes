<?php
namespace Bookstore\Domain;

class Book {
    private $isbn;
    private $title;
    private $author;
    private $available;
 
    public function __construct(int $isbn, string $title, string $author, int $available = 0) {
        $this->isbn = $isbn;
        $this->title = $title;
        $this->author = $author;
        $this->available = $available;
    }
/*
    public function getPrintableTitle(): string {
        $result = '<i>'.$this->title.',</i> - '. $this->author;
        if(!$this->available) {
            $result .= ' <b>[Not Available]</b>';
        }
        return $result;
    }
*/
/*
    public function __toString() {
        $result = '<i>'.$this->title.'</i> - '. $this->author;
        if(!$this->available) {
            $result .= ' <b>[Not Available]</b>';
        }
        return $result;
    }
    */
    public function getIsbn(): int {
        return $this->isbn;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function getAuthor(): string {
        return $this->author;
    }

    public function isAvailable(): bool {
        return $this->available;
    }

    public function getPrintableTitle(): string {
        $result = '<i>'.$this->title.',</i> - '. $this->author;
        if(!$this->available) {
            $result .= ' <b>[Not Available]</b>';
        }
        return $result;
    }

    private function getCopy(): bool {
        if($this->available < 1) {
            return false;
        } else {
            $this->available--;
            return true;
        }
    }

    public function callCopy(): string {
        if($this->getCopy()) {
            return "Here you copy<br/>";
        } else {
            return "I am afraid that book is not available<br/>";
        }
    }

    public function addCopy() {
        $this->available++;
    }
}

