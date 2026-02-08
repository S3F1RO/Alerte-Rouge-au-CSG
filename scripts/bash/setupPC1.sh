#!/bin/bash

if [[ $(id -u) -eq 0 ]];then 
    clear
    export LANG=fr_FR.UTF-8
    echo "Démarrage du programme d'installation de l'Escape Game";
    sleep 1
    apt update && apt install -y exiftool steghide
    #Setup a new name
    hostnamectl hostname pcTrajectoire
    
    #Creation of base repertory for each users 
    mkdir -p /etc/skel/{Bureau,Documents,Images,Modèles,Musique,Public,Téléchargements,Vidéos}
    
    #Creation of the User
    echo "Création de l'utilisateur garry"
    useradd -m garry.dupont -p $(openssl passwd -6 RIP_csgariane) -s /bin/bash -U
    sleep 1

    echo "Création de l'indice présent sur le bureau"
    echo "
    Tu viens d'arriver sur la première machine bravo mais ça ne fait que commencer. Maintenant trouve ce second code et utilise le pour démarrer le './startTrajectoryService'.
J'espère que tu es physiquement sur l'ordinateur de charlie parce que sinon ce sera compliqué pour toi
Indice : L’œil voit la fusée mais l'ordinateur lui voit les infos" >> /home/garry.dupont/Bureau/README.md
    
    echo "Mise en place des images"
    mkdir -p /home/garry.dupont/Images/{CSG,vacances2024-2025}
    cp ../../Assets/imagesCSG/* /home/garry.dupont/Images/CSG
    cp ../../Assets/imagesFamille/* /home/garry.dupont/Images/vacances2024-2025

    echo "Mise en place du script"
    cp ./startTrajectoryService.sh /home/garry.dupont/
    cp ./startTrajectoryService /home/garry.dupont/
    cp ./progressBar.sh /home/garry.dupont/.progressBar.sh

    chown root:root /home/garry.dupont/startTrajectoryService; 
    chmod 4755 /home/garry.dupont/startTrajectoryService;
    
    su garry.dupont
else 
    echo "Réessayez en tant qu'administrateur";
fi

