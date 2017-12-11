<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config.php';

use Monolog\Handler\RavenHandler;
use Monolog\Logger;
use Monolog\ErrorHandler;

//configuração
$client = (new Raven_Client(getenv('SENTRY')))->install();

$handler = new RavenHandler($client);
$logger = new Logger('exception');
$logger->pushHandler($handler);

$list = [1,2,3];

echo $list[4];