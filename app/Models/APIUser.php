<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class APIUser extends Model
{
    protected $fillable = [
        'name', 'email', 'password', 'username', 'roles',
        'address', 'city_id', 'province_id', 'phone', 'avatar', 'status'
    ];
    public function generateToken()
    {
        $this->api_token = str_random(60);
        $this->save();
        return $this->api_token;
    }
}