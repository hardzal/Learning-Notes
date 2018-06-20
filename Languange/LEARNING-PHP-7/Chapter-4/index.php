<?php
require_once "Book.php";
require_once "Customer.php";

$book = new Book(9785267006323, "1984", "George Orwell", 12);
$customer = new Customer();
/*

$book->title = "1984";
$book->author = "George Orwell";
$book->isbn = 9785267006323;
$book->available = 12;

*/

if($book->getCopy()) {
    echo "Here you copy";
} else {
    echo "I am afraid that book is not available";
}
