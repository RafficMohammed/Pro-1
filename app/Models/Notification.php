<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Notification extends Model
{
    use HasFactory;
    protected $guarded=[];

    protected $table = 'notifications';

//    public function users()
//    {
//        return $this->belongsTo(User::class,'user_id');
//    }
}
