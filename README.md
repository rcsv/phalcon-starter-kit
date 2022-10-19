# Phalcon Starter Kit
phalcon-starter-kit is a phalcon starter kit with docker-compose.

## Overview

It is not easy to build a Phalcon's environment... It is not an exaggeration to say that Phalcon can spend days just building the environment. With the helo of Docker, we build the environment in one fell swoop.

## Requirement
- Linux environment or WSL
- Docker & Docker-compose
- do no run mysql and webserver in localhost (use 80,3306).

## Usage / how to install

```bash
$ git clone https://github.com/rcsv/phalcon-starter-kit.git
$ cd phalcon-starter-kit/docker
$ docker-compose up -d
```

and, then:

```bash
$ docker exec -it php /bin/bash
```

to check webserver: check [localhost](https://localhost/)

## Reference
- [Phalcon - A full-stack PHP fraemwork delivered as a C-extension](https://phalcon.io/en-us)

## License
今の所なし
