# Zid Commerce
## Technologies
- PHP
- Laravel
- MySQL
- Stancl Multi Tenancy
- Docker & Docker-compose

## Postman collection
```https://www.getpostman.com/collections/eda5e15795013dd189ef```

## Steps to Run
- clone the repo ```git clone git@github.com:AbanoubMagdyAdly/zid-commerce.git ```
- cd into project root ```cd zid-commerce```
-  ```cp .env.exmple .env```
- run
    ```
    docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
    ```
- Start the app: ```./vendor/bin/sail up -d```
- Run migrations : ```./vendor/bin/sail artisan migrate ```
