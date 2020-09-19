history | grep symfony
cd symfony5/guestbook/
ls /Users/zhoux/.symfony/var/
rm -rf /Users/zhoux/.symfony/var/fed2b1088a069e0c5516fb208409a66fe9ccb807.pid
rm -rf /Users/zhoux/.symfony/var/fed2b1088a069e0c5516fb208409a66fe9ccb807
rm -rf /Users/zhoux/.symfony/var/*
symfony console messenger:consume async
symfony console messenger:stop -n
symfony run -d --watch=config,src,templates,vendor symfony console messenger:consume async
symfony5/
symfony server:start -d
symfony console messenger:stop -f
symfony console messenger:stop
cd symfony5/
symfony new contractler --version=5.0
symfony console workflow:dump comment | dot -Tpng -o workflow.png
symfony open:local:rabbitmq
symfony console doctrine:fixtures:load -n
symfony console doctrine:fixtures:load
symfony console doctrine:migrations:migrate -n
symfony console doctrine:database:create
symfony console doctrine:database:create main
symfony console doctrine:database:drop --force
symfony console doctrine:schema:drop --force
symfony console doctrine:schema:drop -n
symfony console doctrine:
symfony console d:m:m -n
symfony run psql -c "INSERT INTO admin (id, username, roles, password) \
symfony console make:migration
symfony console d:m:m
symfony console make:entity Conference
symfony console make:subscriber TwigEventSubscriber
symfony env:debug
symfony composer req twig
yarn add --dev @symfony/webpack-encore
symfony composer req "admin:^2.0"
symfony composer remove admin
symfony composer remove "admin:^2.0"
symfony composer remove doctrine/common
symfony open:local
symfony console make:admin:crud
symfony console make:admin:dashboard
symfony composer req admin
symfony server:stop
cd symfony
symfony console doctrine:migrations:migrate
symfony console make:entity Comment
symfony var:export --multiline
symfony composer req orm
symfony var:export --multileline
symfony var:export --help
symfony var:export
symfony console make:controller ConferenceController
symfony composer req annotations
symfony console make:controller
symfony console list make
symfony console list maker
symfony composer req maker --dev
symfony logs
symfony composer req debug --dev
symfony composer req logger
symfony composer req profiler --dev
symfony new guestbook --version=5.0
composer require --dev symfony/profiler-pack
symfony composer req debug --sev
symfony composer remove debug
symfony server:log
symfony login
symfony project:create --title="Guestbook" --plan=development
gam 'add symfony cloud config'
symfony project:init
php -r "copy('https://symfony.com/favicon.ico', 'public/favicon.ico');"
symfony book:checkout 10
symfony book:
symfony new --version=5.0-3 --book guestbook
cd symfony5
drmi symfony-docker_nginx
symfony new messenger-options
cd symfony-messenger-failed-option/
mkdir symfony-messenger-failed-option
gbd archive/composer-update feature/FXFUH1-77-exclude-cars-t4-export improvement/symfony-5 task/composer-update
gbd Qualys-Test-Branch archive/CARBAR-832-kibana-severity archive/FXFUH1-118-einfacher-export-asynchron archive/Qualys-Test-Branch archive/cypress archive/symfony-5 bug/CARBAR-832-kibana-severity bugfix/FXFUH1-179-schwacke-token-ungültig cypress feature/FXFUH1-118-einfacher-export feature/FXFUH1-118_DBAL_refactoring feature/FXFUH1-118_DBAL_refactoring
git push origin --delete improvement/symfony-5
git push origin archive/symfony-5
gcb archive/symfony-5
gc improvement/symfony-5
symfony server:start
symfony new reactSymfony
cd symfony-projects/react/
mv react-symfony.TODO react
touch react-symfony.TODO
react-symfony.todo
cd symfony-projects/
rm -rf reactSymfony/ symfony-encore-react/
cd symfony-encore-react/
symfony-encore-react/
symfony --help
symfony new symfony-encore-react
rm -rf symfony-encore-react/
composer require symfony/asset
composer require symfony/assets
symfony open:docs
composer create-project symfony/skeleton symfony-encore-react
composer create-project symfony/skeletion symfony-encore-react
composer search symfony
mkdir symfony-projects
gbd improvement/symfony-5 pentest/upload-document-js Qualys-Test-Branch
az webapp create --resource-group symfonyResourceGroup --plan symfonyAppServicePlan --name licai --runtime "PHP|7.4" --deployment-local-git
az appservice plan create --name symfonyAppServicePlan --resource-group symfonyResourceGroup --sku FREE
#az group create --name symfonyResourceGroup --loca
az group create --name symfonyResourceGroup --location "West Europe"
composer require symfony/twig-packls
symfony server:start --no-tls
rm -rf symfony.lock
symfony new app
symfony project:create
symfony project:create demo
docker-compose exec php composer update symfony/swiftmailer-bundle
cd react-symfony-4-starter/
cd symfony5-react/
symfony new symfony5-react
gcl https://github.com/zorfling/react-symfony-4-starter.git
symfony new login-dojo-1
symfony5-behat/
composer require symfony/orm-pack
cr friends-of-behat/symfony-extension --dev
cd symfony5-behat/
symfony new symfony5-behat
rm -rf symfony5-behat/
cr symfony/annotations
cr symfony/twig-pack
cr --dev friends-of-behat/symfony-extension:^2.0
mkdir symfony5-behat
cr behat/symfony2-extension
composer remove friends-of-behat/symfony-extension:^2.0
composer uninstall friends-of-behat/symfony-extension:^2.0
composer require --dev friends-of-behat/symfony-extension:^2.0
composer require symfony/translation
symfony check:security
symfony s:s
symfony new todo-mvc-sf5 --full
symfony new todo-mvc-sf5
mkdir symfony5
cd symfony/
composer remove symfony/expression-language
hub create symfony5-react
docker stop symfony-docker_mysql_1
docker stop symfony-docker_php_1
docker stop symfony-docker_nginx_1
mv symfony-docker/ symfony5-react
composer create-project symfony/website-skeleton .
rm -rf symfony/*
cd symfony-docker/
gcl https://github.com/coloso/symfony-docker.git
mv symfony-react-starter/ react-symfony-starter
mv syfmony5-react-starter/ symfony-projects/
mv symfony-live-2019/ symfony-projects/
mkdir symfony-react-starter
symfony local:server:list
symfony server:start --no-tls -d
symfony local:server:start
symfony local:server:stop
symfony local:server:status
symfony local:php:refresh
symfony local:check:security
symfony local:php:list
symfony local:
symfony php:list
symfony php
vi ~/.symfony/proxy.json
symfony server:start --help
symfony new bet-messager
symfony -h
history | grep symfony
ls symfony-live-2019/messenger-workshop/
ls symfony-live-2019/
rm -rf symfony-live-2019/
cs symfony
cd symfony-live-2019/
mv symfony-live-berlin-2019-cqrs-es-workshop/ cqrs-event-sourcing
cd symfony-live-berlin-2019-cqrs-es-workshop/
gcl https://github.com/ShittySoft/symfony-live-berlin-2019-cqrs-es-workshop.git
mv symfony-live-2009/ symfony-live-2019
mkdir symfony-live-2009
composer create-project symfony/website-skeleton messenger-workshop
symfony project:create message-demo
mv /Users/zhoux/.symfony/bin/symfony /usr/local/bin/symfony
curl -sS https://get.symfony.com/cli/installer | bash
