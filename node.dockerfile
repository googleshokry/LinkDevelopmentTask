# Base image
FROM node:19-alpine

# Create app directory
WORKDIR /app

# A wildcard is used to ensure both package.json AND package-lock.json are copied
COPY shop-cart-service/package*.json ./

# Install app dependencies
RUN npm install

# Bundle app source
COPY ./shop-cart-service .

# Creates a "dist" folder with the production build
RUN npm run build