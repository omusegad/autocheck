<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MappedData extends Model
{
    use HasFactory;
    public $table = 'mapped_data';
    protected $guarded  = [
        'id','created_at','updated_at'
    ];

    
    public function pillar()
    {
        return $this->belongsTo(Pillar::class, 'pillar_id', 'id');
    }
    
    public function user()
    {
        return $this->belongsTo(user::class, 'user_id', 'id');
    }
   

}
