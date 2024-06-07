# EKATTE

This is a Web application build on PHP 8.3.3. It's dockerized and for database uses a MySQL 8.4.0 and for server uses Nginx 1.27.0.
All dependencies are part of the Docker setup which you can find as part of the project. Keep in mind when you run Docker
setup it'll create a Database named '<b>ekatte</b>'. 

#### <b>To seed data in DB requires empty GET request to endpoint '/seeds'</b>

### Prerequisites

1. Docker - Can be downloaded/installed from the official [Docker page](https://docs.docker.com/get-docker/)

### Setup

To install the project locally type the following commands in your terminal:

```shell
git https://github.com/seeff00/ekatte.git
cd ekatte
docker-compose up -d
docker exec -it php bash
mv .env.dev .env
composer install
```

### Endpoints

| Endpoint                | Method | Description            |
|-------------------------|--------|------------------------|
| /areas                  | GET    | Areas                  |
| /areas-level-one        | GET    | Areas Level One        |
| /areas-level-two        | GET    | Areas Level Two        |
| /documents              | GET    | Documents              |
| /municipalities         | GET    | Municipalities         |
| /sof-territorial-units  | GET    | Sof Territorial Units  |
| /territorial-formations | GET    | Territorial Formations |
| /territorial-units      | GET    | Territorial Units      |
| /town-halls             | GET    | Town Halls             |
| /seeds                  | GET    | Seeders                |




### Usage

Open your favorite browser and enter '<b>[http://localhost:8080](http://localhost:8080)</b>' in URL field.