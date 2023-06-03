<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Tool;
use App\Models\Ingredient;
use App\Models\Buku;
use App\Models\RecipeView;
use App\Models\Kategori;

class BukuController extends Controller
{
    public function show_buku(){
        $buku = Buku::with('user')->where('status_buku', 'publish')->get();

        $data = [];
        foreach($buku as $buku){

            array_push($data,[
                'idbuku' => $buku->idbuku,
                'judul_buku' => $buku->judul_buku,
                'penulis' => $buku->penulis,
                'gambar' => url($buku->gambar),
                'harga' => $buku->harga,
                'deskripsi' => $buku->deskripsi,
                'nama' => $buku->user->nama,
            ]);
        }

        return response()->json($data,200);
    }

    public function buku_by_id(Request $request) {
        $validator = Validator::make($request->all(),[
            'idbuku' => 'required',
            'email' => 'email'
        ]);

        if($validator->fails()) {
            return messageError($validator->messages()->toArray());
        }

        $buku = Buku::where('status_buku', 'publish')
                    ->where('idbuku', $request->idbuku)
                    ->get();
        
        $kategori = Kategori::where('buku_idbuku', $request->idbuku)->get();
        $user = User::where('email', $request->email)->get();

        $data = [];
        foreach($buku as $buku) {
            array_push($data,[
                'idbuku' => $buku->idbuku,
                'judul_buku' => $buku->judul_buku,
                'penulis' => $buku->penulis,
                'gambar' => url($buku->gambar),
                'harga' => $buku->harga,
                'deskripsi' => $buku->deskripsi,
                'nama' => $buku->user->nama
            ]);
        }

        $bukuData = [
            'buku' => $data,
            'kategori' => $kategori,
            'user' => $user
        ];

        // \App\Models\BookView::create([
        //     'email' => $request->email,
        //     'nama' => $request->nama,
        //     'buku_idbuku' => $request->idbuku
        // ]);

        return response()->json($bukuData,200);
    }

    public function pesanan(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'idbuku' => 'required',

        ]);

        if($validator->fails()) {
            return messageError($validator->messages()->toArray());
        }

        \App\Models\Pesanan::create([
            'user_email' => $request->email,
            'buku_idbuku' => $request->idbuku
        ]);

        return response()->json([
            'data' => [
                'msg' => 'pesanan berhasil'
            ]
            ]);
    }
}
