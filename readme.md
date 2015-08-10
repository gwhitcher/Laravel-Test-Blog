## LBLOG

Built By: [(https://georgewhitcher.com)](George Whitcher)

LBLOG is a rewrite from the ground up of the LBLOG software for Laravel 5.X.  It utilizes JQUERY and BOOTSTRAP 3.  LBLOG 2.0 is open source for you to enjoy and contribute to.

### Install

The easiest way to install LBLOG is with composer.

1. php composer.phar install
2. Rename .env.example to .env
3. php artisan key:generate
4. Setup database in MYSQL and enter host, username, and password in .env.
5. php artisan migrate
6. php artisan db:seed (Optional: For test data)
7. php artisan serve
8. Visit http://localhost:8000/admin in your browser.  Login with admin@admin.com : password.

### Support

LBLOG is still in development and is not suggested to be used for a production environment.  If you decide to do so I am not responsible for your results.  If you need support you can obtain it at [GeorgeWhitcher.com](http://georgewhitcher.com)

### License

LBLOG is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
