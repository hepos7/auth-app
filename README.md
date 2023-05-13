## About Task

Laravel Auth app contains:

- Registration page.
- Login Page.
- user can change his data and upload image in profile page.
- app sends verfication email.
- user can reset password.
- admin can create roles and give every user roles.
- pagination in user and roles index.

## Project Setup

- 1-  you should create databse named abudiyab-task;

- 2-  write to create vendor folder.
> composer update;

- 3- to get database tables write 
> php artisan migrate;

- 4- to add premission from all routes we have
> php artisan permission:create-permission-routes

- 5- to create admin user have all premissions 
> php artisan db:seed --class=CreateAdminUserSeeder
