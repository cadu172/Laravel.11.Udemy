#!/usr/bin/bash

# implementado por Carlos
# Em uma maquina nova conceder permissao de execucao usando o seguinte comando:
# sudo chmod +x update-project.sh

# update dependences using auxiliar docker image
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php84-composer:latest \
    composer update --ignore-platform-reqs

# start sail app
./vendor/bin/sail up -d

#clear
echo "Starting Sail Services..."

# update node dependences
#./vendor/bin/sail npm i use-force-update
echo "Updating node packages..."
./vendor/bin/sail npm install

echo "Updating system tables..."

# wait 10 seconds while postgresql server start
sleep 5

# generate app key
./vendor/bin/sail artisan key:generate


# run migrate database
./vendor/bin/sail artisan migrate

# run seeder
./vendor/bin/sail artisan db:seed

# run vite server
./vendor/bin/sail npm run dev
