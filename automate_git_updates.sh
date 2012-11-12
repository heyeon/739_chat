#!/bin/bash

date
git clone https://github.com/heyeon/739_chat
echo "Cloned remote into mirror"
sudo cp -rf 739_chat /home/ubuntu/739
echo "Copying files from mirror to master"
sudo rm -rf /home/ubuntu/739_chat
echo "Removing files from mirror"
