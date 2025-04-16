<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pelanggan extends Model
{
  use HasFactory;

  protected $fillable = [
    'no_kontrol',
    'nama',
    'alamat',
    'telepon',
    'jenis_plg',
  ];



  public function jenis(): BelongsTo
  {
    //                            FK Table Pelanggan | KEY Table Tarif
    return $this->belongsTo(Tarif::class, 'jenis_plg', 'jenis_plg');
  }


  public function pemakaians(): HasMany
  {
    return $this->hasMany(Pemakaian::class, 'no_kontrol', 'no_kontrol');
  }
}
