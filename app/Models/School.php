<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class School extends Model
{
    use HasFactory;

    /**
     * @return BelongsToMany
     */
    public function members() : BelongsToMany
    {
        return $this->belongsToMany(
            Member::class,
            'members_schools',
            'school_id',
            'member_id');
    }
}
