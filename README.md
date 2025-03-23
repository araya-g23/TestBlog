# ⚽ Football Blog – Laravel 8 Web Application

A dynamic Laravel-based football blog platform that enables users to stay updated with the latest football news, match fixtures, team rosters, and interact through features like player voting and following teams.

---

## 📌 Project Overview

The Football Blog application is designed for fans to engage with:
- 📰 News & blog posts with rich text and images
- 🏟️ Team profiles (stadium, coach, players, trophies)
- 🗓️ Fixture slider for upcoming & past matches
- 🗳️ Player of the Match voting
- 👤 User authentication and dashboards
- 📸 Profile picture upload and editing
- ❤️ Follow/unfollow your favorite teams

---

## 🚀 Features

### 📰 News & Blog
- Create, edit, delete, and view blog posts
- Upload images and long-form content
- Responsive news grid with pagination

### 🏟️ Teams
- Browse team pages with:
    - Logo
    - Coach
    - Stadium
    - Founded year
    - Squad (by position)
    - Trophy count

### 🗓️ Fixtures
- Slider-style upcoming and past fixtures
- View match details, vote Player of the Match

### 👤 Dashboard
- View profile info (name, email, join date)
- Upload & update profile picture
- Logout securely

### 🔐 Authentication
- Laravel Breeze-based login & register
- Role-based navbar UI (guest vs logged in)

---

## 🛠️ Setup Instructions

### 1. Clone the Repository
```bash
git clone https://github.com/araya-g23/TestBlog.git
cd TestBlog

Install Dependencies
````
composer install
npm install && npm run dev
cp .env.example .env
php artisan key:generate



```


## Before starting <br>
Create a database <br>
```
mysql
CREATE DATABASE football_blog;
exit;
```

Setup your database credentials in the .env file <br>
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=football_blog
DB_USERNAME=root
DB_PASSWORD=
```

Migrate the tables
```
php artisan migrate
```
Start the Server
```
php artisan serve
```
Visit the application at [http://localhost:8000](http://localhost:8000)
