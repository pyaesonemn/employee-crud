# **Employee CRUD API with Laravel Passport**

## Installation Steps

-   Firstly clone the repo with `git clone git@github.com:pyaesonemn/employee-crud.git`
-   And then install the dependencies with `composer install`
-   Then rename `.env.example` to `.env` and provide environment variables for DB credentials
-   Migrate and Seeding the database using `php artisan migrate --seed`
-   Then install Laravel Passport with `php artisan passport:install`
-   Run the project with `php artisan serve` and call `http://127.0.0.1:8000/` in the browser if there is an error warning about the generation of app key, please click the button `Generate App Key`
-   API routes are already provided in the root directory of this git repo with the name `Employees.postman_collection` and you can import it in postman.
-   Happy Testing!

## API Documentation

### Public Routes

-   `/api/user/signup` [POST] - Sign up a new user with [ 'name', 'password', 'password_confirmation', 'email' ] attributes
-   `/api/user/login` [POST] - Login a user with ['email', 'password'] attributes

### Private Routes

-   `/api/user/update` [POST] - Update existing user password or name with new values
-   `/api/employees/` [GET] - Get all employees listing
-   `/api/employees/{$id}` [GET] - Get a specific employee data by ID
-   `/api/employees/` [POST] - Create an employee
-   `/api/employees/{$id}` [PUT] - Update information of existing employee by ID
-   `/api/employees/{$id}` [DELETE] - Delete an employee data by ID
