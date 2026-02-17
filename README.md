# 🎓 Academia CRUD - Laravel & Vue.js (Infraestructura Cloud)

Este proyecto consiste en una **aplicación de gestión académica** desarrollada bajo una **arquitectura desacoplada**, preparada para operar en **entornos profesionales de servidores y contenedores**.

El sistema integra un backend API REST, un frontend SPA y una infraestructura cloud configurada manualmente, priorizando la portabilidad, la seguridad y las buenas prácticas de despliegue.

---

## 🛠️ Tecnologías y Arquitectura

### Backend
- **Laravel 11**
- Arquitectura **API REST**
- Gestión de lógica de negocio y persistencia de datos

### Frontend
- **Vue.js 3**
- **Vite**
- Aplicación **SPA (Single Page Application)**

### Base de Datos
- **SQLite**
- Base de datos local integrada para:
  - Máxima portabilidad
  - Simplicidad en entornos académicos y de pruebas
  - Persistencia mediante volúmenes Docker

### Infraestructura
- **Instancia Cloud en OpenStack**
- **Ubuntu Server 22.04 LTS**
- Acceso remoto seguro mediante SSH

### Contenedores
- **Docker**
- **Docker Compose**
- Orquestación de servicios y definición de volúmenes

---

## 📝 Objetivos del Proyecto

### 🔹 Desarrollo Full-Stack
- Implementación de:
- Controladores
- Modelos
- Rutas
- Backend en Laravel y frontend reactivo en Vue.js.

### 🔹 Administración de Sistemas
- Configuración completa de un servidor Linux.
- Actualización de repositorios del sistema.
- Gestión de volúmenes para la persistencia de datos.

### 🔹 Orquestación de Servicios
- Creación manual del archivo `docker-compose.yml`.
- Uso del editor de terminal **nano**.
- Definición de volúmenes Docker para la persistencia de la base de datos **SQLite**.

### 🔹 Control de Versiones
- Flujo de trabajo completo con Git:
- `git add`
- `git commit`
- `git push`
- Clonado remoto (`git clone`) en el servidor cloud.

---

## ⚠️ Registro de Incidencias en el Despliegue

Durante la fase final de puesta en producción en el servidor OpenStack, se realizaron varios intentos de **despliegue automatizado** mediante Docker Compose.

### 🔴 Incidencia Detectada
- El proceso de construcción de contenedores (`docker-compose build`) no pudo completarse.
- Causa principal: **ausencia de archivos `Dockerfile`** en el repositorio original.

### 🛠️ Acciones Tomadas
- Revisión y modificación manual del archivo `docker-compose.yml`.
- Intentos de reconfiguración utilizando:
- Imágenes pre-construidas
- Edición directa mediante **nano**
- Análisis de errores y depuración en tiempo real desde la consola del servidor.

### 📌 Estado Actual
- El servidor se encuentra completamente configurado.
- Las redes y accesos son operativos.
- El código fuente está correctamente sincronizado.
- El despliegue final quedó **pausado intencionadamente** para priorizar:
- La integridad de la lógica de negocio
- La correcta gestión de la base de datos SQLite
- Futuras modificaciones del código y del sistema de contenedores.

---

## 👩‍💻 Autora

**Yanira Cue**

---

## 📄 Licencia

Proyecto desarrollado con fines **educativos y académicos**.
