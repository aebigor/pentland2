# Use una imagen base de PHP con Apache
FROM php:8.1-apache

# Copiar el código de la aplicación al directorio de Apache
COPY . /var/www/html/

# Exponer el puerto 80
EXPOSE 80

# Configurar permisos
RUN chown -R www-data:www-data /var/www/html

# Instalar extensiones de PHP si es necesario
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Configurar Apache (opcional, si tienes un archivo de configuración)
# COPY my-apache-config.conf /etc/apache2/sites-available/000-default.conf
