<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fasilitas;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class FasilitasController extends Controller
{
    public function index()
    {
        return view('dashboard.fasilitas.index', [
            'fasilitas' => Fasilitas::latest()->paginate(7)->withQueryString(),
            'active' => 'Fasilitas'
        ]);
    }

    public function create()
    {
        return view('dashboard.fasilitas.create');
    }

    public function tambahdata(Request $request)
    {
        $validatedData = $request->validate([
            'nama_fasilitas' => 'required|min:3|max:255',
            'title' => 'required|min:5|max:255',
            'slug' => 'required|unique:posts',
            'image' => 'image|file|max:4048',
            'body' => 'required'
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('fasilitas');
        }

        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);


        Fasilitas::create($validatedData);

        return redirect('/dashboard/fasilitas')->with('success', 'Fasilitas berhasil ditambah');
    }

    public function edit($id)
    {
        $getData = Fasilitas::where('id', $id)->get();

        return view('dashboard.fasilitas.edit', [
            'fasilitas' => $getData[0]
        ]);
    }

    public function ubahfasilitas(Request $request)
    {
        $rules = [
            'nama_fasilitas' => 'required|min:3|max:255',
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
            $validatedData['image'] = $request->file('image')->store('fasilitas');
        }

        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);


        Fasilitas::where('id', $request->id)->update($validatedData);

        return redirect('/dashboard/fasilitas')->with('success', 'Fasilitas berhasil diupdate');
    }

    public function hapus($id)
    {
        $getData = Fasilitas::where('id', $id)->get();

        // var_dump($getData[0]['image']);
        // die;

        if ($getData[0]['image']) {
            Storage::delete($getData[0]['image']);
        }

        Fasilitas::destroy($id);

        return redirect('/dashboard/fasilitas')->with('success', 'Fasilitas berhasil dihapus');
    }


}
