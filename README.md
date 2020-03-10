# Large Laravel  - how to build large and maintainable projects with Laravel framework

## Welcome to Large Laravel

- [Introduction](#Introduction)
	- [Goals of the project](#Goals)
- [Installation guide](#Installation-Guide)
- [Code structure](#Code-Structure)
- [Main components and ideas](#Main-Components-And-Ideas)
    - [Design patterns used for the project](#Design-Patterns-Used)
    - [Actions](#Actions)
    - [Subactions](#Subactions)
    - [Interaction with database](#Interaction-With-Database)
    - [Collections of DTOs and typed collections](#Collections-Of-DTOs)
    - [Entity relations](#Entity-Relations)
    - [Decorators](#Decorators)
    - [Requests](#Requests)
    - [API resources](#API-Resources)
    - [View composers](#View-Composers)
- [TODO](#Todo)

<a id="Introduction"></a>
# Introduction

If you programmed with Laravel and PHP you are really pleased how clean Laravel's code is and how simple it is to create apps with Laravel framework. But later you understand that Laravel does not suit well for large scale projects for a few reasons: Laravel uses lots of magic methods and facades which makes it very hard to refactor your code as IDEs understand Laravel's code pretty poorly.

But Laravel has pretty good infrastructure (routing, caching, logging etc.) and it has really good community and lots of ready-made packages. And that's why I decided to adopt Laravel for large and maintainable apps by starting this project.

Also, I would like to share with the community how design patterns may be used in Laravel projects.

<a id="Goals"></a>
## Goals of the project

Goals of this project include:

 - codebase must be easy to maintain and scale
 - code must be easy to refactor
 - an IDE should provide good autocomplete with minimal setup
 - use as few magic methods as possible, even better to remove them at all
 - if possible, make code independent on a framework
 - not to use Eloquent relationships, as they make code hard to refactor and maintain
 
 <a id="Installation-Guide"></a>
# Installation guide
For running the project you must have PHP 7.4.2.
To run the project, create an empty database.
Then just do the following:

    git clone https://github.com/stasyanko/laravel-large-project.git
    cd laravel-large-project
	cp .env.example .env
	

In .env file type your database credentials in these lines:

    DB_CONNECTION=mysql  
    DB_HOST=127.0.0.1  
    DB_PORT=3306  
    DB_DATABASE=laravel  
    DB_USERNAME=root  
    DB_PASSWORD=
After that, run these commands from terminal:
		
    composer install
    php artisan key:generate
    php artisan migrate
	    
 <a id="Main-Components-And-Ideas"></a>
# Main Components & Ideas

In this part main components, ideas and design principles are explained in detail.

<a id="Design-Patterns-Used"></a>
## Design patterns used for the project
 
 In this project DTOs are used for transfering data between objects and thanks to PHP 7.4 typed properties we can construct DTOs without annotations. Thanks to the author of this [article](https://dev.to/zubairmohsin33/data-transfer-object-dto-in-laravel-with-php7-4-typed-properties-2hi9) and spatie for their [package](https://github.com/spatie/data-transfer-object).

 The following design patterns were used to build this project:
 - data transfer object
 - proxy
 - porto
 - decorator
 - iterator

<a id="Actions"></a>
## Actions
//TODO

<a id="Subactions"></a>
## Subactions
//TODO

<a id="Interaction-With-Database"></a>
## Interaction with database
//TODO

<a id="Collections-Of-DTOs"></a>
## Collections of DTOs and typed collections
//TODO

<a id="Entity-Relations"></a>
## Entity relations
//TODO

<a id="Decorators"></a>
## Decorators
//TODO

<a id="API-Resources"></a>
## API resources
//TODO

<a id="View-Composers"></a>
## View composers
//TODO

 <a id="Todo"></a>
# TODO

 - ~~move console, http kernels to Core folder~~
 - ~~move RouteServiceProvider to Core folder~~
 - make abstract class Filter that has method makeWhere() which returns collection of Where interfaces and every filter will extend this class and will implement its own interface
 - write installation guide
 - write wiki documentation with all design patterns and principles used 
 - add to readme ideas and patterns used in the project
 - deploy to Heroku
 - buy a domain for the project
 - add CI/CD
