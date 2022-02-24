<?php
require_once('vendor/autoload.php');

$client = new \GuzzleHttp\Client();

$response = $client->request('POST', 'https://api.paymongo.com/v1/payment_intents', [
  'body' => '{"data":{"attributes":{"amount":10000,"payment_method_allowed":["card","paymaya"],"payment_method_options":{"card":{"request_three_d_secure":"any"}},"currency":"PHP"}}}',
  'headers' => [
    'Accept' => 'application/json',
    'Authorization' => 'Basic cGtfdGVzdF9oa1pmSmhxdEdTdlYxSml4aXBBN2V3QmY6',
    'Content-Type' => 'application/json',
  ],
]);

echo $response->getBody();