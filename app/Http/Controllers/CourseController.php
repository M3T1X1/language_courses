<?php
namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // Lista kursów
    public function index()
    {
        // Pobierz wszystkie kursy z bazy danych
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    // Szczegóły kursu
    public function show($id)
    {
        // Znajdź kurs po ID albo zwróć 404
        $course = Course::findOrFail($id);
        return view('courses.show', compact('course'));
    }
}
