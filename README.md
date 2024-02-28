# Powergrid Test

## Installation & Setup

-   Clone this repo

`git clone git@github.com:cdterry87/powergrid-test.git`

-   If using Laravel Sail, install sail

```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
```

-   Then start sail

```
# If you are not using an alias. NOTE: The following examples will assume you are using an alias; If you are not using an alias, replace `sail` with `./vendor/bin/sail` instead.
./vendor/bin/sail up -d

# If you are using an alias
sail up -d
```

-   Setup .env file

```
cp .env.example .env
```

-   Once your .env file has been created, add your database credentials

```
# Below are sample database credentials if using Laravel sail
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=powergrid_test
DB_USERNAME=sail
DB_PASSWORD=password
```

-   Generate your key

```
# If not using sail
php artisan key:generate

# If using sail
sail artisan key:generate
```

-   Run migrations/seeder to create the database table and populate it with sample data.

```
# If not using sail
php artisan migrate:fresh --seed

# If using sail
sail artisan migrate:fresh --seed
```

-   If everything was setup correctly, navigate to `http://localhost` and you should see the Employees Powergrid Table
