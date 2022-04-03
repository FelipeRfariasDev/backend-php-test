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

- Siga as [boas práticas](https://swagger.io/resources/articles/best-practices-in-api-design/) para o desenvolvimento de APIs RESTful
- Utilize docker. Você pode usar o docker-compose.yml deste repositório para rodar sua solução, mas fique livre para usar outro ou personaliza-lo. Você também pode usar o Laravel Sail caso prefira.

## Processo de submissão

O candidato deverá implementar a solução e enviar um pull request para este repositório com a solução.

O processo de Pull Request funciona da seguinte maneira:

1. Candidato fará um fork desse repositório (não irá clonar direto!)
2. Fará seu projeto nesse fork.
3. Commitará e subirá as alterações para o SEU fork.
4. Irá enviar um Pull Request para este repositório. Na descrição do Pull Request coloque o passo a passo para executar a sua aplicação.

## Dúvidas?

Caso tenha alguma dúvida referente ao teste você pode abrir uma issue aqui mesmo neste repositório.
