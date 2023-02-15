<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Groomservices;

class Servicesimage extends Model
{
    use HasFactory;
    protected $fillable=[
        'image',
        'groomservices_id',
    ];

    public function groomservices(){
        return $this->belongsTo(Groomservices::class);
    }
}
