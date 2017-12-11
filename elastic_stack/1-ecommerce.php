<?php

require __DIR__ . '/vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Formatter\JsonFormatter;
use Monolog\Formatter\GelfMessageFormatter;
use Monolog\Formatter\LogstashFormatter;


$log = new Logger('ecommerce');

$handler = new StreamHandler('filebeat/log/ecommerce.log', Logger::DEBUG);
$handler->setFormatter(new JsonFormatter());

$log->pushHandler($handler);

//$log->info('cliente comprou', ['cliente_nome' => 'Jose'  , 'produto_nome' => 'produto php ' . rand(1,10)] );
$log->info('cliente comprou', ['cliente_nome' => 'Diego' , 'produto_nome' => 'nome produto ' . rand(1,10)] );
//$log->info('cliente comprou', ['cliente_nome' => 'Aline' , 'produto_nome' => 'nome produto ' . rand(1,10)] );
//$log->info('cliente comprou', ['cliente_nome' => 'Joao'  , 'produto_nome' => 'nome produto ' . rand(1,10)] );
