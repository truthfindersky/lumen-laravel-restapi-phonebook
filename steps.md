1. DB
phonebook

2. create project

composer create-project --prefer-dist laravel/lumen .
php -S localhost:8000 -t public
http://localhost:8000/

3. Lumen Generator	
https://github.com/flipboxstudio/lumen-generator

composer require flipbox/lumen-generator

bootstrap/app.php
$app->register(Flipbox\LumenGenerator\LumenGeneratorServiceProvider::class);

4. Model
php artisan make:model RegistrationModel
php artisan make:model AccessTokenModel
php artisan make:model RegistrationModel

5. connection
.env

6. registration
php artisan make:controller RegistrationController

{
    "firstname": "Moana",
    "lastname": "Maherin",
    "email": "moanamaherin@gmail.com",
    "username": "moanamaherin",
    "password": "1234"
}

7. login
php artisan make:controller LoginController

https://github.com/firebase/php-jwt
composer require firebase/php-jwt

app/Providers/AuthServiceProvider.php
app/Http/Middleware/Authenticate.php

8. Phonebook
php artisan make:controller PhoneBookController

{
    "name": "Moana",
    "username": "moanamaherin",
    "phone": "8801718305930",
    "email": "moanamaherin@gmail.com"
}

