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

---

## PDF Generator

-   I am using `https://spatie.be/docs/browsershot/v4/installation-setup`
    `composer require spatie/browsershot`
    `npm install puppeteer`

---

### Add Grade/classes for teachers and students

-   [many-to-many relationship] (https://laravel.com/docs/8.x/eloquent-relationships#many-to-many)
-   Well, we refer grade as classes, like 1A, 2B, 3C, etc. Every grades must be unique.
-   You can add grade/classes for teachers and students by adding them in the respective tables.
-   Admins are responsible for adding teachers and students.
-   At the moment teachers can only see their classes and students can only see their grades.

### Students issues on parents profile

-   If students are not showing on their parents profile, it is because they have not added their profile.
-   It's also due to parents not updated their profile.
-   Or, the ID which is called parent_id could be wrong.
-   To solve this issue, you can add the student's profile by clicking on the "Add Student" button on the parent's profile page.

To beautify the text, you can use the following code:

-   composer require mews/purifier
