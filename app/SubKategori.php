<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubKategori extends Model
{
    protected $table = 'sub_kategori';
    protected $fillable = ['kategori_id', 'sub_kategori'];
    protected $dates = ['created_at', 'updated_at'];

    public function kategori(){
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }

}
