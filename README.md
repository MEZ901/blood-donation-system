# BloodLink Backend

BloodLink Backend is a web application that allows users to donate blood at hospitals and blood banks. It is built using Laravel and MySQL.

## Prerequisites

- PHP (v7.4 or higher) installed on your machine
- Composer installed on your machine
- MySQL installed on your machine
- A web server (such as Apache or Nginx)

## Getting Started

1. Clone the repository: ``git clone git@github.com:MEZ901/bloodlink_backend.git``
2. Navigate to the project directory: ``cd bloodlink_backend``
3. Install the dependencies: ``composer install``
4. Create a .env file by copying the .env.example file: ``cp .env.example .env``
5. Update the .env file with your MySQL database credentials
6. Generate an application key: ``php artisan key:generate``
7. Run the database migrations: ``php artisan migrate``
8. Start the development server: ``php artisan serve``

## Features

Here are some key features of the BloodLink Backend project:

- Admin can create and manage sub-admins
- Admin can view and manage donor information
- Admin can generate reports on blood donation activity
- Sub-admin can view and manage donor information
- Sub-admin can view a list of scheduled blood donation appointments
- Sub-admin can confirm that the donation process completed
- Sub-admin can record blood donation activity at their location
- Sub-admin can update the availability of different blood types at the hospital
- Donor can register to donate blood
- Donor can view their donation history
- Donor can schedule appointments to donate blood
- Donor can view upcoming blood drives
- Donor can view the availability of different blood types at the hospital

## contributing

We welcome contributions to the BloodLink Backend project. If you find a bug or have a feature request, please open an issue in the repository. If you would like to contribute code, please fork the repository and submit a pull request.