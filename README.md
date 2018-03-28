# POST2SLCK

## Installation 

### get app

```
git clone git@github.com:iitenkida7/post2slack.git
```


### build

```
cd post2slack
echo "TOKEN=xoxp-99999999999-9999999999-99999999999-zzzzzzzzzz" >> .env
echo "CHANNEL=general" >> .env

docker build . -t post2slack
```

### ship 

```
docker run -p 80:80 --env-file .env slack
```

