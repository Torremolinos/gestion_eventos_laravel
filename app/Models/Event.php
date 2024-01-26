<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    function organizer(){
        return $this->belongsTo(Organizer::class); //pertenece a un organizador
    }

     public function participants(){
        return $this->belongsToMany(Participant::class); //tiene muchos participantes
    }
}
