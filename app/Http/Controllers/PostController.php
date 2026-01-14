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
        return view('lihatpost', compact('posts'));
    }

    public function hapus($id)
    {
        $post = TbPost::findOrFail($id);
        $post->delete();
        return redirect('/lihatpost')->with('sukses', 'Data berhasil dihapus!');
    }

    public function create()
    {

        $kategori = TbKategori::all();
        return view('ftambahpost', compact('kategori'));
    }

    public function store(Request $request)
    {
        // versi tanpa validate
        Tbpost::create([
            'judul_post'  => $request->judul_post,
            'isi_post'    => $request->isi_post,
            'tgl_post'    => $request->tgl_post,
            'id_kategori' => $request->id_kategori,
            'kategori'    => $request->kategori,
            'status'      => $request->status,
        ]);


        return redirect('/lihatpost')->with('success', 'Data berhasil ditambahkan');
    }



    public function create_kategori() {
        $kategori = TbKategori::all();
        return view('kategori',["data" => $kategori]);
    }

    public function store_kategori(Request $request)
    {
        TbKategori::create([
            'kategori'  => $request->kategori,
        ]);

        return redirect('/Kategori')->with('success', 'Data berhasil ditambahkan');
    }

    public function destroy_kategori($id)
    {
        $kategori = TbKategori::findOrFail($id);
        $kategori->delete();
        return redirect('/Kategori')->with('sukses', 'Data berhasil dihapus!');
    }

    public function update_kategori(Request $request, $id)
    {
        $request->validate([
            'kategori' => 'required',
        ]);
        $kategori = TbKategori::findOrFail($id);
        $kategori->update([
            'kategori' => $request->kategori,
        ]);
        return redirect('/Kategori')->with('sukses', 'Data berhasil diupdate!');
    }

    public function formEdit($id)
    {
        $post = TbPost::findOrFail($id);
        $kategori = TbKategori::all();
        return view('editpost', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul_post' => 'required',
            'isi_post'   => 'required',
            'tgl_post'   => 'required',
            'kategori'   => 'required',
        ]);

        $post = TbPost::findOrFail($id);

        $post->update([
            'judul_post' => $request->judul_post,
            'isi_post'   => $request->isi_post,
            'tgl_post'   => $request->tgl_post,
            'kategori'   => $request->kategori,
        ]);

        return redirect('/lihatpost')->with('sukses', 'Data berhasil diupdate!');
        // $request->validate([
        //     'kategori' => 'required',
        // ]);
        // $post = TbPost::findOrFail($id);
        // $post->update([
        //     'kategori' => $request->kategori,
        // ]);

        // return redirect('/lihatpost')->with('sukses', 'Data berhasil diupdate!');
    }
}
