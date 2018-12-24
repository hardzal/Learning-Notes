<?php

$timestamp = time();
$date =  date('d-M-Y', $timestamp);
$datetime = date('d-M-Y h:i:s', $timestamp);

echo "Unix timestamp: ".$timestamp."<br>";
echo "Human-readable date: ".$date."<br>";
echo "Human-readable datetime: ".$datetime."<br>";

echo "Day name: ". date('l', $timestamp) ."<br>";
echo "Day number of week: ". date('N', $timestamp)."<br>";
echo "Day number of yeaer: ". date('z', $timestamp)."<br>";
echo "Month number of year: ". date('W', $timestamp)."<br>";

echo date('w', $timestamp)." ".date('n', $timestamp)." ".date('Z', $timestamp);

