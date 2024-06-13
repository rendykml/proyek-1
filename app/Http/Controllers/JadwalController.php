<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

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
}
