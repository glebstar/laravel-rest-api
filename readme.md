# laravel rest api

# Installation
+ To get started, the following steps needs to be taken:
+ Clone the repo.
+ `cd laravel-rest-api` to the project directory.
+ `cp .env.example .env` to use env config file
+ Run `docker-compose up -d` to start the containers.
+ Run `docker-compose exec --user=www php-fpm bash`
+ Run `composer install`
+ Run `php artisan migrate`
+ Run `vendor/bin/phpunit
`
