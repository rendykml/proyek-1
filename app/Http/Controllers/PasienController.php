<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pasien;
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

	public function showAddPasienForm()
	{
		$pasiens = User::where('tipe_pengguna', 'Pasien')->get();
		return view('admin.tambah-pasien', compact('pasiens'));
	}

	public function addPasien(Request $request)
	{
		// Lakukan validasi input sesuai kebutuhan

		Pasien::create([
			'user_id' => $request->input('user_id'),
			'riwayat_medis' => $request->input('riwayat_medis'),
			'asuransi' => $request->input('asuransi'),
		]);

		return redirect()->route('admin.pasien-dashboard')->with('success', 'Data pasien berhasil ditambahkan');
	}
}
