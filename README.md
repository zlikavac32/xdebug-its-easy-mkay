
## Install

Only one example (`parallel-execution.php`) requires a Composer install.


```
composer install
```

## Run

Following examples are made using my personal Docker files accessible at [https://github.com/zlikavac32/docker-files](https://github.com/zlikavac32/docker-files) .

Run application from mapped folder same as current. No server has to be configured to run this.

```
docker run \
    -it --rm \
    -w "$(pwd)" -v "$(pwd)":"$(pwd)" \
    php-xdebug:7.1 \
    -dxdebug.remote_enable=1 \
    -dxdebug.remote_autostart=1 \
    condition-breakpoint.php
```

Run HTTP server on port `8888` from mapped folder same as current. You still have to configure server but without path mapping.

```
docker run \
    -it --rm \
    -w "$(pwd)" -v "$(pwd)":"$(pwd)" \
    -p 8888:8888 \
    php-xdebug:7.1 \
    -dxdebug.remote_enable=1 \
    -dxdebug.remote_autostart=1 \
    -S 0.0.0.0:8888
```

Change mapped path to `/app`  and provide `PHP_IDE_CONFIG` environment variable in CLI. You should create server named `Demo` for this to work.

```
docker run \
    -it --rm \
    -w "/app" -v "$(pwd)":"/app" \
    -e PHP_IDE_CONFIG='serverName=Demo' \
    php-xdebug:7.1 \
    -dxdebug.remote_enable=1 \
    -dxdebug.remote_autostart=1 \
    condition-breakpoint.php
```

### parallel-execution.php

This example requires a running Redis server. This can be achieved using docker by executing

```
docker run --rm -it --name redis redis
```

which runs a server under the name `redis` (in Docker) which then can be linked to other containers. Now you can run the example.

```
docker run \
    -it --rm \
    -w "$(pwd)" -v "$(pwd)":"$(pwd)" \
    --link redis \
    php-xdebug:7.1 \
    -dxdebug.remote_enable=1 \
    -dxdebug.remote_autostart=1 \
    parallel-execution.php
```

If you are not using Docker to run these examples, you can still use Docker to run Redis server except you have to expose port.

```
docker run --rm -it --name redis -p 6379:6379 redis

```
