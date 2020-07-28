# CRM Tech Test

## Installation

Create Docker Instance and Dependencies

`docker-compose up -d`

Install Dependencies

```
docker exec -it crm_php_1 bash
composer install
npm install
npm run dev
```


You can access the site using

`htpp://127.0.0.1:8080/login`

Login using

```
username: admin@admin.com
password: password
```

## Setup

### Database

Add to your .env

```
DB_CONNECTION=mysql
DB_HOST=crm_mysql_1
DB_PORT=3306
DB_DATABASE=crm
DB_USERNAME=root
DB_PASSWORD=password
```

Setup Database

```
php artisan storage:link && php artisan migrate:refresh --seed
```

## Testing

Uses PHPUnit

Login into the docker container using

`docker exec -it crm_php_1 bash`

Then run 

`./vendor/bin/phpunit`
