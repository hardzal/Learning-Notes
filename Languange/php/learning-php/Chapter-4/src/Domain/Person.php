<?php

namespace Bookstore\Domain;

use Bookstore\Utils\Unique;

class Person {
    use Unique;

    protected $firstName;
    protected $lastName;
    protected $email;

    public function __construct(int $id, string $firstName, string $lastName, string $email) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->setId($id);
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