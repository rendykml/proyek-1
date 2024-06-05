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
		$users = User::where('id_role', 2)->get();
		return view('admin.dashboard', compact('users'));
	}

	public function showAddPasienForm()
	{
		return view('admin.tambah-pasien');
	}

	public function addPasien(Request $request)
	{
		$this->validator($request->all())->validate();

		$user = $this->create($request->all());

		return redirect()->route('admin.dashboard')->with('success', 'Pasien berhasil ditambahkan');
	}

	protected function validator(array $data)
	{
		return Validator::make($data, [
			'name' => ['required', 'string', 'max:255'],
			'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
			'password' => ['required', 'string', 'min:8', 'confirmed'],
		]);
	}

	protected function create(array $data)
	{
		return User::create([
			'name' => $data['name'],
			'email' => $data['email'],
			'password' => Hash::make($data['password']),
		]);
	}
}