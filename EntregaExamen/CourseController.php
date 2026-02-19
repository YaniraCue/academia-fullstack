<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // Ver todos los cursos (GET)
    public function index()
    {
        return Course::all();
    }

    // Crear un curso (POST)
    // En el método store
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:active,draft,archived' // <--- ESTO ES LO QUE FALTA
        ]);

        return Course::create($validated);
    }

    // Ver un curso específico (GET)
    public function show(Course $course)
    {
        return $course;
    }

    // Actualizar un curso (PUT)
 // En el método update
public function update(Request $request, Course $course)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'status' => 'required|in:active,draft,archived' // <--- Y ESTO TAMBIÉN
    ]);

    $course->update($validated);

    // Lógica del examen: desmatricular si deja de estar activo [cite: 25, 26]
    if ($course->status !== 'active') {
        $course->students()->update(['course_id' => null]);
    }

    return response()->json($course);
}

    // Eliminar un curso (DELETE)
    public function destroy(Course $course)
    {
        $course->delete();
        return response()->noContent();
    }
}