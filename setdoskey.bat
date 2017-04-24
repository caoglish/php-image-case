call doskey test=vendor\bin\phpunit $*
call doskey cs=vendor\bin\phpcs $*
call doskey art=php artisan $*
call doskey migrate=php artisan migrate$1 --database=sqlite
call doskey serve=php artisan serve --host=127.0.0.1 --port=8000