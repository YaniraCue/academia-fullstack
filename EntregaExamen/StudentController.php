<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Course; // Añadido para que funcione el Course::find
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return Student::with('course')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'course_id' => 'required|exists:courses,id'
        ]);
        // Verificamos el estado del curso antes de crear el estudiante
        $course = Course::find($request->course_id);
        if ($course->status !== 'active') {
            return response()->json([
                'error' => 'Operación denegada: El curso seleccionado no está activo.'
            ], 422);
        }

        return Student::create($validated);
    }

    public function show(Student $student)
    {
        return $student->load('course');
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'course_id' => 'required|exists:courses,id'
        ]);
        // Verificamos el estado del curso antes de actualizar el estudiante
        $course = Course::find($request->course_id);
        if ($course->status !== 'active') {
            return response()->json([
                'error' => 'Operación denegada: No puedes matricular al alumno en un curso que no esté activo.'
            ], 422);
        }

        $student->update($validated);
        
        return response()->json($student->load('course')); 
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return response()->noContent();
    }
}