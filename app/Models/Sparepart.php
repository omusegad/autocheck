<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sparepart extends Model
{
    use HasFactory;
    protected $guarded  = [
        'id','created_at','updated_at'
    ];

    // /**
    //  * Get the user that owns the Jobcard
    //  *
    //  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    //  */
    // public function company():HasMany
    // {
    //     return $this->hasMany(Company::class);
    // }

}
