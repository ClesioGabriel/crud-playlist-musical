FROM php:8.3-fpm-alpine

# Argumentos para criar usuário não-root
ARG user=www-data
ARG uid=1000

# Instala dependências do sistema
RUN apk update && apk add --no-cache \
    git \
    curl \
    libpng-dev \
    oniguruma-dev \
    libxml2-dev \
    zip \
    unzip \
    shadow \
    bash \
    autoconf \
    gcc \
    g++ \
    make \
    linux-headers

# Instala extensões PHP
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd sockets xml


# Instala Redis no PHP
RUN pecl install -o -f redis \
    && rm -rf /tmp/pear \
    && docker-php-ext-enable redis

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN sed -i "s/www-data:x:82:82/www-data:x:${uid}:${uid}/" /etc/passwd /etc/group

# Define diretório de trabalho
WORKDIR /var/www

# Copia os arquivos do projeto
COPY --chown=${user}:${user} . /var/www

# Permissões das pastas storage e bootstrap/cache
RUN chmod -R 775 /var/www/storage \
    && chmod -R 775 /var/www/bootstrap/cache

# Copia configuração personalizada do PHP
COPY docker/php/custom.ini /usr/local/etc/php/conf.d/custom.ini

# Usa usuário não-root
USER ${user}
