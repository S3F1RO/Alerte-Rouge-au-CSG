#!/bin/bash
GREEN="\e[32m"
RED="\e[31m"
RESET="\e[0m"
count=0
BOLD="\e[1m"
read -p "Code de charlie pour enlever les virus : " code 

# Checking if the code is good and i alert him if he tries to found the password by brute-force
while [ $code != "RIP_ST3GAN0CANTSTOPYOU" ];do
    echo -e "${RED}Code Incorrect${RESET}"
    if [[ $count -gt 2 ]];then
        echo -e "${RED}Tu ne vas pas le trouver par hasard. Perds pas de temps dessus ${RESET}"
    fi
    ((count++))
    read -p "Code pour enlever les virus : " code   
done

#Animations
cmatrix.sh 3
clear
./.progressBar.sh
echo -e "${GREEN}Le code est bon, le virus a été enlevé.${RESET} Connecte toi sur le pc du directeur avec ce code : ${BOLD}RIP_R0CKETACTIVATED${RESET}" 
