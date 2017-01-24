<p align="center"><img src=""/></p>
<p align="center"> LAZ - Open Source Social Network Made Simple.</p>

[![Latest Stable Version](https://poser.pugx.org/ctl/LAZ/v/stable?format=flat-square)](https://packagist.org/packages/ctl/LAZ)
[![Build Status](https://travis-ci.org/Core-Tech-Labs/LAZ.svg?branch=master)](https://travis-ci.org/Core-Tech-Labs/LAZ)
[![Coverage Status](https://coveralls.io/repos/Core-Tech-Labs/LAZ/badge.svg?branch=master&service=github)](https://coveralls.io/github/Core-Tech-Labs/LAZ?branch=master)
[![Software License](https://img.shields.io/badge/License-EPL-green.svg?style=flat-square)](LICENSE.md)
[![Total Downloads](https://poser.pugx.org/ctl/LAZ/downloads?format=flat-square)](https://packagist.org/packages/ctl/LAZ)
[![Latest Unstable Version](https://poser.pugx.org/ctl/LAZ/v/unstable?format=flat-square)](https://packagist.org/packages/ctl/LAZ)



## About LAZ
LAZ is a open source social network that uses the expressive and easy to use [Laravel Framework](https://github.com/laravel/laravel) to easily build "social network like" features such as:

  - [Favoriting Users](https://github.com/Core-Tech-Labs/SocialMapFavorites)
  - [Messaging Users](https://github.com/Core-Tech-Labs/LaravelXMPP)
  - Posting on Users Profiles
  - Notifying Users on key events
  - Showing Online Users

It is ready for initial production use but was made in mind to be flexible for developers and web masters to a add features specific to their target audience.

## Installation

  ### Prerequisites ###

We recommend using [Corebox](https://github.com/RudyJessop/Corebox) which was used in the development and QA stages of this application. If you choose to use another Virtual Machine check for the following:

| Prerequisites | Command To check  |
|---------------|:------------------|
| Apache or Nginx| `apache2 -v` `nginx -v`|
| PHP 5.5.9 or 7.0 | `php -v`|
| MySQL 5.6| `mysql -u root -p`|
| Redis Server |  `redis-server`|
| Node.js | `npm -v`  |

  ### Quick Setup ###

  - Download `git clone https://github.com/Core-Tech-Labs/LAZ` OR
  `composer require ctl\laz`

  - `cd LAZ`

  - `mv .env.example .env` (Add values based on your settings)

  - `vagrant up`

  - `vagrant ssh`

  **Before migrating database you would need to configure your mysql server and the [database.php](https://github.com/Core-Tech-Labs/LAZ/blob/master/config/database.php) via the `.env` file**

  - `php artisan migrate`



## Contributing

Read [Contribution Wiki](https://github.com/Core-Tech-Labs/LAZ/wiki/Contributing) for an extensive run down.


## License

LAZ is published under the [Eclipse Public License v 1.0](http://opensource.org/licenses/EPL-1.0)
