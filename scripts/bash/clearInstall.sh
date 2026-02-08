#!/bin/bash
clear
echo "Finding the path of the repo..."
pwd=$(find / -iname "alerteRougeAuCSG" 2>/dev/null | egrep "/home*")
if [[ $pwd == "" ]];then
    echo "Inexistant repo"
    exit
fi
echo "Founded : $pwd"
sleep 1
echo "Deleting the file"
sudo rm -r pwd
