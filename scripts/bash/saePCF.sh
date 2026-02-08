#!/bin/bash
GREEN="\e[32m"
RED="\e[31m"
ORANGE="\e[38;5;214m"
RESET="\e[0m"
if [[ $1 != "csgAXZtoken" ]];then
    echo "Incorrect token"
    echo -e "${RED}Pourquoi t'essaies de tricher ???"
    echo -e "Va faire le quizz !!! ${RESET}"
    exit
fi
cmatrix.sh 3
clear
./progressBar.sh
echo "Le code est bon, le virus a été enlevé, Tu peux maintenant entrer ce code pour confirmer les changements: ALRT25500OCSG" 
