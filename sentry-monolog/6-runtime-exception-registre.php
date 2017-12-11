<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config.php';

use Monolog\Handler\RavenHandler;
use Monolog\Logger;
use Monolog\ErrorHandler;

//configuração
$client = new Raven_Client(getenv('SENTRY'));

$handler = new RavenHandler($client);
$logger = new Logger('exception');
$logger->pushHandler($handler);

ErrorHandler::register($logger);

throw new RuntimeException('Exemplo runtime exception com monolog');