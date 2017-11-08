<?php

class CallApiExchange
{

    private $host='http://api.stackexchange.com';

    private $uri ="/2.2/questions?order=desc&sort=activity&site=stackoverflow&tagged=";

    public function querySearch($tags)
    {
        $request = $this->host.$this->uri.$tags;
        return $this->stackExchangeListingRequest($request);
    }

    private function stackExchangeListingRequest($request)
    {
         $ch = curl_init();
         curl_setopt($ch, CURLOPT_URL, $request);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
         curl_setopt($ch, CURLOPT_TIMEOUT, 90);
         curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
         curl_setopt($ch, CURLOPT_ENCODING, 'gzip');

         $json_response = curl_exec($ch);
         if ($json_response === False) {
             return False;
         } else {
             return json_decode($json_response);
         }
    }
}