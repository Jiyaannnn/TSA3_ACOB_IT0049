<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['username', 'full_name', 'code', 'role', 'team', 'location', 'status'])]
class TeamMember extends Model
{
    // TFA2 records have created_at only; Eloquent must not write updated_at.
    public const UPDATED_AT = null;
}
