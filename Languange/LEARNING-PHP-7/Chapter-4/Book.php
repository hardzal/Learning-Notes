<?php
class Book {
    public $isbn;
    public $title;
    public $author;
    public $available;
 
    public function __construct(int $isbn, string $title, string $author, int $available = 0) {
        $this->isbn = $isbn;
        $this->title = $title;
        $this->author = $author;
        $this->available = $available;
    }

    public function getPrintableTitle(): string {
        $result = '<i>'.$this->title.',</i> - '. $this->author;
        if(!$this->available) {
            $result .= ' <b>[Not Available]</b>';
        }
        return $result;
    }

    public function getCopy(): bool {
        if($this->available < 1) {
            return true;
        } else {
            $this->available--;
            return false;
        }
    }
}

