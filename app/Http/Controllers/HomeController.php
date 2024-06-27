<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Dokter;
use App\Models\Konsultasi;
use App\Models\Pasien;

class HomeController extends Controller
{
    public function index()
	{
		$doctors = DB::table('doctors')
			->join('users', 'doctors.user_id', '=', 'users.id')
			->where('users.tipe_pengguna', 'Dokter')
			->select('users.name', 'users.email', 'users.jenis_kelamin', 'users.alamat', 'users.no_telepon', 'users.tanggal_lahir', 'doctors.doctor_id', 'doctors.spesialisasi', 'doctors.kualifikasi', 'doctors.pengalaman')
			->get();


		return view('index', compact('doctors'));
	}

	public function dashboard_laporan()
	{
        $konsultasi = DB::table('konsultasi')
		->select('konsultasi.konsultasi_id', 'konsultasi.pasien_id', 'konsultasi.doctor_id', 'konsultasi.tanggal_konsultasi', 'konsultasi.status', 'konsultasi.keluhan_pasien', 'konsultasi.balasan_dokter')
		->get();

		$sum_pasien = Pasien::Count('*');
		$total_appoiment = Konsultasi::Where('status','terjawab')->Count('*');
		$total_pesan_blm_dijawab =  Konsultasi::Where('status','belum dijawab')->Count('*');
		$total_dokter = Dokter::Count('*');

		// var_dump($sum_pasien);die();
		return view('admin.dashboard-laporan', compact(
			'konsultasi',
			'sum_pasien',
			'total_appoiment',
			'total_pesan_blm_dijawab',
			'total_dokter'
		));
	}
}
