COMPOSE_FILE=docker-compose.yml
PROJECT_NAME=learning-php

# DB-related variables
DB_NAME=todo_db
DB_USER=user
DB_ROOT_USER=root
DB_PASS=userpassword
DB_ROOT_PASS=rootpassword
DB_HOST=127.0.0.1
DB_PORT=3306

help: ## Show this help message
	@grep -E '^[a-zA-Z_-]+:.*?##' Makefile | awk 'BEGIN {FS = ":.*?## "}; {printf "  make %-12s : %s\n", $$1, $$2}'

run: ## Run the PHP built-in server
	@php -S localhost:8888

compose_up: ## Start the MySQL service using Docker Compose.
	@docker compose -f $(COMPOSE_FILE) -p ${PROJECT_NAME} up -d
	@echo "MySQL service is up and running."

db_up: ## Create the database and tables, and then migrate and seed the database.
	@echo "Checking if database $(DB_NAME) exists..."
	@mysql -u $(DB_ROOT_USER) -p$(DB_ROOT_PASS) -h $(DB_HOST) -P $(DB_PORT) -e "CREATE DATABASE IF NOT EXISTS $(DB_NAME);" || echo "Database $(DB_NAME) already exists."
	@echo "Running migrations..."
	@vendor/bin/phinx migrate -e development
	@echo "Seeding the database..."
	@vendor/bin/phinx seed:run -e development

db_down: ## Rollback all the migrations
	@vendor/bin/phinx rollback -e development
