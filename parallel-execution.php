<?php

use Predis\Client;

require_once __DIR__ . '/vendor/autoload.php';

$client = new Client('tcp://redis:6379');

$value = (int) $client->get('some-key') + 1;
$client->set('some-key', $value);

var_dump($client->get('some-key'));
