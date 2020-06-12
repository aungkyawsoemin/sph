# Pollutant Standards Index (PSI)

## URL showcasing - See [Pollutant Standards Index Link](https://bit.ly/showcase-demo-project)
### Installation

```sh
$ git clone <repo url>
$ cd sph
$ cp .env.example .env
$ composer install
$ php artisan key:generate
$ sudo chgrp -R www-data storage bootstrap/cache
$ sudo chmod -R ug+rwx storage bootstrap/cache
```

create database in your system. open .env file and update the following
- DB_DATABASE
- DB_USERNAME
- DB_PASSWORD

Then run the migrate command
```sh
$ php artisan migrate
```

