# laravel_api
RESTful APIs of laravel

# installation laravel globally
composer require laravel/passport
composer global require laravel/installer

# start laravel project
laravel new laravel_api_server
or
composer create-project --prefer-dist laravel/laravel laravel_api_server

# check the database information
checkout database information in ".env" file.
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret

# make a model
php artisan make:model Article -m

# after add some fields to migration file and then migrate
php artisan migrate

# make a seeder
php artisan make:seeder ArticlesTableSeeder
php artisan make:seeder UsersTableSeeder

# and then insert these fake data to database
php artisan db:seed

# make controller
php artisan make:controller ArticleController

# add authenticate function
the best one is Passport(https://laravel.com/docs/5.4/passport), a great way to implement OAuth2
php artisan make:migration --table=users adds_api_token_to_users_table

