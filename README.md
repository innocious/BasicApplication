# Docker Compose PHP Application

This is a Docker Compose-based PHP application that allows you to quickly set up a development environment for PHP-based applications. It includes an Apache web server, a MySQL database server, and PHPMyAdmin for database administration.

## Requirements

- Docker Engine
- Docker Compose

## Before you run

Copy the contents of .env.example and create a .env file. Paste the contents of the .env.example into it.

## Installation

1. Clone this repository to your local machine:

git clone https://github.com/innocious/BasicApplication.git

2. Navigate to the root directory of the cloned repository:

cd BasicApplication

3. Build the Docker images:
 
 | For Development (Xdebug Enabled) set the BUILD_ENV variable in the docker-compose.yml file to developement.
 Otherwise set BUILD_ENV to production to turn Xdebug off.

Run docker-compose build

4. Start the Docker containers:

Run docker-compose up

5. Open your web browser and go to http://localhost/index.php to see the running application.

6. To access PHPMyAdmin, go to http://localhost:8085 in your web browser.

7. 6. To access MongoExpress, go to http://localhost:8081 in your web browser.

7. To stop the containers, run: docker-compose down


## Configuration

### Web Server

The Apache web server is configured to serve files from the `public` directory. Place your PHP files in this directory.

### Database

The MySQL database is configured automatically in the initdb directory:

- Host: `db`
- Username: `root`
- Password: `root`
- Database: `app`

You can change these settings by modifying the `docker-compose.yml` file.

### PHPMyAdmin

PHPMyAdmin is configured to connect to the MySQL database at `db:3306`. You can access it by going to http://localhost:8081 in your web browser.