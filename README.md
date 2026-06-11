# Video Platform App (Laravel)

A video sharing platform built with Laravel where users can register, upload videos, add thumbnails, manage their content and interact through comments.

---

## Features

- User registration and login
- Video upload
- Video thumbnails
- Video player
- Comments system
- User channels
- Video search
- Video editing
- Video deletion
- Responsive design
- Demo data with seeders

---

## Technologies

- PHP
- Laravel
- Eloquent ORM
- MySQL
- Blade
- Tailwind CSS
- Alpine.js
- JavaScript

---

## Installation

Clone the repository:

```bash
git clone https://github.com/gregoriomesafernandez-star/videos-laravel.git
cd videos-laravel
composer install
npm install
```

Configure the database in the `.env` file:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=database_name
DB_USERNAME=username
DB_PASSWORD=password
```

Generate the application key:

```bash
php artisan key:generate
```

Run database setup:

```bash
php artisan migrate:fresh --seed
```

Start the development server:

```bash
php artisan serve
npm run dev
```

---

## Demo Data

The project includes sample users, videos and comments for testing purposes.

---

## Demo Users

You can use the following demo accounts:

- Email: user@test.com  
- Password: 12345678  
---

## Usage

You can register a new user or use the generated demo data to explore the application:

- Upload videos
- Add comments
- Edit videos
- Delete videos
- Search videos
- Browse user channels

---

## Author

Gregorio Mesa

---
