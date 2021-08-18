<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Status;
use App\Kategori;
use App\SubKategori;
use App\Tipe;
use App\Moment;
use Storage;


class MomentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $moments = Moment::with('subkategori.kategori')->orderBy('kode_urut')->get();
        return view('moment.index', compact('moments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statuses = Status::all();
        $kategoris = Kategori::all();
        $subkategoris = SubKategori::all();
        $tipes = Tipe::all();

        return view('moment.create', compact('statuses', 'kategoris', 'subkategoris', 'tipes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasfile('gambar'))
        {
            try {
                $gambar = $request->file('gambar');
                $disk = Storage::disk('public_path')->put('',$gambar);
                $url = '/images/'.$disk;
            } catch (\Exception $e) {
                return $e->getMessage();
            }
           
        }
        else{
            $url = NULL;
        }

        Moment::create([
            'tipe_id' => $request->tipe_id,
            'sub_kategori_id' => $request->sub_kategori_id,
            'status_id' => $request->status_id,
            'kode_urut' => $request->kode_urut,
            'judul' => $request->judul,
            'gambar' => $url,
            'deskripsi' => $request->deskripsi,
            'link_youtube' => $request->link_youtube,
            'due_date_1' => $request->due_date_1,
            'due_date_2' => $request->due_date_2,
        ]);

        return redirect()->route('moment.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $moment = Moment::find($id);
        return view('moment.show', compact('moment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $moment = Moment::find($id);
        $kategoris = Kategori::all();
        $subkategoris = SubKategori::all();
        $statuses = Status::all();
        $tipes = Tipe::all();


        return view('moment.edit', compact('moment', 'kategoris', 'statuses', 'subkategoris', 'tipes'));
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
        $moment = Moment::find($id);

        
        if($request->hasfile('gambar'))
        {
            try {
                $gambar = $request->file('gambar');
                $disk = Storage::disk('public_path')->put('',$gambar);
                $url = '/images/'.$disk;

            } catch (\Exception $e) {
                return $e->getMessage();
            }
          

            if($moment->gambar != NULL || $moment->gambar != ''){
                $gambar_lama = $moment->foto_aset;
                $link = str_replace('/images','',$gambar_lama);
                try {
                    Storage::disk('public_path')->delete($link);
    
                } catch (\Exception $e) {
                    return $e->getMessage();
                }
            }
       
        }
        else{
            $url = NULL;
        }

        if($url != NULL){
            $moment->update([
                'tipe_id' => $request->tipe_id,
                'sub_kategori_id' => $request->sub_kategori_id,
                'status_id' => $request->status_id,
                'kode_urut' => $request->kode_urut,
                'judul' => $request->judul,
                'gambar' => $url,
                'deskripsi' => $request->deskripsi,
                'link_youtube' => $request->link_youtube,
                'due_date_1' => $request->due_date_1,
                'due_date_2' => $request->due_date_2,
            ]);
        }
        
        else{
            $moment->update([
                'tipe_id' => $request->tipe_id,
                'sub_kategori_id' => $request->sub_kategori_id,
                'status_id' => $request->status_id,
                'kode_urut' => $request->kode_urut,
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'link_youtube' => $request->link_youtube,
                'due_date_1' => $request->due_date_1,
                'due_date_2' => $request->due_date_2,
            ]);
        }
      

        return redirect()->route('moment.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $moment = Moment::find($id);
        if($moment->gambar != NULL || $moment->gambar != ''){
            $gambar_lama = $moment->gambar;
            $link = str_replace('/images','',$gambar_lama);
            try {
                Storage::disk('public_path')->delete($link);
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        }
        $moment->delete();
        return redirect()->route('moment.index');
    }
}
