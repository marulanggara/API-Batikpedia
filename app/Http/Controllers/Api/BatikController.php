<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Batikpedia;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BatikController extends Controller
{
    //
    public function index()
    {
        $data = Batikpedia::orderBy('nama','asc')->get();
        return response()->json([
            'status'=>true,
            'massage'=>'data ditemukan',
            'data'=>$data
        ],200);    
    }

    public function show(string $id)
    {
        $data = Batikpedia::find($id);
        if($data){
            return response()->json([
                'status' => true,
                'massage' => 'data ditemukan',
                'data' => $data
            ], 200);
        }else{
            return response()->json([
                'status'=> false,
                'massage'=> 'data tidak ditemukan'
            ]);
        }
    }
    public function store(Request $request)
    {
        $dataBatik = new Batikpedia;

        $rules = [
            'nama' => 'required',
            'asal' => 'required',
            'deskripsi' => 'required'
        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json([
                'status'=>false,
                'massage'=>'gagal memasukkan data',
                'data'=>$validator->errors()
            ]);
        }

        $dataBatik -> nama = $request -> nama;
        $dataBatik -> asal = $request -> asal;
        $dataBatik -> deskripsi = $request -> deskripsi;

        $post = $dataBatik->save();
        return response()->json([
            'status' => true,
            'massage' => 'sukses menambah data',
        ], 200);
    }
    public function update(Request $request, string $id)
    {
        $dataBatik = Batikpedia::find($id);

        if(empty($dataBatik)){
            return response()->json([
                'status'=>false,
                'massage'=>'data tidak ada'
            ], 404);
        }

        $rules = [
            'nama' => 'required',
            'asal' => 'required',
            'deskripsi' => 'required'
        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json([
                'status'=>false,
                'massage'=>'gagal update data',
                'data'=>$validator->errors()
            ]);
        }

        $dataBatik -> nama = $request -> nama;
        $dataBatik -> asal = $request -> asal;
        $dataBatik -> deskripsi = $request -> deskripsi;

        $post = $dataBatik->save();
        return response()->json([
            'status' => true,
            'massage' => 'sukses update data',
        ], 200);
    }
    public function destroy(string $id)
    {
        $dataBatik = Batikpedia::find($id);

        if(empty($dataBatik)){
            return response()->json([
                'status'=>false,
                'massage'=>'data tidak ada'
            ], 404);
        }

        $post = $dataBatik->delete();

        return response()->json([
            'status' => true,
            'massage' => 'sukses delete data',
        ], 200);
    }
}
