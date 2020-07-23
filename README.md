# Recursos

Para o teste foi utilizado:

* PHP 7.4
* MySQL 5.7
* Bootstrap 4.3
* Laravel 7

## Requisitos

Requisitos para instalação do projeto:

* Composer
* PHP >= 7.4
* MySQL 5.7

## Comandos

Para rodar o projeto, é necessário rodar os seguintes comandos

```
cp .env.example .env
```
```
composer install
```
```
php artisan key:generate
```

## Banco de dados

Criar banco de dados em MySQL

```
CREATE DATABASE `trayapi` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */
```

Altere as linhas 12, 13 e 14 do arquivo .env para configurar o banco de dados 

DB_DATABASE=trayapi
DB_USERNAME=user
DB_PASSWORD=pass

Rode o seguinte comando para gerar as tabelas
```
php artisan migrate
```

Caso esteja utilizando Windows utilizando alguma ferramenta como XAMPP

Rode o comando ``php artisan serve`` na raiz do projeto e já deverá funcionar.
