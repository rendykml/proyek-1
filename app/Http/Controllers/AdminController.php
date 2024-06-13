<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
	public function dashboard()
	{
		$users = User::all();
		return view('admin.dashboard', compact('users'));
	}

	public function dashboardDokter()
	{
		$users = User::where('tipe_pengguna', 'Dokter')->get();
		return view('admin.dashboard-dokter', compact('users'));
	}

	public function showAddPasienForm()
	{
		return view('admin.tambah-pasien');
	}

	public function showAddDokterForm()
	{
		return view('admin.tambah-dokter');
	}

	public function addPasien(Request $request)
	{
		$this->validator($request->all())->validate();

		$user = $this->create($request->all());

		return redirect()->route('admin.dashboard')->with('success', 'Pasien berhasil ditambahkan');
	}

	public function addDokter(Request $request)
	{
		$this->validator($request->all())->validate();

		$user = $this->create($request->all());

		return redirect()->route('admin.dashboard-dokter')->with('success', 'Dokter berhasil ditambahkan');
	}

	protected function validator(array $data, $userId = null)
	{
		$rules = [
			'name' => ['required', 'string', 'max:255'],
			'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $userId],
			'username' => ['required', 'string', 'max:255'],
			'tanggal_lahir' => ['required', 'date'],
			'jenis_kelamin' => ['required', 'string', 'max:255'],
			'alamat' => ['required', 'string', 'max:255'],
			'no_telepon' => ['required', 'string', 'max:255'],
			'tipe_pengguna' => ['required', 'string', 'max:255'],
		];

		if ($userId) {
			// Only apply password validation if password is filled
			$rules['password'] = ['nullable', 'string', 'min:8', 'confirmed'];
		} else {
			$rules['password'] = ['required', 'string', 'min:8', 'confirmed'];
		}

		return Validator::make($data, $rules);
	}

	protected function create(array $data)
	{
		return User::create([
			'name' => $data['name'],
			'email' => $data['email'],
			'password' => Hash::make($data['password']),
			'username' => $data['username'],
			'tanggal_lahir' => $data['tanggal_lahir'],
			'jenis_kelamin' => $data['jenis_kelamin'],
			'alamat' => $data['alamat'],
			'no_telepon' => $data['no_telepon'],
			'tipe_pengguna' => $data['tipe_pengguna'],
		]);
	}

	public function showEditPenggunaForm($id)
	{
		$users = User::findOrFail($id);
		return view('admin.edit-pengguna', compact('users'));
	}

	public function updatePengguna(Request $request, $id)
	{
		$user = User::findOrFail($id);

		$this->validator($request->all(), $user->id)->validate();

		$data = $request->except(['_token', '_method', 'password_confirmation']);

		if ($request->filled('password')) {
			$data['password'] = Hash::make($request->input('password'));
		} else {
			unset($data['password']);
		}

		$user->update($data);

		return redirect()->route('admin.dashboard')->with('success', 'Data pengguna berhasil diperbarui');
	}

	public function deletePengguna($id)
	{
		$user = User::findOrFail($id);
		$user->delete();

		return redirect()->route('admin.dashboard')->with('success', 'Data pengguna berhasil dihapus');
	}
}