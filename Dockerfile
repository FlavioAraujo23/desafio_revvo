FROM php:8.2-apache

# Instalar extensões PHP necessárias
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Habilitar mod_rewrite
RUN a2enmod rewrite

# Configurar DocumentRoot
ENV APACHE_DOCUMENT_ROOT /var/www/html
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Criar diretórios de upload
RUN mkdir -p /var/www/html/cursos/uploads /var/www/html/slides/uploads
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 755 /var/www/html/cursos/uploads /var/www/html/slides/uploads

# Copiar arquivos do projeto
COPY . /var/www/html/

# Configurar permissões
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 644 /var/www/html
RUN chmod -R 755 /var/www/html/cursos/uploads /var/www/html/slides/uploads

# Configuração do Apache para aceitar .htaccess
RUN echo '<Directory /var/www/html>\n\
    Options Indexes FollowSymLinks\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>' > /etc/apache2/conf-available/override.conf

RUN a2enconf override

EXPOSE 80