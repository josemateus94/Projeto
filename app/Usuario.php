<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = ['nome', 'idade', 'endereco', 'email'];
}
