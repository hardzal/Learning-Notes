<?php
// if using 'as' keyword change the name object classes like the name of it
use Bookstore\Domain\Book;
use Bookstore\Domain\Customer;

function autoload($className) {
    $lashSlash  = strpos($className, '\\') + 1;
    $className  = substr($className, $lashSlash);
    $directory  = str_replace('\\', '/', $className);
    $fileName   = __DIR__.'/src/'.$directory.'.php';
    require_once($fileName);
}

spl_autoload_register('autoload');

// $book = new Book(9785267006323, "1984", "George Orwell", 12);
// $customer = new Customer();

/*
$book->title = "1984";
$book->author = "George Orwell";
$book->isbn = 9785267006323;
$book->available = 12;
*/

/*
$book = new Book(5311312, 'Judul Buku', 'Author Name');
// assignment __toString
$string = (string) $book;

// calling __toString
echo $string."<br>";
*/
// using namespace
// cara pertama

/*
$book1 = new Bookstore\Domain\Book(978526700, '1984', "George Orwell", 12);
$book2 = new  Bookstore\Domain\Book(921312222, "To Kill a Mockingbird", "Harper Lee", -1);

$customer1 = new  Bookstore\Domain\Customer(1, 'John', 'Doe', 'johndoe@email.com');
$customer2 = new  Bookstore\Domain\Customer(2, 'Mary', 'Poppins', 'mp@email.com');

echo $book1->callCopy();
echo $book2->callCopy();
*/

$customer3 = new  Customer(3, 'Doers', 'Johnny', 'doersjohn@email.com');
$customer4 = new  Customer(0, 'James', 'Bond', '007@email.com');
$customer5 = new  Customer(7, 'Kaname', 'Ito','kanamito@mail.jp');

$book = new Book(978526723, "1984", "George Orwell", 1);

echo $book->callCopy();
// add book
$book->addCopy();
echo $book->callCopy();
echo $customer3::getLastId()."<br/>";
echo Customer::getLastId();