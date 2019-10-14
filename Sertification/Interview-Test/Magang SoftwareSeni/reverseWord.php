<?php

$input = readline();

$result = array();
$temp = "";
$input .= " ";

for ($i = 0; $i < strlen($input); $i++) {
    if ($input[$i] == ' ') {
        $result[] = $temp;
        $temp = "";
    } else {
        $temp .= $input[$i];
    }
}

for ($i = count($result) - 1; $i >= 0; $i--) {
    echo $result[$i] . " ";
}
