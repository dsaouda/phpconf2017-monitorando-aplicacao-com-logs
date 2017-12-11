# elastic stack

exemplo simples de como enviar logs do PHP para a elastic stack

# Como Usar

Para usar você precisa instalar o docker e o docker-compose (https://docs.docker.com/engine/installation/ e https://docs.docker.com/compose/install/)

Feito isso basta executar `docker-compose up -d`. Após a execução desse comando o kibana estará rodando na porta 5601, então basta você executar `http://<host>:5601` em seu navegador.