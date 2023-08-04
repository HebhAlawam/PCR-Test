<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['name','image','city'];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
