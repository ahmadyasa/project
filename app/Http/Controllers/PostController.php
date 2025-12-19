<?php

namespace App\Http\Controllers;

use App\Models\Tbpost;
use App\Models\TbKategori;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Tbpost::paginate(5);
        return view('lihatpost', ['posts' => $posts]);
    }

    public function hapus($id)
    {
        $post = TbPost::findOrFail($id);
        $post->delete();
        return redirect('/lihatpost')->with('sukses', 'Data berhasil dihapus!');
    }

    public function create()
    {
        return view('ftambahpost');
    }

    public function store(Request $request)
    {
        // Validasi
        $request->validate([
            'judul_post' => 'required',
            'isi_post' => 'required',
            'tgl_post' => 'required',
            'id_kategori' => 'required|integer',
            'status' => 'required|integer',
        ]);
        Tbpost::create([
            'judul_post' => $request->judul_post,
            'isi_post' => $request->isi_post,
            'tgl_post' => $request->tgl_post,
            'id_kategori' => $request->id_kategori,
            'status' => $request->status,
        ]);
        return redirect('/lihatpost')->with('success', 'Data berhasil ditambahkan');
    }

    public function formEdit($id)
    {
        $post = TbPost::findOrFail($id);
        $kategori = TbKategori::all();
        return view('editpost', compact('post', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul_post' => 'required',
            'isi_post' => 'required',
            'tgl_post' => 'required',
            'id_kategori' => 'required'
        ]);
        $post = TbPost::findOrFail($id);
        $post->update([
            'judul_post' => $request->judul_post,
            'isi_post' => $request->isi_post,
            'tgl_post' => $request->tgl_post,
            'id_kategori' => $request->id_kategori
        ]);
        return redirect('/lihatpost')->with('sukses', 'Data berhasil diupdate!');
    }
}
