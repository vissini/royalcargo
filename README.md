# Desafio Royal Cargo

Este teste foi criado para auxílio na avaliação de suas atuais habilidades. Desta forma
sugerimos a criação de um CRUD simples, de acordo com os requisitos abaixo:
O contato deverá ser composto por:
    - Empresa;
    - Nome;
    - Data/hora de cadastro;
    - Data/hora de alteração;
    - Telefone (Quantidade de telefones é variável).

A empresa deverá ser composta por:
    - Nome;
    - CPF ou CNPJ;;
    - Município;

## Regras
Caso a empresa seja pessoa física, é necessário cadastrar o RG e a “Data de nascimento”;
Caso a empresa seja pessoa jurídica é necessário cadastrar o “Nome Fantasia”
A listagem de clientes deverá conter filtros por Nome, CPF/CNPJ.
Funcionalidade extra
Possibilidade de listagem de clientes através de uma api REST.


## Instalação

Clonar o repositório:

```sh
git clone https://github.com/vissini/royalcargo.git
cd royalcargo
```

Instalar dependências do composer:

```sh
composer install
```

Instalar dependências do npm:

```sh
npm install ou yarn install
```

Configuração do env:

```sh
cp .env.example .env
```

Gerar chave da aplicação:

```sh
php artisan key:generate
```

Crie um banco de dados MySql e alterar a configuração de acordo no .env. Você também pode usar outro banco de dados (Sqlite, Postgres), basta atualizar sua configuração de acordo.


Rodar migrations e Seed para criar dados ficticios:

```sh
php artisan migrate --seed
```

Iniciar aplicação:

```sh
php artisan serve
```

## Rotas API

Empresas:
- GET /api/companies

## Implementações Futuras

- Implementar Tests Unitários com PHPUnit
- Implementar Authenticação da API por JWT ou/e OAuth2
- Implementar Gerênciamento completo das informações salvas no banco, via API
