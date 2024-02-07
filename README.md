Instructions To Run The Apllication
1. Application is on Laravel 10
2. Minimum PHP versions required - 8.1
3. Commands that are need to run
   a. composer install
   b. cp .env.example .env
   c. php artisan key:generate
5. Then need to create a database and then need to set the db details in the env file in the following block
    DB_CONNECTION=mysql
    DB_HOST=
    DB_PORT=
    DB_DATABASE=
    DB_USERNAME=
    DB_PASSWORD=
6. Next need to set QUEUE_CONNECTION value in the .env to "database"
7. Also need to set email smtp details in the .env file to test the EMAIL fetures (I have used Mailtrap.io)
    MAIL_MAILER=smtp
    MAIL_HOST=mailpit
    MAIL_PORT=1025
    MAIL_USERNAME=null
    MAIL_PASSWORD=null
    MAIL_ENCRYPTION=null
    MAIL_FROM_ADDRESS="hello@example.com"
    MAIL_FROM_NAME="${APP_NAME}"
8. Then need to run the following commands
   a. php artisan queue:table
   a. php artisan migrate --seed
   c. php artisan queue:qork
   