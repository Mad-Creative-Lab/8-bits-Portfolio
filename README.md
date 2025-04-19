# 8-bits-Portfolio 🎮


🕹️ Je rends hommage à l’univers des consoles vintage (SEGA Master System, Nintento NES, Pc Engine..) et de l’esthétique analogique à travers ce portfolio rétro-pixel. Une vitrine évolutive pensée comme un hommage vibrant à la culture 8-bits et aux expériences numériques immersives.


## ✨ Fonctionnalités clés

- **Design rétro‑pixel** inspiré des consoles vintage (SEGA Master System, Nintento NES, Pc Engine..)  
- **Layout responsive** (mobile ↔ desktop) avec animations sur mesure  
- **Formulaire de contact** complet :  
  - Validation frontend & backend 
  - Enregistrement des messages dans une base de données MySQL  
  - Envoi d’une notification par email via SMTP (PHPMailer)  
- **Configuration par variables d’environnement** (`.env`)  
- **Installation et gestion des dépendances** avec Composer  

---

## 🛠️ Stack Technique

| **Frontend**                                | **Backend & DevOps**                                                    |
|----------------------------------------------|-------------------------------------------------------------------------|
| • HTML5 / CSS3                              | • PHP 8.x                                                               |
| • JavaScript (ES6+)                         | • MySQL / PDO                                                           |
| • Tailwind CSS (via CDN)                    | • [vlucas/phpdotenv](https://github.com/vlucas/phpdotenv) (gestion `.env`) |
| • Responsive Design & keyframes animations  | • [PHPMailer](https://github.com/PHPMailer/PHPMailer) (SMTP)             |
| • Fonts “Press Start 2P” & “VT323”          | • Composer pour autoload & packages                                     |
| • Hébergé sur madcreativelab.dev            | • (Optionnel) MailHog en dev (SMTP local)                               |

---

## 🚀 Installation & Lancement (en local)

### 1. Cloner le projet

```bash
git clone https://github.com/ton-utilisateur/8bit-portfolio.git
cd 8bit-portfolio
```

### 2. Copier le fichier `.env.example` → `.env`

```bash
cp .env.example .env
```

> ⚠️ Remplir les variables avec **vos identifiants locaux** :  
> Base de données (MySQL) et SMTP (MailHog recommandé en dev).

### 3. Installer les dépendances PHP

```bash
composer install
```

### 4. Créer la base et importer la table

```bash
mysql -u <user> -p <nom_base> < db/8bits_portfolio_form.sql
```

### 5. Lancer un serveur SMTP local (optionnel mais recommandé)

Utilisez [MailHog](https://github.com/mailhog/MailHog) :

```bash
mailhog
```

- Interface mail : http://localhost:8025
- SMTP : `127.0.0.1:1025`

### 6. Démarrer le serveur PHP

```bash
php -S localhost:8000 -t public
```

Puis rendez-vous sur : [http://localhost:8000](http://localhost:8000)

---

## 🔐 Fichier `.env`

```ini
# .env.example

# — Base de données
DB_HOST=127.0.0.1
DB_NAME=ma_base_locale
DB_USER=mon_user_local
DB_PASS=mon_pass_local

# — SMTP de développement (MailHog ou équivalent)
SMTP_HOST=127.0.0.1
SMTP_PORT=1025
SMTP_USER=
SMTP_PASS=
```
---

## 🛠 Exemple de base de données

Un fichier SQL est fourni dans le dossier `db/` :

```bash
db/8bits_portfolio_form.sql
```

Il contient une table `messages` avec les champs :  
- `id` (clé primaire auto-incrémentée)  
- `name` (nom de l’expéditeur)  
- `email`  
- `sujet`  
- `message`  
- `created_at` (horodatage)

---

## 📬 Cycle de traitement du formulaire

1. L’utilisateur remplit le formulaire et envoie ses données.
2. Les données sont nettoyées et validées par `contact.php`.
3. Le message est :
   - Enregistré en base de données (`MySQL`)
   - Envoyé par mail via **SMTP sécurisé** (grâce à `PHPMailer`)
4. L’utilisateur est redirigé vers une page de remerciement stylisée.

---

## 📂 Arborescence (extrait)

```bash
.
├── contact.php
├── remerciements.html
├── style.css
├── script.js
├── .env.example
├── .gitignore
├── db/
│   └── 8bits_portfolio_form.sql
└── vendor/
```

---

## 🧠 À propos

Ce projet est une création originale de **Mad Creative Lab** — à la croisée du code, du son, du graphisme et de la narration visuelle.

Portfolio principal : [https://madcreativelab.dev](https://madcreativelab.dev)  
Repo GitHub : [github.com/Mad-Creative-Lab](https://github.com/Mad-Creative-Lab)

---

## 📄 Licence

Ce projet est sous licence **MIT**.  
Voir le fichier [`LICENSE`](LICENSE) pour plus d’informations.

## 🔗 Accès en ligne
<p align="center">
  <a href="https://8bitsportfolio.madcreativelab.dev" target="_blank">🚀 Voir le site</a>
</p>


<br>
 <img width="1462" alt="Capture d’écran 2025-04-17 à 00 21 32" src="https://github.com/user-attachments/assets/565daf50-a0a7-4d16-91c1-bd992583146a" />
