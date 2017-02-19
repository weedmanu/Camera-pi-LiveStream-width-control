#include <Servo.h>

Servo myservoZ;  // déclare le servo pour l'axe z

Servo myservoY; // déclare le servo pour l'axe y

int posZ = 90;    // pour la position initial 90°
int posY = 90;    // pour la position initial 90°
int message = 0;  //  par défaut message vaut 0

void setup() {
  myservoZ.attach(2);  // servo z sur pin 2 
  myservoZ.write(posZ);  // va en position initial
  myservoY.attach(3);  // servo z sur pin 3
  myservoY.write(posY); // va en position initial
  Serial.begin(9600); 
}

void cam()
{
  if (Serial.available())  {   // si on recoit quelque chose du port serie
    message = Serial.read()-'0';  // on soustrait le caractère 0, qui vaut 48 en ASCII
    
    switch (message) {  // si message vaut
    case 1: 
      posZ = posZ + 10;      
      myservoZ.write(posZ);  // on monte de 10°
      break;
    case 2:
      posZ = posZ - 10;
      myservoZ.write(posZ); // on descend de 10°
      break;
    case 3:
      posY = posY + 10;
      myservoY.write(posY);  // on tourne à droite de 10°
      break;
    case 4:
      posY = posY - 10;
      myservoY.write(posY);  // on tourne à gauche de 10°
      break;
    case 5:
      posY = 90; 
      posZ = 90;
      myservoY.write(posY);           // on se remet en position initial
      myservoZ.write(posZ);
      break;
    }
  }
}

void loop() {
   cam();  
}
