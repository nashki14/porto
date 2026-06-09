FROM php:8.2-fpm-alpine

RUN apk add --no-cache \
    nginx git zip unzip curl libpng-dev libjpeg-turbo-dev bash \
    && docker-php-ext-install pdo pdo_mysql gd

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

RUN composer install --no-dev --optimize-autoloader --no-interaction

RUN chmod -R 775 storage bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache

RUN printf 'server {\n    listen 80;\n    root /app/public;\n    index index.php;\n    location / { try_files $uri $uri/ /index.php?$query_string; }\n    location ~ \\.php$ { fastcgi_pass 127.0.0.1:9000; fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name; include fastcgi_params; }\n}\n' > /etc/nginx/http.d/default.conf

RUN printf '#!/bin/sh\n\
cp .env.docker .env\n\
sed -i "s~^APP_KEY=.*~APP_KEY=${APP_KEY}~" .env\n\
php artisan config:clear\n\
php artisan migrate --force 2>/dev/null || true\n\
php artisan storage:link 2>/dev/null || true\n\
php-fpm -D\n\
nginx -g "daemon off;"\n' > /start.sh && chmod +x /start.sh

EXPOSE 80
CMD ["/bin/sh", "/start.sh"]
