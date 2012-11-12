#!/bin/bash

cd /home/ubuntu/739_mirror
echo "Entering mirror directory"
git clone https://github.com/heyeon/739_chat
echo "Cloned remote into mirror"
sudo cp * /home/ubuntu/739
echo "Copying files from mirror to master"
sudo rm -r /home/ubuntu/739_mirror
echo "Removing files from mirror"
