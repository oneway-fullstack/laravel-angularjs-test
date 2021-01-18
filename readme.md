## About this project

This is a web application for test based on Laravel 5.6 and AngularJs1.6 (Filip Jovicic At K.)

- A login page where we add user name and ID (no need for database, keep it simple)
- Once logged in we can add new blog posts (title, description)
- See list of posts and edit them
- Delete post
- Use Bootstrap with Webpack for final version

## Server Requirements
- Apache or Nginx
- MySQL
- PHP >= 7.0
- Composer
- OpenSSL, PDO, Mbstring, Tokenizer and XML PHP Extensions

## Launch this project
1. Install components:
    composer install
2. Create the database on your mysql server.
3. Configurate the database information inside the .ENV file (copy from .env.example)
3. Migrate database:
    php artisan migrate
4. npm install
5. npm run
6. php artisan serve
7. Visit http://127.0.0.1:8000/login or http://127.0.0.1:8000/register to create a test account
8. After login, visit to http://127.0.0.1:8000/home
9. Just enjoy CRUD of the post.

## Result Screen
<p align="center"><img src="https://github.com/oneway-fullstack/laravel-angularjs-test/list.png"></p>
<p align="center"><img src="https://github.com/oneway-fullstack/laravel-angularjs-test/edit.png"></p>