
restart: sail down
lint: php-lint-run
analyze: api-analyze

composer-install:
	docker run --rm  -u "$(id -u):$(id -g)" -v $(pwd):/opt -w /opt laravelsail/php80-composer:latest composer install --ignore-platform-reqs

php-lint-run:
	./vendor/bin/sail composer lint
	./vendor/bin/sail composer cs-check


phplint-pull:
	docker pull overtrue/phplint:8.0

api-analyze:
	./vendor/bin/sail composer psalm
