<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Symptom extends Model
{
    use HasFactory;
    use SoftDeletes;    
    protected $fillable = ['name'];

    public function reservations()
    {
        return $this->hasMany(Reservation::class,'reservation_symptom');
    }
}
