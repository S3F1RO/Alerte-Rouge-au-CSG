#!/bin/bash

if [[ $(id -u) -eq 0 ]];then 
    clear
    export LANG=fr_FR.UTF-8
    echo "Démarrage du programme d'installation de l'Escape Game....";
    
    #Create base repository for each users
    mkdir /etc/skel/{Bureau,Documents,Images,Modèles,Musique,Public,Téléchargements,Vidéos}
    clear
    
    #Setup a new name
    hostnamectl hostname pcDirecteur
    
    #Create the user
    echo "Création de l'utilisateur directeur...."
    useradd -m directeur -p $(openssl passwd -6 RIP_R0CKETACTIVATED) -s /bin/bash -U
    clear
    
    echo "Création des fichiers...."
    mkdir -p /home/directeur/.script/
    cp ../micropython/triggerAlarm.py  /home/directeur/.script/

    # Create and manage rights for the quizz so the students don't work with it
    cp quizz.sh /home/directeur/
    chmod og-r /home/directeur/quizz.sh
    chmod og+x /home/directeur/quizz.sh

    cp quizz /home/directeur/
    sudo chown root:root /home/directeur/quizz
    sudo chmod 4755 /home/directeur/quizz

    # Create and manage rights for antivirus
    cp saePCF.sh /home/directeur/
    chmod og-r /home/directeur/saePCF.sh
    chmod og+x /home/directeur/saePCF.sh
    cp progressBar.sh /home/directeur/progressBar.sh
    chmod og+x /home/directeur/progressBar.sh
    
    #Add them files in bashrc so when they connects they trigger the alarm
    echo "/home/directeur/.script/triggerAlarm.py" >> /home/directeur/.bashrc
    echo "/home/directeur/quizz.sh" >> /home/directeur/.bashrc
    echo "Supprime le repertoire dès que t'as fini"
    su directeur
else 
    echo "Réessayez en tant qu'administrateur";
fi

