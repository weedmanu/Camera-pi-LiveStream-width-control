#!/usr/bin/python
# -*- coding: utf-8 -*-


import serial  # bibliothèque permettant la communication série
import time    # pour le délai d'attente entre les messages
import subprocess  # pour lancer des commande bash 

ser = serial.Serial('/dev/ttyUSB0', 9600) # port usb utilise pour l'arduino nano

compteur = 0

while True:    # boucle infini
	
	
	f = open("/var/www/html/LiveStream/servo.txt", "r") # on ouvre le fichier servo.txt
	g = int(f.read())     # on le lit et met le resultat dans la variable g
	f.close()   # on ferme le fichier 
	
	if g == 1:	# si g = 1 donc.
		compteur = 1
		ser.write(str(compteur)) # on envoie 1 au programme de l'arduino
		subprocess.call("sudo cp /home/pi/stream/zero.txt /var/www/html/LiveStream/servo.txt", shell=True) # on remet 0 dans le fichier servo.txt
		time.sleep(1)               # on attend pendant 1 secondes
		
		
	if g == 2:	# si g = 2 donc.
		compteur = 2
		ser.write(str(compteur)) # on envoie 2 au programme de l'arduino
		subprocess.call("sudo cp /home/pi/stream/zero.txt /var/www/html/LiveStream/servo.txt", shell=True) # on remet 0 dans le fichier servo.txt
		time.sleep(1)               # on attend pendant 1 secondes
			
	if g == 3:	# si g = 3 donc.
		compteur = 3
		ser.write(str(compteur))  # on envoie 3 au programme de l'arduino
		subprocess.call("sudo cp /home/pi/stream/zero.txt /var/www/html/LiveStream/servo.txt", shell=True) # on remet 0 dans le fichier servo.txt
		time.sleep(1)               # on attend pendant 1 secondes
		
	if g == 4:	# si g = 4 donc.
		compteur = 4
		ser.write(str(compteur))  # on envoie 4 au programme de l'arduino
		subprocess.call("sudo cp /home/pi/stream/zero.txt /var/www/html/LiveStream/servo.txt", shell=True) # on remet 0 dans le fichier servo.txt
		time.sleep(1)               # on attend pendant 1 secondes		
			
	if g == 5:	# si g = 5 donc.
		compteur = 5
		ser.write(str(compteur))  # on envoie 5 au programme de l'arduino
		subprocess.call("sudo cp /home/pi/stream/zero.txt /var/www/html/LiveStream/servo.txt", shell=True) # on remet 0 dans le fichier servo.txt
		time.sleep(1)               # on attend pendant 1 secondes		
	
	time.sleep(1)	# attent 1s avant de reprendre la boucle
