<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config.php';

use Monolog\Handler\RavenHandler;
use Monolog\Logger;

//configuração
$client = new Raven_Client(getenv('SENTRY'));

$handler = new RavenHandler($client);
$logger = new Logger('exception');
$logger->pushHandler($handler);

//utilização

try {

	throw new \RuntimeException('Ocorreu um erro inesperado');

} catch (\Exception $e) {
	$context = ['local' => 'php conf', 'data' => date('Y-m-d H:i:s'), 'exception' => $e];
}



$logger->debug('evento monolog debug', $context);
$logger->info('evento monolog info', $context);
$logger->error('evento monolog error', $context);
$logger->alert('evento monolog alert', $context);