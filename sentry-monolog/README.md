# sentry-monolog

## instalação sentry

Primeiro instale o docker (https://docs.docker.com/engine/installation/) em seguida siga os passos descritos no link https://hub.docker.com/_/sentry/

## instalação php

1. `composer install`
2. copie e cole o arquivo config.php.dist e remova a extensão .dist
3. configure o DNS sentry (valor pode ser adiquirido ao criar um novo projeto)
4. `php <arquivo>.php`
5. visualize o resultado no sentry
