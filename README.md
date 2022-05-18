## Instalação

Clone o projeto
```sh
git clone https://github.com/Higor23/nutrition.git
```
Acesse a pasta do projeto
```sh
cd nutrition
```

### Cada serviço possui arquivos de configurações individuais e abaixo será detalhado como instalar cada um deles.

### Service 1
Acesse o serviço 1:
```sh
cd service1
```
Suba o container:
```sh
docker-compose up -d
```
Acesse o container (Fique atento em relação ao nome do container, este poderá sofrer alteração):
```sh
docker exec -it service1_service1_1 bash
```
Instale as dependências:
```sh
composer install
```

### Service 2
Acesse o serviço 2:
```sh
cd service2
```
Crie o arquivo .env:
```sh
cp .env.example .env
```
Substitua o conteúdo do .env por:
```dosini
APP_NAME=Lumen
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost:8882
APP_TIMEZONE=UTC

LOG_CHANNEL=stack
LOG_SLACK_WEBHOOK_URL=

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=nutrition_cadastro
DB_USERNAME=root
DB_PASSWORD=root

CACHE_DRIVER=file
QUEUE_CONNECTION=sync
```

Suba o container:
```sh
docker-compose up -d
```
Acesse o container (Fique atento em relação ao nome do container, este poderá sofrer alteração):
```sh
docker exec -it service2_service2_1 bash
```
Instale as dependências:
```sh
composer install
```
Crie as tabelas no banco de dados rodando as migrations:
```sh
php artisan migrate
```
Caso haja um erro ao rodar este comando logo acima, verifique se os containers estão ativos:
```sh
docker ps -a
```

### Service 3
Acesse o serviço 3:
```sh
cd service3
```
Crie o arquivo .env
```sh
cp .env.example .env
```
Substitua o conteúdo do .env por:
```dosini
APP_NAME=Lumen
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost:8883
APP_TIMEZONE=UTC

LOG_CHANNEL=stack
LOG_SLACK_WEBHOOK_URL=

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=news
DB_USERNAME=root
DB_PASSWORD=root

CACHE_DRIVER=file
QUEUE_CONNECTION=sync
```

Suba o container:
```sh
docker-compose up -d
```
Acesse o container (Fique atento em relação ao nome do container, este poderá sofrer alteração):
```sh
docker exec -it service3_service3_1 bash
```
Instale as dependências:
```sh
composer install
```
Crie as tabelas no banco de dados rodando as migrations:
```sh
php artisan migrate
```
Rode o Seeder para preencher a tabela com os valores faker:
```sh
php artisan db:seed
```
Caso haja um erro ao rodar estes dois últimos comandos logo acima, verifique se os containers estão ativos:
```sh
docker ps -a
```
### Client

Acesse a pasta client e abra o arquivo index.hml com um navegador.




