<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubKategori;
use App\Kategori;

class SubKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subkategoris = SubKategori::all();
        $kategoris = Kategori::all();
        return view('subkategori.index', compact('subkategoris', 'kategoris'));
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
        SubKategori::create([
            'kategori_id' => $request->kategori_id,
            'sub_kategori' => $request->sub_kategori
        ]);

        return redirect()->route('subkategori.index');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subkategori = SubKategori::find($id);
        $kategoris = Kategori::all();
        return view('subkategori.edit', compact('kategoris', 'subkategori'));
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
        $subkategori = SubKategori::find($id);
        $subkategori->update([
                'kategori_id' => $request->kategori_id,
                'sub_kategori' => $request->sub_kategori,
        ]);

        return redirect()->route('subkategori.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subkategori = SubKategori::find($id);
        $subkategori->delete();
        return redirect()->route('subkategori.index');
    }

    public function findSubKategori($id)
    {
        $subkategori = SubKategori::where('kategori_id',$id)->get();
        return response()->json($subkategori);
    }
}
