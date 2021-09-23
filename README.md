once you clone this project you must do the following.

1. cd in to the project
2. Run composer install
3. create a database in your mysql called laravel_api
4. create a .env file and copy everything in the .env.example into the .env file created.
   Note: This .env file must be directly in the root folder.
5. In the .env file ensure you specify the following
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=laravel_API
   DB_USERNAME=root
   DB_PASSWORD=
6. Run php artisan migrate
   This will Move all migration files to the database. This will create the required table.
7. Run php artisan serve

Now your project is ready to be run.

Here are the specified Route.

a. To get all products in the database. We use the get Request
http://127.0.0.1:8000/api/products

b. To add a new product in the database. We use the post Request.
http://127.0.0.1:8000/api/products

c. To get a perticular product by id. We use the get Request too
http://127.0.0.1:8000/api/product/10

d. To update a particular product by id. We use the put request for this.
http://127.0.0.1:8000/api/product/1

e. To delete a particular product by id. This is a delete Request.
http://127.0.0.1:8000/api/product/4

f. To search a product by the product name. This is also a get Request.
http://127.0.0.1:8000/api/product/search/productone

g. To add a new user to the database. This is a post Request.
http://127.0.0.1:8000/api/register

h. This is to logout and destroy all tokens. This is a post Request
http://127.0.0.1:8000/api/logout

i. To login an existing user and create access Tokens. This is a post Request too
http://127.0.0.1:8000/api/login
