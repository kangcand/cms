<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use Session;

class TagController extends Controller
{
    public function index()
    {
        $tag = Tag::orderBy('created_at', 'asc')->get();
        return view('backend.tag.index', compact('tag'));
    }

    public function create()
    {
        return view('backend.tag.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_tag' => 'required|unique:tags'
        ]);
        $tag = new tag();
        $tag->nama_tag = $request->nama_tag;
        $tag->slug = str_slug($request->nama_tag, '-');
        $tag->save();
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasil menyimpan <b>"
                . $tag->nama_tag . "</b>"
        ]);
        return redirect()->route('tag.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        return view('backend.tag.edit', compact('tag'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_tag' => 'required'
        ]);
        $tag =  Tag::findOrFail($id);
        $tag->nama_tag = $request->nama_tag;
        $tag->slug = str_slug($request->nama_tag, '-');
        $tag->save();
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasil mengedit<b>"
                . $tag->nama_tag . "</b>"
        ]);
        return redirect()->route('tag.index');
    }

    public function destroy($id)
    {
        $tag2 = Tag::findOrFail($id);
        if (!Tag::destroy($id)) return redirect()->back();
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasil menghapus <b>"
                . $tag2->nama_tag . "</b>"
        ]);
        return redirect()->route('tag.index');
    }
}
