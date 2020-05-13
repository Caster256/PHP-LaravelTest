<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class updateModel extends Model
{
    protected $table = 'post';
    public $timestamps = false;

    protected $fillable = ['title','content'];
}
