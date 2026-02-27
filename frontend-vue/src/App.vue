<template>
  <header>
    <h1>Gestión Académica</h1>
    <nav>
      <RouterLink to="/">Cursos</RouterLink> | 
      <RouterLink to="/students">Estudiantes</RouterLink>
    </nav>
  </header>

  <main>
    <RouterView />
  </main>
  <footer class="text-center py-4 mt-5 text-gray-600">
  <p>&copy; 2026 - Desarrollado con ❤️ por Yanira Cue</p>
</footer>
</template>

<style>
/* Importamos una fuente más moderna */
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap');

:root {
  --primary: #42b983;
  --secondary: #2c3e50;
  --bg: #f8fafc;
  --white: #ffffff;
  --text: #1e293b;
  --danger: #ef4444;
}

body {
  margin: 0;
  font-family: 'Inter', sans-serif;
  background-color: var(--bg);
  color: var(--text);
}

/* Encabezado elegante */
header {
  background: var(--secondary);
  color: white;
  padding: 2rem 1rem;
  text-align: center;
  box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
  margin-bottom: 2rem;
}

header h1 {
  margin: 0;
  font-size: 1.8rem;
  letter-spacing: -0.5px;
}

/* Navegación tipo pestañas */
nav {
  margin-top: 1.5rem;
  display: flex;
  justify-content: center;
  gap: 1rem;
}

nav a {
  color: #cbd5e1;
  text-decoration: none;
  padding: 0.5rem 1rem;
  border-radius: 8px;
  transition: all 0.3s ease;
  font-weight: 600;
}

nav a:hover {
  background: rgba(255, 255, 255, 0.1);
}

nav a.router-link-active {
  background: var(--primary);
  color: var(--secondary);
}

/* Contenedor principal */
main {
  max-width: 1000px;
  margin: 0 auto;
  padding: 0 20px 40px;
}

/* Tarjetas para los formularios */
.card, .form-card {
  background: var(--white);
  padding: 1.5rem;
  border-radius: 12px;
  box-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1);
  margin-bottom: 2rem;
}

/* Inputs profesionales */
input, select, textarea {
  width: 100%;
  padding: 0.75rem;
  margin: 0.5rem 0;
  border: 1px solid #e2e8f0;
  border-radius: 8px;
  box-sizing: border-box; /* Importante para el ancho */
  font-family: inherit;
}

input:focus, select:focus {
  outline: 2px solid var(--primary);
  border-color: transparent;
}

/* Botones con estilo */
button {
  background-color: var(--primary);
  color: var(--secondary);
  font-weight: 600;
  border: none;
  padding: 0.75rem 1.5rem;
  border-radius: 8px;
  cursor: pointer;
  transition: transform 0.1s, opacity 0.2s;
  width: 100%;
  margin-top: 0.5rem;
}

button:hover {
  opacity: 0.9;
  transform: translateY(-1px);
}

button:active {
  transform: translateY(0);
}

button.delete-btn {
  background-color: transparent;
  color: var(--danger);
  padding: 0.4rem;
  width: auto;
}

/* Tablas modernas */
table {
  width: 100%;
  background: var(--white);
  border-radius: 12px;
  overflow: hidden;
  border-collapse: collapse;
  box-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1);
}

th {
  background: #f1f5f9;
  color: #64748b;
  text-transform: uppercase;
  font-size: 0.75rem;
  font-weight: 600;
  padding: 1rem;
  text-align: left;
}

td {
  padding: 1rem;
  border-top: 1px solid #f1f5f9;
}

tr:hover {
  background-color: #f8fafc;
}
</style>