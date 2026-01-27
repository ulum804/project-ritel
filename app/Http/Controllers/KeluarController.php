<?php

namespace App\Http\Controllers;

use App\Models\KeluarModel;
use App\Models\BarangModel;
use App\Models\GudangModel;
use App\Models\StokModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class KeluarController extends Controller
{
    public function index()
    {
        $keluar = KeluarModel::where('status_keluar', 'pending');
        return $keluar;
    }

    public function create()
    {
        $userGudang = session('user_gudang');

        // Map gudang to view
        $viewMap = [
            1 => 'staff.cabang2',
            2 => 'staff.cabang3',
            3 => 'staff.reject',
            4 => 'staff.utama',
        ];

        if (!isset($viewMap[$userGudang])) {
            abort(403, 'Akses ditolak');
        }

        $barangs = BarangModel::all();
        $gudangs = GudangModel::all();
        return view($viewMap[$userGudang], compact('barangs', 'gudangs'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal_keluar_in' => 'required|date',
            'id_barang' => 'required',
            'qty_keluar' => 'required|integer|min:1',
            'alasan' => 'nullable|string',
            'id_gudang' => 'required',
            'id_gudang_tujuan' => 'required',
            'id_user' => 'required',
        ]);

        KeluarModel::create([
            'tanggal_keluar_in' => $validated['tanggal_keluar_in'],
            'qty_keluar' => $validated['qty_keluar'],
            'alasan' => $validated['alasan'],
            'status_keluar' => 'pending',
            'id_barang' => $validated['id_barang'],
            'id_gudang' => $validated['id_gudang'],
            'id_gudang_tujuan' => $validated['id_gudang_tujuan'],
            'id_user' => $validated['id_user'],
        ]);

        return back()->with('success', 'Menunggu persetujuan Kepala Gudang');
        // Debug: log request data
        // Log::info('Barang Keluar Request:', $request->all());

        // $validatedData = $request->validate([
        //     'tanggal_keluar_in' => 'required|date',
        //     'id_barang' => 'required|exists:barang,id_barang',
        //     'qty_keluar' => 'required|integer|min:1',
        //     'harga_satuan' => 'nullable|numeric|min:0',
        //     'alasan' => 'nullable|string|max:255',
        //     'id_gudang_tujuan' => 'required|exists:gudang,id_gudang',
        //     'id_gudang' => 'required|exists:gudang,id_gudang',
        //     'id_user' => 'required|exists:userr,id_user',
        // ]);

        // Log::info('Validated Data:', $validatedData);

        // // Cek stok di gudang asal
        // $stokAsal = StokModel::where('id_gudang', $validatedData['id_gudang'])
        //     ->where('id_barang', $validatedData['id_barang'])
        //     ->first();

        // if (!$stokAsal || $stokAsal->qty_stok < $validatedData['qty_keluar']) {
        //     return redirect()->back()->with('error', 'Stok tidak cukup di gudang asal.');
        // }

        // $validatedData['status_keluar'] = 'pending'; // default status
        // $keluar = KeluarModel::create($validatedData);

        // // Kurangi stok di gudang asal
        // $stokAsal->qty_stok -= $validatedData['qty_keluar'];
        // $stokAsal->save();

        // // Tambah stok di gudang tujuan
        // $stokTujuan = StokModel::where('id_gudang', $validatedData['id_gudang_tujuan'])
        //     ->where('id_barang', $validatedData['id_barang'])
        //     ->first();

        // if ($stokTujuan) {
        //     $stokTujuan->qty_stok += $validatedData['qty_keluar'];
        //     $stokTujuan->save();
        // } else {
        //     StokModel::create([
        //         'qty_stok' => $validatedData['qty_keluar'],
        //         'id_gudang' => $validatedData['id_gudang_tujuan'],
        //         'id_barang' => $validatedData['id_barang']
        //     ]);
        // }

        // Log::info('Data berhasil disimpan:', $keluar->toArray());

        // return redirect()->back()->with('success', 'Barang keluar berhasil ditambahkan.');
    }
    public function show($id)
    {
        return $keluar = KeluarModel::with('barang', 'user', 'gudang')->findOrFail($id);
    }
    public function update(Request $request, $id)
    {
        $keluar = KeluarModel::findOrFail($id);
        $keluar->update($request->all());
        return response()->json(['message' => 'Data barang keluar sudah diperbarui', 'data' => $keluar]);
    }
    public function destroy($id)
    {
        // $keluar = KeluarModel::findOrFail($id);
        // $keluar->delete();
        // return response()->json(['message' => 'Data barang keluar sudah terhapus']);
        KeluarModel::where('id_barang_keluar', $id)->delete();
        return back()->with('success', 'data berhasil dihapus');
    }
    public function approve($id)
    {
        DB::transaction(function () use ($id) {

            $keluar = KeluarModel::findOrFail($id);

            if ($keluar->status_keluar !== 'pending') {
                abort(400, 'Data sudah diproses');
            }

            $stokAsal = StokModel::where('id_barang', $keluar->id_barang)
                ->where('id_gudang', $keluar->id_gudang)
                ->lockForUpdate()
                ->first();

            if (!$stokAsal || $stokAsal->qty_stok < $keluar->qty_keluar) {
                abort(400, 'Stok tidak mencukupi');
            }

            $stokAsal->decrement('qty_stok', $keluar->qty_keluar);

            $stokTujuan = StokModel::firstOrCreate(
                [
                    'id_barang' => $keluar->id_barang,
                    'id_gudang' => $keluar->id_gudang_tujuan,
                ],
                ['qty_stok' => 0]
            );

            $stokTujuan->increment('qty_stok', $keluar->qty_keluar);

            $keluar->update([
                'status_keluar' => 'setuju',
                'tanggal_keluar_approve' => now(),
            ]);
        });

        return back()->with('success', 'Barang keluar disetujui');
    }
    public function reject($id)
    {
        $keluar = KeluarModel::findOrFail($id);

        $keluar->update([
            'status_keluar' => 'tolak',
            'tanggal_keluar_approve' => now(),
        ]);

        return back()->with('success', 'Barang keluar ditolak');
    }

    public function warehouse2()
    {
        $keluars = KeluarModel::with(['barang', 'gudang', 'gudangTujuan', 'user'])->where('status_keluar', 'pending')->orderBy('tanggal_keluar_in', 'desc')->get();
        return view('kepala.warehouse2', compact('keluars'));
    }
}
