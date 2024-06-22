<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Konsultasi;

class KonsultasiController extends Controller
{
	public function dashboard()
	{
		$consultations = Konsultasi::select(
			'konsultasi.konsultasi_id',
			'users_pasien.name as nama_pasien',
			'users_dokter.name as nama_dokter',
			'tanggal_konsultasi',
			'status',
			'keluhan_pasien',
			'balasan_dokter'
		)
			->join('pasien', 'konsultasi.pasien_id', '=', 'pasien.pasien_id')
			->join('doctors', 'konsultasi.doctor_id', '=', 'doctors.doctor_id')
			->join('users as users_pasien', 'pasien.user_id', '=', 'users_pasien.id')
			->join('users as users_dokter', 'doctors.user_id', '=', 'users_dokter.id')
			->where('users_pasien.tipe_pengguna', 'Pasien')
			->where('users_dokter.tipe_pengguna', 'Dokter')
			->get();

		return view('pasien.dashboard', compact('consultations'));
	}

	public function dashboardKeluhan()
	{
		$userId = Auth::id();

		$pasien = DB::table('pasien')
			->join('users', 'pasien.user_id', '=', 'users.id')
			->where('users.tipe_pengguna', 'Pasien')
			->select('users.name', 'users.email', 'users.jenis_kelamin', 'users.alamat', 'users.no_telepon', 'users.tanggal_lahir', 'pasien.pasien_id', 'pasien.riwayat_medis', 'pasien.asuransi')
			->where('users.id', $userId)
			->first();

		$doctors = DB::table('doctors')
			->join('users', 'doctors.user_id', '=', 'users.id')
			->where('users.tipe_pengguna', 'Dokter')
			->select('users.name as doctor_name', 'users.email', 'users.jenis_kelamin', 'users.alamat', 'users.no_telepon', 'users.tanggal_lahir', 'doctors.doctor_id', 'doctors.spesialisasi', 'doctors.kualifikasi', 'doctors.pengalaman')
			->get();

		return view('pasien.dashboard-keluhan', compact('pasien', 'doctors'));
	}

	public function tambahKeluhan(Request $request)
	{
		// Validasi data input
		$request->validate([
			'date' => 'required|date',
			'doctor' => 'required|integer',
			'message' => 'required|string',
		]);

		// Mendapatkan user_id dari sesi login
		$userId = Auth::id();

		// Insert data ke dalam tabel konsultasi
		DB::table('konsultasi')->insert([
			'pasien_id' => $userId,
			'doctor_id' => $request->doctor,
			'tanggal_konsultasi' => $request->date,
			'status' => 'belum dijawab',
			'keluhan_pasien' => $request->message,
			'balasan_dokter' => null,
		]);

		// Redirect ke halaman lain atau tampilkan pesan sukses
		return redirect()->route('pasien.dashboard')->with('success', 'Permintaan konsultasi berhasil dikirim.');
	}
}