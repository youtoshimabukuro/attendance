<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'date',
        'attendance',
        'breakIn',
        'breakOut',
        'breakTime',
        'leaving',
        'workTime',
    ];

   /* public function user()
    {
        return $this->hasMany('App\Models\User');
    }*/
}
