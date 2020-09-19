SHELL := /bin/bash

reset:
	symfony console doctrine:database:drop --force
	symfony console doctrine:database:create
	symfony console doctrine:migrations:migrate -n
	symfony console doctrine:fixtures:load -n
.PHONY: reset

restart:
	symfony server:stop
	symfony server:start -d
.PHONY: restart