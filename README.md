# Pagesmanager Package

##### A simple page manager to use with Laravel.

Live url : (https://packagist.org/packages/hcipl/pagesmanager)

## Usage
1. Install the package: "composer require hcipl/pagesmanager"
2. Configure your database ".env" file.
3. Run migration: "php artisan migrate"
4. Run project server "php artisan serve",
5. Test url "http://127.0.0.1:8000/pages"

## Views Modification
###### In order to modify the pagesmanager:
1. Select the option which depicts "Provider:Hcipl\PagesManager\PagesManagerServiceProvider".
2. Run below command to publish the assests.
php artisan vendor:publish --tag=public --force
3. Run below command to link the storage.
php artisan storage:link