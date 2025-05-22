namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    private $courses = [
        1 => [
            'id' => 1,
            'title' => "Angielski - podstawowy",
            'start' => "2025-06-01",
            'end' => "2025-08-31",
            'level' => "Podstawowy",
            'language' => "Angielski",
            'price' => "1200 PLN",
            'places' => 15,
            'description' => "Kurs angielskiego dla początkujących...",
            'instructor' => [
                'id' => 1,
                'name' => "Jan Kowalski",
                'language' => "Angielski",
                'image' => "https://randomuser.me/api/portraits/men/32.jpg",
            ],
        ],
        // Możesz dodać więcej kursów
    ];

    // Lista kursów
    public function index()
    {
        // przekazujemy wszystkie kursy do widoku
        return view('courses.index', ['courses' => $this->courses]);
    }

    // Szczegóły kursu
    public function show($id)
    {
        if (!isset($this->courses[$id])) {
            abort(404);  // jeśli kurs nie istnieje, pokazujemy błąd 404
        }
        $course = $this->courses[$id];
        return view('courses.show', compact('course'));
    }
}
