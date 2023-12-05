<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index(){
        $getData = DB::table('layanan')->get();
        
        return view('dashboard.layanan.index', [
            'layanan' => $getData
        ]);
    }

    public function editlayanan($id){
        $getData =   DB::table('layanan')
        ->where('id', '=', $id)
        ->get();

        // var_dump($getData[0]->nama_layanan); die;

        return view('dashboard.layanan.edit', [
            'layanan' => $getData[0]
        ]);
    }

    public function ubahlayanan(Request $request){
        $rules = [
            'nama_layanan' => 'required|min:5|max:255',
            'body' => 'required'
        ];

        $validatedData = $request->validate($rules);
        
        DB::table('layanan')
        ->where('id', $_POST['id'])
        ->update($validatedData);
        
        return redirect('/dashboard/layanan')->with('success', 'Layanan berhasil diupdate');

    }
}
