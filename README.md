# Devlab A4 Haut de Seine

## Initialisation du projet :
  ```composer install```
  Créer le fichier ```.env.local```
  insérer le lien de votre base de données: ```# DATABASE_URL="mysql://app:!ChangeMe!@127.0.0.1:3306/app?serverVersion=8.0.32&charset=utf8mb4"```
  ```php bin/console doctrine:database:create```
  ```php bin/console doctrine:migrations:migrate```

## Génération des clés de génération de token
```php bin/console lexik:jwt:generate-keypair```

dans le fichier ```.env.local```

