<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;
    public function event(){
        return $this->belongsToMany(Event::class); //tiene muchos eventos
    }
}
