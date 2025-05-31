<?php
namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request; // pamiętaj o imporcie Request

class ReservationController extends Controller
{
    public function showForm(Request $request) // dodaj Request jako parametr
    {
        $courses = Course::all();
        $selectedCourse = $courses->first();
        
        if ($request->has('course')) {
            $selectedCourse = $courses->firstWhere('id_kursu', $request->input('course')) ?? $selectedCourse;
        }
    
        return view('rezerwacja', compact('courses', 'selectedCourse'));
    }

    public function submit(Request $request)
    {
        // Walidacja i zapis rezerwacji
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'course' => 'required|exists:kursy,id_kursu',
        ]);

        // Tu zapisz rezerwację do bazy lub wyślij maila itd.

        return redirect()->route('rezerwacja')->with('success', 'Rezerwacja została przyjęta!');
    }
}
