<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pillar extends Model
{
    use HasFactory;
    public $table = 'pillars';
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

}
