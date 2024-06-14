# Oceanwell

This repository contains the code for the Oceanwell project, built with Laravel and styled using Tailwind CSS.

What is OceanWell:
A web project designed to raise awareness and drive action for marine conservation. OceanWell provides an innovative platform where users can donate to conservation projects, volunteer for marine preservation activities, and access educational content about the importance of marine biodiversity.

Key Features:
1. Donation Platform: Engage with an effective donation system that ensures transparency, ease, and motivation for users to support marine conservation initiatives.
2. Volunteer Integration: Seamlessly sign up for, discover, and participate in ocean conservation events through our integrated volunteer platform.
3. Educational Content: Explore high-quality, informative articles that enhance understanding and awareness of marine environmental issues.

## Table of Contents

- [Prerequisites](#prerequisites)
- [Installation](#installation)
- [Configuration](#configuration)
- [Running the Application](#running-the-application)

## Prerequisites

Before you begin, ensure you have met the following requirements:

- PHP >= 8.1.10
- Composer
- Node.js & npm
- MySQL or any other compatible database

## Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/MarioOrlando82/oceanwell-be.git
    cd oceanwell-be
    ```

2. Install PHP dependencies:

    ```bash
    composer install
    ```

3. Install Node.js dependencies:

    ```bash
    npm install
    ```

## Configuration

1. Copy the `.env.example` file to `.env`:

    ```bash
    cp .env.example .env
    ```

2. Generate an application key:

    ```bash
    php artisan key:generate
    ```

3. Configure your database settings in the `.env` file:

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_user
    DB_PASSWORD=your_database_password
    ```

## Running the Application

1. Run the database migrations:

    ```bash
    php artisan migrate:fresh
    ```

2. Seed the database (optional):

    ```bash
    php artisan db:seed
    ```

3. Build the front-end assets:

    ```bash
    npm run dev
    ```

4. Start the local development server:

    ```bash
    php artisan serve
    ```

    By default, the server will be accessible at `http://127.0.0.1:8000`.


THANK YOU!
