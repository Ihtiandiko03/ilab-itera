<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;
use Illuminate\Support\Facades\Storage;



class GaleriController extends Controller
{
    //
    public function index()
    {
        return view('dashboard.galeri.index', [
            'galeri' => Galeri::all(),
            'active' => 'Galeri'
        ]);
    }

    public function create()
    {
        return view('dashboard.galeri.create', [
            'active' => 'Galeri'
        ]);
    }

    public function tambahdata(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:3|max:255',
            'image' => 'image|file|max:4048'
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('galeri');
        }

        Galeri::create($validatedData);

        return redirect('/dashboard/galeri')->with('success', 'Galeri berhasil ditambah');
    }

    public function edit($id)
    {
        $getData = Galeri::where('id', $id)->get();

        return view('dashboard.galeri.edit', [
            'galeri' => $getData[0],
            'active' => 'FAQ'
        ]);
    }

    public function ubahgaleri(Request $request)
    {
        $rules = [
            'title' => 'required|min:3|max:255',
            'image' => 'image|file|max:4048',
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('galeri');
        }


        Galeri::where('id', $request->id)->update($validatedData);

        return redirect('/dashboard/galeri')->with('success', 'Galeri berhasil diupdate');
    }

    public function hapus($id)
    {
        $getData = Galeri::where('id', $id)->get();

        if ($getData[0]['image']) {
            Storage::delete($getData[0]['image']);
        }

        Galeri::destroy($id);


        return redirect('/dashboard/galeri')->with('success', 'Galeri berhasil dihapus');
    }
}
