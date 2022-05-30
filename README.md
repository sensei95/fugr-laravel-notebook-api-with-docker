# Notebook REST API

### Installation

```
git clone https://github.com/sensei95/fugr-laravel-notebook-api-with-docker.git
cd fugr-laravel-notebook-api-with-docker
```

### Configurer le fichier d'environnemen

```
cp .env.example .env
```

### Exécutez l’application avec Docker Compose

```
docker-compose build
docker-compose up -d
```

### Installer les dependences de l'application

```
docker-compose exec php /usr/local/bin/composer install
docker-compose exec php /usr/local/bin/composer dump-autoload -o
```

### Générer une clé d’application

```
docker-compose exec php php /var/www/html/artisan key:generate
```

### Migrer la base de donnees

```
docker-compose exec php php /var/www/html/artisan migrate
```

### Web Server

```
http://localhost:8081
```

### API Swagger Documentation

```
http://localhost:8081/api/documentation
```

### Executer les commandes artisan avec docker-compose

```
docker-compose exec php php /var/www/html/artisan command a execute
```

### Installer les dependences avec Composer

```
docker-compose exec php /usr/local/bin/composer install
docker-compose exec php /usr/local/bin/composer update
docker-compose exec php /usr/local/bin/composer commande
```
