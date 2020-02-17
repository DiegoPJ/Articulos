<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
            //id, nombre, categoria (Bazar, Hogar, Elećtronica), precio, stock, imagen
            protected $fillable = ["nombre","categoria","precio","stock","foto"];

    public function scopeBuscarCateg($query,$x){

        if(!isset($x)){
         
            return $query->where('categoria','like','%');
        }
        if($x=='%'){
            return $query->where('categoria','like',$x);
        }
        return $query->where('categoria',$x);
    }


    
    public function scopeBuscarPrecio($query,$num){
            switch($num){
        case 1:
            return $query->where('precio', '<=', 20.0);
        case 2:
            return $query->where('precio', '>', 20.0)->where('precio', '<=', 50.0);
        case 3:
            return $query->where('precio', '>', 50.0);  
            }
        
    }
}
