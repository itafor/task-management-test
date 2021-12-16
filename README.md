


Steps clone and deploy project form github

PHP VERSION: 8.0.1

LARAVEL VERSION: 8.69.0

• Clone the project here: https://github.com/itafor/task-management-test

• Go to the folder application using cd command on your cmd or terminal

• Run composer install on your cmd or terminal

• Copy .env.example file to .env on the root folder.

• Open your .env file and change the database name (DB_DATABASE) to whatever you have, username (DB_USERNAME) and password
(DB_PASSWORD) field correspond to your configuration.

By default, the username is root and you can leave the password field empty. (This is for Xampp)

• Run php artisan migrate (if you have any issues migrating, you can download my local server database here and imort it : https://github.com/itafor/task-management-test/tree/master/db)

• Go to localhost:8000 or http://127.0.0.1:8000/