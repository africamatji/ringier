<p align="center"><a href="https://www.ringier.com" target="_blank"><img src="https://www.ringier.com/wp-content/themes/ringiercorporate/assets/images/ringier-logo.svg" width="400" alt="Ringier Logo"></a></p>

## About Ringier Listing

A POC application by Africa Matji for Ringier Assesment


### 1. Install Packages
`composer install`

`yarn install` feel free to use npm if you dont prefer yarn.

### 2. Set up enviroment
`cp .env.example .env`

Create a mysql databse called 'ringier', if you prefer own name please update `DB_DATABASE=YOUR_DB_NAME`

Update below in you new .env file
`DB_USERNAME=YOUR_DB_USER`

`DB_PASSWORD=YOUR_DB_PASSWORD`

### 3. Create dummy test data
Migrate and seed Database
`Php artisan migrate`

Run Database seeding to generate some dummy data for testing.
`php artisan db:seed`

### 4. Run application
`yarn build`

`php artisan serve`

This will serve the application on port 8000, please make sure to access using localhost [link] http://localhost:8000 

### 5. Test
To run test suites.
`php artisan test --testsuite=Feature`

Thank you :)

