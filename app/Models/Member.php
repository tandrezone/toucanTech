<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Member extends Model
{
    use HasFactory;

    /**
     * @return BelongsToMany
     */
    public function schools() : BelongsToMany
    {
        return $this->belongsToMany(
            School::class,
            'members_schools',
            'member_id',
            'school_id');
    }
}
