# <p align="center">Template BE Laravel 10</p>

## Installation

-   Docker: https://www.docker.com/products/docker-desktop
-   PHP version >= 8.1

## Usage

-   Go to the project root folder
-   Generate env file: `cp .env.example .env`
-   Install dependencies: `composer install`
-   Run docker: `./vendor/bin/sail up`
-   Browse: `http://localhost/api/posts`

## Sample APIs:

- Open APIs
```php
    // post
    Route::get('/posts', [PostController::class, 'list']);
    Route::get('/posts/{id}', [PostController::class, 'getOne']);
    Route::post('/posts', [PostController::class, 'store']);
    Route::patch('/posts/{id}', [PostController::class, 'update']);
    Route::delete('/posts/{id}', [PostController::class, 'destroy']);
```

- Authenticated APIs
```php
    // category
    Route::get('/categories', [CategoryController::class, 'list']);
    Route::get('/categories/{id}', [CategoryController::class, 'getOne']);
    Route::post('/categories', [CategoryController::class, 'store']);
    Route::patch('/categories/{id}', [CategoryController::class, 'update']);
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);
```