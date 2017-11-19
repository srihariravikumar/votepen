# Tagvote

Tagvote is a real-time social bookmarking for the 21st century. It's real-time, beautiful, customizable yet simple. To get a quick taste of what Tagvote is written with please check our [credits page](https://tagvote.com/credits).

## Contributing

Thank you for considering contributing to the Tagvote. To encourage active collaboration, Tagvote strongly encourages pull requests, not just bug reports. [Tagvote's Slack channel](https://join.slack.com/t/voten/shared_invite/MjMzMTQxMzM4MDM2LTE1MDM5OTQ0NjEtMWRiMDhiZTY2Yg) is created for developers to discuss Tagvote development concerns. If you have an idea (and not the code for it) you may contact us either with the support@tagvote.com email address or submit it to [#tagvotedev](https://tagvote.com/c/tagvotedev) channel.

## Coding Style

Tagvote follows the PSR-2 coding standard and the PSR-4 autoloading standard. Tagvote also uses [StyleCI](https://styleci.io) for automatically merging any style fixes. So you don't have to worry about your code style much.

## Software Stack

Tagvote is a Laravel application that runs on the following software:

- Ubuntu 16.04.2 LTS
- Nginx 1.10+
- MySQL 5.7+ (to use mariaDB, you must modify `json` type migration columns to `blob` by running `sed -i 's/json(/binary(/g' *` inside the database/migrations/ directory in Linux)
- PHP 7.1+
- Redis 3.0+
- Git 2.8.4+
- [Pusher](https://pusher.com/) (we use [laravel-echo-server](https://github.com/tlaverdure/laravel-echo-server) on production server)
- [Algolia Search](https://www.algolia.com/referrals/fb684d54/join/)

To install all the required stack on a server, we recommend an auto-installation service such as [CodePier](https://codepier.io/?ref=tagvote).

## Installation Steps

After cloning the repository, first create a .env from the example file:

```
cp .env.example .env
```

Open ".env" file with your desired editor and enter your services info.
Now run below commands:

```
composer install
php artisan key:generate
php artisan migrate
php artisan passport:install
npm install
npm run production
```

### Create admin user

To create an admin user, run the below command from the root of the project

```
php artisan db:seed --class=AdminUserSeeder
```

The login details for the admin user is `admin` and `password`.

After running the seeder, be sure to clear your redis cache, you should now be able to navigate to `/backend`

## Security Vulnerabilities

If you discover any security vulnerability within Tagvote's source code, please send an e-mail to Sully Fischer at fischersully@gmail.com instead of opening an issue. All security vulnerabilities will be promptly addressed.

## API

A public API is the next step of Tagvote's development. In the meanwhile, if you're interested in developing applications on top of our API please contact us at support@tagvote.com.
