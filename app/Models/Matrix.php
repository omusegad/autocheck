<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matrix extends Model
{
    use HasFactory;
    public $table = 'matrices';
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    /**
     * Get the user that owns the Matrix
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }
    public function keyAction()
    {
        return $this->belongsTo(KeyAction::class, 'key_action_id', 'id');
    }
    public function pillar()
    {
        return $this->belongsTo(Pillar::class, 'pillars_id', 'id');
    }

}
