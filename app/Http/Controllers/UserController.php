<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use App\Models\RoleModel;
use App\Models\GudangModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = UserModel::with(['role', 'gudang'])->get();
        return view('admin.manajemen', compact('users'));
    }
        /* =====================
     * FORM REGISTER
     * ===================== */
    public function create()
    {
        $roles   = RoleModel::all();
        $gudangs = GudangModel::all();

        return view('login.register', compact('roles', 'gudangs'));
    }

    /* =====================
     * PROSES REGISTER
     * ===================== */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama_user' => 'required|string|max:255',
            'telepon'   => 'required|string|max:20',
            'email'     => 'required|email|unique:userr,email',
            'password'  => 'required|min:8',
            'jabatan'   => 'required|string',
            'id_gudang' => 'nullable|required_if:jabatan,staff_gudang|exists:gudang,id_gudang',
        ]);

        // AMAN seperti kode awal
        $role = RoleModel::firstOrCreate([
            'jabatan' => $request->jabatan
        ]);

        // staff wajib gudang, selain itu null
        $idGudang = ($request->jabatan === 'staff_gudang')
            ? $request->id_gudang
            : null;

        UserModel::create([
            'nama_user' => $request->nama_user,
            'telepon'   => $request->telepon,
            'email'     => $request->email,
            'password'  => bcrypt($request->password),
            'id_role'   => $role->id_role,
            'id_gudang' => $idGudang,
        ]);

        return redirect('/')->with('success', 'Registrasi berhasil');
    }

    /* =====================
     * FORM LOGIN
     * ===================== */
    public function showLoginForm()
    {
        return view('login.login');
    }

    /* =====================
     * PROSES LOGIN
     * ===================== */
    public function login(Request $request)
    {
        $request->validate([
            'nama_user' => 'required',
            'password'  => 'required',
        ]);

        $user = UserModel::where('nama_user', $request->nama_user)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors(['nama_user' => 'Username atau password salah']);
        }

        session([
            'id_user'     => $user->id_user,
            'user_name'   => $user->nama_user,
            'user_role'   => $user->id_role,
            'user_gudang' => $user->id_gudang,
        ]);

        // Redirect berdasarkan role
        if ($user->role->jabatan === 'admin') {
            return redirect('/admin/laporan');
        }

        if ($user->role->jabatan === 'kepala_gudang') {
            return redirect('/kepala/warehouse1');
        }

        switch ($user->id_gudang) {
            case 1:
                return redirect('/staff/cabang2');
            case 2:
                 return redirect('/staff/cabang3');
            case 3:
                return redirect('/staff/reject');
            case 4:
                return redirect('/staff/utama');
            default:
                return abort(403, 'Gudang tidak dikenali');
        }

    }

    /* =====================
     * LOGOUT
     * ===================== */
    public function logout()
    {
        session()->flush();
        return redirect('/login');
    }
    public function destroy($id)
    {
        // dd('MASUK DESTROY', $id);
        UserModel::where('id_user', $id)->delete();
        return back()->with('success', 'User berhasil dihapus');
    }

}
