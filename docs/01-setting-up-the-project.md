# Setting up the project

We are using docker to setup this project, with containers for various services. Make sure you have the following
installed:

- GIT [↗](https://git-scm.com/book/en/v2/Getting-Started-Installing-Git)
- Docker [↗](https://docs.docker.com/engine/install/)
- Compose CLI / docker-compose
  - Compose CLI comes with Docker Desktop. Hence it will be packaged with Docker-Desktop (Windows / Mac)
  - docker-compose (docker-compose-linux-x86_64) [↗](https://github.com/docker/compose/releases)
- Docker Desktop
  - Optional, but a great tool
  - Install on Windows [↗](https://docs.docker.com/desktop/install/windows-install/)
  - Install on Linux [↗](https://docs.docker.com/desktop/install/linux-install/)

## Start the docker containers

Enter the folder where the repository / project resides. To start the containers, issue the following command:

```shell
$ docker compose up -d
```

If it's the first time you are starting the containers, then they will be created before being started.

## Docker services

| # | Service    | Image                  | Version            | Ports                           |
|---|------------|------------------------|--------------------|---------------------------------|
| 1 | sf-caddy   | Caddy                  | 2.6-builder-alpine | 80:80 (tcp), 443:443 (tcp, udp) |
| 2 | sf-php     | PHP-FPM                | 8.2-fpm-alpine     | -                               |
| 3 | sf-db      | Postgres               | 15                 | *:5432                          |
| 4 | sf-mailer  | schickling/mailcatcher | latest             | *:1080                          |
| 5 | sf-node    | nodejs                 | 19-alpine          |                                 |

The [Caddy web server](https://caddyserver.com/) exposes the ports 80 and 443 onto the host. Meaning that you can access
the web server using the following URL:
- [http://localhost](http://localhost) (port 80)
- [https://localhost](http://localhost) (port 443)

Internally Postgres port is 5432 but exposes (or maps) this port so that we can access this service from the host; same
for the mail-catcher (which is used during development only).

To view the mail-catcher's dashboard, use the exposed port which you can find in Docker-Desktop UI. Another way to get
the exposed port is to list the services using the command line: 

```shell
$ docker compose ps
```
The mail-catcher's UI can be access via this URL: `http://localhost:$exposed-port`

Similarly, if you want to view the tables or any data in the Postgres DB **from the host**, via a **client**, you can use the
following params:

| PARAMS   | VALUES          |
|----------|-----------------|
| Host     | localhost       |
| Port     | `$exposed-port` |
| Username | app             |
| Password | passwd          |


