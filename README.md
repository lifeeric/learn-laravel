<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

![Video Demo](laravel.mov)

### Start

Kick in the development server (but make sure you're having the postgresql installed, check db config in .env file):

```bash
php artisan serve
```

### Making API Requests with curl

Below are curl commands to interact with your Laravel API. Replace http://localhost:8000 with your actual API base URL if different.

#### Index (GET all books)

Retrieve all books from the API:

```bash
curl -X GET http://localhost:8000/api/books
```

#### Store (POST a new book)

Add a new book with the following data:

```bash
curl -X POST http://localhost:8000/api/books \
     -H "Content-Type: application/json" \
     -d '{
           "name": "The Great Gatsby",
           "author": "F. Scott Fitzgerald",
           "published_date": "1925-04-10"
         }'
```

#### Show (GET a specific book by ID)

Retrieve a specific book by its ID (replace 1 with the actual book ID):

```bash
curl -X GET http://localhost:8000/api/books/1
```

#### Update (PUT or PATCH an existing book)

Update an existing book with the following data (replace 1 with the actual book ID):

```bash
curl -X PUT http://localhost:8000/api/books/1 \
     -H "Content-Type: application/json" \
     -d '{
           "name": "The Great Gatsby Updated",
           "author": "F. Scott Fitzgerald",
           "published_date": "1925-04-10"
         }'
```

#### Destroy (DELETE a book)

Delete a specific book by its ID (replace 1 with the actual book ID):

```bash
curl -X DELETE http://localhost:8000/api/books/1
```
