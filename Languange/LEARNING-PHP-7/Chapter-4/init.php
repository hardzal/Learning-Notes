<?php
use Bookstore\Domain\Book;
use Bookstore\Domain\Customer;

function __autoload($className) {
    $lashSlash  = strpos($className, '\\') + 1;
    $className  = substr($className, $lashSlash);
    $directory  = str_replace('\\', '/', $className);
    $fileName   = __DIR__.'/src/'.$directory.'.php';
    require_once($fileName);
}

$book1 = new Book("1984", "George Orwell", 9785267006323, 12);
$customer1 = new Customer(5, 'John', 'Doe', 'johndoe@mail.com');

echo $book1->callCopy();
echo Customer::getLastId();