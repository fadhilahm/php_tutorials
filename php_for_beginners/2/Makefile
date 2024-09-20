COMPOSE_FILE=docker-compose.yml
PROJECT_NAME=learning-php

help: ## Show this help message
	@grep -E '^[a-zA-Z_-]+:.*?##' Makefile | awk 'BEGIN {FS = ":.*?## "}; {printf "  make %-12s : %s\n", $$1, $$2}'

up: ## Start the MySQL service using Docker Compose.
	@docker compose -f $(COMPOSE_FILE) -p ${PROJECT_NAME} up -d
	@echo "MySQL service is up and running."
