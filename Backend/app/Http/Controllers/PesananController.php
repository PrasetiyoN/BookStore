<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Pesanan extends Controller
{
    public function pesanan(Request $request) {
        $validator = Validator::make($request->all(), [
            'idbuku' => 'required',
            'email' => 'required|email',

        ]);

        if($validator->fails() {
            return messageError($validator->messages()->toArray());
        }

        \App\Models\Pesanan::create([
            'user_email' => $request->email,
            'buku_idbuku' => $request->idbuku,
        ]);

        return response()->json([
            'data' => [
                'msg' => 'pesanan berhasil'
            ]
            ]);
    }
}
