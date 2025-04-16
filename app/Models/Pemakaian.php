<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pemakaian extends Model
{
  use HasFactory;


  protected $fillable = [
    'no_kontrol',
    'tahun',
    'bulan',
    'meter_awal',
    'meter_akhir',
    'jumlah_pakai',
    'biaya_beban_pemakai',
    'tarif_kwh',
    'biaya_pemakaian',
    'status',
  ];




  public function pelanggan(): BelongsTo
  {
    //                                FK Table Pemakaian | KEY Table Pelanggans
    return $this->belongsTo(Pelanggan::class, 'no_kontrol', 'no_kontrol');
  }
}
