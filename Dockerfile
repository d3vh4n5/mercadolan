#Esto funciono en b4a

# Utilizamos la imagen oficial de PHP 8.1
FROM php:8.1-apache

# Configuramos el directorio de trabajo
WORKDIR /app

# Instalamos las dependencias necesarias para Composer
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    && rm -rf /var/lib/apt/lists/*

# Instalamos Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copiamos los archivos de la aplicación al contenedor
COPY . /app

# Instalamos las dependencias del proyecto con Composer
RUN composer install

# Exponemos el puerto 80 (puedes cambiarlo según tu configuración)
EXPOSE 80

# Comando por defecto para ejecutar el servidor PHP incorporado
CMD ["php", "-S", "0.0.0.0:80"]