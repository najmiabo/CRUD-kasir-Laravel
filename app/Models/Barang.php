<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'tbl_barang';

    protected $fillable = [
        'nama_barang',
        'id_jenis',
        'harga',
        'stock',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public function jenisBarang()
    {
        return $this->belongsTo(JenisBarang::class, 'id_jenis');
    }
}
