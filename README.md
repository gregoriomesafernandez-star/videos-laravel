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

**Important:** Before running the migrations, you must manually create the database specified in `DB_DATABASE` (for example, using phpMyAdmin).

Generate the application key:

```bash
php artisan key:generate
```

Once the database has been created and the `.env` file configured, run:

```bash
php artisan migrate:fresh --seed
```

**Warning:** `migrate:fresh` will drop all existing tables before running the migrations. Only use this command with a new or test database.

Create the storage symbolic link:

```bash
php artisan storage:link
```

### Start the development server

Open two separate terminals in the project directory:

**Terminal 1 – Laravel server:**

```bash
php artisan serve
```

**Terminal 2 – Vite development server (CSS and JavaScript compiler):**

```bash
npm run dev
```

Keep both terminals running while using the application.

---

## Demo Data

The project includes sample users, videos and comments for testing purposes.

---

## Demo Users

You can use the following demo account:

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