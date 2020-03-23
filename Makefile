ifeq ($(OS),Windows_NT)
	ROOT_DIR = $(CURDIR)
else
	ROOT_DIR = $(shell dirname $(realpath $(lastword $(MAKEFILE_LIST))))
endif

init: composer-update up
composer-update:
	docker run --rm --interactive --tty \
      --volume $(ROOT_DIR):/app \
      --user $(id -u):$(id -g) \
      composer install --ignore-platform-reqs --no-scripts
up:
	cd docker/ && docker-compose up -d
down:
	cd docker/ && docker-compose down
run-test:
	cd docker/ \
	&& docker-compose up -d \
	&& docker-compose exec php-fpm bash -c "vendor/phpunit/phpunit/phpunit --colors=always"