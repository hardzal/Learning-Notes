<?php
/**
* Checks if the given parameters are set. If one of the specified parameters
* is not set, die() is called.
*
* @param $parameters The parameters to check.
*/

function checkGETParametersOrDie($parameters) {
	foreach($parameters as $parameter) {
		isset($_GET[$parameter]) || die("Please, provide {$parameter} parameter");
	}
}


/**
* Gets the GET parameters.
*
* @return GET parameter string.
*/
function stringifyParameters() {
    $parameters = '?';

    foreach($_GET as $key => $value) {
        $key = urlencode($key);
        $value = urlencode($value);

        $parameters .= "$key=$value&";
    }

    rtrim($parameters, '&');
    return $parameters;
}

/**
* Creates the cURL request for the given URL.
*
* @param $url The URL to create the request to.
* @return The cURL request to the url; false if an error occurs.
*/
function createCurlRequest($url) {
    $curl = curl_init();

    if(!$curl) {
        return false;
    }

    $configured = curl_setopt_array($curl, [
        CURLOPT_URL => $url . stringifyParameters(), CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_RETURNTRANSFER => true
    ]);

    if(!$configured) {
        return false;
    }

    return $curl;
}

// Flow starts here

checkGETParametersOrDie(['url']);

$url = $_GET['url'];

$curl = createCurlRequest($url);

if(!$curl) {
    die('An error occured: '. curl_error($curl));
}

$result = curl_exec($curl);

if(!$result) {
    die('An error occured: '. curl_error($curl));
}

echo 'The result of the cURL request';
echo '<hr>';
echo $result;

curl_close($curl);
