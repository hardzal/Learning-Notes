<?php
// namespace Bookstore\Domain;

// class Customer extends Person {
//  private $id;
//  private $email;
//  private static $lastId;
 
//  public function __construct(
//      int $id, 
//      string $firstname,
//      string $lastname,
//      string $email 
//      ) {
        
//         if($id == null) {
//             $this->id = ++self::$lastId;
//         } else {
//             $this->id = $id;
//             if($id > self::$lastId) {
//                 self::$lastId = $id;
//             }
//         }

//         parent::__construct($firstname, $lastname);
//         $this->email =  $email;
//     }
    
//  // calling static properties
//  // to calling static method use Customer::getLastId()
//  public static function getLastId(): int {
//      return self::$lastId;
//  }
//  public function getId(): int {
//      return $this->id;
//  }

//  public function getEmail(): string {
//      return $this->email;
//  }

//  public function setEmail(string $email) {
//      $this->email = $email;
//  }

// }

namespace Bookstore\Domain;

interface Customer extends Payer{
    public function getMonthlyFee() : float;
    public function getAmountToBorrow() : int;
    public function getType() : string;
}

