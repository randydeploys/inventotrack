# 📦 Entités - InventoTrack

## User

Représente un utilisateur de l'application (système d'authentification Symfony).

### Champs

| Champ | Type | Nullable | Description |
|-------|------|----------|-------------|
| **id** | int | Non | Identifiant unique (auto-increment) |
| **email** | string(180) | Non | Email de l'utilisateur (unique) |
| **roles** | json | Non | Rôles de l'utilisateur (tableau) |
| **password** | string(255) | Non | Mot de passe hashé (bcrypt/argon2) |
| **firstName** | string(100) | Oui | Prénom de l'utilisateur |
| **lastName** | string(100) | Oui | Nom de l'utilisateur |
| **isActive** | boolean | Non | Compte actif (true) ou désactivé (false) |
| **createdAt** | datetime | Non | Date de création du compte |
| **updatedAt** | datetime | Oui | Date de dernière modification |

### Contraintes

- **Unique** : email (un seul compte par email)
- **Index** : UNIQ_IDENTIFIER_EMAIL sur le champ email

### Rôles disponibles

Les rôles seront implémentés dans la Carte 7 :

- `ROLE_USER` : Rôle de base (tous les utilisateurs)
- `ROLE_EMPLOYEE` : Employé (consultation uniquement)
- `ROLE_MANAGER` : Gestionnaire (gestion sites et inventaire)
- `ROLE_ADMIN` : Administrateur d'organisation
- `ROLE_SUPER_ADMIN` : Super administrateur plateforme

### Méthodes utiles

| Méthode | Retour | Description |
|---------|--------|-------------|
| `getFullName()` | string | Retourne "Prénom Nom" ou email si vide |
| `getUserIdentifier()` | string | Retourne l'email (pour Symfony Security) |
| `__toString()` | string | Retourne le nom complet |

### Interfaces implémentées

- `UserInterface` : Interface Symfony Security
- `PasswordAuthenticatedUserInterface` : Gestion des mots de passe

### Relations futures

*(Sera complété en Phase 2)*

- **ManyToOne** → Organization (Phase 2)



## Prochaines entités

- **Organization** (Phase 2)
- **Site** (Phase 3)
- **Building** (Phase 3)
- **Floor** (Phase 3)
- **Room** (Phase 3)
- **Category** (Phase 4)
- **InventoryObject** (Phase 4)
- **InventoryMovement** (Phase 4)