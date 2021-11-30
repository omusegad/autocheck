<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    use HasFactory;
    public $table = 'users';
    protected $guarded  = [
        'id','created_at','updated_at'
    ];

}
