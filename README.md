# 🎓 Academia CRUD - Laravel & Vue.js (Despliegue en Cloud)

Este proyecto consiste en una **aplicación web completa para la gestión de una academia**, desarrollada con una **arquitectura desacoplada** y preparada para su **despliegue en entornos de producción** mediante contenedores.

La solución integra backend y frontend independientes, una base de datos relacional y una infraestructura cloud configurada desde cero.

---

## 📌 Objetivo del Proyecto

El objetivo principal de este proyecto es:

- Desarrollar una aplicación CRUD completa.
- Aplicar una arquitectura **API REST + Cliente SPA**.
- Configurar y administrar un servidor cloud real.
- Desplegar la aplicación mediante **contenedores Docker**.
- Demostrar conocimientos de **sistemas, redes y orquestación**.

---

## 🛠️ Tecnologías Utilizadas

### Backend
- **Laravel 11**
- **PHP 8.x**
- Arquitectura API REST

### Frontend
- **Vue.js 3**
- **Vite**
- Aplicación SPA (Single Page Application)

### Base de Datos
- **MySQL 8.0**

### Infraestructura
- **OpenStack** (Cloud Computing)
- **Ubuntu Server 22.04 LTS**

### Contenedores
- **Docker**
- **Docker Compose**

---

## 🏗️ Configuración de la Infraestructura (OpenStack)

La infraestructura cloud fue configurada manualmente desde cero.

### 🔹 Creación de la Instancia
- Sistema Operativo: **Ubuntu Server 22.04 LTS**
- Tipo: Máquina virtual en OpenStack
- Usuario principal: `ubuntu`

### 🔹 Acceso Seguro
- Configuración de acceso mediante **SSH**
- Gestión de **grupos de seguridad** para permitir:
  - SSH (22)
  - HTTP (80)
  - HTTPS (443)
  - Puertos necesarios para la aplicación

### 🔹 Networking
- Asignación de **IP flotante** para acceso público:
  
## 📝 Resumen del Proceso de Despliegue

El trabajo realizado abarca **desde el desarrollo de la aplicación hasta la configuración avanzada de un servidor en la nube**, cubriendo tanto la parte de software como la de infraestructura.  
Los hitos principales del proyecto han sido los siguientes:

### 🔹 Desarrollo de Software
- Creación de una **arquitectura Full Stack**.
- Backend desarrollado en **Laravel**, encargado de la lógica de negocio y la exposición de una API REST.
- Frontend desarrollado en **Vue.js**, proporcionando una interfaz de usuario dinámica y desacoplada del servidor.

### 🔹 Aprovisionamiento Cloud
- Configuración de una instancia de computación en la infraestructura **OpenStack**.
- Gestión de redes, asignación de **IP flotante** y definición de reglas de seguridad.
- Habilitación de acceso remoto seguro mediante **SSH**.

### 🔹 Preparación del Entorno Linux
- Actualización y configuración del sistema **Ubuntu Server 22.04 LTS**.
- Gestión de usuarios y permisos para permitir la ejecución de Docker sin necesidad de escalada constante de privilegios, mejorando la seguridad y la eficiencia operativa.

### 🔹 Gestión de Dependencias y Versiones
- Sincronización del código fuente mediante **Git**.
- Aseguramiento de que el servidor remoto contenga la versión más reciente del proyecto alojado en GitHub.

### 🔹 Orquestación con Docker
- Diseño y creación manual del archivo **docker-compose.yml**.
- Uso de editores de terminal como **nano** para definir la interacción entre:
  - El servidor de aplicaciones (Backend)
  - La base de datos **MySQL**
- Preparación del entorno para un despliegue reproducible y escalable.

### 🔹 Resolución de Conflictos en Producción
- Identificación de errores durante la construcción de imágenes Docker.
- Detección de la ausencia de archivos **Dockerfile** en el repositorio original.
- Aplicación de técnicas de **depuración en tiempo real** directamente sobre la consola del servidor, documentando la incidencia como parte del proceso de despliegue en un entorno real.