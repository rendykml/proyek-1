<?php

namespace App\Http\Controllers;

use App\Models\JadwalDokter;
use App\Models\Dokter;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class JadwalController extends Controller
{
    public function getDataJadwalDokter()
	{
		$jadwals = DB::table('jadwal_dokter')
            ->join('doctors', 'jadwal_dokter.doctor_id', '=', 'doctors.doctor_id')
            ->join('users', 'doctors.user_id', '=', 'users.id')
            ->where('users.tipe_pengguna', 'Dokter')
            ->select('users.name as doctor_name', 'doctors.spesialisasi', 'jadwal_dokter.hari', 'jadwal_dokter.jam_mulai', 'jadwal_dokter.jam_selesai')
            ->get();

		return view('admin.dashboard-jadwal', compact('jadwals'));
	}

    public function showAddJadwalForm()
	{
		$jadwals = User::where('tipe_pengguna', 'Dokter')->get();
		return view('admin.tambah-jadwal', compact('jadwals'));
	}

	protected function validator(array $data, $isUpdate = false)
	{
		$rules = [
			'hari' => ['required', 'enum'],
			'jam_mulai' => ['required', 'datetime'],
            'jam_selesai' => ['required', 'datetime'],
		];
	
		if (!$isUpdate) {
			// Aturan tambahan untuk create
			$rules['doctor_id'] = ['required', 'integer', 'unique:doctors, doctor_id'];
		}
	
		return Validator::make($data, $rules);
	}

	public function addJadwal(Request $request)
	{
		// Lakukan validasi input sesuai kebutuhan

		JadwalDokter::create([
			'doctor_id' => $request->input('doctor_id'),
			'hari' => $request->input('hari'),
			'jam_mulai' => $request->input('jam_mulai'),
            'jam_selesai' => $request->input('jam_selesai'),
		]);

		return redirect()->route('admin.dashboard-jadwal')->with('success', 'jadwal dokter berhasil ditambahkan');
	}

}