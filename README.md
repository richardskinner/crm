# CRM Tech Test

## Installation

Create Docker Instance and Dependencies

`docker-compose up -d`

You can access the site using

`htpp://127.0.0.1:8080/login`

Login using

```
username: admin@admin.com
password: password
```

## Testing

Uses PHPUnit

Login into the docker container using

`docker exec -it crm_php_1 bash`

Then run 

`./vendor/binphpunit`
