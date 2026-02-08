#!/bin/bash

# Définition des variables
score=0
GREEN="\e[32m"
RED="\e[31m"
ORANGE="\e[38;5;214m"
RESET="\e[0m"
count=0
cmatrix.sh 1
clear
#Question n°1
echo "En quelle année es-tu née (Rappelle-toi c'est la même année que la création du Centre Spatial Guyanais)"
echo "1) 1964"
echo "2) 1980"
echo "3) 2010"
read -p "Votre réponse : " rep
#Check if the response is a number and in the interval (1-3)
while ! [[ $rep =~ ^[1-3]$ ]]; do
    ((count++))
    if [[ $count -ge 2 && $count -lt 4 ]];then 
        echo -e "${RED}T'abuses un peu là ??? ${RESET}"
    elif [[ $count -gt 4  && $count -lt 6 ]];then
        echo -e "${RED}Je ne suis pas assez compréhensible ?? ${RESET}"
    elif [[ $count -gt 6 ]];then
        echo -e "${RED}Tu sais quoi tu ne mérites pas de sauver Cayenne.${RESET}"
        exit
    fi
    echo "En quelle année le Centre Spatial Guyanais (CSG) a-t-il été officiellement créé ?"
    echo -e "${ORANGE}Ta réponse doit être entre 1 et 3 (1,2,3)${RESET}"
    read -p "Choisis une option (1, 2 ou 3) : " rep
done

if [[ $rep == "1" ]]; then
    ((score++))
    echo -e "${GREEN}Bonne réponse!${RESET}"

else 
    echo -e "${RED}Mauvaise réponse.${RESET}"
fi

#Question n°2
count=0
echo
echo "En quelle année tu es devenu le directeur du CSG ? (premier lancement Ariane 6 ?)"
echo "1) 2015"
echo "2) 2025"
echo "3) 2024"
read -p "Votre réponse : " rep
#Check if the response is a number and in the interval (1-3)
while ! [[ $rep =~ ^[1-3]$ ]]; do
    ((count++))
    if [[ $count -gt 2 && $count -lt 4 ]];then 
        echo -e "${RED}T'as déjà testé là bas, ça va pas fonctionner ici${RESET}"
    elif [[ $count -gt 4  && $count -lt 6 ]];then
        echo -e "${RED}Tu pensais vraiment que j'allais faire autant de phrases différentes BAH NON PTDR !${RESET}"
    elif [[ $count -gt 6 ]];then
        echo -e "${RED}Tu sais quoi tu mérites pas de sauver Cayenne.${RESET}"
        exit
    fi
    echo "En quelle année tu es devenu le directeur du CSG ? (premier lancement Ariane 6 ?)"
    echo -e "${ORANGE}Ta réponse doit être entre 1 et 3 (1,2,3)${RESET}"
    read -p "Choisis une option (1, 2 ou 3) : " rep
done

if [[ $rep == "3" ]]; then
    ((score++))
    echo -e "${GREEN}Bonne réponse!${RESET}"

else 
    echo -e "${RED}Mauvaise réponse.${RESET}"
fi

count=0
#Question n°3
echo
echo "Quel fut le premier lanceur à décoller depuis le CSG ?"
echo "1) Veronique"
echo "2) Diamant-B"
echo "3) Ariane 1"
read -p "Votre réponse : " rep
#Check if the response is a number and in the interval (1-3)
while ! [[ $rep =~ ^[1-3]$ ]]; do
    ((count++))
    if [[ $count -gt 2 && $count -lt 4 ]];then 
        echo -e "${RED}T'abuses un peu là${RESET}"
    elif [[ $count -gt 4  && $count -lt 6 ]];then
        echo -e "${RED}Je ne suis pas assez compréhensible ?${RESET}"
    elif [[ $count -gt 6 ]];then
        echo -e "${RED}Tu sais quoi tu mérites pas de sauver Cayenne.${RESET}"
        exit
    fi
    echo "Quel fut le premier lanceur à décoller depuis le CSG ?"
    echo -e "${ORANGE}Ta réponse doit être entre 1 et 3 (1,2,3)${RESET}"
    read -p "Choisis une option (1, 2 ou 3) : " rep
done

if [[ $rep == "2" ]]; then
    ((score++))
    echo -e "${GREEN}Bonne réponse!${RESET}"

else 
    echo -e "${RED}Mauvaise réponse.${RESET}"
fi 

# Checking the scores
if [[ $score -le 1 ]];then
    echo -e "${RED}Et tu penses pouvoir arreter la fusée XD.${RESET}"
elif [[ $score -le 2 ]];then
    echo "Tu peux faire mieux"
elif [[ $score -ge 3 ]];then
    echo "Score final : $score / 3"
    echo -e "${GREEN}Bien joué tu as réussi à répondre aux questions${RESET}"
    sleep 3
    ./saePCF.sh csgAXZtoken
fi
