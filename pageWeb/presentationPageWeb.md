# Site Web

## Contexte
Ce site web qui a pour interface HTML,CSS,JS et pour serveur PHP et JS, va servir de serveur de jeu, c'est ici que les utilisateurs vont rentrer les codes pour valider le scoreboard en utilisant de l'AJAX. 

## ⚙️ Installation 
Pour créer cette machine, il vous faudra une debian  11/12/13 avec GNOME  avec un serveur LAMP ( Linux Apache MySQL PHP) ainsi que l'outil PHPmyadmin pour gérer la base de données du scoreboard.
Utilisez le script si vous n'avez pas encore mis en place le LAMP: ``setupWebServer``  
Il va installer les outils nécessaire et copier le répertoire arianeLaunch dans le "/var/www/html" 
Cependant lors de l'installation, il va falloir redonner les droits à l'utilisateur root en passant par la console de MySQL:   
```
    GRANT ALL PRIVILEGES ON *.* TO 'root'@'localhost' IDENTIFIED BY '<PW>';  
    FLUSH ALL PRIVILEGES;  
```
Une fois cela fait, importez la base de données présente dans le répertoire arianeLaunchMonitor/db dans l'utilitaire phpmyadmin 
(Dans le navigateur tapez "localhost" et tapez vos identifiants)


## Utilisation
Donc vous avez l'ajout des équipes, il faut au moins deux utilisateurs minimum avec plus d'un caractères pour chaque nom d'utilisateurs
Ensuite, ils seront redirigés vers la page de gestion de la fusée où ils auront les différentes énigmes à résoudre.
S'ils n'ont pas fini dans le temps imparti ils seront redirigés vers le scoreboard mais ne seront pas inscrits dans celui-ci
