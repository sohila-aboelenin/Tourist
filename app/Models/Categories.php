<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'path',
    ];

    public function services()
    {
        return $this->hasMany(Services::class,'category_id');
    }
}
