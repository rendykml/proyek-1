<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'review';
	protected $primaryKey = 'id_review';
	public $timestamps = false;

	protected $fillable = [
		'konsultasi_id',
		'rating',
		'pesan',
	];

	public function konsultasi()
	{
		return $this->belongsTo(Konsultasi::class, 'konsultasi_id');
	}
}
