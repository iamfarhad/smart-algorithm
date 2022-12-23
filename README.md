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

The time complexity of the recursive is T(2^N), i.e., exponential.
The Space complexity of the recursive code is O(N) for a recursive series.
