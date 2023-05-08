This is an Product CRUD API Project.
Steps to install this project.
1. Download this repository.
2. Laravel version is 10 and php version is 8.1.
3. Go to the project location and run these commands.
    1. composer install
    2. npm install
    3. npm run dev
    4. Setup .env file to configure database and the run "php artisan migrate"
    4. php artisan db:seed
    5. php artisan serve
4. Go to these links to see the Rest APIs
    1. (All products) http://localhost:8000/api/products
    2. (Show single products) http://localhost:8000/api/products/30
    3. (Create product) http://localhost:8000/api/products
    4. (Update product) http://localhost:8000/api/products/25
    5. (All reviews for a product) http://localhost:8000/api/products/25/reviews
    6. (Show a reviewed product details) http://localhost:8000/api/products/25/reviews/3