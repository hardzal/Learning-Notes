<?php 

$currentDate = new DateTime();
$targetDate = new DateTime('19-01-2038');

$timeLeft  = $currentDate->diff($targetDate);

$yearsLeft = $timeLeft->y;
$monthsLeft = $timeLeft->m;
$daysLeft = $timeLeft->d;
$hoursLeft = $timeLeft->h;
$minutesLeft = $timeLeft->i;
$secondLeft = $timeLeft->s;

echo "Timeleft to Unix timestamp overflow in 32 bits systems:";
echo "| $yearsLeft years | $monthsLeft months | $daysLeft days | $hoursLeft hours | $minutesLeft minutes | $secondLeft seconds |";