# 💼 JobConnect – Plateforme de mise en relation Recruteurs & Chercheurs d’emploi

## 📌 Contexte du projet
JobConnect est une plateforme web développée avec **Laravel** permettant de connecter des recruteurs et des chercheurs d’emploi.  
L’objectif est de proposer une application sécurisée, performante et évolutive, respectant les bonnes pratiques de développement.

---

##  Objectifs

- Utiliser **Laravel** comme framework principal
- Mettre en place une **authentification sécurisée**
- Gérer des **profils utilisateurs**
- Implémenter une **recherche simple et efficace**
- Concevoir une architecture **préparée pour les évolutions futures**

---

##  Stack Technique

- **Laravel** — Framework PHP
- **Laravel Breeze / Jetstream** — Authentification
- **Livewire** — Interactivité sans rechargement de page
- **Spatie Laravel Permission** — Gestion des rôles et permissions
- **Eloquent ORM** — Gestion des relations
- **MySQL / PostgreSQL** — Base de données

---

##  Authentification

- Inscription et connexion sécurisées
- Gestion de deux types d’utilisateurs :
  -  **Recruteur**
  -  **Chercheur d’emploi**

---

##  Gestion du Profil Utilisateur

Chaque utilisateur peut :

- Consulter et modifier son profil  
  *(photo, bio, nom, etc.)*
- Changer son mot de passe avec vérification de l’ancien

---

##  Recherche

- Rechercher un utilisateur par :
  - Nom
  - Spécialité
- Consulter le profil public d’un utilisateur

---

#  Fonctionnalités – Chercheur d’emploi

###  Gestion d’un profil candidat (CV)

- **Titre du profil**  
  _Ex : Développeur Fullstack, Comptable Senior..._

- **Formation**
  - Diplômes
  - Écoles
  - Années d’obtention

- **Expériences**
  - Postes précédents
  - Entreprises
  - Durées

- **Compétences**
  _Ex : Laravel, Gestion de projet, Anglais_

---

###  Emploi

- Rechercher des offres selon le métier
- Consulter le détail d’une offre
- Postuler à une offre d’emploi

---

###  Réseau

- Ajouter des amis  
- Accepter ou refuser une demande d’amitié  

---

#  Fonctionnalités – Recruteur

###  Gestion des offres d’emploi

- Créer et gérer des offres avec :
  - Entreprise
  - Type de contrat (CDI, CDD, Stage, Freelance…)
  - Titre
  - Description
  - **Image obligatoire**

---

###  Candidatures

- Consulter les candidatures reçues
- Clôturer une offre lorsque le recrutement est terminé

---

##  Rôles et Permissions

Le projet utilise **Spatie Laravel Permission** pour assurer une gestion stricte des accès :

Seuls les recruteurs peuvent créer des offres  
Seuls les candidats peuvent postuler  

---


##  Architecture & Base de Données

- Relations **Eloquent** :
  - One to One
  - One to Many
  - Many to Many
- Gestion des clés étrangères
- Utilisation des :
  - Migrations
  - Seeders
  - Factories

---

##  Installation du projet

```bash
# Cloner le projet
git clone https://github.com/ton-username/jobconnect.git

# Aller dans le dossier
cd jobconnect

# Installer les dépendances
composer install

# Copier le fichier .env
cp .env.example .env

# Générer la clé
php artisan key:generate

# Configurer la base de données dans .env

# Lancer les migrations
php artisan migrate --seed

# Démarrer le serveur
php artisan serve
