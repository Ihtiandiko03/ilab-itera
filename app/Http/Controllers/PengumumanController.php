<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengumuman;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class PengumumanController extends Controller
{
    public function index(){
        return view('pengumuman', [
            'pengumuman' => Pengumuman::latest()->paginate(7)->withQueryString(),
            'active' => 'pengumuman'
        ]);
    }

    public function pengumuman(){
        return view('dashboard.pengumuman.index', [
            'pengumuman' => Pengumuman::all()
        ]);
    }

    public function create(){
        return view('dashboard.pengumuman.create');
    }

    public function tambahdata(Request $request){
        $validatedData = $request->validate([
            'title' => 'required|min:5|max:255',
            'slug' => 'required|unique:posts',
            'image' => 'image|file|max:4048',
            'body' => 'required'
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('pengumuman');
        }

        Pengumuman::create($validatedData);

        return redirect('/dashboard/pengumuman')->with('success', 'Pengumuman berhasil dibuat');
    }

    public function edit($id){
        $getData = Pengumuman::where('id', $id)->get();

        return view('dashboard.pengumuman.edit', [
            'pengumuman' => $getData[0]
        ]);
    }

    public function ubahpengumuman(Request $request)
    {
        $rules = [
            'title' => 'required|min:5|max:255',
            'image' => 'image|file|max:4048',
            'body' => 'required'
        ];

        if ($request->slug != $_GET['slug']) {
            $rules['slug'] = 'required|unique:posts';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('pengumuman');
        }

        Pengumuman::where('id', $request->id)->update($validatedData);

        return redirect('/dashboard/pengumuman')->with('success', 'Pengumuman berhasil diupdate');
    }

    public function hapus($id){
        $getData = Pengumuman::where('id', $id)->get();

        // var_dump($getData[0]['image']);
        // die;

        if ($getData[0]['image']) {
            Storage::delete($getData[0]['image']);
        }

        Pengumuman::destroy($id);

        return redirect('/dashboard/pengumuman')->with('success', 'Pengumuman berhasil dihapus');
    }

    public function detail($slug){
        $getData = Pengumuman::where('slug', $slug)->get();

        return view('detailpengumuman', [
            "active" => 'pengumuman',
            'pengumuman' => $getData[0]
        ]);
    }
}
