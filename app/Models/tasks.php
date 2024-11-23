<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class tasks extends Model
{
     protected $table='task';
     public function category()
     {
         return $this->belongsTo(Catogories::class, 'category_id');
     }
    use HasFactory;
}
