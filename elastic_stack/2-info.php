<?php

require __DIR__ . '/vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Formatter\JsonFormatter;
use Monolog\Formatter\GelfMessageFormatter;
use Monolog\Formatter\LogstashFormatter;


$log = new Logger('ecommerce');

$handler = new StreamHandler('filebeat/log/info.log', Logger::DEBUG);
$handler->setFormatter(new JsonFormatter());

$log->pushHandler($handler);
$log->info('mensagem de INFO');
