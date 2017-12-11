<?php

require __DIR__ . '/vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Formatter\JsonFormatter;
use Monolog\Formatter\GelfMessageFormatter;
use Monolog\Formatter\LogstashFormatter;


$log = new Logger('gerar_log');

$handler = new StreamHandler('filebeat/log/aleatorio.log', Logger::DEBUG);
$handler->setFormatter(new JsonFormatter());

$log->pushHandler($handler);

while(true) {
	sleep(1);

	switch (mt_rand (0, 3)) {
		case 1: $log->info('mensagem de INFO'); break;
		case 2: $log->error('mensagem de ERROR'); break;
		case 3: $log->debug('mensagem de DEBUG'); break;
		default: break;
	}
}