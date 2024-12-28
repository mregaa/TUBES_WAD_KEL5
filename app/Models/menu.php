<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
      /** @use HasFactory<\Database\Factories\DosenFactory> */
      use HasFactory;

      //nama tabel dihubungkan dgn model dosen
      protected $tablle = 'menus';
  
      //kolom yang diisi melalui method create()
      protected $fillable = [
        'kode_tenant',
        'nama_menu',
        'deskripsi',
        'harga',
        'stok',
        'status',
        'penjual_id',
        'image'
      ];
  
      public function getMahasiswa(): HasMany {
          return $this->hasMany(Mahasiswa::class, 'dosen_id', 'id');
      }
}
