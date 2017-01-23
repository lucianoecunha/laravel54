<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','number','active','categoria','image','description'];
    //protected $guarded
    
   
}
