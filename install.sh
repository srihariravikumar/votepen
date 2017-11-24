#!/bin/bash
. ~/.nvm/nvm.sh

sudo apt-get update
sudo apt-get install apache2
sudo systemctl restart apache2
sudo apt-get install curl
sudo apt-get install mysql-server
sudo apt-get install php libapache2-mod-php php-mcrypt php-mysql
sudo systemctl restart apache2
sudo apt-get install php-cli
sudo apt-get install phpmyadmin
sudo apt-get install -y python-software-properties
sudo add-apt-repository -y ppa:ondrej/php
sudo apt-get update -y
sudo apt-get install php7.1
sudo apt-get install php7.1-mbstring
sudo apt-get install php7.1-xml
sudo apt-get install php7.1-curl
sudo apt-get install composer
