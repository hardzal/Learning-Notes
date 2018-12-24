<?php
use Bookstore\Domain\Book;
use Bookstore\Domain\Customer;
use Bookstore\Domain\Customer\Basic;
use Bookstore\Domain\Customer\Premium;
use Bookstore\Domain\Payer;
use Bookstore\Domain\Person;
use Bookstore\Utils\Unique;
use Bookstore\Exceptions\ExceededMaxAllowedException;
use Bookstore\Exceptions\InvalidIdException;
use Bookstore\Exceptions\NotFoundException;
use Bookstore\Domain\Customer\CustomerFactory;
use Bookstore\Utils\Config;


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

echo "<br>";

$basic1 = new Basic(5, "Nande", "suka", "email@mail.com");
$basic2 = new Basic(9, "kimi no", "namaewa", "email@Mail.com");
var_dump($basic1->getId()); // 5
var_dump($basic2->getId()); // 9
$basic1 = new Basic(1, "Anata", "wa dare", "imaile@desu.com");
var_dump($basic->getId());

$basic3 = new Basic(1, 'name', 'surname', 'email');
$premium1 = new Premium(2, 'name', 'surname', 'email');
var_dump(Person::getLastId()); // 
var_dump(Unique::getLastId()); // 
var_dump(Basic::getLastId()); // 
var_dump(Premium::getLastId()); //

trait Sign {
    public function contract() {
        echo "Start a new Sign!";
    } 
}

trait Log {
    public function contract() {
        echo "Start a new Log";
    }
}

class Manager {
    use Sign, Log {
        Sign::contract insteadof Log;
        Log::contract as makeAlog;
    }
}

$manager = new Manager;
// override
echo "<br>";
$manager->contract();
echo "<br>";
$manager->makeAlog();


function createBasicCustomer(int $id) {
    try {
        echo nl2br("\nTrying to create a new customer with id $id\n");
        return new Basic($id, "name", "surname", "email");
    } catch (Exception $er){
        echo 'Unknown exception: '. $er->getMessage() .nl2br("\n");
    } catch(InvalidIdException $er) {
        echo "You cannot provide a negative id.\n";
    } catch (ExceededMaxAllowedException $er) {
        echo "No more customers are allowed.\n";
    } 
}

createBasicCustomer(1);
createBasicCustomer(-3);
createBasicCustomer(51);
echo "<br>";
CustomerFactory::factory('basic', 2, 'mary', 'poppins', 'mary@poppins.com');
CustomerFactory::factory('premium', 3, 'james', 'bond', 'james@bond.com');

echo "<br>";

// # not fixed
// $config =  Config::getInstance();
// $dbConfig = $config->get('db');
// var_dump($dbConfig);



$addTaxes = function (array &$book, $index, $percentage) {
    $book['price'] += round($percentage * $book['price'], 2);
};

function addTaxes(array &$book, $index, $percentage) {
    if(isset($book['price'])) {
        $book['price'] += round($percentage * $book['price'], 2);
    }
}

class Taxes {
	public static function add(array &$book, $index, $percentage) {
		if(isset($book['price'])) {
            $book['price'] += round($percentage * $book['price'], 2); 
		}	
    }
    
    public function addTaxes(array &$book, $index, $percentage) {
		if(isset($book['price'])) {
            $book['price'] += round($percentage * $book['price'], 2); 
		}	
    }
}

$books = [
	['title' => '1984', 'price' => 8.15],
	['title' => 'Don Quijote', 'price' => 12.00],
	['title' => 'Odyssey', 'price' => 3.55]
];
// normal
print_r($books);
echo "<br><br>";

// anonymous functions
array_walk($books, $addTaxes,  0.16);
var_dump($books);

echo "<br><br>"; 

// normal functions
array_walk($books, 'addTaxes',  0.16);
var_dump($books);

echo "<br><br>"; 

// static class method
array_walk($books, ['Taxes', 'add'], 0.16);
var_dump($books);

echo "<br><br>"; 

// class method
array_walk($books, [new Taxes(), 'addTaxes'], 0.16);
var_dump($books);

echo "<br><br>"; 

$percentage = 0.16;
$addTaxes = function (array &$book, $index) use ($percentage) {
	if(isset($book['price'])) {
        $book['price'] += round($percentage * $book['price'], 2); 
	}
};

$percentage = 10000;
array_walk($books, $addTaxes);
var_dump($books);

// # not fixed
// $dbConfig = Config::getInstance();
// $dbConfig->get('db');
// $db = new PDO('mysql:host=localhost;dbname=bookstore', 
//     $dbConfig['user'], 
//     $dbCnfig['password']
// );
// $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
try {
    // $db = new PDO("mysql:host=localhost;dbname=bookstore", "root", "");
    // $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    echo "<br>Sukses!";

    echo "<br>";
    // not secure
    // $q = $db->query("SELECT * FROM book");
    // foreach($q as $data){
    //     echo "<pre>";print_r($data);echo "</pre>";
    // }
    // $query = 'INSERT INTO book (isbn, title, author, price) VALUES ("9788187981954", "Peter Pan", "J. M. Barrie", 2.34)';
    // $result = $db->exec($query);
    // var_dump($result); // false
    // $error = $db->errorInfo()[2];
    // var_dump($error); // Duplicate entry '9788187981954' for key 'isbn'
    echo "<br><br><br>";
    //// prepare statements

    // $query = 'SELECT * FROM book WHERE author = :author';
    // $statement = $db->prepare($query);
    // $statement->bindValue('author', 'George Orwell');
    // $statement->execute();
    // $rows = $statement->fetchAll();
    // echo "<pre>";print_r($rows); echo "</pre>";

    // $query = "INSERT INTO book(isbn, title, author, price) VALUES(:isbn, :title, :author, :price)";
    // $stmnt = $db->prepare($query);
    // $params = [ ':isbn' => '9781412108614', ':title' => 'lliad', ':author' => 'Homer', ':price' => 9.25];
    // $stmnt->execute($params);
    // echo $db->lastInsertId(); // 8

    // function addBook(int $id, int $amount = 1): void {
    //     $db = new PDO('mysql:host=127.0.0.1;dbname=bookstore','root','');
        
    //     $query = 'UPDATE book SET stock = stock + :n WHERE id = :id';
    //     $statement = $db->prepare($query);
    //     $statement->bindValue('id', $id);
    //     $statement->bindValue('n', $amount);
        
    //     if(!$statement->execute()) {
    //         throw new Exception($statement->errorInfo()[2]);
    //     }
    // }

    // try { 
    //     addBook(2, 5); 
    //     echo "<strong>Berhasil Menambahkan Buku!</strong>";
    // } catch(Exception $re) {
    //     echo $re->getMessage();
    // }
} catch(PDOException $e) {
    echo "<br>Error: ". $e->getMessage();
}

function addSale(int $userId, array $bookIds): void {
	$db = new PDO(
		'mysql:host=127.0.0.1;dbname=bookstore',
		'root',
		'');
	$db->beginTransaction();
	try {
        $query = 'INSERT INTO sale(customer_id, date) VALUES(:id, NOW())';
        $statement = $db->prepare($query);
        if(!$statement->execute(['id' => $userId])) {
            throw new Exception($statement->errorInfo()[2]);
        }
        $saleId  = $db->lastInsertId();
        $query = 'INSERT INTO sale_book(book_id, sale_id) VALUES(:book, :sale)';
        $statement = $db->prepare($query);
        $statement->bindValue('sale', $saleId);
        foreach($bookIds as $bookId) {
            $statement->bindValue('book', $bookId);
            if(!$statement->execute()) {
                throw new Exception($statement->errorInfo()[2]);
            }
        }
        $db->commit();
        echo "<br>Sukses Menambahkan data!";
	} catch(Exception $e) {
		$db->rollBack();
		throw $e;
	}
}

try {
	addSale(1, [1, 2, 200]);
} catch(Exception $e) {
	echo 'Error adding sale: '. $e->getMessage();
}