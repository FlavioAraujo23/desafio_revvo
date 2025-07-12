#!/bin/bash

# Criar diretórios se não existirem
mkdir -p /var/www/html/cursos/uploads
mkdir -p /var/www/html/slides/uploads

# Configurar permissões
chown -R www-data:www-data /var/www/html
chmod -R 755 /var/www/html
chmod -R 777 /var/www/html/cursos/uploads
chmod -R 777 /var/www/html/slides/uploads

# Iniciar Apache
exec apache2-foreground