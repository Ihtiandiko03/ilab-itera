<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Download;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    public function index()
    {
        return view('dashboard.download.index', [
            'download' => Download::all(),
            'active' => 'Download'
        ]);
    }

    public function create()
    {
        return view('dashboard.download.create', [
            'active' => 'Download'
        ]);
    }

    public function tambahdata(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|min:3|max:255',
            'file' => 'mimetypes:application/pdf|max:4048'
        ]);

        if ($request->file('file')) {
            $validatedData['file'] = $request->file('file')->store('filedownload');
        }

        Download::create($validatedData);

        return redirect('/dashboard/download')->with('success', 'Data berhasil ditambah');
    }

    public function hapus($id)
    {

        $getData = Download::where('id', $id)->get();

        if ($getData[0]['file']) {
            Storage::delete($getData[0]['file']);
        }

        Download::destroy($id);

        return redirect('/dashboard/download')->with('success', 'Data berhasil dihapus');
    }
}
