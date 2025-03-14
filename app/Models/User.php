<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = ['name','mail','pincode'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function setPasswordAtribute($value)
    {
        $this->attributes['pincode'] = bcrypt($value);
    }
}
