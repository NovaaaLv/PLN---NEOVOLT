<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tarif extends Model
{
  use HasFactory;


  protected $fillable = [
    'jenis_plg',
    'biaya_beban',
    'tarif_kwh',
  ];


  public function pelanggans(): HasMany
  {
    return $this->hasMany(Pelanggan::class, 'jenis_plg', 'jenis_plg');
  }
}
