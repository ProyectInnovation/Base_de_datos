FROM php:8.2-apache

# Copia todo el proyecto al contenedor
COPY . /var/www/html/

# Da permisos de escritura al archivo de base de datos
RUN chmod -R 775 /var/www/html/srv

# Habilita mod_rewrite de Apache
RUN a2enmod rewrite
