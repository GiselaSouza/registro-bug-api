<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class UserClassificationBug extends Pivot
{
    protected $table = "users_classificationbugs";

    protected $guarded = [];
}
