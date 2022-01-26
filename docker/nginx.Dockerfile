FROM nginx:alpine

ADD docker/nginx/host.conf /etc/nginx/conf.d/default.conf

WORKDIR /var/www
