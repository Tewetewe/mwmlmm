<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Moment extends Model
{
    protected $table = 'moment';
    protected $fillable = ['tipe_id', 'kode_urut', 'sub_kategori_id', 'judul', 'gambar', 'deskripsi', 'link_youtube', 'due_date_1', 'due_date_2', 'status_id'];
    protected $dates = ['created_at', 'updated_at'];


    public function tipe(){
        return $this->belongsTo(Tipe::class);
    }

    public function subkategori(){
        return $this->belongsTo(SubKategori::class, 'sub_kategori_id');
    }

    public function status(){
        return $this->belongsTo(Status::class);
    }

}
