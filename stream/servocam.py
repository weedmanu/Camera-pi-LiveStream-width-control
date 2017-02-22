#!/usr/bin/python
# -*- coding: utf-8 -*-

import subprocess
import time
import psutil
import serial 

ser = serial.Serial('/dev/ttyUSB0', 9600) # port usb utilise pour l'arduino nano

compteur = 0

def cam():
	
	k = open("/var/www/html/LiveStream/cam.txt", "r") # on ouvre le fichier cam.txt
	u = int(k.read())     # on le lit et met le resultat dans la variable g
	k.close()   # on ferme le fichier 
	

	if u == 1:	# si g = 1 donc.
		# on verifie si raspistill est deja lance
		existe = False
		for p in psutil.process_iter():
			try:
					pi = p.as_dict(attrs=['pid', 'name'])
			except:
					pass
			else:
					if pi['name'] == 'raspistill':
						existe = True
						# Pas besoin d'aller plus loin
						break
		# sinon on le lance	dans un process en parallele et on continu		
		if not existe:
			# on lance la prise de photos.		
			subprocess.call("sh /home/pi/stream/play.sh", shell=True)			
			# on remet 0 dans le fichier cam.txt
			subprocess.call("sudo cp /home/pi/stream/zero.txt /var/www/html/LiveStream/cam.txt", shell=True)
		
	if u == 2:	# si g = 2 donc.
		
		# on stop les programmes	
		subprocess.call("sh /home/pi/stream/stop.sh", shell=True)			
		# on remet 0 dans le fichier cam.txt
		subprocess.call("sudo cp /home/pi/stream/zero.txt /var/www/html/LiveStream/cam.txt", shell=True)
		
		
		
		
def photo():
	
	z = open("/var/www/html/LiveStream/photo.txt", "r") # on ouvre le fichier cam.txt
	x = int(z.read())     # on le lit et met le resultat dans la variable g
	z.close()   # on ferme le fichier 
	

	if x == 1:	# si x = 1 donc.
		# on verifie si raspistill est deja lance
		existe = False
		for p in psutil.process_iter():
			try:
					pi = p.as_dict(attrs=['pid', 'name'])
			except:
					pass
			else:
					if pi['name'] == 'raspistill':
						existe = True
						subprocess.call("sudo cp /home/pi/stream/zero.txt /var/www/html/LiveStream/photo.txt", shell=True)
						subprocess.call("sudo sh /home/pi/stream/photo.sh", shell=True)
	if x == 2:	# si x = 1 donc.
		subprocess.call("sh /home/pi/stream/supp.sh", shell=True)

						
def servo():
	
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
	
	if g == 6:	# si g = 6 donc.				
		subprocess.call("sh /home/pi/stream/photo.sh", shell=True) # on remet 0 dans le fichier servo.txt
		subprocess.call("sudo cp /home/pi/stream/zero.txt /var/www/html/LiveStream/servo.txt", shell=True) # on remet 0 dans le fichier servo.txt
		time.sleep(1)

while True:
	cam()
	photo()
	servo()
	time.sleep(1)
