# Tienda X - Final Project - 4Geeks Academy
![Heroku](http://heroku-badge.herokuapp.com/?app=manten-laravel-tienda&style=flat)

Final project of the Full-Stack Developer course at [4Geeks Academy](https://4geeksacademy.co/es/inicio/) Maracaibo 2017.

Simple shopping site with basic CRUD.

## Packages used
1. Laravel Collective
    - composer require "laravelcollective/html":"^5.4.0"
    - Documentation: https://laravelcollective.com/docs/master/html

2. LaravelShoppingcart
    - composer require gloudemans/shoppingcart
    - Documentation: https://github.com/Crinsane/LaravelShoppingcart

3. S3 AWS Bucket
    - composer require aws/aws-sdk-php
    - composer require league/flysystem-aws-s3-v3
    - References:
      - https://chrisblackwell.me/upload-files-to-aws-s3-using-laravel/
      - http://itsolutionstuff.com/post/laravel-5-amazon-s3-file-upload-tutorial-part-1example.html
      - https://laravel.com/docs/5.4/filesystem

## Installation

- Clone this repo
- Run `composer install` while in the root folder
- Change or copy **.env.example** and rename it to **.env**
- Run `php artisan key:generate`
- Configure **.env** as necessary
- Run `npm run dev`
  - If errors, check this guide:

    https://laracasts.com/discuss/channels/tips/tip-using-bootstrap-4-alpha-6-with-laravel-54
- Run `php artisan migrate`
- Run `php artisan db:seed`

## Migration
Migration creates the following tables:
- users (laravel native)
- password_resets (laravel native)
- products
- categories
- addresses
- orders
- order_product
- migrations

It also adds an "Admin" column to the Users table in order to enable Client and Admin roles for different users.

### Set user as admin
The only way to let an user have Admin permissions is by editing the users table directly.