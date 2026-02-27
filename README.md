# 🎓 Yanira’s Academy - Fullstack CRUD

Este proyecto es una **plataforma de gestión académica integral** que permite administrar **cursos y estudiantes en tiempo real**.  
Ha sido diseñado bajo una **arquitectura de microservicios desplegados en la nube**, garantizando **alta disponibilidad**, **escalabilidad** y **mantenibilidad**.

---

## 🚀 Arquitectura del Sistema

La aplicación se divide en **tres capas independientes**, comunicadas entre sí:

### 🖥️ Frontend 
- Desarrollado con **Vue.js 3** y **Vite**
- Comunicación con el backend mediante **Axios**
- Despliegue continuo en **Vercel**

### ⚙️ Backend 
- API REST construida con **Laravel 12**
- Contenerizada usando **Docker**
- Desplegada en **Render**

### 🗄️ Base de Datos 
- Motor **MySQL**
- Base de datos gestionada remotamente en la nube con **Railway**

---

## 🛠️ Tecnologías Utilizadas

| Componente            | Tecnología        | Servicio Cloud |
|----------------------|-------------------|----------------|
| Interfaz de Usuario  | Vue.js (Vite)     | Vercel         |
| Lógica de Negocio    | PHP / Laravel 12  | Render (Docker)|
| Almacenamiento       | MySQL             | Railway        |
| Control de Versiones | Git / GitHub      | GitHub         |

---

## 📋 Funcionalidades Clave

- 📚 **Gestión de Cursos**
  - Creación, lectura, edición y eliminación (CRUD) de cursos

- 👩‍🎓 **Gestión de Estudiantes**
  - Administración completa del alumnado
  - Datos centralizados en la base de datos

- 🔌 **API RESTful**
  - Endpoints estandarizados
  - Comunicación entre frontend y backend mediante **Axios**

---

## 🎓 Despliegue de Yanira’s Academy

### 🏗️ Paso 1: Configuración de la Base de Datos (Railway)
El primer paso fue crear el "almacén" de nuestra información. Utilizamos Railway para alojar una base de datos MySQL pública.

Se generaron las credenciales de acceso: Host, Puerto, Usuario y Contraseña.

> Nota: Es vital usar el Public URL o el Host Externo (shinkansen.proxy.rlwy.net) para que servicios fuera de Railway puedan conectarse.

### 🧠 Paso 2: El Backend en la Nube (Laravel + Docker + Render)
Para el servidor, empaquetamos una API de Laravel 11 en un contenedor Docker para asegurar que funcione igual en cualquier computador.

- **Dockerización:** Creamos un Dockerfile que instala PHP, las dependencias y levanta el servidor en el puerto 8000.

- **Despliegue en Render:** Conectamos el repositorio de GitHub a Render.

- **Variables de Entorno:** Configuramos en el panel de Render todas las llaves de la base de datos para que Laravel pudiera "hablar" con Railway.

>Nota: Incluir el comando php artisan migrate --force en el arranque del contenedor es clave para que las tablas se creen solas sin tener que entrar manualmente a la terminal.

### 🎨 Paso 3: El Frontend y la Conexión (Vue.js + Vercel)
La interfaz de usuario se construyó con Vue.js 3 y se optimizó para producción.

- **Sincronización de API:** En el archivo src/api/axios.js, cambiamos la dirección de localhost por la URL real de Render (https://academia-backend-7j5n.onrender.com/api).

- **Personalización:** Se modificó el index.html para que el título de la pestaña fuera Yanira´s Academy.

- **Despliegue en Vercel:** Vinculamos la carpeta frontend-vue a Vercel, logrando una carga ultrarrápida y certificados SSL automáticos.

> Nota: Al trabajar con subcarpetas en un mismo repositorio (Monorepo), es fundamental indicar a Vercel cuál es el Root Directory correcto para que el despliegue no falle.

### ✅ Paso 4: Pruebas de Integración
Finalmente, validamos que todo el ecosistema estuviera conectado:

Al crear un curso en la web (Vercel), la petición viaja a la API (Render) y se guarda permanentemente en la base de datos (Railway).

Si los datos aparecen en la tabla tras refrescar la página, ¡la integración es exitosa!.

## 💡 Notas Importantes (Lecciones Aprendidas)

### 📌 Conexión a la Base de Datos
Al utilizar servicios externos como **Railway**, es imprescindible configurar correctamente las variables de entorno en **Render**:

- `DB_HOST`
- `DB_PORT`
- `DB_PASSWORD`

⚠️ Una mala configuración provocará **errores de conexión interna** entre el backend y la base de datos.

---

### 📌 Automatización con Docker
Incluir el siguiente comando en el `Dockerfile`:

```bash
php artisan migrate --force
```

### 📌 URL Base de Axios
En entorno de producción, el archivo axios.js del frontend no debe apuntar a localhost.
Debe usar la URL pública generada por Render:

```bash
https://<tu-backend-render>/api
``` 

## 🌍 Enlace del Proyecto
## [Yanira’s Academy en Vercel](https://academia-fullstack-oqf1.vercel.app/)