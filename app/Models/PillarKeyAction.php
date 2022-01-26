<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PillarKeyAction extends Model
{
    use HasFactory;
    public $table = 'pillar_key_action';
    protected $guarded  = [
        'id','created_at','updated_at'
    ];
}
