# A skeleton shopping cart pipeline project modified upon company's logic.
A LAMP stack project with laravel framework.
<a name="feature1"></a>
## Features:
* Laravel 5.1.x
* Twitter Bootstrap 3.x
* Back-end
	* Automatic install and setup website.
	* User management.
	* Session management.
	* Shopping cart management.
	* Coupon code validation.
* Front-end
	* User login, registration.
	* View products, own shopping cart, shopping history.
    * bootstrap modal popup and.
* Packages included:
	* Datatables Bundle

-----
<a name="feature2"></a>
##Requirements

	PHP >= 5.5.x
	OpenSSL PHP Extension
	Mbstring PHP Extension
	Tokenizer PHP Extension
	MySQL
	Composer
	Node JS

-----
<a name="feature3"></a>
##How to install:

-----
<a name="step1"></a>
### Step 1: Get the code - Clone from the repository

    git clone git@github.com:hao1987/winterfell.git winterfell

-----
<a name="step2"></a>
### Step 2: Use Composer to install dependencies
    cd PATH/winterfell
    composer install
to install dependencies Laravel and other packages.

-----
<a name="step3"></a>
### Step 3: Create database

Create database e.g.'winterfell' with utf-8 collation(uft8_general_ci), after that, rename .env.example as .env and change to your own database credentials: e.g. database, username, password and port number(optional).

-----
<a name="step4"></a>
### Step 4: Install

Install dependencies listed in package.json with:

    npm install

Retrieve frontend dependencies with Bower, compile SASS, and move frontend files into place:

    gulp

Now that you have the environment configured, you need to create a database configuration for it. For create database tables use this command:

    php artisan migrate

And to initial populate database use this:

    php artisan db:seed

Start laravel built-in server:

    php artisan serve

You can visit the site:

	http://localhost:8000/
-----
<a name="step5"></a>
### Step 5: Shopping

You can now login:

    username: user@user.com
    password: user

Avaliable Coupon Code:

    blackfriday25
-----

<a name="feature4"></a>
## Troubleshooting

RuntimeException : No supported encrypter found. The cipher and / or key length are invalid.

    php artisan key:generate

PDOException : SQLSTATE[HY000] [2002] No such file or directory

    set up MySQL port number in .env:
    DB_HOST=localhost:PORT
-----

<a name="feature5"></a>
## Additional information

Inspired by and based on [Laravel-4-Bootstrap-Starter-Site](https://github.com/andrew13/Laravel-4-Bootstrap-Starter-Site)

----
