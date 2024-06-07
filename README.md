# EKATTE

This is a Web application build on PHP 8.3.3. It's dockerized and for database uses a MySQL 8.4.0 and for server uses Nginx 1.27.0.
All dependencies are part of the Docker setup which you can find as part of the project. Keep in mind when you run Docker
setup it'll create a Database named '<b>ekatte</b>'.

The project uses the next Software Design Patterns: MVC, Singleton pattern, Repository pattern, Dependency injection

#### <b>To seed data in DB requires empty GET request to endpoint '[/seeds](http://localhost:8080/seeds)'</b>

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

| Endpoint                | Method | Description            | Status |
|-------------------------|--------|------------------------| ------ |
| /areas                  | GET    | Areas                  | OK/In progress ... |
| /areas-level-one        | GET    | Areas Level One        | In Progress ... |
| /areas-level-two        | GET    | Areas Level Two        | In Progress ... |
| /documents              | GET    | Documents              | In Progress ... |
| /municipalities         | GET    | Municipalities         | In Progress ... |
| /sof-territorial-units  | GET    | Sof Territorial Units  | In Progress ... |
| /territorial-formations | GET    | Territorial Formations | In Progress ... |
| /territorial-units      | GET    | Territorial Units      | In Progress ... |
| /town-halls             | GET    | Town Halls             | In Progress ... |
| /seeds                  | GET    | Seeders                | In Progress ... |


### Usage

Open your favorite browser and enter '<b>[http://localhost:8080](http://localhost:8080)</b>' in URL field.

### To do

- Pagination in tables.
- Code optimization on how we handles server request arguments.
- Remove duplicate code.
- CSS Stylizations.
- Try/catch exception handlers.
- Error logging.
- Clear forms inputs.
