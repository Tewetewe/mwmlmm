<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $fillable = ['kategori'];
    protected $dates = ['created_at', 'updated_at'];

    public function subkategori(){
        return $this->hasMany(SubKategori::class, 'kategori_id', 'id');
    }

}
