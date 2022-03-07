# Laravel Backend

## API

### Installation Steps 

Prerequisites, have installed:

- Git
- PHP 8.1
- Composer (Dependency Manager for PHP)
- MySQL v>=8 (or PostgreSQL v>=13)
- Create database called `my_db_name` or whatever name you prefer.

Steps:

- 1° Run `git clone https://github.com/CaribesTIC/laravel-backend.git`
- 2° Run `cd laravel-backend`
- 3° Run `composer install -vvv`
- 4° Run `php artisan --version`
- 5° Run `cp .env.example .env`
- 6° Run `php artisan key:generate`
- 7° Configure database in `.env` file. Example:
```
...
DB_DATABASE=my_db_name
DB_USERNAME=root
DB_PASSWORD='12345678'
...
```
- 8° Run `php artisan migrate:fresh --seed`
- 9° Run `php artisan storage:link`
- 10° Run `php artisan optimize`
- 11° Run `php artisan serve`

And that's it, the app is now installed.
Now you can see the app running in your browser by `http://127.0.0.1:8000`

To make requests from the SPA you must be authenticated:
- E-mail: `luke@jedi.com`
- Password: `password`
