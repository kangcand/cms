<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use App\Tag;
use App\Artikel;
use Session;
use Auth;
use File;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikel = Artikel::orderBy('created_at', 'desc')->get();
        // dd($artikel);
        return view('backend.artikel.index', compact('artikel'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        $tag = Tag::all();
        return view('backend.artikel.create', compact('kategori', 'tag'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|unique:artikels',
            'konten' => 'required|min:50',
            'foto' => 'required|mimes:jpeg,jpg,png,gif|max:2048',
            'id_kategori' => 'required',
            'tag' => 'required'
        ]);
        $artikel = new Artikel();
        $artikel->judul = $request->judul;
        $artikel->slug = str_slug($request->judul, '-');
        $artikel->konten = $request->konten;
        $artikel->id_user = Auth::user()->id;
        $artikel->id_kategori = $request->id_kategori;
        // foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $path = public_path() .
                '/assets/img/artikel/';
            $filename = str_random(6) . '_'
                . $file->getClientOriginalName();
            $upload = $file->move(
                $path,
                $filename
            );
            $artikel->foto = $filename;
        }
        $artikel->save();
        $artikel->tag()->attach($request->tag);
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasil menyimpan <b>"
                . $artikel->judul . "</b>"
        ]);
        return redirect()->route('artikel.index');
    }

    public function show($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('backend.artikel.show', compact('artikel'));
    }

    public function edit($id)
    {
        $artikel = Artikel::findOrFail($id);
        $kategori = Kategori::all();
        $tag = Tag::all();
        $select = $artikel->tag->pluck('id')->toArray();
        return view('backend.artikel.edit', compact(
            'artikel',
            'select',
            'kategori',
            'tag'
        ));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'konten' => 'required|min:50',
            'id_kategori' => 'required',
            'tag' => 'required'
        ]);

        $artikel = Artikel::findOrFail($id);
        $artikel->judul = $request->judul;
        $artikel->slug = str_slug($request->judul, '-');
        $artikel->konten = $request->konten;
        $artikel->id_user = Auth::user()->id;
        $artikel->id_kategori = $request->id_kategori;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $path = public_path() .
                '/assets/img/artikel/';
            $filename = str_random(6) . '_'
                . $file->getClientOriginalName();
            $uploadSuccess = $file->move(
                $path,
                $filename
            );
            // hapus foto lama, jika ada
            if ($artikel->foto) {
                $old_foto = $artikel->foto;
                $filepath = public_path() .
                    '/assets/img//' .
                    $artikel->foto;
                try {
                    File::delete($filepath);
                } catch (FileNotFoundException $e) {
                    // File sudah dihapus/tidak ada
                }
            }
            $artikel->foto = $filename;
        }
        $artikel->save();
        $artikel->tag()->sync($request->tag);
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasil edit <b>"
                . $artikel->judul . "</b>"
        ]);
        return redirect()->route('artikel.index');
    }

    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);
        $blog = Artikel::findOrFail($id);
        if ($artikel->foto) {
            $old_foto = $artikel->foto;
            $filepath = public_path()
                . '/assets/img/artikel/' . $artikel->foto;
            try {
                File::delete($filepath);
            } catch (FileNotFoundException $e) {
                // File sudah dihapus/tidak ada
            }
        }
        $artikel->tag()->detach($artikel->id);
        $artikel->delete();
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasil menghapus <b>"
                . $blog->judul . "</b>"
        ]);
        return redirect()->route('artikel.index');
    }
}
