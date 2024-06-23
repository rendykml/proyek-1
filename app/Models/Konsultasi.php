<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class konsultasi extends Model
{
    use HasFactory;

    protected $table = 'konsultasi';

	protected $primaryKey = 'konsultasi_id';

	public $timestamps = false;

	protected $fillable = [
		'pasien_id',
		'doctor_id',
        'tanggal_konsultasi',
        'status',
        'keluhan_pasien',
        'balasan_dokter',
	];

	public function user()
    {
        return $this->belongsTo(User::class, 'konsultasi_id');
    }
}
