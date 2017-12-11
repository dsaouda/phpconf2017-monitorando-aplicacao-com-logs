<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config.php';

$client = new Raven_Client(getenv('SENTRY'));

$params = ['local' => 'php conf', 'data' => date('Y-m-d H:i:s')];

$client->message('evento debug', $params, Raven_Client::DEBUG);
$client->message('evento info', $params, Raven_Client::INFO);
$client->message('evento warn', $params, Raven_Client::WARN);
$client->message('evento error', $params, Raven_Client::ERROR);
$client->message('evento fatal', $params, Raven_Client::FATAL);