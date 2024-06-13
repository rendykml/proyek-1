<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Dokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DokterController extends Controller
{
	// Halaman untuk user dokter
    public function dashboard()
	{
		return view('dokter.dashboard');
	}

	// Dashboard dokter di admin
	public function dashboardDokter()
	{
		$doctors = DB::table('doctors')
			->join('users', 'doctors.user_id', '=', 'users.id')
			->where('users.tipe_pengguna', 'Dokter')
			->select('users.name', 'users.email', 'users.jenis_kelamin', 'users.alamat', 'users.no_telepon', 'users.tanggal_lahir', 'doctors.doctor_id', 'doctors.spesialisasi', 'doctors.kualifikasi', 'doctors.pengalaman')
			->get();

		return view('admin.dashboard-dokter', compact('doctors'));
	}

	// Halaman tambah data dokter di admin
	public function showAddDokterForm()
	{
		return view('admin.tambah-dokter');
	}

	// validator body request insert dan update data
	protected function validator(array $data, $isUpdate = false)
	{
		$rules = [
			'spesialisasi' => ['required', 'string', 'max:100'],
			'kualifikasi' => ['required', 'string', 'max:100'],
			'pengalaman' => ['required', 'string', 'max:255'],
		];
	
		if (!$isUpdate) {
			// Aturan tambahan untuk create
			$rules['user_id'] = ['required', 'integer', 'unique:pasien,user_id'];
		}
	
		return Validator::make($data, $rules);
	}

	// function untuk tambah data dokter di admin
	public function addDokter(Request $request)
	{
		// Lakukan validasi input sesuai kebutuhan

		Dokter::create([
			'user_id' => $request->input('user_id'),
			'spesialisasi' => $request->input('spesialisasi'),
			'kualifikasi' => $request->input('kualifikasi'),
			'pengalaman' => $request->input('pengalaman'),
		]);

		return redirect()->route('admin.dashboard-dokter')->with('success', 'Data dokter berhasil ditambahkan');
	}
}
