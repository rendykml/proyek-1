<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Dokter;
use App\Models\konsultasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DokterController extends Controller
{
	// Halaman untuk user dokter
    public function dashboard()
	{
        $konsultasi = DB::table('konsultasi')
		->select('konsultasi.konsultasi_id', 'konsultasi.pasien_id', 'konsultasi.doctor_id', 'konsultasi.tanggal_konsultasi', 'konsultasi.status', 'konsultasi.keluhan_pasien', 'konsultasi.balasan_dokter')
		->get();


		return view('dokter.dashboard', compact('konsultasi'));
	}

	public function respon($konsultasi_id)
	{
		$respon = DB::table('konsultasi')
			->join('pasien', 'konsultasi.pasien_id', '=', 'pasien.pasien_id')
			->join('users', 'users.id', '=', 'pasien.user_id')
			->where('konsultasi.konsultasi_id', $konsultasi_id)
			->select('users.name', 'users.jenis_kelamin', 'users.tanggal_lahir', 'users.alamat', 'users.no_telepon', 'pasien.asuransi', 'pasien.riwayat_medis', 'konsultasi.tanggal_konsultasi', 'konsultasi.status', 'konsultasi.keluhan_pasien', 'konsultasi.konsultasi_id')
			->get();

		return view('dokter.respon', compact('respon'));
	}

	public function responKeluhan(Request $request, $konsultasi_id)
	{
        
		$doctors = konsultasi::findOrFail($konsultasi_id);
		
		// Update data pasien
		$doctors->update([
			'status' => 'terjawab',
			'balasan_dokter' => $request->respon
		]);
		//dd($request->respon);

		// Redirect ke halaman dashboard dengan pesan sukses
		return redirect()->route('dokter.dashboard')->with('success', 'Data dokter berhasil diperbarui');
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
		$dokter = User::where('tipe_pengguna', 'Dokter')->get();
		return view('admin.tambah-dokter', compact('dokter'));
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
			'spesialisasi' => $request->input('Spesialisasi'),
			'kualifikasi' => $request->input('Kualifikasi'),
			'pengalaman' => $request->input('Pengalaman'),
		]);

		return redirect()->route('admin.dashboard-dokter')->with('success', 'Data dokter berhasil ditambahkan');
	}

	public function deleteDokter($doctor_id)
	{
		$dokter = Dokter::findOrFail($doctor_id);
		$dokter->delete();

		return redirect()->route('admin.dashboard-dokter')->with('success', 'Data dokter berhasil dihapus');
	}

    public function showEditDokterForm($doctor_id)
	{
		$doctors = Dokter::with('user')->findOrFail($doctor_id);

		$doctors= Dokter::findOrFail($doctor_id);

	
		return view('admin.edit-dokter', compact('doctors'));
	}
    
    public function updateDokter(Request $request, $doctors_Id)
	{
		// Temukan pasien berdasarkan ID
		$doctors = Dokter::findOrFail($doctors_Id);

		// Validasi data tanpa user_id karena tidak perlu diubah
		//$this->validator($request->all(), $doctors_Id, true)->validate();

		// Ambil data yang diinginkan untuk diupdate
		$data = $request->only(['spesialisasi', 'kualifikasi','pengalaman']);

		// Update data pasien
		$doctors->update($data);

		// Redirect ke halaman dashboard dengan pesan sukses
		return redirect()->route('admin.dashboard-dokter')->with('success', 'Data dokter berhasil diperbarui');
	}

}
