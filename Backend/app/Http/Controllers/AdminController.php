<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Buku;
use App\Models\Pesanan;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function register(Request $request){

        $validator = validator::make($request->all(),[
            'nama' => 'required',
            'email' => 'required|email|unique:user,email',
            'password' => 'required|min:8',
            'confirmation_password' => 'required|same:password',
            'role' => 'required|in:admin,user',
            'status' => 'required|in:aktif,non-aktif',
            'email_validate' => 'required|email'
        ]);

        if($validator->fails()){
            return messageError($validator->messages()->toArray());
        }
        
        $user = $validator->validated();
        
        User::create($user);

        return response()->json([
            "data" => [
                'msg' => "berhasil login",
                'nama' => $user['nama'],
                'email' => $user['email'],
                'role' => $user['role']
            ]
        ],200);
    }

    public function show_register(){
            
        $users = User::where('role','user')->get();
            
        return response()->json([
            "data" => [
                'msg' => "user registrasi",
                'data' => $users
            ]
        ],200);
    }
        
    public function show_register_by_id($id){
            
        $user = User::find($id);
            
        return response()->json([
            "data" => [
                'msg' => "user id : {$id}",
                'data' => $user
            ]
        ],200);
    }
            
    public function update_register(Request $request, $id){
            
        $user = user::find($id);

        if($user){
            $validator = Validator::make($request->all(),[
                'nama' => 'required',
                'password' => 'min:8',
                'confirmation_password' => 'same:password',
                'role' => 'required|in:admin,user',
                'status' => 'required|in:aktif,non-aktif',
                'email_validate' => 'required|email',
            ]);

            if($validator->fails()){
                return messageError($validator->messages()->toArray());
            }

            $data = $validator->validated();
                
            User::where('id', $id)->update($data);
        
            return response()->json([
                'data' => [
                    "msg" => 'user dengan id : {$id} berhasil di update',
                    'nama' => $data['nama'],
                    'email' => $user['email'],
                    'role' => $data['role'],
                ]
            ],200);
        }
                
        return response()->json([
            "data" => [
                'msg' => 'user id {$id}, tidak ditemukan'
            ]
        ],422);
    }

    public function delete_register($id){
            
        $user = User::find($id);
            
        if($user){
                
            $user->delete();
                
            return response()->json([
                "data" => [
                    'msg' => 'user dengan id {$id} berhasil di hapus'
                    ]
                ],200);
        }
                
        return response()->json([
            "data" => [
                'msg' => 'user dengan id {$id} tidak di temukan'
            ]
        ],422);
    }
        
    public function activation_account($id){
            
        $user = User::find($id);
            
        if($user){
                
            User::where('id', $id)->update(['status' => 'aktif']);
                
            return response()->json([
                "data" => [
                    'msg' => 'user dengan id '.$id. 'berhasil di aktifkan'
                ]
            ],200);
        }
                
        return response()->json([
            "data" => [
                'msg' => 'user dengan id {$id} tidak di temukan'
            ]
        ],422);
    }
                
    public function deactivation_account($id){
            
        $user = User::find($id);
            
        if($user){
                
            User::where('id', $id)->update(['status' => 'non-aktif']);
                
            return response()->json([
                "data" => [
                    'msg' => 'user dengan id '.$id. 'berhasil di nonaktifkan'
                ]
            ],200);
        }
    
        return response()->json([
            "data" => [
                'msg' => 'user dengan id '.$id. ' tidak di temukan'
            ]
        ],422);
    }

    public function create_buku(Request $request){
            
        $validator = Validator::make($request->all(),[
            'judul_buku' => 'required|max:255',
            'penulis' => 'required|max:255',
            'gambar' => 'required|mimes:png,jpg,jpeg|max:2048',
            'harga' => 'required|max:255',
            'deskripsi' => 'required|max:255',
            'user_email' => 'required',
            'kategori' => 'required'
        ]);

        //dd(json_decode($request->alat));
            
        if($validator->fails()){
            return messageError($validator->messages()->toArray());
        }
            
        $thumbnail = $request->file('gambar');
        $filename = now()->timestamp. "_". $request->gambar->getClientOriginalName();
        $thumbnail->move('uploads', $filename);
            
        $bukuData = $validator->validated();
        
        $buku = Buku::create([
            'judul_buku' => $bukuData['judul_buku'],
            'penulis' => $bukuData['penulis'],
            'gambar' => 'uploads/'.$filename,
            'harga' => $bukuData['harga'],
            'deskripsi' => $bukuData['deskripsi'],
            'user_email' => $bukuData['user_email'],
            'status_buku' => 'unpublish'                
        ]);

       foreach(json_decode($request->kategori) as $kategori) {
        Kategori::create([
            'nama_kategori' => $kategori->nama_kategori,
            'buku_idbuku' => $buku->id,
        ]);
        
       }


        return response()->json([
            "data" => [
                "msg" => "buku berhasil disimpan",
                "buku" => $bukuData['judul_buku']
            ]
        ]);

    }

    public function update_buku(Request $request, $id){


        // $Buku = Buku::find($id);
        $Buku = Buku::where('idbuku',$id)->first();

        if($Buku){

            $validator = Validator::make($request->all(),[
                'judul_buku' => 'required|max:255',
                'penulis' => 'required|max:255',
                'gambar' => 'required|mimes:png,jpg,jpeg|max:2048',
                'harga' => 'required|max:255',
                'deskripsi' => 'required',
                'user_email' => 'required',
                'kategori' => 'required'
            ]);
                
            if($validator->fails()){
                return messageError($validator->messages()->toArray());
            }
                
            $thumbnail = $request->file('gambar');
            $filename = now()->timestamp. "_". $request->gambar->getClientOriginalName();
            $thumbnail->move('uploads', $filename);
                
            $bukuData = $validator->validated();

                
            buku::where('idbuku', $id)->update([
                'judul_buku' => $bukuData['judul_buku'],
                'penulis' => $bukuData['penulis'],
                'gambar' => 'uploads/'.$filename,
                'harga' => $bukuData['harga'],
                'deskripsi' => $bukuData['deskripsi'],
                'user_email' => $bukuData['user_email'],
                'status_buku' => 'unpublish'  
            ]);
    
            Kategori::where('buku_idbuku', $id)->delete();
    
           foreach(json_decode($request->kategori) as $kategori) {

            Kategori::create([
                'nama_kategori' => $kategori->nama_kategori,
                'buku_idbuku' => $id,
            ]);
            
           }
    
            return response()->json([
                "data" => [
                    "msg" => "buku berhasil disunting",
                    "buku" => $bukuData['judul_buku']
                ]
            ],200);

        }

    }

    public function delete_buku($id){

        Kategori::where('buku_idbuku', $id)->delete();
        Buku::where('idbuku', $id)->delete();

        return response()->json([
            "data" => [
                "msg" => "Buku berhasil di hapus",
                "idbuku" => $id
            ] 
        ],200);
    }

    public function publish_buku($id){

        $buku = Buku::where('idbuku', $id)->get();

        if($buku){

            Buku::where('idbuku', $id)->update(['status_buku' => 'publish']);

            \App\Models\Log::create([
                'module' => 'publish buku',
                'action' => 'publish buku dengan id '.$id,
                'useraccess' => 'administrator',
            ]);

            return response()->json([
                "data" => [
                    'msg' => 'buku dengan id '.$id.' berhasil di publish'
                ]
            ],200);
        }
            
        return response()->json([
            "data" => [
                'msg' => 'buku dengan id {$id} tidak ditemukan'

            ]
        ],422);
    }

    public function unpublish_buku($id){

        $buku = Buku::where('idbuku', $id)->get();

        if($buku){

            Buku::where('idbuku', $id)->update(['status_buku' => 'unpublish']);

            \App\Models\Log::create([
                'module' => 'unpublish buku',
                'action' => 'unpublish buku dengan id '.$id,
                'useraccess' => 'administrator',
            ]);

            return response()->json([
                "data" => [
                    'msg' => 'buku dengan id '.$id.' berhasil di unpublish'
                ]
            ],200);
        }
            
        return response()->json([
            "data" => [
                'msg' => 'buku dengan id {$id} tidak ditemukan'

            ]
        ],422);
    }


}