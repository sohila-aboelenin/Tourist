<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicesImage extends Model
{
    use HasFactory;
    protected $fillable = [
        'service_id',
        'path',

    ];

    public function services(){
        return $this->belongsTo(Services::class);
    }
}
