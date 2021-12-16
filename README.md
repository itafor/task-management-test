##HOW TO DEPLOY PROJECT

 php version: 8


laravel version: 8

Database management system: MYSQL


a. Unzip the zipped file

b. Coppy the unzipped file to your xampp->htdocs directory

open the project with any text editor of your choice


Open your .env file and change the database name (DB_DATABASE) to whatever you have, username (DB_USERNAME) and password (DB_PASSWORD) field correspond to your configuration.
By default, the username is root and you can leave the password field empty. 

c.	Run php artisan migrate
 (I have added my database schema in db folder you can just import it without runing migration. Get it here: sortable-task\db\coalition_technology_test)


d.	Run php artisan serve

Thank you!
