<?php
namespace Bookstore\Domain;

class Customer {
 private $id;
 private $firstName;
 private $lastName;
 private $email;
 private static $lastId;
 public function __construct(
     int $id, 
     string $firstname,
     string $lastname,
     string $email 
     ) {
        if($id == null) {
            $this->id = ++self::$lastId;
        } else {
            $this->id = $id;
            if($id > self::$lastId) {
                self::$lastId = $id;
            }
        }

        $this->firstName = $firstname;
        $this->lastName = $lastname;
        $this->email =  $email;
    }
 // calling static properties
 // to calling static method use Customer::getLastId()
 public static function getLastId(): int {
     return self::$lastId;
 }
 public function getId(): int {
     return $this->id;
 }

 public function getFirstName(): string {
     return $this->firstName;
 }

 public function getLastName(): string {
     return $this->lastName;
 }

 public function getEmail(): string {
     return $this->email;
 }

 public function setEmail(string $email) {
     $this->email = $email;
 }

}