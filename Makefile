# Shortcuts for the most common Docker commands
# (Windows users without `make` can use scripts/run.ps1 instead)

IMAGE = coolfix-services-webapp
CONTAINER = coolfix-standalone
PORT ?= 8000

.PHONY: help build run stop up down logs shell migrate fresh clean

help:            ## Show available commands
	@grep -E '^[a-z]+:.*##' Makefile | awk -F':.*## ' '{printf "  make %-8s %s\n", $$1, $$2}'

build:           ## Build the Docker image
	docker build -t $(IMAGE) .

run:             ## Run the image alone (SQLite) on http://localhost:$(PORT)
	docker run -d --name $(CONTAINER) -p $(PORT):80 $(IMAGE)

stop:            ## Stop and remove the standalone container
	-docker stop $(CONTAINER)
	-docker rm $(CONTAINER)

up:              ## Start the full stack (app + MySQL) with Docker Compose
	docker compose up -d --build

down:            ## Stop the full stack
	docker compose down

logs:            ## Follow the application logs
	docker compose logs -f app

shell:           ## Open a shell inside the app container
	docker compose exec app bash

migrate:         ## Run database migrations
	docker compose exec app php artisan migrate --force

fresh:           ## Reset the database and reload demo data
	docker compose exec app php artisan migrate:fresh --seed --force

clean:           ## Remove containers, volumes and the image
	docker compose down -v
	-docker rmi $(IMAGE) $(IMAGE):latest
