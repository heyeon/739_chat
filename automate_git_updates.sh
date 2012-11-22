#!/bin/bash
#author Zainab Ghadiyali (zainab@cs.wisc.edu)
#Goal:To clone 739_chat project from git and then copy it to primary storage locally as well as on server. The corresponding cron job runs every minute. 

date
cd
sudo git clone https://github.com/heyeon/739_chat
echo "Cloned remote into mirror"
sudo cp -rf 739_chat /home/ubuntu/739
echo "Copying files from mirror to master"
sudo cp -rf 739_chat/* /opt/lampp/htdocs/
echo "Copying files from mirror to server"
sudo rm -rf /home/ubuntu/739_chat
echo "Removing files from mirror"
