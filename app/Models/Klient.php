<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Klient extends Model
{
    protected $table = 'klienci';
    protected $primaryKey = 'id_klienta';

    protected $fillable = ['email', 'haslo', 'imie', 'nazwisko', 'adres', 'nr_telefonu', 'adres_zdjecia'];

    public function transakcje()
    {
        return $this->hasMany(Transakcja::class, 'id_klienta', 'id_klienta');
    }
}
