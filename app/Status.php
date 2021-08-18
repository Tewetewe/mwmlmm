<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';
    protected $fillable = ['status'];
    protected $dates = ['created_at', 'updated_at'];

}
