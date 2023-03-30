# Docker Compose PHP Application

This is a Docker Compose-based PHP application that allows you to quickly set up a development environment for PHP-based applications. It includes an Apache web server, a MySQL database server a MongoDB server, PHPMyAdmin and Mongo Express for database administration.

## Requirements

- Docker Engine
- Docker Compose

## Installation

1. Clone this repository to your local machine:

`git clone https://github.com/innocious/BasicApplication.git`

2. Navigate to the root directory of the cloned repository:

`cd BasicApplication`
**Copy the contents of .env.example and create a .env file.** 
**Paste the contents of the .env.example into it and set your own values for the DB.**


3. Build the Docker images:
 
> For Development (Xdebug Enabled) set the BUILD_ENV variable in the docker-compose.yml file to developement.
> 
> Otherwise set BUILD_ENV to production to turn Xdebug off.

Run `docker-compose build`

4. Start the Docker containers:

Run `docker-compose up`

5. Open your web browser to see the running application.
- Go to http://localhost/index.php -> For Mysql
- Go to http://localhost/mongodb.php -> For Mongo DB

6. To access PHPMyAdmin, go to http://localhost:8085 in your web browser.

7. To access MongoExpress, go to http://localhost:8081 in your web browser.

8. To stop the containers, run: `docker-compose down`


## Configuration

### Web Server

The Apache web server is configured to serve files from the `/var/www/html/web` directory. Place your PHP files in this directory.

### Database

The MySQL database is configured in the initdb directory