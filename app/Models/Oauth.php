<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oauth extends Model
{
    use HasFactory;
    protected $table='oauth_access_tokens';

    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
