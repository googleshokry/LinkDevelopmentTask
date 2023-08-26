## Usage

To get started, make sure you have [Docker installed](https://docs.docker.com/docker-for-mac/install/) on your system, and then clone this repository.

Next, navigate in your terminal to the directory you cloned this, and spin up the containers for the web server by running.

- `docker-compose up -d`

After that completes, run this code in this paths
- `./catalog-service rm -rf vendor composer.lock`
- `./catalog-service composer install`
- `./email-service rm -rf vendor composer.lock`
- `./email-service composer install`

Note:- 
The following are built for our web server, with their exposed ports detailed:

- **ShopCartService** - `:3000`
- **MongoDB** - `:27017`
- **CatalogService** - `:80`
- **EmailService** - `:81`
- **MySql** - `:3306`
