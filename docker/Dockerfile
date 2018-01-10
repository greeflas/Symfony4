FROM php:7.1-cli

MAINTAINER Vladimir Kuprienko <vldmr.kuprienko@gmail.com>

RUN apt-get update && \
    apt-get -y --no-install-recommends install \
    zip \
    unzip \
    curl && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/* && \

    curl -sS https://getcomposer.org/installer | \
    php -- --install-dir=/usr/local/bin --filename=composer && \

    yes "" | adduser --uid=1000 --disabled-password docker && \
    echo "docker   ALL=(ALL:ALL) NOPASSWD: ALL" >> /etc/sudoers

EXPOSE 8000

WORKDIR /var/www/demo-app

COPY "composer-install" "/composer-install"
RUN chmod +x /composer-install

CMD "/composer-install"