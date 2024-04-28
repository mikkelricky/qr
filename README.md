# QR

```shell
git clone https://github.com/mikkelricky/qr
cd qr
```

Edit `.env.local` and set these required parameters:

```shell
DATABASE_URL=''

# Run `bin/console security:hash-password` to hash a password
ADMIN_PASSWORD=''
```

```shell
composer install --no-dev --classmap-authoritative
bin/console doctrine:migrations:migrate --no-interaction
```

```shell
composer dump-env prod
```

## Development

``` dotenv
# .env.local
APP_ENV=dev
```

``` shell
task dev:start
```

### Coding standards

```shell
task dev:coding-standards:check
```
