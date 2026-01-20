<?php

namespace App\Http\Controllers;

use App\Models\GudangModel;
use App\Models\UserModel;
use App\Models\RoleModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
// okok
class UserController extends Controller
{
    public function index()
    {
        return UserModel::all();
    }
    public function create()
    {
        $roles = RoleModel::all();
        $gudangs = GudangModel::all(); // pastikan nama $gudangs sesuai Blade

        return view('login.register', compact('roles', 'gudangs'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_user' => 'required|string|max:255',
            'telepon' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'jabatan'   => 'required|string'

        ]);
        $role = RoleModel::firstOrCreate(['jabatan' => $request->jabatan]);
        UserModel::create([
            'nama_user' => $request->nama_user,
            'telepon'   => $request->telepon,
            'email'     => $request->email,
            'password'  => bcrypt($request->password),
            'id_role'   => $role->id_role,
            'id_gudang' => 1,
        ]);
        return redirect('/')->with('success', 'Registrasi berhasil');
    }
    // Method login form
    public function showLoginForm()
    {
        return view('login.login'); // arahkan ke view login
    }

    // Method proses login
    public function login(Request $request)
    {
        // 1️⃣ Validasi input
        $request->validate([
            'nama_user' => 'required|string',
            'password' => 'required|string',
        ]);

        // 2️⃣ Cari user berdasarkan nama_user
        $user = UserModel::where('nama_user', $request->nama_user)->first();

        // 3️⃣ Cek password
        if ($user && Hash::check($request->password, $user->password)) {
            // 4️⃣ Simpan session
            session([
                'id_user' => $user->id_user,
                'user_name' => $user->nama_user,
                'user_role' => $user->id_role,
                'user_gudang' => $user->id_gudang,
            ]);

            // 5️⃣ Redirect berdasarkan role
            if ($user->id_role == 1) { // misal 1 = kepala
                return redirect('/staff/dashboard');
            } else {
                return redirect('/kepala/warehouse1');
            }
        }

        // 6️⃣ Jika login gagal
        return back()->withErrors(['nama_user' => 'Username atau password salah']);
    }

    // Logout
    public function logout()
    {
        session()->flush();
        return redirect('/login')->with('success', 'Berhasil logout');
    }
    public function show($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
}
