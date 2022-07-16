<?php

namespace App\Models;
use App\Models\cat;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function cat(){
        return $this->belongsTo('\App\Models\cat');
    }

    public function trainer(){
        return $this->belongsTo('\App\Models\trainer');
    }

    public function students(){
        return $this->belongsToMany('\App\Models\student');
    }




}
