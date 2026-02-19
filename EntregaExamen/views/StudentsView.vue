<template>
  <div class="container">
    <h2>Gestión de Estudiantes</h2>

    <div class="card form-card">
      <h3>{{ isEditing ? 'Editar Estudiante' : 'Matricular Nuevo Estudiante' }}</h3>
      <form @submit.prevent="handleSubmit">
        <input v-model="studentForm.name" placeholder="Nombre completo" required />
        <input v-model="studentForm.email" type="email" placeholder="Email" required />
        
        <select v-model="studentForm.course_id" required>
          <option value="" disabled>Selecciona un curso</option>
          <option v-for="course in activeCourses" :key="course.id" :value="course.id">
            {{ course.name }}
          </option>
        </select>
        
        <button type="submit">{{ isEditing ? 'Actualizar Datos' : 'Matricular Estudiante' }}</button>
        <button v-if="isEditing" type="button" @click="cancelEdit" class="delete-btn" style="color: gray">Cancelar</button>
      </form>
    </div>

    <table>
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Email</th>
          <th>Curso</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="student in students" :key="student.id">
          <td>{{ student.name }}</td>
          <td>{{ student.email }}</td>
          <td>{{ student.course ? student.course.name : 'Sin curso' }}</td>
          <td>
            <button @click="prepareEdit(student)" class="delete-btn" style="color: var(--primary); margin-right: 10px;">Editar</button>
            <button @click="deleteStudent(student.id)" class="delete-btn">Eliminar</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script setup>
// MODIFICACIÓN EXAMEN: Añadimos 'computed' a las importaciones
import { ref, onMounted, computed } from 'vue';
import api from '../api/axios';

const students = ref([]);
const courses = ref([]);
const isEditing = ref(false);
const editingId = ref(null);

const studentForm = ref({ name: '', email: '', course_id: '' });

// MODIFICACIÓN EXAMEN: Propiedad computada para filtrar solo cursos activos
const activeCourses = computed(() => {
  return courses.value.filter(course => course.status === 'active');
});

const fetchData = async () => {
  const [resStudents, resCourses] = await Promise.all([
    api.get('/students'),
    api.get('/courses')
  ]);
  students.value = resStudents.data;
  courses.value = resCourses.data;
};

const prepareEdit = (student) => {
  isEditing.value = true;
  editingId.value = student.id;
  studentForm.value = { ...student };
};

const cancelEdit = () => {
  isEditing.value = false;
  editingId.value = null;
  studentForm.value = { name: '', email: '', course_id: '' };
};

const handleSubmit = async () => {
  try {
    if (isEditing.value) {
      await api.put(`/students/${editingId.value}`, studentForm.value);
    } else {
      await api.post('/students', studentForm.value);
    }
    cancelEdit();
    fetchData();
  } catch (error) {
    // MODIFICACIÓN EXAMEN: Capturamos el error 422 y mostramos el mensaje del backend
    const serverError = error.response?.data?.error || error.response?.data?.message || error.message;
    alert("Atención: " + serverError);
  }
};

const deleteStudent = async (id) => {
  if (confirm('¿Eliminar estudiante?')) {
    await api.delete(`/students/${id}`);
    fetchData();
  }
};

onMounted(fetchData);
</script>