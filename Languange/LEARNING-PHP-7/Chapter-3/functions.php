<?php
// declare(strict_types = 1);

// function addNumbers(int $a, int $b, bool $printSum): int {
// 	$sum =  $a + $b;
// 	if($printSum) {
// 		echo "The sum is ". $sum. "<br/>";
//     }
// 	return $sum;
// }

// addNumbers(1, 2, true);
// addNumbers(1, 3, true); // fails
// // addNumbers(1, 'something', true); // it always fails
// addNumbers(3, 4, false);

function loginMessage() {
	if (isset($_COOKIE['username'])) {
		return "You are " . $_COOKIE['username'];
	} else {
		return "You are not authenticated.";
	}
}

function printAbleTitle(array $book): string {
	$result = '<i>'. $book['title'] . '</i> - '. $book['author'];
	if(!$book['available']):
		$result .= ' [<b>Not Available</b>]';
	else:
		$result .= ' [<b>Available</b>]';
	endif;

	return $result;
}
function bookingBook(array &$books, string &$title): bool {
	foreach($books as $key => $book) {
	 if($book['title'] == $title) {
	  if($book['available']) {
	   $books[$key]['available']  = false;
	   return true;
	  } else {
	   return false;
	  }
	 }
	}
	return false;
}

function updateBook(array $books) {
	$booksJson  = json_encode($books);
	file_put_contents(__DIR__.'/books.json', $booksJson);
}
?>