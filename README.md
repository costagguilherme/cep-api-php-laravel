# API CONSULTA CEP
##### PULL REQUEST: [Funcionalidade de consulta de CEP by costagguilherme · Pull Request #1 · costagguilherme/cep-api-php-laravel (github.com)](https://github.com/costagguilherme/cep-api-php-laravel/pull/1) 

### 1. TECNOLOGIAS
* PHP 8.3.3 (Laravel 10)
* Banco de dados: MySQL

### 2. SETUP PROJETO
* Rodar "composer install" para instalar as dependências
* Modificar credenciais para acesso ao banco de dados no .env
* Rodar "php artisan migrate" para rodar as migrações
* Criar a variável de ambiente CEP_PROVIDER='viacep' (Opcional, pois esse valor já está sendo usado como default caso não haja a variável).

### 3. ENDPOINT
* O endpoint é o GET /address/{cep}

### 4. Camadas do projeto
* Controllers: Camada de apresentação, onde chegam as requisições
* UseCases: Camada que representa cada funcionalidade da aplicação
* Repositories: Camada para abstração do banco de dados
### 5. Padrões de projetos utilizados
* Strategy: Podemos ter uma strategy para diferentes provedores de cep (viacep, brasilapi etc)
* Factory: Responsável por fabricar as Strategies de CEP
* Repository: Abstração para o banco de dados

Dentro disso, foram utilizados conceitos como inversão de dependência, a fim de desacoplar as classes.

### 6. Testes
Foram criados testes de integração para a funcionalidade de consulta de CEP.
Basta rodar "php artisan test --filter=AddressControllerShowFeatureTest"
