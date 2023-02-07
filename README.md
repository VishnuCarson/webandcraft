








   git clone https://github.com/VishnuCarson/webandcraft.git

The command installs the project in a directory named `YourDirectoryName`. You can choose a different
directory name if you want.

### Install dependencies

Laravel utilizes [Composer](https://getcomposer.org/) to manage its dependencies. So, before using Laravel, make sure you have Composer installed on your machine.

    cd YourDirectoryName
    composer install

### Config file

Rename or copy `.env.example` file to `.env` 1.`php artisan key:generate` to generate app key.

1. Set your database credentials in your `.env` file
1. Set your `APP_URL` in your `.env` file.

### Database

1. Migrate database table `php artisan migrate`
1. `php artisan db:seed`, this will initialize settings and create and admin user for you [email: admin@gmail.com  - password: admin123]

### Install Node Dependencies

1. `npm install` to install node dependencies
1. `npm run dev` for development or `npm run build` for production

### Create storage link

`php artisan storage:link`

### Run Server

1. `php artisan serve` or Laravel Homestead
1. Visit `localhost:8000` in your browser. Email: `admin@gmail.com`, Password: `admin123`.
1. Online demo: [pos.khmernokor.com](https://pos.khmernokor.com/)

### Screenshots

#### Product list

https://github.com/VishnuCarson/webandcraft/blob/main/screencapture-localhost-8000-admin-products-2023-02-08-00_34_07.png

#### Create order

![Create order](https://raw.githubusercontent.com/angkosal/laravel-pos/master/screenshots/pos.png)

#### Order list

![Order list](https://raw.githubusercontent.com/angkosal/laravel-pos/master/screenshots/order_list.png)

#### Customer list

![Customer list](https://raw.githubusercontent.com/angkosal/laravel-pos/master/screenshots/customer_list.png)

[!["Buy Me A Coffee"](https://www.buymeacoffee.com/assets/img/custom_images/orange_img.png)](https://www.buymeacoffee.com/angkosal)
