SHELL := /bin/bash

reset:
	symfony console doctrine:database:drop --force
	symfony console doctrine:database:create
	symfony console doctrine:migrations:migrate -n
	symfony console doctrine:fixtures:load -n
.PHONY: reset

restart:
	docker-compose stop
	docker-compose up -d
	symfony console messenger:stop -n
.PHONY: restart