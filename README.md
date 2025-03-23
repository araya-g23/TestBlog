## Laravel 8 Complete Blog

# ⚽ Football Blog Web Application

A dynamic Laravel-based football blog platform that enables users to stay updated with the latest football news, match fixtures, team rosters, and interact with various features such as player of the match voting and team following.

## 📌 Project Overview

The Football Blog application serves as an all-in-one hub for football fans. It includes features like:
- 📰 News and blog posts with image upload
- 🏟️ Team pages with stadium, coach, founding info, and players
- 🗓️ Fixtures listing (upcoming & past)
- 🏆 Team trophies display
- 🗳️ Player of the Match voting
- 👤 User registration, login, profile dashboard
- 📸 Profile picture upload/editing
- ❤️ Follow/unfollow favorite teams

---

## 🚀 Features

### News & Blog
- Create, edit, delete, and view detailed blog posts.
- Each post supports images and large formatted descriptions.

### Teams
- View list of popular football clubs.
- View individual team details including:
    - Stadium
    - Coach
    - Year founded
    - Logo
    - Players (by position)
    - Trophies

### Fixtures
- Slider-based UI to browse:
    - Upcoming Matches
    - Past Results

### Dashboard
- Profile overview (email, joined date).
- Upload and update profile picture with live preview.
- Logout button with modern UI.

### Authentication
- Secure Laravel Breeze-based auth.
- Conditional navbar based on user status (guest/authenticated).

---

## 🛠️ Setup Instructions

1. **Clone the repository**
   ```bash
   https://github.com/araya-g23/TestBlog.git


## Requirements
•	PHP 7.3 or higher <br>
•	Node 12.13.0 or higher <br>

## Usage <br>
Setting up your development environment on your local machine: <br>
```
git clone git@github.com:codewithdary/laravel-8-complete-blog.git
cd laravel-8-complete-blog
cp .env.example .env
composer install
php artisan key:generate
php artisan cache:clear && php artisan config:clear
php artisan serve
```

## Before starting <br>
Create a database <br>
```
mysql
create database laravelblog;
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

## Contributing
Do not hesitate to contribute to the project by adapting or adding features ! Bug reports or pull requests are welcome.
