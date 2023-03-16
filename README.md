# Teste prático de backend

Neste repositório você encontra o enunciado do teste técnico de desenvolvedor com foco em PHP e Laravel.

## O Teste

Criar uma API que implementa o crud de produtos utilizando o framework laravel.

Um produto deve possuir os seguintes dados:
- ID (PK - Inteiro)
- Código (String)
- Nome (String)
- Preço (Float)
- Qty Disponível (Inteiro)
- Marca (String Alfanumérica)

A API deve implementar os seguintes verbos e endpoint:

- GET /api/products/
  - Lista todos os produtos da aplicação.
- POST /api/products/
  - Cria um novo produto na aplicação.
  - Não deve permitir duplicação de códigos. O código deve ser único.
- GET /api/products/id/
  - Obtém um produto específico por meio do ID
- PUT /api/products/id/
  - Atualiza um produto específico (todo o objeto deve ser atualizado).
- DELETE /api/products/id/
  - Deleta um produto especifico da aplicação

### Requisitos  

- Use PHP 8.x e Mysql 8.x
- Você deve utilizar o Laravel 8 para criação da solução.
- Você deve implementar o seed de produtos no banco de dados para eventuais testes.

## Recomendações

- Siga as boas práticas para o desenvolvimento de APIs RESTful

## Segue o passo a passo para executar o projeto

[Iniciar Video](https://www.youtube.com/watch?v=Xnj1ETFm9i0)
##### Autor > Felipe Rodrigues Farias

C:\Windows\System32\drivers\etc\hosts

127.0.0.1 app-test-api

composer install

cp .env.example .env

php artisan migrate

php artisan db:seed

php artisan migrate:refresh

php artisan l5-swagger:generate

https://go.postman.co/workspace/Team-Workspace~ae3c3730-a225-4945-879f-78225a00b42d/collection/17591629-8086ef04-4afe-49a4-8de3-d1e904e7934d?action=share&creator=17591629

https://github.com/FelipeRfariasDev/backend-php-test/blob/main/postman/app-test-api%20crud%20products%20pagination%20search.postman_collection.json


vendor/bin/phpunit --testdox

![alt text](https://github.com/FelipeRfariasDev/backend-php-test/blob/main/phpunit_img/products.png?raw=true)

![alt text](https://github.com/FelipeRfariasDev/backend-php-test/blob/main/phpunit_img/AddProduct1.png?raw=true)

![alt text](https://github.com/FelipeRfariasDev/backend-php-test/blob/main/phpunit_img/UpdateProduct2.png?raw=true)

![alt text](https://github.com/FelipeRfariasDev/backend-php-test/blob/main/phpunit_img/BuscarProdutos3.png?raw=true)

![alt text](https://github.com/FelipeRfariasDev/backend-php-test/blob/main/phpunit_img/DeleteProduct4.png?raw=true)

![alt text](https://github.com/FelipeRfariasDev/backend-php-test/blob/main/swagger/img.png?raw=true)