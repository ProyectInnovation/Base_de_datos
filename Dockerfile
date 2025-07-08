FROM php:8.2-apache

# Copia tu app al contenedor
COPY . /var/www/html/

# Da permisos de escritura a la carpeta de la base de datos
RUN chmod -R 775 /var/www/html/srv

# Habilita mod_rewrite de Apache
RUN a2enmod rewrite
