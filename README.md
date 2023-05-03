# Edukar Scholarship Application Management System

## Description

####  Scholarship Application System is an online application which helps those applicants who are residents in General Santos City to lessen their effort applying for Edukar scholarship. System filters the most qualified applicants from registration to application and to rate the applicant based on their profile information which helps scholarship coordinator to determine who is the qualified applicants.

#### Scholarship coordinator can manage applicant's submission and select qualified and rejected applicants. Scholarship coordinator can send announcements to applicants via email and system's notification. Scholarship coordinator may also post their activities and featured scholars to be posted in landing page. This system allows scholarship coordinator to view and export annual data records of application.

# Getting Started

## Installation

### Clone the repository

```
git clone git@github.com:cur1ousFranz/laravel-scholarshipsystem.git
```
### Navigate to main directory

```
cd laravel-scholarship-system
```
### Install required dependencies

```
composer install
```

### Copy the example env file and make the required configuration changes in the .env file

```
cp .env.example .env
```

### Generate a new application key

```
php artisan key:generate
```

### Run the database migrations (Set the database connection in .env before migrating)

```
php artisan migrate
```

### Start local development server.

```
php artisan serve
```

#### You can now access the server at http://127.0.0.1:8000

## Database seeding

#### Populate the database with seed data with relationship that includes user, coordinator, list of courses in a particular school, family income brackets as well as dynamic address. This can help you to start creating applicants and scholarship application. In order that applicant can apply, there must be a scholarship application published, otherwise the apply button will be disabled.

### Run the database seeder and you're done.

```
php artisan db:seed
```

#### ***Note:*** It's recommended to have a clean database before seeding. You can refresh your migrations at any point to clean the database by running the following command

```
php artisan migrate:fresh --seed
```

## Features

* Applicant Registration, Complete Profile (CRUD).
* Read Scholarship available, submit application (CRUD).
* Applicant recieves notification both email and system's notification.
* Coordinator can post blog about activities and featured scholars (CRUD).
* Read applicants and document attachments, mark applicant as qualified or rejected (CRUD).
* Coordinator can read the summary of evaluation based on applicants profile information and rate by percentage.
* Coordinator can send notification to applicants both email and system's notification.
* Coordinator can read data reports every school year and export data as pdf file (CRUD).
* Coordinator has functionality to update family income ranges as well as adding course in particular school (CRUD).
