# http://fabien.potencier.org/symfony4-best-practices.html
# https://speakerdeck.com/mykiwi/outils-pour-ameliorer-la-vie-des-developpeurs-symfony?slide=47
# https://blog.theodo.fr/2018/05/why-you-need-a-makefile-on-your-project/
# https://www.strangebuzz.com/en/snippets/the-perfect-makefile-for-symfonys

SHELL := /bin/bash

help:
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$|(^#--)' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[32m %-43s\033[0m %s\n", $$1, $$2}' | sed -e 's/\[32m #-- /[33m/'

.PHONY: help
.DEFAULT_GOAL := help

#-- web server
serve: ## start the server
	symfony server:start -d
unserve: ## stop the server
	symfony server:stop
reserve: ## restart the server
	symfony server:stop
	symfony server:start -d

#-- logging
log: ## tail the logs
	symfony server:log

#-- workflow
workflow: ## create the workflow image
	symfony console workflow:dump comment | dot -Tpng -o workflow.png


#-- database doctrine
db: ## drop database and reset all data with newly created DB
	symfony console doctrine:database:drop --force
	symfony console doctrine:database:create
	symfony console doctrine:migrations:migrate -n
	symfony console doctrine:fixtures:load -n

#-- worker
worker: ## start the queue worker as daemon
	symfony run -d --watch=config,src,templates,vendor symfony console messenger:consume async
