<?php
namespace Bookstore\Exceptions;

use Exception;

class NotFoundException extends Exception {
    public function __construct ($message = null) {
		$message = $message ?: 'Invalid id provided';
		parent::__construct($message);
	}
}