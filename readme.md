<h1 align="center">Timer</h1>
<p align="center">A simple solution for a timer.</p>

This is a proposal to a timer using a PHP application without frameworks and just taking advantage of vanilla PHP and the next composer packages:

* illuminate/database
* phpunit/phpunit
* vlucas/phpdotenv
* vlucas/valitron

## Requirements

- PHP >= 7.1.3
- PDO PHP Extension

## Installation

1. We need to unzip the project to a directory.
2. We may install the composer packages:
```
composer install
```
3. Now, We need to copy .env.example to .env to store our environment configuration.
```
cp .env.example .env
```
4. We must describe here the database connection information. In this case where are We going to store the sqlite databse.
```
DB_DATABASE=database.sqlite
```
5. We may install the schema with the included installation script or take advantage of the included.
```
php install/index.php
```
6. Finally, We need to enter to the public folder and if We feel comfortable We may use the built-in PHP web server to publish the application.
```
cd public
php -S localhost:8000
```
Now We may visit [localhost:8000](http://localhost:8000) to interact with the application.

*Note. It's recommended to run the web server in a port We know is not in use. We propose 8000 because is not commonly used.*
