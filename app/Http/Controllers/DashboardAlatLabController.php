<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class DashboardAlatLabController extends Controller
{
    public function index()
    {
        $getData = DB::table('alat_laboratorium')
            ->join('category_alat_laboratorium', 'alat_laboratorium.kategori', '=', 'category_alat_laboratorium.id')
            ->select('alat_laboratorium.*', 'category_alat_laboratorium.nama_kategori')
            ->get();

        return view('dashboard.alat.index', [
            'alat' => $getData
        ]);
    }

    public function create(){
        return view('dashboard.alat.create',[
            'kategori' => Kategori::where('is_delete', 0)->get()
        ]);
    }

    public function tambahdata(Request $request){
        $validatedData = $request->validate([
            'nama_alat' => 'required|min:3|max:255',
            'tgl_masuk' => 'required',
            'lokasi_gedung' => 'required',
            'nama_lab' => 'required',
            'ruangan' => 'required',
            'kondisi' => 'required',
            'jumlah_alat' => 'required',
            'spesifikasi_alat' => 'required',
            'ket_alat' => 'required',
            'status_alat' => 'required',
            'kategori' => 'required',
            'harga' => 'required',
            'gambar_alat' => 'image|file|max:4048',
        ]);

        if ($request->file('gambar_alat')) {
            $validatedData['gambar_alat'] = $request->file('gambar_alat')->store('alat-lab');
        }

        Alat::create($validatedData);

        return redirect('/dashboard/alat')->with('success', 'Alat lab berhasil ditambah');
    }

    public function lihatalat($id){
        

        $getData =
            DB::table('alat_laboratorium')
            ->join('category_alat_laboratorium', 'alat_laboratorium.kategori', '=', 'category_alat_laboratorium.id')
            ->select('alat_laboratorium.*', 'category_alat_laboratorium.nama_kategori')
            ->where('alat_laboratorium.id', '=', $id)
            ->get();

        return view('dashboard.alat.lihatalat', [
            'alat' => $getData[0]
        ]);
    }

    public function editalat($id){
        $getData =
            DB::table('alat_laboratorium')
            ->join('category_alat_laboratorium', 'alat_laboratorium.kategori', '=', 'category_alat_laboratorium.id')
            ->select('alat_laboratorium.*', 'category_alat_laboratorium.nama_kategori')
            ->where('alat_laboratorium.id', '=', $id)
            ->get();

        return view('dashboard.alat.editalat', [
            'alat' => $getData[0],
            'kategori' => Kategori::where('is_delete', 0)->get()
        ]);
    }

    public function ubahalat(Request $request){

        $rules = [
            'nama_alat' => 'required|min:3|max:255',
            'tgl_masuk' => 'required',
            'lokasi_gedung' => 'required',
            'nama_lab' => 'required',
            'ruangan' => 'required',
            'kondisi' => 'required',
            'jumlah_alat' => 'required',
            'kategori' => 'required',
            'spesifikasi_alat' => 'required',
            'ket_alat' => 'required',
            'status_alat' => 'required',
            'harga' => 'required',
            'gambar_alat' => 'image|file|max:4048'
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('gambar_alat')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['gambar_alat'] = $request->file('gambar_alat')->store('alat-lab');
        }

        Alat::where('id', $_POST['id'])->update($validatedData);

        return redirect('/dashboard/alat')->with('success', 'Alat berhasil diupdate');
    }

    public function hapusalat($id){
        $getData = Alat::where('id', $id)->get();

        if ($getData[0]['gambar_alat']) {
            Storage::delete($getData[0]['gambar_alat']);
        }

        Alat::destroy($id);

        return redirect('/dashboard/alat')->with('success', 'Alat berhasil dihapus');
    }

    public function kategori()
    {
        return view('dashboard.kategori.index', [
            'kategori' => Kategori::where('is_delete', 0)->get()
        ]);
    }

    public function tambahkategori(){
        return view('dashboard.kategori.create');
    }

    public function tambahdatakategori(Request $request){
        $rules = [
            'nama_kategori' => 'required|min:3|max:255',
        ];

        $validatedData = $request->validate($rules);

        Kategori::create($validatedData);

        return redirect('/dashboard/kategori')->with('success', 'Kategori berhasil ditambah');
    }

    public function editkategori($id){
        $getData = Kategori::where('id', $id)->get();

        return view('dashboard.kategori.editkategori', [
            'kategori' => $getData[0]
        ]);
    }

    public function ubahkategori(Request $request){
        $rules = [
            'nama_kategori' => 'required|min:3|max:255',
        ];

        $validatedData = $request->validate($rules);

        Kategori::where('id', $_POST['id'])->update($validatedData);

        return redirect('/dashboard/kategori')->with('success', 'Kategori berhasil diupdate');
    }

    public function hapuskategori($id)
    {
        Kategori::where('id', $id)->update(['is_delete' => 1]);

        return redirect('/dashboard/kategori')->with('success', 'Kategori berhasil dihapus');
    }
}
