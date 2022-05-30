# Notebook REST API

### Установка

```
git clone https://github.com/sensei95/fugr-laravel-notebook-api-with-docker.git
cd fugr-laravel-notebook-api-with-docker
```

### Настроить файл среды

```
cp .env.example .env
```

### Запустите приложение с помощью Docker Compose.

```
docker-compose build (Создает образ приложения с помощью Dockerfile)
docker-compose up -d (запустите службы, которые мы указали в файле docker-compose.yml)
```

### Установить зависимости приложения

```
docker-compose exec php /usr/local/bin/composer install
docker-compose exec php /usr/local/bin/composer dump-autoload -o
```

### Создание ключа приложения

```
docker-compose exec php php /var/www/html/artisan key:generate
```

### Создание миграций для создания таблиц базы данных

```
docker-compose exec php php /var/www/html/artisan migrate
```

### Тестирование результата

#### Инструменты

-   PHPUnit
-   Postman

### PHPUnit Команда

```
docker-compose exec php php /var/www/html/artisan test
```

### Веб Сервер

```
http://localhost:8081
```

### Документация API Swagger

```
http://localhost:8081/api/documentation
```

### Запускайте artisan команды с помощью docker-compose

```
docker-compose exec php php /var/www/html/artisan command (command - команда , которая нужна выполнить)
```

### Запускайте composer команды с помощью docker-compose

```
docker-compose exec php /usr/local/bin/composer install
docker-compose exec php /usr/local/bin/composer update
docker-compose exec php /usr/local/bin/composer command (command - команда , которая нужна выполнить)
```
