<?php

//essa execption não vai ser enviada para o sentry

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config.php';

use Monolog\Handler\RavenHandler;
use Monolog\Logger;

//configuração
$client = new Raven_Client(getenv('SENTRY'));

$handler = new RavenHandler($client);
$logger = new Logger('exception');
$logger->pushHandler($handler);

throw new \RuntimeException('Exemplo runtime exception com monolog');