<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipe extends Model
{
    protected $table = 'tipe';
    protected $fillable = ['tipe'];
    protected $dates = ['created_at', 'updated_at'];

}
