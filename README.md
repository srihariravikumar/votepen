# Votepen

[![Last Deployed](https://img.shields.io/github/last-commit/votepen/votepen/master.svg?label=last%20deployed)](https://github.com/votepen/votepen/commits)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/6bfa966e461a4817aec1c21cad778301)](https://www.codacy.com/app/Votepen/votepen?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=votepen/votepen&amp;utm_campaign=Badge_Grade)
[![StyleCI](https://styleci.io/repos/111765544/shield?branch=master)](https://styleci.io/repos/111765544)
[![Codeship Status for votepen/votepen](https://app.codeship.com/projects/fd61d920-b306-0135-e64c-725c6ee79220/status?branch=master)](https://app.codeship.com/projects/258173)

Votepen is a real-time social bookmark platform. It's real-time, beautiful, customizable yet simple. To get a quick taste of what Votepen is written with please check our [credits page](https://votepen.com/credits).

## Contributing

Thank you for considering contributing to the Votepen. To encourage active collaboration, Votepen strongly encourages pull requests, not just bug reports. [Votepen's Slack channel](https://join.slack.com/t/votepen/shared_invite/enQtMjc0OTE3NDI2OTE2LTcyMDk2Nzc0OTI5MjIzNjBjNWRlMDlmMmY3ZWIyMzkyNmE1NmI3MDdiN2Q4OGQ1N2FkYWQ4ZjVkYTA1ZjY3YTI) is created for developers to discuss Votepen development concerns. If you have an idea (and not the code for it) you may contact us either with the support@votepen.com email address or submit it to [#votependev](https://votepen.com/c/VotepenDev) channel.

## Coding Style

Votepen follows the PSR-2 coding standard and the PSR-4 autoloading standard. Votepen also uses [StyleCI](https://styleci.io) for automatically merging any style fixes. So you don't have to worry about your code style much.

## Software Stack

Votepen is a Laravel application that runs on the following software:

- [Ubuntu 16.04+](https://ubuntu.com) (Use LTS)
- [Apache 2.4+](https://httpd.apache.org)
- [MySQL 5.7+](https://www.mysql.com)
- [PHP 7.1+](https://php.net)
- [Redis 3.0+](https://redis.io)
- [Git 2.8.4+](https://git-scm.com)
- [Node v9.2.0+](https://nodejs.org)
- [NPM 5.5.1+](https://npmjs.com)
- [Pusher](https://pusher.com) (we use [laravel-echo-server](https://github.com/tlaverdure/laravel-echo-server) on production server)
- [Algolia Search](https://www.algolia.com)

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

The login details for the admin user is `admin` and `admin`.

After running the seeder, be sure to clear your redis cache, you should now be able to navigate to `https://example.com/backend`

## Security Vulnerabilities

If you discover any security vulnerability within Votepen's source code, please send an e-mail to Yoginth at yoginth@aol.com instead of opening an issue. All security vulnerabilities will be promptly addressed.

## API

A public API is the next step of Votepen's development. In the meanwhile, if you're interested in developing applications on top of our API please contact us at support@votepen.com.
