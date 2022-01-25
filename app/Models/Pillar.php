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

    public function keyactions(){
        return $this->belongsToMany(KeyAction::class, 'pillar_key_action', 'key_action_id','pillar_id');
    }

}
