<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
}
