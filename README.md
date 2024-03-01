# CodeHacks™️
[![Auto Deploy](https://github.com/codeHack-s/codehacks-web/actions/workflows/laravel.yml/badge.svg)](https://github.com/codeHack-s/codehacks-web/actions/workflows/laravel.yml)[![Deploy to My Server](https://github.com/codeHack-s/codehacks-web/actions/workflows/deploy.yml/badge.svg)](https://github.com/codeHack-s/codehacks-web/actions/workflows/deploy.yml)

CodeHacks is an interactive community-driven platform designed to teach coding, freelance skills, software usage, and more to our subscribed members. This project is built using Laravel, a robust PHP framework, along with Laravel Breeze for simple yet effective authentication.

## Features
Different subscription levels (Free, Basic, Premium, Pro)
A wide array of courses and lessons (physical and online)
Direct admin-to-user communication through notifications
Convenient and secure billing system integrated with PayPal
Access to exclusive organization resources for Pro members
Community involvement encouraged through forums
Getting Started
These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

## Prerequisites
You will need the following tools:

- Composer
- Laravel
- Node.js and npm 20 version
## Setup
- Clone the repository
### Navigate into the cloned repository

- cd codeHacks
### Install the dependencies
```sh
composer install
```
```sh
npm install
```
### Create a copy of your .env file
```sh
cp .env.example .env
```
### Generate an app encryption key
```sh
php artisan key:generate
```
### Create an empty database and set your database credentials in your .env file

```sh
DB_CONNECTION=mysql
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

### Migrate the database

```sh
php artisan migrate
```
### Run the application and compile the assets
    
```sh
npm run serve
```


### Usage
You can now access the server at http://localhost:8000

### Contributing
If you have any ideas on how you'd like to contribute to this project, please feel free to make a pull request!

### License
This project is licensed under the MIT License.
