# 🏢 InventoTrack

Application web de gestion d'inventaire multi-organisations pour le suivi de matériel et mobilier.

## 📋 Description

InventoTrack permet de gérer l'inventaire de matériel/mobilier réparti sur plusieurs sites et organisations avec une traçabilité complète des mouvements.

## 🚀 Fonctionnalités principales

- 🏢 Gestion multi-organisations
- 🏗️ Structure hiérarchique : Sites → Bâtiments → Étages → Salles
- 📦 Inventaire d'objets avec catégorisation
- 📊 Historique des mouvements
- 👥 Gestion des utilisateurs et rôles
- 📈 Dashboard et statistiques

## 🛠️ Technologies

- **Backend** : PHP 8.2+, Symfony 7.1
- **Serveur Web** : Apache 2.4
- **Base de données** : MySQL 8.0
- **Frontend** : Twig, Vuexy Admin Theme
- **DevOps** : Docker, Docker Compose

## 📦 Prérequis

- Docker Desktop (>= 20.x)
- Docker Compose (>= 2.x)
- Git

## 🔧 Installation

### 1. Cloner le projet
```bash
git clone https://github.com/VOTRE-USERNAME/inventotrack.git
cd inventotrack
```

### 2. Configuration
```bash
# Copier le fichier d'environnement
cp .env .env.local

# Éditer .env.local si nécessaire
# Changer APP_SECRET par une clé aléatoire
```

### 3. Démarrage avec Docker
```bash
# Builder les images
docker-compose build

# Démarrer les conteneurs
docker-compose up -d

# Installer les dépendances Symfony
docker-compose exec apache composer install

# Vérifier que tout fonctionne
docker-compose exec apache php bin/console about
```

### 4. Accès à l'application

- **Application** : http://localhost:8080
- **phpMyAdmin** : http://localhost:8081 (root / root)

## 🚀 Commandes utiles
```bash
# Démarrer les conteneurs
docker-compose up -d

# Arrêter les conteneurs
docker-compose down

# Voir les logs
docker-compose logs -f apache

# Accéder au conteneur Apache
docker-compose exec apache bash

# Commandes Symfony
docker-compose exec apache php bin/console [commande]

# Vider le cache
docker-compose exec apache php bin/console cache:clear

# Lister les routes
docker-compose exec apache php bin/console debug:router
```

## 📚 Documentation

- [Installation détaillée](docs/INSTALLATION.md)
- [Configuration Docker](docs/DOCKER.md)
- [Base de données](docs/DATABASE.md)
- [Architecture](docs/ARCHITECTURE.md)

## 🏗️ Structure du projet
```
inventotrack/
├── docker/              # Configuration Docker
│   └── apache/         # Apache + PHP
├── src/                # Code source Symfony
│   ├── Controller/     # Contrôleurs
│   ├── Entity/         # Entités Doctrine
│   └── Repository/        # Repositories
├── templates/          # Templates Twig
├── public/             # Assets publics
├── config/             # Configuration Symfony
└── migrations/         # Migrations Doctrine
```

## 📝 Licence

À définir

## 👨‍💻 Auteur

Randy Bourdon

## 🚀 Roadmap

- [x] Phase 1 : Fondation technique
  - [x] Setup Git + GitHub
  - [x] Setup Docker (Apache)
  - [x] Setup Symfony
  - [ ] Configuration BDD
  - [ ] Entité User
  - [ ] Authentification
- [ ] Phase 2 : Organisations
- [ ] Phase 3 : Structure physique
- [ ] Phase 4 : Inventaire
- [ ] Phase 5 : Polish & déploiement