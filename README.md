<p align="center"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></p>


## Laravel Checklister

### Install dependencies
$ composer install OR composer update 


### Create a copy of your .env.example file to .env
$ cp .env.example .env 

### Generate an app encryption key
$ php artisan key:generate

### Create an empty database for our application and then In the .env file, add database information to allow Laravel to connect to the database
$ DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, and DB_PASSWORD 

### Migrate and seed the database
$ php artisan migrate:fresh --seed

### Make a storage link
$ php artisan storage:link

### Run application
$ php artisan serve
