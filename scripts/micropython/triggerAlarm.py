#!/usr/bin/python3
import socket
import time

def connexion_Serv(ip,port,message):
    connexion_serv = socket.socket(socket.AF_INET,socket.SOCK_STREAM)   # Définition du socket (IPV4 + TCP)
    connexion_serv.connect((ip,port))                                   # Connecter IP au port
    connexion_serv.send(message.encode())                                 # Envoi du message
    
    # connexion_serv.close()                                              # Fermeture de la connexion

connexion_Serv("10.122.7.153",1200,"ALARM_ON")
time.sleep(5)
connexion_Serv("10.122.7.153",1200,"ALARM_OFF")

