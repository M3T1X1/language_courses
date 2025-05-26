<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'kursy';
    protected $primaryKey = 'id_kursu';

    protected $fillable = ['cena', 'jezyk', 'poziom', 'data_rozpoczecia', 'data_zakonczenia', 'liczba_miejsc', 'id_instruktora'];

    public function instruktor()
    {
        return $this->belongsTo(Instruktor::class, 'id_instruktora', 'id');
    }

    public function transakcje()
    {
        return $this->hasMany(Transakcja::class, 'id_kursu', 'id_kursu');
    }
}
