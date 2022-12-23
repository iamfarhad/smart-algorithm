## Docker
```
$ docker-compose up -d
$ cp .env.example .env
$ docker-compose exec -it algorithm composer install
$ docker-compose exec -it algorithm php artisan key:generate
```

## Run Tests
```
$ docker-compose exec -it algorithm ./vendor/bin/phpunit --coverage-html ./html-coverage
```

## Time and memory complexity
### Iterative Algorithm

The time complexity is T(N).

The Space complexity is O(N) for a iterative series.

### Recursive Algorithm

The time complexity is T(2^N).

The Space complexity is O(N) for a recursive series.
