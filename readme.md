# Tagvote

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/854350c061bc49d9b6f0bb90f99018f4)](https://www.codacy.com/app/Tagvote/tagvote?utm_source=github.com&utm_medium=referral&utm_content=tagvote/tagvote&utm_campaign=badger)
[![StyleCI](https://styleci.io/repos/111306356/shield?branch=master)](https://styleci.io/repos/111306356)

Tagvote is a real-time social bookmarking for the 21st century. It's real-time, beautiful, customizable yet simple. To get a quick taste of what Tagvote is written with please check our [credits page](https://tagvote.com/credits).

## Contributing

Thank you for considering contributing to the Tagvote. To encourage active collaboration, Tagvote strongly encourages pull requests, not just bug reports. [Tagvote's Slack channel](https://join.slack.com/t/voten/shared_invite/MjMzMTQxMzM4MDM2LTE1MDM5OTQ0NjEtMWRiMDhiZTY2Yg) is created for developers to discuss Tagvote development concerns. If you have an idea (and not the code for it) you may contact us either with the support@tagvote.com email address or submit it to [#tagvotedev](https://tagvote.com/c/tagvotedev) channel.

## Coding Style

Tagvote follows the PSR-2 coding standard and the PSR-4 autoloading standard. Tagvote also uses [StyleCI](https://styleci.io) for automatically merging any style fixes. So you don't have to worry about your code style much.

## Software Stack

Tagvote is a Laravel application that runs on the following software:

- [Ubuntu](https://ubuntu.com)
- [Nginx](https://nginx.org/en) or Apache](https://httpd.apache.org)
- [MySQL 5.7+](https://www.mysql.com)
- [PHP 7.1+](https://php.net)
- [Redis 3.0+](https://redis.io)
- [Git 2.8.4+](https://git-scm.com)
- [Node v9.2.0](https://nodejs.org)
- [NPM 5.5.1](https://npmjs.com)
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
npm run prod
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
