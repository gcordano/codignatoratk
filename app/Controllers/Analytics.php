<?php

namespace App\Controllers;

use Elasticsearch\ClientBuilder;

class Analytics extends BaseController {

protected $client;

public function __construct() {
$this->client = ClientBuilder::create()->setHosts(['localhost:9200'])->build();
}

public function loginAttempts() {
$params = [
'index' => 'login_attempts',
'body' => [
'size' => 0,
'aggs' => [
'total_attempts' => [
'value_count' => [
'field' => 'username'
]
],
'error_reasons' => [
'terms' => [
'field' => 'error.keyword'
]
]
]
]
];

$response = $this->client->search($params);
return $response;
}
}