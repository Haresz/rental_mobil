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
    public function store(Rental $rental, Request $request)
    {
        $table = Rental::create([
            'id_mobil' => $rental->id, 
            'id_user' => $request->id_user, 
            'nama_pemesan' => $request->nama_pemesan, 
            'harga' => $request->harga, 
            'merek_mobil' => $request->merek_mobil, 
            'tanggal_pembayaran'=> $request->tanggal_pembayaran, 
            'metode_pembayaran' => $request->metode_pembayaran, 
            'no_hp_admin' => $request->no_hp_admin, 
            'no_hp_pemesan'=> $request->no_hp_pemesan,
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
            $rental->id_mobil = $request->id_mobil ? $request->id_mobil : $rental->id_mobil;
            $rental->id_user = $request->id_user ? $request->id_user : $rental->id_user;
            $rental->nama_pemesan = $request->nama_pemesan ? $request-> nama_pemesan : $rental->nama_pemesan; 
            $rental->harga = $request->harga ? $request-> harga : $rental->harga; 
            $rental->merek_mobil = $request->merek_mobil ? $request-> merek_mobil : $rental->merek_mobil; 
            $rental->tanggal_pembayaran = $request->tanggal_pembayaran ? $request-> tanggal_pembayaran : $rental->tanggal_pembayaran; 
            $rental->metode_pembayaran = $request->metode_pembayaran ? $request-> metode_pembayaran : $rental->metode_pembayaran; 
            $rental->no_hp_admin = $request->no_hp_admin ? $request-> no_hp_admin : $rental->no_hp_admin; 
            $rental->no_hp_pemesan = $request->no_hp_pemesan ? $request-> no_hp_pemesan : $rental->no_hp_pemesan; 
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
 