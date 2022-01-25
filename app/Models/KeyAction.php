<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeyAction extends Model
{
    use HasFactory;
    public $table = 'key_actions';
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];


    public function pillars(){
        return $this->belongsToMany(Pillar::class, 'pillar_key_action','pillar_id','key_action_id');
    }
}
