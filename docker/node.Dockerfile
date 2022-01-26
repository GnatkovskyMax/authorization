FROM node:16

RUN npm install -g nodemon

WORKDIR /var/www/node

CMD ["npm", "start"]