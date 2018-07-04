<?php
use Bookstore\Domain\Book;
use Bookstore\Domain\Customer;
use Bookstore\Domain\Customer\Basic;
use Bookstore\Domain\Customer\Premium;
use Bookstore\Domain\Payer;
use Bookstore\Domain\Person;

function __autoload($className) {
    $lashSlash  = strpos($className, '\\') + 1;
    $className  = substr($className, $lashSlash);
    $directory  = str_replace('\\', '/', $className);
    $fileName   = __DIR__.'/src/'.$directory.'.php';
    require_once($fileName);
}

//$book1 = new Book("1984", "George Orwell", 9785267006323, 12);
//$customer1 = new Customer(5, 'John', 'Doe', 'johndoe@mail.com');

//echo $book1->callCopy();
//echo Customer::getLastId().nl2br("\n");


class Parents {
    public function sayHi() {
        echo "Hi, I am parent.<br>";
    }
}

class Childs extends Parents{
    public function sayHi() {
        echo "Hi, I am a child!<br>";
    }

    public function callParentSelf() {
        parent::sayHi();
    }
}

$parents = new Parents();
$childs = new Childs();

echo $parents->sayHi();
echo $childs->sayHi();
echo $childs->callParentSelf();

/*
abstract class Customer extends Person {
  abstract public function getMontlyFee();
  abstract public function getAmountToBorrow();
  abstract public function getType();
 }
*/

function checkIfValid(Customer $customer, array $books): bool {
    return $customer->getAmountToBorrow() >= count($books);
}

// $customer2 = new Basic(5, 'John', 'Deep', 'johnydeep@mail.com');
// var_dump(checkIfValid($customer2, [$book1]));
// $customer3 = new Customer(7, 'Lelei', 'Coda', 'leleil@mail.com');
// var_dump(checkIfValid($customer3, [$book1]));

$basic = new Basic(1, "Are", "Kara", "Email");
$premium = new Premium(2, "namae", "wa dare", "email here");
var_dump($basic instanceof Basic);
var_dump($basic instanceof Premium);
var_dump($premium instanceof Basic);
var_dump($premium instanceof Premium);
var_dump($basic instanceof Customer);
var_dump($basic instanceof Person);
var_dump($basic instanceof Payer);
