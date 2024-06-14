# Use una imagen base de PHP con Apache
FROM php:8.1-apache

# Copiar el código de la aplicación al directorio de Apache
COPY . /var/www/html/

# Exponer el puerto 8080
EXPOSE 8080

# Configurar Apache para escuchar en el puerto 8080
RUN sed -i 's/80/8080/g' /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf

# Instalar extensiones de PHP si es necesario
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Configurar permisos
RUN chown -R www-data:www-data /var/www/html
