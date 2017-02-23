
#include <Servo.h>

Servo myservoZ;  // déclare le servo pour l'axe z

Servo myservoY; // déclare le servo pour l'axe y

int posZ = 90;    // pour la position initial 90°
int posY = 90;    // pour la position initial 90°
int message = 0;  //  par défaut message vaut 0
int posZ1;
int posZ2;
int posY3;
int posY4;

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
      posZ1 = posZ + 10;  
      if (posZ1 > 180)
        {
          posZ1 = 180;
        }    
      for(posZ=posZ; posZ <= posZ1; posZ += 1)      
         {                                  
           myservoZ.write(posZ);
           delay(100);
         }      
      break;
    case 2:
      posZ2 = posZ - 10;      
      if (posZ2 < 0)
        {
          posZ2 = 0;
        }
      for(posZ=posZ; posZ >= posZ2; posZ -= 1)      
         {                                  
           myservoZ.write(posZ);
           delay(100);
         }      
      break;
    case 3:
      posY3 = posY + 10;
      if (posY3 > 180)
        {
          posY3 = 180;
        }  
      for(posY=posY; posY <= posY3; posY += 1)      
         {                                  
           myservoY.write(posY);
           delay(100);
         }
      break;
    case 4:
      posY4 = posY - 10;
      if (posY4 < 0)
        {
          posY4 = 0;
        }
      for(posY=posY; posY >= posY4; posY -= 1)      
         {                                  
           myservoY.write(posY);
           delay(100);
         }
      break;
    case 5:
      if (posZ > 90)  {
        for(posZ=posZ; posZ >= 90; posZ -= 1)      
         {                                  
          myservoZ.write(posZ);
          delay(100);
         }           
      }
      if (posZ < 90)  {
        for(posZ=posZ; posZ <= 90; posZ += 1)      
         {                                  
           myservoZ.write(posZ);
           delay(100);
         }           
      }
      if (posY > 90)  {
        for(posY=posY; posY >= 90; posY -= 1)      
         {                                  
          myservoY.write(posY);
          delay(100);
         }           
      }
      if (posY < 90)  {
        for(posY=posY; posY <= 90; posY += 1)      
         {                                  
           myservoY.write(posY);
           delay(100);
         }           
      }
      break;
    }
  }
}

void loop() {
   cam();  
}
