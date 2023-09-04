## Usage

To get started, make sure you have [Docker installed](https://docs.docker.com/docker-for-mac/install/) on your system,
and then clone this repository.

Next, navigate in your terminal to the directory you cloned this, and spin up the containers for the web server by
running.
goto api-gateway folder and run

- `docker-compose up -d`
- `docker-compose run --rm composerapigateway install`
- `docker-compose run --rm artisanapigateway migrate`
- `docker-compose run --rm artisanapigateway db:seed`

email=admin@domain.com
password=password

then goto catalog folder and run

- `docker-compose up -d`
- `docker-compose run --rm composercatalogservice install`
- `docker-compose run --rm artisancatalogservice migrate`
set in env file parameter CATALOG_SERVICE_API in APIGateway service {ip . ':81/api/'} ex : 172.23.0.1:81/api
- `docker inspect {container id cataglogservice} | grep -i Gateway`

then goto email service folder and run

- `docker-compose up -d`
- `docker-compose run --rm composeremailservice install`
- `docker-compose run --rm artisanemailservice migrate`
  set in env file parameter EMAIL_SERVICE_API in APIGateway service {ip . ':82/api/'} ex : 172.25.0.1:82/api
- `docker inspect {container id emailservice} | grep -i Gateway`
exit to root folder

- `docker-compose run --rm artisan-catalog migrate`
- `docker-compose run --rm artisan-gateway migrate`
- `docker-compose run --rm artisan-gateway db:seed`

Note:-
The following are built for our web server, with their exposed ports detailed:

- **ShopCartService** - `:3000`
- **MongoDB** - `:27017`
- **Apigateway** - `:80`
- **CatalogService** - `:81`
- **EmailService** - `:82`
- **MySql** - `:3306`

my application you can access any microservices through api gateway Service and other microservice can't access outside
server


