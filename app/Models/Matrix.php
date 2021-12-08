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
        return $this->belongsTo(Country::class, 'coiuntry_id', 'id');
    }

}
