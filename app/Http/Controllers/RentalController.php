<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rental;

class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rental = Rental::all();
        return $rental;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $table = Rental::create([
            'merek' => $request->merek, 
            'warna' => $request->warna, 
            'tahun_pembuatan' => $request->tahun_pembuatan, 
            'transmisi' => $request->transmisi, 
            'tempat_duduk' => $request->tempat_duduk, 
            'ban_penggerak'=> $request->ban_penggerak, 
            'bahan_bakar' => $request->bahan_bakar, 
            'audio' => $request->audio, 
            'harga'=> $request->harga
        ]);

        return response()->json([
            'success' => 201,
            'message' => 'data berhasil disimpan',
            'data' => $table
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rental = rental::find($id);
        if ($rental){
            return response()->json([
                'status' => 200,
                'data' => $rental
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'id atas' . $id . 'tidak di temukan'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rental = rental::find($id);
        if($rental){
            $rental->merek = $request->merek ? $request->merek : $rental->merek;
            $rental->warna = $request->warna ? $request->warna : $rental->warna;
            $rental->tahun_pembuatan = $request->tahun_pembuatan ? $request-> tahun_pembuatan : $rental->tahun_pembuatan; 
            $rental->transmisi = $request->transmisi ? $request-> transmisi : $rental->transmisi; 
            $rental->tempat_duduk = $request->tempat_duduk ? $request-> tempat_duduk : $rental->tempat_duduk; 
            $rental->ban_penggerak = $request->ban_penggerak ? $request-> ban_penggerak : $rental->ban_penggerak; 
            $rental->bahan_bakar = $request->bahan_bakar ? $request-> bahan_bakar : $rental->bahan_bakar; 
            $rental->audio = $request->audio ? $request-> audio : $rental->audio; 
            $rental->aksesoris = $request->aksesoris ? $request-> aksesoris : $rental->aksesoris; 
            $rental->harga = $request->harga ? $request-> harga : $rental->harga; 
            $rental->save();
            return response()->json([
                'status' => 200,
                'data' => $rental
            ],200);
        }else{
            return reponse()->json([
                'status' => 404,
                'message' => $id . 'tidak di temukan'
            ],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rental =  rental::where('id', $id)->first();
        if($rental){
            $rental->delete();
            return response()->json([
                'status' =>200,
                'data' => $rental
            ],200);
        }else{
            return response()->json([
                'status' => 404,
                'message'=> 'id' . $id . 'tidak ditemukan'
            ], 404);
        }
    }
}
