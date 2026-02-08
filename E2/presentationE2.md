# Enigme 2 (PC1)

## ℹ️ Infos clés 
utilisateur : garry.dupont  
administrateur : non  
motdepasse  : RIP_csgariane  
motdepasse (service) : RIP_ST3GAN0CANTSTOPYOU 


## ⚙️ Installation 
Pour créer cette machine, il vous faudra une debian  11/12/13 avec GNOME  
Ensuite, vous pourrez utiliser le script bash ``setupPC1.sh`` pour installer les outils, gérer les utilisateurs etc...
Cependant, vous devrez installer l'extension gnome DING : 
https://extensions.gnome.org/extension/2087/desktop-icons-ng-ding/
pour afficher les éléments présents sur le bureau pour permettre aux étudiants de trouver les indices plus facilement

## 📃 Indications
1) Lecture du README.md sur le bureau
2) Aller dans le répertoire ~/Images
3) Utiliser exiftools pour découvrir la bonne image grâce aux métadonnées présentes sur l'image (ariane6.jpeg)
4) Utiliser steghide afin de faire apparaître le flag permettant de démarrer le service de trajectoire 
5) Entrer le code dans le './startTrajectoryService.sh' 
6) Entrer le code dans l'interface de gestion et changer la trajectoire de la fusée 

## ⚠️ Recommandations
- Utiliser le script recoverPC2 pour enlever le flag
- Fermer les terminaux ou vider l'historique
