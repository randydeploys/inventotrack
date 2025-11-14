.PHONY: help

help: ## Afficher l'aide
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'

build: ## Builder les images Docker
	docker-compose build

up: ## Démarrer les conteneurs
	docker-compose up -d

down: ## Arrêter les conteneurs
	docker-compose down

restart: ## Redémarrer les conteneurs
	docker-compose restart

logs: ## Voir les logs
	docker-compose logs -f

logs-apache: ## Voir les logs Apache uniquement
	docker-compose logs -f apache

ps: ## Lister les conteneurs
	docker-compose ps

install: ## Installer les dépendances
	docker-compose exec apache composer install

db-create: ## Créer la base de données
	docker-compose exec apache php bin/console doctrine:database:create

db-migrate: ## Exécuter les migrations
	docker-compose exec apache php bin/console doctrine:migrations:migrate --no-interaction

db-fixtures: ## Charger les fixtures
	docker-compose exec apache php bin/console doctrine:fixtures:load --no-interaction

db-reset: ## Reset complet de la BDD
	docker-compose exec apache php bin/console doctrine:database:drop --force --if-exists
	docker-compose exec apache php bin/console doctrine:database:create
	docker-compose exec apache php bin/console doctrine:migrations:migrate --no-interaction
	docker-compose exec apache php bin/console doctrine:fixtures:load --no-interaction

cache-clear: ## Vider le cache
	docker-compose exec apache php bin/console cache:clear

bash: ## Accéder au conteneur Apache
	docker-compose exec apache bash

test: ## Lancer les tests
	docker-compose exec apache php bin/phpunit

console: ## Console Symfony
	docker-compose exec apache php bin/console

setup: build up install db-create db-migrate ## Installation complète du projet

clean: ## Nettoyer les conteneurs et volumes
	docker-compose down -v
	docker system prune -f