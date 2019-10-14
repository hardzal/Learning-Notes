<?php
$word = readline();
$freq = array();

for ($i = 0; $i < strlen($word); $i++) {
    if (!array_key_exists($word[$i], $freq)) {
        $freq[$word[$i]] = 0;
    }
    $freq[$word[$i]] = $freq[$word[$i]] + 1;
}

foreach ($freq as $key => $value) {
    echo "$key" . "$value";
}
