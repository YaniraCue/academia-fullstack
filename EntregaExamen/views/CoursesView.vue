<template>
  <div class="container">
    <h2>Gestión de Cursos</h2>

    <div class="card form-card">
      <h3>{{ isEditing ? 'Editar Curso' : 'Crear Nuevo Curso' }}</h3>
      <form @submit.prevent="handleSubmit">
        <input v-model="courseForm.name" placeholder="Nombre del curso" required />
        <textarea v-model="courseForm.description" placeholder="Descripción del curso" required></textarea>
        
        <label for="status">Estado del curso:</label>
        <select v-model="courseForm.status" id="status" required>
          <option value="active">Activo</option>
          <option value="draft">Borrador</option>
          <option value="archived">Archivado</option>
        </select>
        
        <button type="submit">{{ isEditing ? 'Actualizar Curso' : 'Guardar Curso' }}</button>
        <button v-if="isEditing" type="button" @click="cancelEdit" class="delete-btn" style="color: gray">Cancelar</button>
      </form>
    </div>

    <table>
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Descripción</th>
          <th>Estado</th> <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="course in courses" :key="course.id">
          <td>{{ course.name }}</td>
          <td>{{ course.description }}</td>
          <td>
            <span :class="'badge-' + course.status">{{ course.status }}</span>
          </td>
          <td>
            <button @click="prepareEdit(course)" class="delete-btn" style="color: var(--primary); margin-right: 10px;">Editar</button>
            <button @click="deleteCourse(course.id)" class="delete-btn">Eliminar</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import api from '../api/axios';

const courses = ref([]);
const isEditing = ref(false);
const editingId = ref(null);

// MODIFICACIÓN EXAMEN: Incluimos status con valor por defecto 'active'
const courseForm = ref({ name: '', description: '', status: 'active' });

const fetchCourses = async () => {
  const response = await api.get('/courses');
  courses.value = response.data;
};

const prepareEdit = (course) => {
  isEditing.value = true;
  editingId.value = course.id;
  courseForm.value = { ...course };
};

const cancelEdit = () => {
  isEditing.value = false;
  editingId.value = null;
  courseForm.value = { name: '', description: '', status: 'active' };
};

const handleSubmit = async () => {
  try {
    if (isEditing.value) {
      await api.put(`/courses/${editingId.value}`, courseForm.value);
    } else {
      await api.post('/courses', courseForm.value);
    }
    cancelEdit();
    fetchCourses();
  } catch (error) {
    alert("Error: " + (error.response?.data?.message || "No se pudo procesar"));
  }
};

const deleteCourse = async (id) => {
  if (confirm('¿Eliminarás este curso? Esto podría afectar a los estudiantes matriculados.')) {
    await api.delete(`/courses/${id}`);
    fetchCourses();
  }
};

onMounted(fetchCourses);
</script>

<style scoped>
/* Estilos para los estados del examen */
.badge-active { 
    color: #2ecc71; /* Verde */
    font-weight: bold; 
}
.badge-draft { 
    color: #f1c40f; /* Amarillo/Dorado */
    font-weight: bold; 
}
.badge-archived { 
    color: #e74c3c; /* Rojo */
    font-weight: bold; 
}

/* Opcional: añade un poco de padding para que parezca un botón/etiqueta */
span[class^="badge-"] {
    padding: 4px 8px;
    border-radius: 4px;
    text-transform: capitalize;
}
</style>