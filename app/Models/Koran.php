<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Koran extends Model
{
    use HasFactory;
    protected $table = 'korans'; // Sesuaikan nama tabel jika perlu
    protected $primaryKey = 'kode_koran'; 

    public function rak(){
        return $this->belongsTo(Rak::class); 
    }
}
