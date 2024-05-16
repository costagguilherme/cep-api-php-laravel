
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
* Também é possível rodar via docker (tópico 7)

  

### 3. ENDPOINT

* O endpoint é o GET /address/{cep}

Possíveis respostas:
* Sucesso
  </br>

  ![image](https://github.com/costagguilherme/cep-api-php-laravel/assets/81521273/a87ae81a-a5d4-4888-90c6-4bfd27abccea)

  </br>

* Erro
  
  ![image](https://github.com/costagguilherme/cep-api-php-laravel/assets/81521273/a81060e8-a314-44f1-bf56-ddb09301c38d)



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


### 7. Docker e Docker Compose
* obs: As credencias do docker estão no docker-compose
* Criar uma pasta chamada "sql-bind" no mesmo nível da pasta da aplicação Laravel para o volume do mysql
![image](https://github.com/costagguilherme/cep-api-php-laravel/assets/81521273/fb7b71a1-a527-4ea7-97fe-4cee0df74485)

* Rodar "sudo docker compose up" para buildar containers da api laravel e do mysql
* Entrar no container com "sudo docker container exec -it app_laravel_cep bash"
* Fazer "php artisan migrate" para rodar as migrações
* Para testar basta fazer um "curl http://localhost:8080/address/{cep}" dentro do próprio container
![image](https://github.com/costagguilherme/cep-api-php-laravel/assets/81521273/b1ac3242-3fc3-454c-a099-7207884dd213)
