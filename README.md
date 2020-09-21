# Guestbook tutorial


## useful commands
```bash
# start a worker, and set the watcher to restart it
symfony run -d --watch=config,src,templates,vendor symfony console messenger:consume async 

# show current URL of local web server
symfony var:export SYMFONY_DEFAULT_ROUTE_URL
# return "https://127.0.0.1:8000/"

# generate image for the workflow
symfony console workflow:dump comment | dot -Tpng -o workflow.png
```

## start the SPA with API endpoint
```bash
API_ENDPOINT=`symfony var:export SYMFONY_DEFAULT_ROUTE_URL --dir=..` yarn encore dev
API_ENDPOINT="https://127.0.0.1:8000/" yarn encore dev

# in fish shell
set -g -x API_ENDPOINT "https://127.0.0.1:8000/"
yarn encore dev
```

## Test slack channel
```
curl -X POST --data-urlencode "payload={\"channel\": \"#random\", \"username\": \"webhookbot\", \"text\": \"This is posted to #car-management and comes from a bot named webhookbot.\", \"icon_emoji\": \":ghost:\"}" https://hooks.slack.com/services/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

```