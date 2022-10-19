# phalcon-starter-kit
a phalcon starter kit with docker-compose

## Requirement
- linux environment or wsl
- docker / docker-compose
- do no run mysql and webserver in localhost (use 80,3306).

## how to install

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
