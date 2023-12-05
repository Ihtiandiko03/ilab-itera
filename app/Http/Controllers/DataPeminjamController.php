<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alat;
use App\Models\Datapeminjam;
use Illuminate\Support\Facades\DB;


class DataPeminjamController extends Controller
{
    public function index($id){
        $getData = Datapeminjam::where('id_alat_lab', $id)->get();
        $getData2 = DB::table('alat_laboratorium')
        ->select('id','nama_alat',)
        ->where('id', '=', $id)
        ->get();

        return view('dashboard.datapeminjam.index', [
            'data' => $getData,
            'alat' => $getData2[0]
        ]);
    }

    public function create($id){
        $getData = DB::table('alat_laboratorium')
        ->select('id', 'nama_alat',)
        ->where('id', '=', $id)
        ->get();


        return view('dashboard.datapeminjam.create', [
            'alat' => $getData[0]
        ]);
    }

    public function tambahdata(Request $request){
        $validatedData = $request->validate([
            'id_alat_lab' => 'required',
            'jumlah' => 'required',
            'nama' => 'required',
            'nik' => 'required|min:16',
            'phone' => 'required',
            'alamat' => 'required',
            'tgl_dipinjam' => 'required',
            'status' => 'required'
        ]);

        $validatedData['tgl_dikembalikan'] = $_POST['tgl_dikembalikan'] ? $_POST['tgl_dikembalikan'] : NULL;

        Datapeminjam::create($validatedData);

        return redirect('/dashboard/datapeminjam/'.$_POST['id_alat_lab'].'')->with('success', 'Data berhasil ditambah');
    }

    public function edit($id){
        $getData = Datapeminjam::where('id', $id)->get();
        
        $getData2 = DB::table('alat_laboratorium')
        ->select('id', 'nama_alat',)
        ->where('id', '=', $getData[0]["id_alat_lab"])
        ->get();


        return view('dashboard.datapeminjam.edit', [
            'data' => $getData[0],
            'alat' => $getData2[0]
        ]);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'id_alat_lab' => 'required',
            'jumlah' => 'required',
            'nama' => 'required',
            'instansi' => 'required',
            'phone' => 'required',
            'alamat_instansi' => 'required',
            'tgl_dipinjam' => 'required',
            'status' => 'required'
        ]);

        $validatedData['tgl_dikembalikan'] = $_POST['tgl_dikembalikan'] ? $_POST['tgl_dikembalikan'] : NULL;

        
        $getData = DB::table('alat_laboratorium')
        ->join('data_peminjam', 'alat_laboratorium.id', '=', 'data_peminjam.id_alat_lab')
        ->select('alat_laboratorium.*', 'data_peminjam.*')
        ->where('data_peminjam.id', $_POST['key'])
        ->get();

        if($request->status == 'Diterima'){
            $jumlah = $getData[0]->jumlah_alat - $request->jumlah;
            if($jumlah < 0){
                return redirect('/dashboard/datapeminjam/' . $_POST['id_alat_lab'] . '')->with('failed', 'GAGAL, Jumlah alat tidak mencukupi');
            }
            else{
                Alat::where('id', $getData[0]->id)->update(array('jumlah_alat' => $jumlah));
            }
        }
        elseif($request->status == 'Sampel Selesai'){
            $jumlah = $getData[0]->jumlah_alat + $request->jumlah;
            Alat::where('id', $getData[0]->id)->update(array('jumlah_alat' => $jumlah));
        }
        
        Datapeminjam::where('id', $_POST['key'])->update($validatedData);
        

        return redirect('/dashboard/datapeminjam/' . $_POST['id_alat_lab'] . '')->with('success', 'Data berhasil diubah');
    }

    public function hapus($id, $alat)
    {
        Datapeminjam::destroy($id);

        return redirect('/dashboard/datapeminjam/' . $alat . '')->with('success', 'Data berhasil dihapus');
    }
}
