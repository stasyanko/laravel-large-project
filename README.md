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
- [Laravel artisan commands](#Laravel-Artisan-Commands)
    - [Seeding](#Seeding)
- [TODO](#Todo)

<a id="Introduction"></a>
# Introduction

If you programmed with Laravel and PHP you are really pleased how clean Laravel's code is and how simple it is to create apps with Laravel framework. But later you understand that Laravel does not suit well for large scale projects for a few reasons: Laravel uses lots of magic methods and facades which makes it very hard to refactor your code as IDEs understand Laravel's code pretty poorly.

But Laravel has pretty good infrastructure (routing, caching, logging etc.) and it has really good community and lots of ready-made packages. And that's why it was decided to adopt Laravel for large and maintainable apps by starting this project.

Also, it would be great to share with the community how design patterns may be used in Laravel projects.

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

Actions are used to incapsulate busines logic and must be used only from controllers.

<a id="Subactions"></a>
## Subactions

Subactions are used to extract busines logic that needs to be reused in other containers.

<a id="Interaction-With-Database"></a>
## Interaction with database

Eloquent does not suit for large scale projects as it uses lots of magic under the hood.
In order to scale your codebase, you need to either wrap Eloquent in some abstraction, or replace it with something like Doctrine ORM. 
In the current project Eloquent is wrapped in a class called Proxy, e.g. BookEloquentProxy. 
Often developers call it Repository when wrapping Eloquent with something, but it is a mistake, as Repository assumes the following according to Edward Hieatt and Rob Mee:

*Mediates between the domain and data mapping layers using a collection-like interface for accessing domain objects.*

But developers often call their abstraction like UserEloquentRepository, but according to the definition above Repository shouldn't know anything about the way the data is stored.
So, it would be better better to call this abstraction Proxy. According to Wikipaedia Proxy pattern does the following:

*In short, a proxy is a wrapper or agent object that is being called by the client to access the real serving object behind the scenes.*

After we get data from some EloquentProxy, for example BookEloquentProxy, we need to convert this data to collection of DTOs:

    public function execute(PaginateRequestInterface $paginateRequest): BookCollection  
    {  
        $bookCollection = [];  
        $bookList = $this->bookEloquentProxy->findAll(  
            [],  
            $paginateRequest->getLimit(),  
            $paginateRequest->getOffset()  
        );  
        foreach ($bookList as $book) {  
            $bookCollection[] = new BookDTO($book);  
        }  
        return new BookCollection(...$bookCollection);  
    }

This approach is good for two reasons: we have a typed collection and we can refactor easily both every entity of a collection, and a collection itself. Also, we can typehint BookCollection when passing it as a param:

    public function fromCollection(BookCollection $bookCollection): array  
    {  
        $mappedCollection = [];  

        foreach ($bookCollection as $bookDTO) {  
            $mappedCollection[] = [  
                // any IDE will provide autocomplete here 
                // without any additional packages like IDE helper for Laravel
                'id' => $bookDTO->id,  
                'title' => $bookDTO->title,  
            ]; 
        }  
        return $this->wrapResponse($mappedCollection);  
    }


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

 <a id="Laravel-Artisan-Commands"></a>
# Laravel artisan commands

Some classes of Laravel in the project are moved to Ship folder and some artisan commands are run with additional options.

<a id="Seeding"></a>
## Seeding

To seed database run db:seed like this with option --class:

    php artisan db:seed --class '\LargeLaravel\Ship\Seeders\DatabaseSeeder'

Your custom seeders must be in the  Data folder of the proper container, e.g. Containers/User/Data/Seeders/UserSeeder.

 <a id="Todo"></a>
# TODO

 - ~~move console, http kernels to Ship folder~~
 - ~~move RouteServiceProvider to Ship folder~~
 - make interface Filter which is implemented by every Where class
 - ~~write installation guide~~
 - write tests
 - write documentation in readme with all design patterns and principles used 
 - deploy to Heroku
 - buy a domain for the project
 - add CI/CD
