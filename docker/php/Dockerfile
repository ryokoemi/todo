FROM php:7.4.9-fpm

COPY php.ini /usr/local/etc/php/

# Debian 10（buster）のアーカイブリポジトリへURLを変更 ＋ 期限チェックを無効化
RUN sed -i 's/deb.debian.org/archive.debian.org/g' /etc/apt/sources.list \
  && sed -i 's/security.debian.org/archive.debian.org/g' /etc/apt/sources.list \
  && echo 'Acquire::Check-Valid-Until "false";' > /etc/apt/apt.conf.d/99disable-check-valid-until \
  && apt-get update \
  && apt-get install -y default-mysql-client zlib1g-dev libzip-dev unzip \
  && docker-php-ext-install pdo_mysql zip \
  && rm -rf /var/lib/apt/lists/*

  # Composer　のインストール
RUN curl -sS https://getcomposer.org/installer | php \
  && mv composer.phar /usr/local/bin/composer \
  && composer self-update

WORKDIR /var/www