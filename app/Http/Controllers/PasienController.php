<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PasienController extends Controller
{
	public function dashboard()
	{
		return view('pasien.dashboard');
	}

	public function getDataPasien()
	{
		$pasiens = DB::table('pasien')
			->join('users', 'pasien.user_id', '=', 'users.id')
			->where('users.tipe_pengguna', 'Pasien')
			->select('users.name', 'users.email', 'users.jenis_kelamin', 'users.alamat', 'users.no_telepon', 'users.tanggal_lahir', 'pasien.riwayat_medis', 'pasien.asuransi')
			->get();

		return view('admin.pasien-dashboard', compact('pasiens'));
	}
}
