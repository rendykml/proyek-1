<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
	public function showLoginForm()
	{
		return view('auth.login');
	}

	public function login(Request $request)
	{
		// validator request data email dan password (validasi)
		$this->validator($request->all())->validate();

		// kondisi untuk menentukan id_role dari user email yang digunakan
		if (Auth::attempt($request->only('email', 'password'))) {
			$user = Auth::user();

			// cek id_role
			switch ($user->id_role) {
				case 1:
					return redirect()->route('admin.dashboard');
					break;
				case 2:
					return redirect()->route('pasien.dashboard');
					break;
				case 3:
					return redirect()->route('dokter.dashboard');
					break;
				default:
					return redirect()->route('index'); // Redirect to default page
					break;
			}
		}

		return back()->withErrors([
			'email' => 'The provided credentials do not match our records.',
		]);
	}

	protected function validator(array $data)
	{
		return Validator::make($data, [
			'email' => ['required', 'string', 'email', 'max:255'],
			'password' => ['required', 'string', 'min:8'],
		]);
	}

	public function logout(Request $request)
	{
		Auth::logout();
		$request->session()->invalidate();
		$request->session()->regenerateToken();

		return redirect()->route('login');
	}
}