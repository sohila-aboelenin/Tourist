<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'category_id',
        'description',
        'price'
    ];

    public function category (){
        return $this->belongsTo(Categories::class,'category_id');
    }

    public function image(){
        return $this ->hasMany(
            ServicesImage::class,'service_id'
        );
    }
}
