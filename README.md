## Large Laravel  - how to build large and maintainable project with Laravel framework

This repo contains an example project like [goodreads](https://goodreads.com) site where you can rate different books and write reviews about them.
Ideas behind this project include:

 - codebase must be easy to maintain and scale
 - code must be easy to refactor
 - an IDE should provide good autocomplete with minimal setup
 - use as few magic methods as possible, even better to remove them at all
 - if possible, make code independent on a framework
 - not to use Eloquent relationships, as they make code hard to refactor and maintain
 
 In this project DTOs are used for transfering data between objects and thanks to PHP 7.4 typed properties we can construct DTOs without annotations. Thanks to the author of this [article](https://dev.to/zubairmohsin33/data-transfer-object-dto-in-laravel-with-php7-4-typed-properties-2hi9) and spatie for their [package](https://github.com/spatie/data-transfer-object).
 
 ### TODO:

 - move console, http kernels and RouteProvider to Core folder
 - write installation guide
 - add to readme ideas and patterns used in the project
 - deploy to Heroku
 - buy a domain for the project
 - add CI/CD
