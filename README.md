<h1 align="center">Tuppence Boilerplate</h1>
<p align="center"><em>An Incredibly small PSR-7 "framework"</em></p>

<p align="center">
  <a href="https://packagist.org/packages/photogabble/tuppence-boilerplate"><img src="https://poser.pugx.org/photogabble/tuppence-boilerplate/v/stable.svg" alt="Latest Stable Version"></a>
  <a href="LICENSE"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About this boilerplate

This boilerplate wraps [Tuppence](https://github.com/photogabble/tuppence) with some project structure and includes a service provider for the [Plates PHP](http://platesphp.com/) template system and [Docrtine ORM](http://www.doctrine-project.org/projects/orm.html).

## Install

Install this project with composer `composer create-project photogabble/tuppence-boilerplate`

## PSR-7 Support

Tuppence supports PSR-7 and therefore you will find a lot of PSR-7 middleware libraries work out of the box, for example the below are known to work:

#### [bryanjhv/slim-session](https://github.com/bryanjhv/slim-session)
Middleware for initiating and managing Sessions.

#### [akrabat/rka-ip-address-middleware](https://github.com/akrabat/rka-ip-address-middleware)
Middleware that determines the clients IP address and stores it as a `ServerRequest` attribute.

#### [php-middleware/php-debug-bar](https://github.com/php-middleware/phpdebugbar)
Framework agnostic middleware for attaching [PHP Debug Bar](http://phpdebugbar.com/) to your response.
