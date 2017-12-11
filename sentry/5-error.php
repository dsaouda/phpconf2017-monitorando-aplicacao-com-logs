<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config.php';

$client = (new Raven_Client(getenv('SENTRY')))->install();

$list = [1,2,3];

echo $list[4];