FROM node:20-alpine

WORKDIR /app
# Copiamos archivos de dependencias
COPY package*.json ./
RUN npm install
# Copiamos el resto del código
COPY . .

EXPOSE 3000
# Usamos npx para asegurar que encuentre vite
CMD ["npx", "vite", "--host", "0.0.0.0", "--port", "3000"]