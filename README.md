

## System requirement 
  * Docker 
## Usage
### Laravel setup(automated)


1. Execute the following command

```bash
$ make install
```

### Laravel setup(manually)


1. Execute the following command

```bash
$ docker compose build
$ docker compose up -d
$ docker compose exec app composer install
$ docker compose exec app php artisan key:generate
$ docker compose exec app php artisan storage:link
$ docker compose exec app chmod -R 777 storage bootstrap/cache
$ docker compose exec app php artisan migrate
```

2. chnage directory and run the following command (please make sure that you have node and npm installed on latest version)
```bash
$ cd src
$ npm install
$ npm run dev
```

Now type in the url: http://localhost:8088
For phpmyadmin: http://localhost:8081



## Container structures

```bash
├── app
├── web
└── db
```

### app container

- Base image
  - [php](https://hub.docker.com/_/php):8.1-fpm-bullseye
  - [composer](https://hub.docker.com/_/composer):2.2

### web container

- Base image
  - [nginx](https://hub.docker.com/_/nginx):1.22

### db container

- Base image
  - [mysql/mysql-server](https://hub.docker.com/r/mysql/mysql-server):8.0

### mailhog container

- Base image
  - [mailhog/mailhog](https://hub.docker.com/r/mailhog/mailhog)
### Redis
### Ppmyadmin

