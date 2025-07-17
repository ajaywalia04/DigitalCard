Digital Card Project
Project Overview
The Digital Card project is a modern web application designed to revolutionize professional networking. It allows users to create, customize, share, and manage digital business cards effortlessly. Moving beyond traditional paper cards, Digital Card offers an interactive and eco-friendly solution for exchanging contact information.

Key features include:

Customizable Digital Cards: Design your personal or business card.

Easy Sharing: Share your card instantly via unique links or QR codes.

Contact Management: Accept and organize digital cards from others, adding notes and categorizing contacts.

This project aims to provide a seamless and efficient way to connect in the digital age, making networking more dynamic and sustainable.

Installation Guide
Follow these steps to set up and run the Digital Card project on your local machine.

Step-by-Step Installation
Clone the Repository:
First, clone the project repository to your local machine:

git clone [your-repository-url] digital-card
cd digital-card

Install PHP Dependencies (Composer):
Install the necessary PHP packages using Composer:

composer install

Install Node.js Dependencies (npm):
Install the frontend dependencies using npm:

npm install

Create Environment File:
Copy the example environment file and create your own .env file. This file will store your database credentials and other application settings.

cp .env.example .env

Generate Application Key:
Generate a unique application key. This is crucial for security.

php artisan key:generate

Configure .env File:
Open the newly created .env file in a text editor and configure your database settings, mail settings, and any other relevant environment variables.

Example database configuration for MySQL:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=digital_card_db
DB_USERNAME=your_db_username
DB_PASSWORD=your_db_password

Build Frontend Assets:
Compile your CSS and JavaScript assets. If you are using Tailwind CSS, this step is particularly important to process your utility classes.

npm run build-css

Run Database Migrations:
Execute the database migrations to create the necessary tables in your configured database:

php artisan migrate

Serve the Application:
You can serve the application using PHP's built-in development server:

php artisan serve

Alternatively, configure your web server (Apache/Nginx) to point to the public directory of your project.

php artisan storage:link

Once these steps are completed, your Digital Card project should be up and running!
