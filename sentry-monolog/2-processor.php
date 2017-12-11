<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config.php';

use Monolog\Handler\RavenHandler;
use Monolog\Logger;

// classe de usuário fake
final class User 
{

	private $name;
	private $username;
	private $email;

	public function __construct(string $name, string $username, string $email)
	{
		$this->name = $name;
		$this->username = $username;
		$this->email = $email;
	}

	public function getName(): string
	{
		return $this->name;
	}

	public function getUsername(): string
	{
		return $this->username;
	}

	public function getEmail(): string
	{
		return $this->email;
	}
}

//configuração
$client = new Raven_Client(getenv('SENTRY'));

$handler = new RavenHandler($client);
$logger = new Logger('processor');
$logger->pushHandler($handler);


$logger->pushProcessor(function ($record) {
    
    $user = getCurrentUser();
    $record['context']['user'] = [
    	'name' => $user->getName(),
        'username' => $user->getUsername(),
        'email' => $user->getEmail()
    ];

    // Add various tags
    $record['context']['tags'] = ['key' => 'value'];

    // Add various generic context
    $record['extra']['key'] = 'value';

    return $record;
});


//utilização
$context = ['local' => 'php conf', 'data' => date('Y-m-d H:i:s')];

$logger->debug('evento monolog debug', $context);
$logger->info('evento monolog info', $context);
//$logger->notice('evento monolog notice', $context);
$logger->error('evento monolog error', $context);
$logger->alert('evento monolog alert', $context);

function getCurrentUser() {
	return new User('Name Fake', 'usernameFake', 'email@fake.com');
}