#!/bin/bash

DATE=$(date +"%Y-%m-%d_%H%M%S")

cp /home/pi/stream/pic.jpg /var/www/html/LiveStream/Photos/$DATE.jpg

exit
