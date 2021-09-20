<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\employes;
use app\Models\departmen;
use DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $index = DB::table('employes')->get();
        return response()->json([
            'data' => $index
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $find = strtoupper($request->cari);
        $find_data = DB::table('employes')->where('nama', 'like', "%$find%")->get();
        return response()->json([
            'data' => $find_data
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = $request->validate([
            'nama' => 'required',
            'mobile_number' => 'required',
            'email' => 'required',
            'kota' => 'required',
            'gender' => 'required',
            'hire' => 'required'
        ]);  

       $departmen = DB::table('department')->get();

       $save_employee = employes::create([
           'nama' ->$request->nama,
           'mobile_number' -> $request->nomer,
           'email' -> $request->email,
           'kota' ->$request->kota,
           'gender' ->$request->gender,
           'hire' ->$request->hire
       ]); 

        return response()->json([
           'message' => 'Berhasil Disimpan',
           'data' => $save_employee
       ], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $edit = employee::findOrFail($id);
        
        return response()->json([
            'data' => $edit
        ], 200);
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
        //
        $update = employes::find($id)->update($request->all());
        $index = employes::all();
        return response()->json([
            'data' => $index
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $hapus = employes::find($id);
        $hapus->delete();
        $note = note::all();

    }
}
