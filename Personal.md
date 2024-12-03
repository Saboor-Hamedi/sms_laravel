# Installation and Configuration

> You can find the full documentation of this project step by step in this README note.

-   I have buit this system for personal use. I do not recommend using it for work-related tasks. Unless YOU teste and confirm that it works as expected, do not use it for work-related tasks.

**Installing Laravel**

-   First, you need to install PHP on your system. You can download it from the official website.

-   Next, you need to install Composer. You can download it from the official website.

-   Once you have installed PHP and Composer, you can install Laravel by running the following command in your terminal:

-   Then you can clone the Laravel repository by running the following command:

```url
https://github.com/Saboor-Hamedi/sms_laravel.git
```

-   After cloning the repository, you need to install npm and update everything by running the following commands:

### Install spatie

-   Consult the Prerequisites page for important considerations regarding
    your User models! This package publishes a config/permission.php
    file. If you already have a file by that name, you must rename or
    remove it. You can install the package via composer:
-   ` composer require spatie/laravel-permission`
-   `npm install && npm update`
-   `composer dump-autoload`
-   `composer update`
-   Run migrations and seeders:
    `php artisan migrate:fresh --seed`
-   Finally, you can run the server by running the following command:

`php artisan serve`
