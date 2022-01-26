FROM node:16

RUN npm install -g vue@next

WORKDIR /var/www/vue

CMD ["npm", "run", "serve"]
