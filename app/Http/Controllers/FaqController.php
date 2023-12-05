<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class FaqController extends Controller
{
    public function index(){
        return view('dashboard.faq.index', [
            'faq' => Faq::all(),
            'active' => 'FAQ'
        ]);
    }

    public function create(){
        return view('dashboard.faq.create', [
            'active' => 'FAQ'
        ]);
    }

    public function tambahdatakategori(Request $request){
        $validatedData = $request->validate([
            'pertanyaan' => 'required|min:3|max:255',
            'jawaban' => 'required'
        ]);

        Faq::create($validatedData);

        return redirect('/dashboard/faq')->with('success', 'FAQ berhasil ditambah');
    }

    public function edit($id){
        $getData = Faq::where('id', $id)->get();

        return view('dashboard.faq.edit', [
            'faq' => $getData[0],
            'active' => 'FAQ'
        ]);
    }

    public function ubahfaq(Request $request){
        $rules = [
            'pertanyaan' => 'required|min:3|max:255',
            'jawaban' => 'required'
        ];

        $validatedData = $request->validate($rules);

        Faq::where('id', $_POST['id'])->update($validatedData);

        return redirect('/dashboard/faq')->with('success', 'FAQ berhasil diupdate');
    }

    public function hapus($id){

        Faq::destroy($id);

        return redirect('/dashboard/faq')->with('success', 'FAQ berhasil dihapus');
    }
}
