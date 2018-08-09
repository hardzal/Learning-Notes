<?php

class CURL {

    private $request;

    public function __construct() {
        $this->request = curl_init();
        
        $this->throwExceptionIfError($this->request);
    }

    public function configure($url, $urlParameters = [], $method = 'GET', $moreOptions = [CURLOPT_FOLLOWLOCATION => true, CURLOPT_RETURNTRANSFER => true]) {
        curl_reset($this->request);

        switch($method) {
            case 'GET':
                $options = [CURLOPT_URL => $url . $this->stringifyParameters($urlParameters)];
                break;
            case 'POST':
                $options = [
                    CURLOPT_URL => $url,
                    CURLOPT_POST => true,
                    CURLOPT_POSTFIELDS => $this->stringifyParameters($urlParameters)
                ];
                break;
            default:
                throw new Exception('Method must be "GET" or "POST"');
                break;
        }

        $options = $options + $moreOptions;

        foreach($options as $option => $value) {
            $configured = curl_setopt($this->request, $option, $value);

            $this->throwExceptionIfError($configured);
        }
    }

    public function execute() {
        $result = curl_exec($this->request);

        $this->throwExceptionIfError($result);
        return $result;
    }

    public function close() {
        curl_close($this->request);
    }

    protected function throwExceptionIfError($success) {
        if(!$success) {
            throw new Exception(curl_error($this->request));
        }
    }

    protected function stringifyParameters($parameters) {
        $parameterString  = '?';

        foreach($parameters as $key => $value) {
            $key = urlencode($key);
            $value = urlencode($value);

            $parameterString .= "$key=$value&";
        }

        rtrim($parameterString, '&');

        return $parameterString;
    }
}