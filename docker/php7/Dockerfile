FROM php:7-fpm
RUN apt-get update && apt-get install -y libmemcached-dev zlib1g-dev libpng-dev libicu-dev git zip unzip

RUN docker-php-ext-install pdo pdo_mysql gd pcntl intl
RUN pecl install xdebug redis

RUN docker-php-ext-enable xdebug pcntl redis

RUN docker-php-ext-configure intl

RUN curl -o /tmp/composer-setup.php https://getcomposer.org/installer \
&& curl -o /tmp/composer-setup.sig https://composer.github.io/installer.sig \
# Make sure we're installing what we think we're installing!
&& php -r "if (hash('SHA384', file_get_contents('/tmp/composer-setup.php')) !== trim(file_get_contents('/tmp/composer-setup.sig'))) { unlink('/tmp/composer-setup.php'); echo 'Invalid installer' . PHP_EOL; exit(1); }" \
&& php /tmp/composer-setup.php --no-ansi --install-dir=/usr/local/bin --filename=composer --snapshot \
&& rm -f /tmp/composer-setup.*

WORKDIR /code
