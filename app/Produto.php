<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Categoria;

class Produto extends Model{
    Use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable =['nome', 'quantidade', 'preco', 'categoria_id'];
    
    public function categoria(){
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
}
