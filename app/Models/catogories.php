<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class catogories extends Model
{
    protected $table='categories';
   
    use HasFactory;
    public function tasks(){
        return $this->hasMany(tasks::class,'category_id');
    }
}
