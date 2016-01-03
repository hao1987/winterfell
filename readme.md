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

	PHP >= 5.5.9
	OpenSSL PHP Extension
	Mbstring PHP Extension
	Tokenizer PHP Extension
	MySQL
	Composer
	Node JS

-----
<a name="feature3"></a>
##How to install:
* [Step 1: Get the code](#step1)
* [Step 2: Use Composer to install dependencies](#step2)
* [Step 3: Create database](#step3)
* [Step 4: Install](#step4)
* [Step 5: Start Page](#step5)

-----
<a name="step1"></a>
### Step 1: Get the code - Download the repository

    git clone git@github.com:hao1987/winterfell.git

-----
<a name="step2"></a>
### Step 2: Use Composer to install dependencies

    composer install
to install dependencies Laravel and other packages.

-----
<a name="step3"></a>
### Step 3: Create database

Create database e.g.'winterfell' with utf-8 collation(uft8_general_ci), after that, copy .env.example and rename it as .env and put connection and change default database connection name, only database connection, put name database, database username and password.

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

You can visit the site:

	http://localhost/
-----
<a name="step5"></a>
### Step 5: Shopping

You can now login:

    username: user@user.com
    password: user

Avaliable Coupon Code:

    blackfriday25
-----
<a name="feature5"></a>
## Troubleshooting

### RuntimeException : No supported encrypter found. The cipher and / or key length are invalid.

    php artisan key:generate

### Site loading very slow

	composer dump-autoload --optimize
OR

    php artisan dump-autoload

-----
<a name="feature6"></a>
## Additional information

Inspired by and based on [andrew13's Laravel-4-Bootstrap-Starter-Site](https://github.com/andrew13/Laravel-4-Bootstrap-Starter-Site)

----
<a name="feature8"></a>
##How Starter Site is look like

![Index](http://i57.tinypic.com/2yug28x.jpg)
![Login](http://i58.tinypic.com/r7p4et.jpg)
![Register new user](http://i61.tinypic.com/fvcz5x.jpg)
![Admin dashboard](http://i58.tinypic.com/b9g2g1.jpg)
![Admin users](http://i60.tinypic.com/301hemp.jpg)
![Admin list users](http://i58.tinypic.com/2ujl5dh.jpg)

----
