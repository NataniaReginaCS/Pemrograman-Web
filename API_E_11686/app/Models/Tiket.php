<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tiket extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = "tiket";
    protected $primaryKey = "id";

    protected $fillable = [
        'id_peserta',
        'id_event',
        'jenis_tiket',
        'harga',
        'kuota',
        'tanggal_transaksi'
    ];

    public function peserta()
    {
        return $this->belongsTo(Peserta::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
