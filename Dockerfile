FROM php:8.4-fpm-alpine

# Установка необходимых пакетов и инструментов
RUN apk update \
    && apk add --no-cache nginx libmcrypt-dev

# Установка Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && php -r "unlink('composer-setup.php');"

# Установка расширений PHP
RUN docker-php-ext-install pdo_mysql pcntl

# Очистка временных файлов после установки
RUN find . -name \*.la -o -name \*.a | xargs rm -f \
    && find . -name \*.so | xargs rm -f \
    && find . -name .libs -a -type d | xargs rm -rf \
    && rm -f libphp.la modules/* libs/* \
    && rm -f ext/opcache/jit/zend_jit_x86.c \
    && rm -f ext/opcache/jit/zend_jit_arm64.c \
    && rm -f ext/opcache/minilua

# Копирование файлов проекта в рабочую директорию
COPY . /var/www/html
WORKDIR /var/www/html

# Удаление файла конфигурации Nginx, если он существует
RUN if [ -f "/etc/nginx/conf.d/default.conf" ]; then rm /etc/nginx/conf.d/default.conf; fi

# Копирование файла конфигурации Nginx
COPY /docker/nginx/nginx.conf /etc/nginx/nginx.conf

# Установка зависимостей через Composer
RUN composer install

RUN chown -R :www-data /var/www/html
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Выполнение генераций
RUN php artisan key:generate
RUN php artisan l5-swagger:generate
RUN php artisan typescript:transform

# Определение команд для запуска контейнера
CMD ["sh", "-c", "nginx && php-fpm -F"]

# Определение порта для внешнего доступа
EXPOSE 8080
