#!/bin/bash

# --- 1. Actualización del Sistema ---
echo "REMOVING OLD FOLDERS & UPDATING SYSTEM..."
sudo apt update && sudo apt upgrade -y
sudo apt install -y curl git unzip zip ca-certificates gnupg lsb-release

# --- 2. Instalación de Docker & Docker Compose ---
echo "INSTALLING DOCKER..."
sudo install -m 0755 -d /etc/apt/keyrings
curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo gpg --dearmor -o /etc/apt/keyrings/docker.gpg
sudo chmod a+r /etc/apt/keyrings/docker.gpg

echo "deb [arch=$(dpkg --print-architecture) signed-by=/etc/apt/keyrings/docker.gpg] https://download.docker.com/linux/ubuntu $(lsb_release -cs) stable" | sudo tee /etc/apt/sources.list.d/docker.list > /dev/null

sudo apt update
sudo apt install -y docker-ce docker-ce-cli containerd.io docker-buildx-plugin docker-compose-plugin

# --- 3. Instalación de Node.js (Para el Frontend) ---
echo "INSTALLING NODE.JS & NPM..."
curl -fsSL https://deb.nodesource.com/setup_18.x | sudo -E bash -
sudo apt install -y nodejs

# --- 4. Instalación de PHP & Composer (Para el Backend) ---
echo "INSTALLING PHP & COMPOSER..."
sudo add-apt-repository ppa:ondrej/php -y
sudo apt update
sudo apt install -y php8.2 php8.2-curl php8.2-xml php8.2-mbstring php8.2-zip php8.2-mysql
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

# --- 5. Configuración de Permisos de Docker ---
echo "CONFIGURING DOCKER PERMISSIONS..."
sudo usermod -aG docker $USER

# --- 6. Preparación de las dependencias del Proyecto ---
echo "INSTALLING PROJECT DEPENDENCIES..."

# Entrar a Laravel y preparar
if [ -d "backend-laravel" ]; then
    cd backend-laravel
    composer install
    [ ! -f .env ] && cp .env.example .env
    cd ..
fi

# Entrar a Vue y preparar
if [ -d "frontend-vue" ]; then
    cd frontend-vue
    npm install
    cd ..
fi

echo "--------------------------------------------------------"
echo " ¡TODO LISTO! "
echo " IMPORTANTE: Debes cerrar sesión y volver a entrar (exit) "
echo " para que los permisos de Docker surtan efecto. "
echo " Luego, corre: docker compose up --build "
echo "--------------------------------------------------------"