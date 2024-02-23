## Requirement
- php ^8.1
- laravel 10

## Installation

- clone github ``` git clone git@github.com:mtriwardanaa/stok-view.git ```
- ``` cd stok-view ```
- ``` composer install ```
- copy .env.example to .env
- change some .env values

```bash
  APP_NAME="stok-view" // app name
  APP_ENV=local // local, stage, production
  APP_KEY=
  APP_DEBUG=true // on production set to false
  APP_URL=http://localhost:9001 // domain app

  APP_API_URL=http://localhost:9000/
  PASSWORD_CREDENTIAL_ID=9b63eb11-2546-449a-9ee2-cc3691c97374
  PASSWORD_CREDENTIAL_SECRET=L3mvgt2KabtA2ydGpdK7U7M17TzxXyW6rXIIp1Su

  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=stok_view
  DB_USERNAME=root
  DB_PASSWORD=

```


## Running Project

- ``` php artisan serve ```
- import postman collection from this documentation ``` https://documenter.getpostman.com/view/8315413/2sA2rCU1kn ```

## Test Project
- ``` php artisan test ```
