# Control de Proveedores Dockerizado con Symfony, php, Nginx y MySQL

Este repositorio contiene un proyecto de Symfony configurado para ejecutarse en un entorno dockerizado, utilizando Nginx como servidor web y MySQL como base de datos. Aquí encontrarás las instrucciones para clonar o descargar el repositorio y poner en funcionamiento el proyecto en tu entorno local.

## Requisitos previos

Antes de comenzar, asegúrate de tener instalado lo siguiente en tu máquina:

- [Docker](https://www.docker.com/get-started)
- [Docker Compose](https://docs.docker.com/compose/install/)

## Puesta en funcionamiento del proyecto

1. Después de haber clonado o descargado el repositorio sigue los siguientes pasos:

3. En la terminal, ejecuta el siguiente comando para construir y levantar los contenedores Docker:
- docker-compose up -d

3. Una vez que los contenedores estén en funcionamiento, ejecuta el siguiente comando para instalar las dependencias de Symfony:
- composer install

4. Ya esta!! Abre tu navegador y escribe localhost entu barra de direcciones para que comiences a interactuar con la App
