# Setup

I created a docker environment for easier setup.
First make sure to pull the repo then run the following commands inside the root of the project.

### Installing app dependencies

`docker run --rm -v $(pwd)/app/laravel/:/app composer install --ignore-platform-reqs`

### Permissions setup

Set permissions to directory app/laravel so that it is owned by your non-root user (current user):

```
sudo chown -R $USER:$USER app/laravel
```

### ENV setup

Make sure you copy the content from `.env.example` to `.env` at the root of the folder.

Do the same for `app/laravel/.env.example` -> `app/laravel/.env`.

### Docker setup

```shell
docker-compose up -d
docker-compose exec app php artisan key:generate
docker-compose exec app php artisan config:cache
docker-compose exec app php artisan migrate --seed
```

After running all of the above commands successfully you can find the app at [http://localhost](http://localhost)

### API Documentation

I prepared API docs which you can find at [http://localhost/docs](http://localhost/docs) after successful initialization of the app.

You can find a collection file for importing into Postmark at [http://localhost/docs/collection.json](http://localhost/docs/collection.json)
