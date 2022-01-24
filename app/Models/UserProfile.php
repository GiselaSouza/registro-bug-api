<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class UserProfile extends Pivot
{
    protected $table = "users_profiles";

    protected $guarded = [];
}
