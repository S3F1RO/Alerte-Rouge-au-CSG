# 🚀​ Alerte Rouge au CSG
Durée : 30 min

## 📝Contexte de l'escape game:
Lors du décollage d'Ariane 6, les communications se sont coupées entre le poste de commande et la fusée et une prise d'otage a commencé.  
Vous êtes les meilleurs espions de la planète engagés par la DGSI pour enquêter sur ce problème de communications.
Les employés du csg pensent qu'il pourrait s'agir d'un piratage et les deux plus grands pirates dans cette période sont RIP et Anonymous.  
Vous aurez à disposition votre interface de gestion web où vous retrouverez tous les paramètres nécessaire au lancement de la fusée. Deux fiches de la base de données du CSG présentant les différents pirates, un guide du Centre Spatial et une boîte à outils pour se déplacer dans le terminal et vous aurez d'ailleurs une radio pour entendre le message diffusé depuis la perte de transmission avec la fusée.

## 🛠️ Prérequis :
4 VMs à préparer : 
- Machine Interface de gestion(spy)
- Machine attaquée 1 MA1
- Machine Fusée MF
- Raspberry Pi pour les informations(radio)
<!-- - Machine attaquée 2 MA2 -->

## 🧩Enigme 1 :
[Lien vers la mise en place de l'Enigme 1](E1/presentationE1.md)  
Dans cette première énigme, le but sera de découvrir qui sont les assaillants et trouver le mot de passe.
mdp : RIP_csgariane  

## 🧩Enigme 2 (MA1) :
[Lien vers la mise en place de l'Enigme 2](E2/presentationE2.md)  
Une fois arrivés sur la machine de garry pour gérer la trajectoire,
vous verrez un indice sur le bureau, montrant qu'il se trouve dans le répertoire ~/images. Ensuite il vous faudra trouver l'image 'ariane6.jpeg', il faudra utiliser l'outil steghide pour trouver le flag à rentrer pour "démarrer le système de trajectoire". Enfin, vous utiliserez le flag pour gérer la trajectoire dans l'interface web afin de redresser la fusée. Dans le démarrage du service, vous trouverez également le mot de passe pour la machine fusée. 

mdp : RIP_ST3GAN0CANTSTOPYOU

## 🧩Enigme 3 (MF) :
[Lien vers la mise en place de l'Enigme Finale](EF/presentationEF.md)  
Une fois sur la machine du directeur pour confirmer les changements existants, il faudra répondre à un quizz pour valider que vous êtes le directeur pour y répondre vous pourrez soit répondre grâce à vos compétences OU utiliser le guide du Centre spatial fourni par les employés du CSG : 

1. En quelle année es-tu née ( Rappelle-toi c'est la même année que la création du Centre Spatial Guyanais (CSG) )
1. En quelle année tu es devenu le directeur du CSG ? (premier lancement Ariane 6 ?)

mdp : ALRT25500OCSG

Enfin vous utiliserez ce code sur l'interface de gestion pour confirmer les changements. Ce flag va ensuite vous donner le flag final à entrer pour terminer l'escape game et finir le compte à rebours

## 💡 Réflexions / améliorations : 
- Pour augmenter la durée, vous pouvez rajouter une autre épreuve contentant un hash à craquer et ici on va gérer la machine de positionnement

- Nous avons également un M5Stack en tant qu'alame pouvant être éteinte avec un badge relié à un arduino mais le M5 n'arrivait pas à recevoir le signal wifi présent dans la salle. 
