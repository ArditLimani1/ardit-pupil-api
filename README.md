#Composer install
#php artisan key:generate
#php artisan migrate

#passport install
composer require laravel/passport
php artisan migrate
php artisan passport:install

#run seeder
#php artisan db:seed --class=PackagesTableSeeder

#use the created command
#php artisan package:register {customerId} {packageId}

#Run test
#php artisan test
