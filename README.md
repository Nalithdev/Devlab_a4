Commande d'initalisation du projet

A faire dans l'ordre après avoir cloné

`composer install`

Créer le fichier .env.local

Insérer le lien de votre base de données: # DATABASE_URL="mysql://app:!ChangeMe!@127.0.0.1:3306/app?serverVersion=8.0.32&charset=utf8mb4"

`php bin/console lexik:jwt:generate-keypair`

`php bin/console d:d:c`

`php bin/console d:m:m`

`symfony serve`
