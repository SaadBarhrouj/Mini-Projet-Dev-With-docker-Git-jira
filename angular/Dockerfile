FROM node:18-alpine 

WORKDIR /app

COPY package*.json ./  
RUN npm install 

EXPOSE 4200  

COPY . .  

WORKDIR /app

CMD [ "npm", "start" ]  