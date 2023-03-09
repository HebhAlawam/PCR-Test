<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
       'id_num', 'first_name','last_name','email','birth_day','phone','address', 'gender','appointment','center_id','type_id'
    ];
    
    public function center(){
        return $this->belongsTo(Center::class,'center_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function symptoms()
    {
        return $this->hasMany(Symptom::class);
    }

    public function diseases()
    {
        return $this->hasMany(Disease::class);
    }


}
