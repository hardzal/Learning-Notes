<?php
// Scalar type hints
// Return type hints
// Anonymous classes
// Generator delegation
// Generator return expressions
// The null coalesce operator
// The spaceship operator
// Constant arrays
// Uniform variable syntax
// Throwables
// Group use declarations
// Class constant visibility modifiers
// Catching multiple exceptions types
// Iterable pseudo-type
// Nullable types
// Void return types

// scalar type hints
// return type hints
function checkEven(int $number): bool {
    if(!($number % 2)) {
        return true;
    } 
    return false;

    // int, float, string, bool
}

var_dump(checkEven(10));
// return objects
class A {}
class B extends A {}
class C extends B {}

function getInstance(string $type): A {
    if($type == 'A') {
        return new A();
    } else if ($type == 'B') {
        return new B();
    } else {
        return new C();
    }
}

var_dump(getInstance("C"));


// Anonymous Classes

$obj1 = new class() {};
$obj2 = new class($a = "", $b = "") {
    private $a;
    private $b;
    public function __construct($a, $b)
    {
        $this->a = $a;
        $this->b = $b;
    }
};

interface Salary {
    public function pay();
}

trait Util {
    public function format(float $number) {
        return number_format($number, 2);
    }
}

class User {
    private $IBAN;
    protected $salary;
    public function __construct($IBAN, $salary)
    {
        $this->IBAN = $IBAN;
        $this->salary = $salary;
    }

   public function salary() {
        return new class($this->IBAN, $this->salary) implements Salary {
            use Util;
            private $_IBAN;
            protected $_salary;

            public function __construct($IBAN, $salary) {
                $this->_IBAN = $IBAN;
                $this->_salary = $salary;
            }

            public function pay() {
                echo $this->_IBAN . ' '. $this->format($this->_salary);
            }            
        }; 
    }
}
echo "<br><br>";
$user = new User('GB29NWBK60161331926819', 4500.00);
$user->salary()->pay();
//
echo "<br>";
class Users {}
class Salaries {}

function gen() {
    return new class() {};
}

$obj = new class() {};
$obj2 = new class() {};
$obj3 = new class() extends Users {};
$obj4 = new class() extends Salaries {};
$obj5 = gen();
$obj6 = gen();
echo get_class($obj); // class@anonymous/var/www/index.php0x27fe03a
echo get_class($obj2); // class@anonymous/var/www/index.php0x27fe052
echo get_class($obj3); // class@anonymous/var/www/index.php0x27fe077
echo get_class($obj4); // class@anonymous/var/www/index.php0x27fe09

echo get_class($obj5); // class@anonymous/var/www/index.php0x27fe04f
echo get_class($obj6); // class@anonymous/var/www/index.php0x27fe04f
for ($i=0; $i<=5; $i++) {
    echo get_class(new class() {}); // 5 xclass@anonymous/var/www/index.php0x27fe2d3
}