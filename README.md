# 📚 Online Book Store – Laravel Fullstack Project

A simple online book store built with **Laravel** and **MySQL**, following the requirements for the Laravel Developer interview task.

Users can browse, search, and view books. Admins can log in to manage the book catalog (add, edit, delete books, set availability and price). The home page also shows live weather data via a public API.

---

## 🚀 Features

### Public

-   Home page with latest books and live weather (Weather API)
-   Browse all books with pagination
-   Search books by title or author
-   View book details with cover image, description, price, and availability

### Admin

-   Secure login & dashboard
-   View total books, available books, and categories
-   Add new books (with cover image upload)
-   Edit and delete existing books
-   Manage book availability and price

---

## 🛠️ Tech Stack

-   **Backend**: Laravel (Latest version)
-   **Frontend**: Blade templates, Tailwind CSS / Bootstrap
-   **Database**: MySQL
-   **API Integration**: Weather API (location-based)
-   **Image Storage**: Laravel storage (`storage/app/public`)

---

## Install dependencies

composer install
npm install && npm run build

## Environment setup

cp .env.example .env
php artisan key:generate

## Database migration & seeding

php artisan migrate --seed

## Storage link

php artisan storage:link

## Run the application

php artisan serve
