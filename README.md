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

Time complexity is O(n)
Memory complexity is O(n)

### Recursive Algorithm

Time complexity is O(n^2)
Memory complexity is O(n)
