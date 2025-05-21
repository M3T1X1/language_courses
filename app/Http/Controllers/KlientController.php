<?php

namespace App\Http\Controllers;

use App\Models\Klient;

class KlientController extends Controller
{
    public function index()
    {
        // Pobierz wszystkich klientów
        $klienci = Klient::all();

        // Mapowanie danych (opcjonalnie, jeśli chcesz ujednolicić strukturę)
        $data = $klienci->map(function ($k) {
            return (object)[
                'imie' => $k->imie,
                'nazwisko' => $k->nazwisko,
                'email' => $k->email,
                'adres' => $k->adres,
                'telefon' => $k->telefon,
                'id' => $k->id,
            ];
        });

        return view('klienci', ['klienci' => $data]);
    }
}
