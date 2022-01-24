<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "profiles";

    protected $fillable = [
        'name',
    ];

    protected $hidden = [
        "deleted_at"
    ];

    public function users()
    {
        return $this->belongsToMany(
            User::class,
            UserProfile::class,
            "profile_id",
            "user_id"
        );
    }
}
