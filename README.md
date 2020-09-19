# Guestbook tutorial


## useful commands
```bash
# start a worker, and set the watcher to restart it
symfony run -d --watch=config,src,templates,vendor symfony console messenger:consume async 

# show current URL of local web server
symfony var:export SYMFONY_DEFAULT_ROUTE_URL
# return "https://127.0.0.1:8000/"


```
