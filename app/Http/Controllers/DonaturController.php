<?php

namespace App\Http\Controllers;

use App\Models\Donatur;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

class DonaturController extends Controller
{
    public function index(): View
    {
        // $donaturs = Donatur::latest()->paginate(10);
        $donaturs = Donatur::latest()->get();
        return view('donaturs.index', compact('donaturs'));
    }

    public function tampilDonatur(): View
    {
        // $donaturs = Donatur::latest()->paginate(10);
        $donaturs = Donatur::latest()->get();
        return view('donaturs.donaturPublic', compact('donaturs'));
    }

    // ==== AWAL TAMBAH DATA ====
    public function create(): View
    {
        $donaturs = Donatur::latest()->get();
        return view('donaturs.create');
    }
    // ---- AKHIR TAMBAH DATA ----

    public function donasi(): View
    {
        $donaturs = Donatur::latest()->get();

        $totalTerkumpul = $donaturs->sum('total_donasi');
        $totalOrang = $donaturs->count();

        return view('donasi', compact('totalTerkumpul', 'totalOrang'));
    }

    // ==== AWAL SIMPAN DATA ====
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama'         => 'required|string|min:1',
            'pesan'        => 'required|string|min:1',
            'total_donasi' => 'required|string|min:1', // Ubah sementara
            'tipe_bayar'   => 'required|string|min:1',
        ]);

        // Buang titik
        $total_donasi = str_replace(['Rp. ', '.', ','], '', $request->total_donasi);

        if (!is_numeric($total_donasi) || $total_donasi < 1) {
            return redirect()->back()->withErrors(['total_donasi' => 'Total donasi harus berupa angka dan minimal 1'])->withInput();
        }

        // Save
        Donatur::create([
            'nama'         => $request->nama,
            'pesan'        => $request->pesan,
            'total_donasi' => $total_donasi,
            'tipe_bayar'   => $request->tipe_bayar
        ]);

        return redirect('/donatur')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    // ---- AKHIR SIMPAN DATA ----

    // ==== AWAL EDIT DATA ====
    public function edit(string $id): View
    {
        $donatur = Donatur::findOrFail($id);

        return view('donaturs.edit', compact('donatur'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'nama'         => 'required|string|min:1',
            'pesan'        => 'required|string|min:1',
            'total_donasi' => 'required|string|min:1', // Ubah sementara
            'tipe_bayar'   => 'required|string|min:1',
        ]);

        // Buang titik
        $total_donasi = str_replace(['Rp. ', '.', ','], '', $request->total_donasi);

        if (!is_numeric($total_donasi) || $total_donasi < 1) {
            return redirect()->back()->withErrors(['total_donasi' => 'Total donasi harus berupa angka dan minimal 1'])->withInput();
        }

        $donatur = Donatur::findOrFail($id);

        $donatur->update([
            'nama'         => $request->nama,
            'pesan'        => $request->pesan,
            'total_donasi' => $total_donasi,
            'tipe_bayar'   => $request->tipe_bayar,
        ]);

        return redirect()->route('donaturs.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    // ---- AKHIR EDIT DATA ----

    // ==== AWAL HAPUS DATA ====
    public function destroy($id): RedirectResponse
    {
        $donatur = Donatur::findOrFail($id);

        $donatur->delete();

        return redirect()->route('donaturs.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
    // ---- AKHIR HAPUS DATA ----
}
