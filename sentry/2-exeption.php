<?php

require_once __DIR__ . '/vendor/autoload.php';

require_once __DIR__ . '/config.php';

$client = new Raven_Client(getenv('SENTRY'));

try {

	throw new RuntimeException('Ocorreu um erro inesperado');

} catch (Exception $e) {
	$client->captureException($e);
}